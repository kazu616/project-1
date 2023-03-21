<?php
//function để lấy dữ liệu từ DB về
function index()
{
    $search = '';
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
    }
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    include_once 'connect/openConnect.php';
    $sqlCount = "SELECT COUNT(*) AS count_record FROM brand WHERE name LIKE '%$search%'";
    $counts = mysqli_query($connect, $sqlCount);
    foreach ($counts as $each) {
        $countRecord = $each['count_record'];
    }
    $recordOnePage = 3;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = 3;
    $sql = "SELECT * FROM brand WHERE name LIKE '%$search%' LIMIT $start, $end";
    $brands = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    $array = array();
    $array['search'] = $search;
    $array['infor'] = $brands;
    $array['page'] = $countPage;
    return $array;
}

//    Function lưu dữ liệu lên DB
function store()
{
    $name = $_POST['name'];
    include_once 'connect/openConnect.php';
    $sql = "INSERT INTO brand(name) VALUES ('$name')";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
}
//function lấy dữ liệu trên db dựa theo id
function edit()
{
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM brand WHERE id = '$id'";
    $brands = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $brands;
}
//    function update dữ liệu trên db
function update()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    include_once 'connect/openConnect.php';
    $sql = "UPDATE brand SET name = '$name' WHERE id = '$id'";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
}
//fucntion xóa dữ liệu trên db
function destroy()
{
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "DELETE FROM brand WHERE id = '$id'";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
}

switch ($action) {
    case '':
        //Lấy dữ liệu từ DB về
        $array = index();
        break;
    case 'store':
        //            Lưu dữ liệu lên DB
        store();
        break;
    case 'edit':
        //Lấy dữ liệu từ DB về dựa trên id
        $brands = edit();
        break;
    case 'update':
        //chỉnh sửa dữ liệu lên db
        update();
        break;
    case 'destroy':
        //xóa dữ liệu trên db
        destroy();
        break;
}
