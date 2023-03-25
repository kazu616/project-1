<?php
function indexAuthor()
{
    include_once 'connect/openDB.php';
    $sql = "SELECT * FROM authors";
    $authors = mysqli_query($connect, $sql);
    include_once 'connect/closeDB.php';
    return $authors;
}
function addAuthor()
{
    $name = $_POST['name'];
    $country = $_POST['country'];
    $img = $_FILES["image"]["name"];
    $image_name_default = explode(".", $_FILES["image"]["name"]);
    $image_name = str_replace(" ", "", ($image_name_default[0] . floor(microtime(true) * 1000) . "." . $image_name_default[1]));
    $target_file = "imgs/" . basename($image_name);
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }
    include_once 'connect/openDB.php';
    // check if the product name already exists
    $sql_check = "SELECT * FROM authors WHERE name = ?";
    $stmt = mysqli_prepare($connect, $sql_check);
    mysqli_stmt_bind_param($stmt, "s", trim($name));
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">';
        echo 'alert("Name author duplicate");';
        echo 'window.location.href="?controller=authorAdmin';
        echo '</script>';
        include_once 'connect/closeDB.php';
    } else {
        $stmt = mysqli_prepare($connect, "INSERT INTO authors(name,img,country) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', trim($name), $image_name, $country);
        mysqli_stmt_execute($stmt);
        include_once 'connect/closeDB.php';
        header('Location:?controller=authorAdmin');
    }
}
function clone_data_edit()
{
    $id = $_GET['id'];
    include_once 'connect/openDB.php';
    $sql = "SELECT * FROM authors WHERE idAuthor = $id";
    $data_author = mysqli_query($connect, $sql);
    $sql_show = "SELECT * FROM authors";
    $authors = mysqli_query($connect, $sql_show);
    $data = array();
    $data['author_show'] = $authors;
    $data['clone_author'] = $data_author;
    include_once 'connect/closeDB.php';
    return $data;
}
function edit()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $country = $_POST['country'];
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
    $sql_check = "SELECT * FROM authors WHERE name = ? AND idAuthor != ?";
    $stmt = mysqli_prepare($connect, $sql_check);
    mysqli_stmt_bind_param($stmt, "si", trim($name), $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        // Product name already exists, notify user
        echo '<script language="javascript">';
        echo 'alert("Name author is created");';
        echo 'window.location.href="?controller=authorAdmin&action=clone_data_edit&id=' . $id . '";';
        echo '</script>';
    } else {
        // Product name doesn't exist, proceed with update
        $sql_update = "UPDATE authors SET name = ?, img = ?, country = ? WHERE idAuthor = ?";
        $stmt = mysqli_prepare($connect, $sql_update);
        mysqli_stmt_bind_param($stmt, "sssi", trim($name), $image_name, $country, $id);
        mysqli_stmt_execute($stmt);
        include_once 'connect/closeDB.php';
        header('Location:?controller=authorAdmin');
    }
}


function delete()
{
    $id = $_GET['id'];
    include_once 'connect/openDB.php';
    $sql = "DELETE FROM authors WHERE idAuthor = '$id'";
    $data_clone = mysqli_query($connect, $sql);
    include_once 'connect/closeDB.php';
}


switch ($action) {
    case '':
        $authors = indexAuthor();
        break;
    case 'add':
        addAuthor();
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
