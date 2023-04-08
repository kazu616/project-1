<?php
//function để lấy dữ liệu từ DB về
function index()
{
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
    $sqlGetTotalOrder = "SELECT COUNT(*) FROM genres WHERE name LIKE '$search_bill%'";
    $query = mysqli_query($connect, $sqlGetTotalOrder);
    $total_order = mysqli_fetch_array($query)[0];
    $number_of_page = ceil($total_order / $prod_per_page);
    $prod_offset = ($page - 1) * $prod_per_page;
    $sql = "SELECT * FROM genres WHERE name LIKE '$search_bill%' LIMIT $prod_per_page OFFSET $prod_offset";
    $result = mysqli_query($connect, $sql);
    $array = array();
    $array['data'] = $result;
    $array['number_of_page'] = $number_of_page;
    $array['page'] = $page;
    if (isset($_GET['edit']) && isset($_GET['id'])) {
        $idGenre = $_GET['id'];
        $sqlEdit = "SELECT * FROM genres WHERE idGenre = $idGenre";
        $query = mysqli_query($connect, $sqlEdit);
        $itemEdit = mysqli_fetch_array($query);
        $array['itemEdit'] = $itemEdit;
    }
    include_once "connect/closeDB.php";
    return $array;
}

//    Function lưu dữ liệu lên DB
function store()
{
    $name_genre = $_POST['name'];
    if (empty($name_genre) || trim($name_genre) === "") return header("location: ?controller=categoryAdmin");
    include_once "connect/openDB.php";
    $sql_check = "SELECT * FROM genres WHERE name = '$name_genre'";
    $query = mysqli_query($connect, $sql_check);
    if ($query && mysqli_num_rows($query) > 0) {
        echo '<script language="javascript">
        alert("Name genre duplicate!!");
        window.location.href="?controller=genreAdmin";
        </script>';
    } else {
        $sql = "INSERT INTO genres (name) VALUES ('$name_genre')";
        mysqli_query($connect, $sql);
        echo '<script language="javascript">
        alert("Add genre successfully!!");
        window.location.href="?controller=genreAdmin";
        </script>';
    }
    include_once "connect/closeDB.php";
}

function edit()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $name_edit = $_POST['name'];
        if (empty($name_edit) || trim($name_edit) === "") return header("location: ?controller=categoryAdmin");
        include_once "connect/openDB.php";
        $sql_check = "SELECT * FROM genres WHERE idGenre != $id AND name = '$name_edit'";
        $query = mysqli_query($connect, $sql_check);
        if ($query && mysqli_num_rows($query) > 0) {
            echo '<script language="javascript">
            alert("Name genre duplicate!!");
            window.location.href="?controller=genreAdmin&edit=true&id=' . $id . '";
            </script>';
        } else {
            $sql = "UPDATE genres SET name = '$name_edit' WHERE idGenre = $id";
            mysqli_query($connect, $sql);
            echo '<script language="javascript">
            alert("Edit genre sucessfully!!");
            window.location.href="?controller=genreAdmin";
            </script>';
        }
        include_once "connect/closeDB.php";
    }
}

function destroy()
{
    if (!isset($_GET['id'])) return;
    $id = $_GET['id'];
    include_once "connect/openDB.php";
    $sql = "DELETE FROM genres WHERE idGenre = $id";
    mysqli_query($connect, $sql);
    include_once "connect/closeDB.php";
    header("location: ?controller=categoryAdmin");
}

function handleSearch()
{
    if (!isset($_POST['search'])) return;
    $search = $_POST['search'];
    header("location: ?controller=genreAdmin&search=$search");
}

switch ($action) {
    case "": {
            $array = index();
        }
        break;
    case 'add': {
            store();
        }
        break;
    case 'store': {
        }
        break;
    case 'edit': {
            edit();
        }
        break;
    case 'destroy': {
            destroy();
        }
        break;
    case 'search': {
            handleSearch();
        }
        break;
}
