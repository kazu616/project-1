<?php
function indexAuthor()
{
    $result = [];
    $search_bill = '';
    $page = 1;
    $prod_per_page = 5;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    if (isset($_GET['search'])) {
        $search_bill = $_GET['search'];
    }
    include_once "connect/openDB.php";
    $sqlGetTotalOrder = "SELECT COUNT(*) FROM authors WHERE name LIKE '$search_bill%'";
    $query = mysqli_query($connect, $sqlGetTotalOrder);
    $total_order = mysqli_fetch_array($query)[0];
    $number_of_page = ceil($total_order / $prod_per_page);
    $prod_offset = ($page - 1) * $prod_per_page;
    $sql = "SELECT * FROM authors WHERE name LIKE '$search_bill%' LIMIT $prod_per_page OFFSET $prod_offset";
    $authors = mysqli_query($connect, $sql);
    include_once 'connect/closeDB.php';
    $result['data'] = $authors;
    $result['page'] = $page;
    $result['number_of_page'] = $number_of_page;
    return $result;
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
    $trimed_name = trim($name);
    $sql_check = "SELECT * FROM authors WHERE name = ?";
    $stmt = mysqli_prepare($connect, $sql_check);
    mysqli_stmt_bind_param($stmt, "s", $trimed_name);
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
        mysqli_stmt_bind_param($stmt, 'sss', $trimed_name, $image_name, $country);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            include_once 'connect/closeDB.php';
            echo '<script language="javascript">';
            echo 'alert("Add successfull");';
            echo 'window.location.href="?controller=authorAdmin';
            echo '</script>';
        } else {
            include_once 'connect/closeDB.php';
            echo '<script language="javascript">';
            echo 'alert("Add error");';
            echo 'window.location.href="?controller=authorAdmin';
            echo '</script>';
        }
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
    $trimed_name = trim($name);

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
    mysqli_stmt_bind_param($stmt, "si", $trimed_name, $id);
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
        mysqli_stmt_bind_param($stmt, "sssi", $trimed_name, $image_name, $country, $id);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            echo '<script language="javascript">';
            echo 'alert("Edit successfull");';
            echo 'window.location.href="?controller=authorAdmin";';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Edit error");';
            echo 'window.location.href="?controller=authorAdmin&action=clone_data_edit&id=' . $id . '";';
            echo '</script>';
        }
        include_once 'connect/closeDB.php';
        header('Location:?controller=authorAdmin');
    }
}

function handleSearch()
{
    if (!isset($_POST['search'])) return;
    $search = $_POST['search'];
    header("location: ?controller=authorAdmin&search=$search");
}

function delete()
{
    $id = $_GET['id'];
    include_once 'connect/openDB.php';
    $sql_check = "SELECT COUNT(idAuthor) AS countAuthor FROM `products` WHERE idAuthor = '$id'";
    $count_author = mysqli_fetch_assoc(mysqli_query($connect, $sql_check));
    if ($count_author['countAuthor'] == 0) {
        $sql = "DELETE FROM authors WHERE idAuthor = '$id'";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            include_once 'connect/closeDB.php';
            header('Location:?controller=authorAdmin');
        } else {
            echo 'alert("Delete unsuccessful");';
        }
    } else {
        include_once 'connect/closeDB.php';
        echo '<script language="javascript">';
        echo 'alert("Cannot delete this author (because the book has a name this author created)");';
        echo 'window.location.href="?controller=authorAdmin"';
        echo '</script>';
    }
}


switch ($action) {
    case '':
        $result = indexAuthor();
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
    case 'search': {
            handleSearch();
        }
        break;
}
