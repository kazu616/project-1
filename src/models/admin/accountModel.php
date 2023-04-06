<?php
function indexAccount()
{
    include_once 'connect/openDB.php';
    $sql = "SELECT accounts.*, roles.name AS nameRole FROM accounts INNER JOIN roles ON accounts.idRole = roles.idRole";
    $accounts = mysqli_query($connect, $sql);
    include_once 'connect/closeDB.php';
    return $accounts;
}
function clone_data_role()
{
    include_once 'connect/openDB.php';
    $sql = "SELECT * FROM roles";
    $roles = mysqli_query($connect, $sql);
    include_once 'connect/closeDB.php';
    return $roles;
}
function addAccount()
{
    $name = $_POST['username'];
    $phoneNumber = $_POST['phone_number'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $roles = $_POST['roles'];
    $img = $_FILES["image"]["name"];
    $image_name_default = explode(".", $_FILES["image"]["name"]);
    $image_name = str_replace(" ", "", ($image_name_default[0] . floor(microtime(true) * 1000) . "." . $image_name_default[1]));
    $target_file = "imgs/" . basename($image_name);
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    include_once 'connect/openDB.php';

    $sql_check = "SELECT * FROM accounts WHERE email = ?";
    $stmt = mysqli_prepare($connect, $sql_check);
    mysqli_stmt_bind_param($stmt, "s", trim($email));
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">';
        echo 'alert("Duplicate email");';
        echo 'window.location.href="?controller=accountAdmin&action=show_formAdd";';
        echo '</script>';
    } else {
        $stmt = mysqli_prepare($connect, "INSERT INTO accounts (name, img, phoneNumber, password, email, address, idRole) VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssssssi", trim($name), $image_name, trim($phoneNumber), trim($password), trim($email), trim($address), $roles);
        mysqli_stmt_execute($stmt);
        header('Location:?controller=accountAdmin');
        include_once 'connect/closeDB.php';
    }
    include_once 'connect/closeDB.php';
}
function clone_data_edit()
{
    $id = $_GET['id'];
    include_once 'connect/openDB.php';
    $sql = "SELECT * FROM accounts WHERE idAccount = '$id'";
    $data_clone = mysqli_query($connect, $sql);
    include_once 'connect/closeDB.php';
    return $data_clone;
}
function edit()
{
    $id = $_POST['id'];
    $name = $_POST['username'];
    $phoneNumber = $_POST['phone_number'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $roles = $_POST['roles'];
    $old_image = $_POST['old_img'];

    if ((!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) && isset($_POST["old_img"])) {
        $image_name = $old_image;
    } else {
        $img = $_FILES["image"]["name"];
        $image_name_default = explode(".", $_FILES["image"]["name"]);
        $image_name = str_replace(" ", "", ($image_name_default[0] . floor(microtime(true) * 1000) . "." . $image_name_default[1]));
        $target_file = "imgs/" . basename($image_name);
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }
    }

    include_once 'connect/openDB.php';
    $trimed_email = trim($email);
    $trimed_name = trim($name);
    $trimed_phoneNumber = trim($phoneNumber);
    $sql_check = "SELECT * FROM accounts WHERE email = ? AND idAccount != ?";
    $stmt = mysqli_prepare($connect, $sql_check);
    mysqli_stmt_bind_param($stmt, "si", $trimed_email, $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">';
        echo 'alert("Duplicate emails");';
        echo 'window.location.href="?controller=accountAdmin&action=clone_data_edit&id=' . $id . '";';
        echo '</script>';
    } else {
        $sql_update = "UPDATE `accounts` SET email=?, name=?, img=?, phoneNumber=?, password=?, address=?, idRole=? WHERE idAccount=?";
        $stmt = mysqli_prepare($connect, $sql_update);
        mysqli_stmt_bind_param($stmt, 'ssssssii', $trimed_email, $trimed_name, $image_name, $trimed_phoneNumber, trim($password), trim($address), $roles, $id);
        mysqli_stmt_execute($stmt);
        include_once 'connect/closeDB.php';
        header('Location:?controller=accountAdmin');
    }
    include_once 'connect/closeDB.php';
}


function delete()
{
    $id = $_GET['id'];
    include_once 'connect/openDB.php';
    $sql = "DELETE FROM accounts WHERE idAccount = '$id'";
    $data_clone = mysqli_query($connect, $sql);
    include_once 'connect/closeDB.php';
}


switch ($action) {
    case '':
        $accounts = indexAccount();
        break;
    case 'show_formAdd':
        $roles = clone_data_role();
        break;
    case 'add':
        addAccount();
        break;
    case 'clone_data_edit':
        $data_clone = clone_data_edit();
        break;
    case 'edit':
        edit();
        break;
    case 'delete':
        delete();
        break;
}
