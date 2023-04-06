<?php
//function để lấy dữ liệu từ DB về
function index()
{
    include_once "connect/openDB.php";
    $sql = "SELECT * FROM genres";
    $result = mysqli_query($connect, $sql);
    $array = array();
    $array['data'] = $result;
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
        alert("Name genre duplicate");
        </script>';
    } else {
        $sql = "INSERT INTO genres (name) VALUES ('$name_genre')";
        mysqli_query($connect, $sql);
        header("location: ?controller=categoryAdmin");
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
        $sql = "UPDATE genres SET name = '$name_edit' WHERE idGenre = $id";
        mysqli_query($connect, $sql);
        include_once "connect/closeDB.php";
    }
    header("location: ?controller=categoryAdmin");
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
}
