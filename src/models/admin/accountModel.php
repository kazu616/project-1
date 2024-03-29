<?php
function indexAccount()
{
    $array = [];
    $page = 1;
    $prod_per_page = 5;
    $search = '';
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }
    include_once 'connect/openDB.php';
    $sqlGetTotalProduct = "SELECT COUNT(*) FROM accounts WHERE email LIKE '$search%'";
    $query = mysqli_query($connect, $sqlGetTotalProduct);
    $total_prod = mysqli_fetch_array($query)[0];
    $number_of_page = ceil($total_prod / $prod_per_page);
    $prod_offset = ($page - 1) * $prod_per_page;
    $sql = "SELECT accounts.*, roles.name AS nameRole FROM accounts INNER JOIN roles ON accounts.idRole = roles.idRole WHERE email LIKE '$search%' ORDER BY idAccount DESC LIMIT $prod_per_page OFFSET $prod_offset";
    $accounts = mysqli_query($connect, $sql);
    include_once 'connect/closeDB.php';
    $array['accounts'] = $accounts;
    $array['number_of_page'] = $number_of_page;
    $array['page'] = $page;
    return $array;
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
    $trimed_email = trim($email);
    $trimed_name = trim($name);
    $trimed_phoneNumber = trim($phoneNumber);
    $trimed_password = trim($password);
    $trimed_address = trim($address);
    $sql_check = "SELECT * FROM accounts WHERE email = ?";
    $stmt = mysqli_prepare($connect, $sql_check);
    mysqli_stmt_bind_param($stmt, "s", $trimed_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">';
        echo 'alert("Duplicate email");';
        echo 'window.location.href="?controller=accountAdmin&action=show_formAdd";';
        echo '</script>';
    } else {
        if (empty($image_name)) {
            $image_name = "avt.png";
        }
        $stmt = mysqli_prepare($connect, "INSERT INTO accounts (name, img, phoneNumber, password, email, address, idRole) VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssssssi", $trimed_name, $image_name, $trimed_phoneNumber, $trimed_password, $trimed_email, $trimed_address, $roles);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            include_once 'connect/closeDB.php';
            echo '<script language="javascript">';
            echo 'alert("Add successfull");';
            echo 'window.location.href="?controller=accountAdmin";';
            echo '</script>';
        } else {
            include_once 'connect/closeDB.php';
            echo '<script language="javascript">';
            echo 'alert("Add error");';
            echo 'window.location.href="?controller=accountAdmin&action=show_formAdd";';
            echo '</script>';
        }
    }
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
    $trimed_password = trim($password);
    $trimed_address = trim($address);
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
        mysqli_stmt_bind_param($stmt, 'ssssssii', $trimed_email, $trimed_name, $image_name, $trimed_phoneNumber, $trimed_password,  $trimed_address, $roles, $id);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            include_once 'connect/closeDB.php';
            echo '<script language="javascript">';
            echo 'alert("Edit successfull");';
            echo 'window.location.href="?controller=accountAdmin";';
            echo '</script>';
        } else {
            include_once 'connect/closeDB.php';
            echo '<script language="javascript">';
            echo 'alert("Edit error");';
            echo 'window.location.href="?controller=accountAdmin&action=clone_data_edit&id=' . $id . '";';
            echo '</script>';
        }
    }
    include_once 'connect/closeDB.php';
}


function delete()
{
    $id = $_GET['id'];
    $mode = $_GET['mode'];
    include_once 'connect/openDB.php';
    if ($mode == 1) {
        $sql_check1 = "SELECT COUNT(idAdmin) AS countAdmin FROM `order` WHERE idAdmin = '$id'";
        $count_admin = mysqli_fetch_assoc(mysqli_query($connect, $sql_check1));
        if ($count_admin['countAdmin'] == 0) {
            $sql = "DELETE FROM accounts WHERE idAccount = '$id' AND idRole = 1";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                include_once 'connect/closeDB.php';
                echo '<script language="javascript">';
                echo 'alert("Delete successfull");';
                echo 'window.location.href="?controller=accountAdmin"';
                echo '</script>';
            } else {
                include_once 'connect/closeDB.php';
                echo '<script language="javascript">';
                echo 'alert("Delete error");';
                echo 'window.location.href="?controller=accountAdmin"';
                echo '</script>';
            }
        } else {
            include_once 'connect/closeDB.php';
            echo '<script language="javascript">';
            echo 'alert("Cannot delete admin account handle order");';
            echo 'window.location.href="?controller=accountAdmin"';
            echo '</script>';
        }
    }
    if ($mode == 2) {
        $sql_check = "SELECT COUNT(idCustomer) AS countUser FROM `order` WHERE idCustomer = '$id'";
        $count_user = mysqli_fetch_assoc(mysqli_query($connect, $sql_check));
        if ($count_user['countUser'] == 0) {
            $sql = "DELETE FROM accounts WHERE idAccount = '$id' AND idRole = 2";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                include_once 'connect/closeDB.php';
                echo '<script language="javascript">';
                echo 'alert("Delete successfull");';
                echo 'window.location.href="?controller=accountAdmin"';
                echo '</script>';
            } else {
                echo 'alert("Delete unsuccessful");';
            }
        } else {
            include_once 'connect/closeDB.php';
            echo '<script language="javascript">';
            echo 'alert("Cannot delete user account have order");';
            echo 'window.location.href="?controller=accountAdmin"';
            echo '</script>';
        }
    }
}


function handleSearch()
{
    if (!isset($_POST['search'])) return;
    $search = $_POST['search'];
    header("location: ?controller=accountAdmin&search=$search");
}


switch ($action) {
    case '':
        $array = indexAccount();
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
    case 'search': {
            handleSearch();
            break;
        }
}
