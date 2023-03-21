<?php
//function để lấy dữ liệu từ DB về
function index()
{
}

function getProducts()
{
  include_once "connect/openDB.php";
  $sql = "SELECT *, products.name as name_prod,authors.name as name_author FROM products INNER JOIN authors on products.idAuthor = authors.idAuthor";
  $result = mysqli_query($connect, $sql);
  return $result;
}

//    Function lưu dữ liệu lên DB
function store()
{
}
//function lấy dữ liệu trên db dựa theo id
function edit()
{
}
//    function update dữ liệu trên db
function update()
{
}
//fucntion xóa dữ liệu trên db
function destroy()
{
}

function storeSession()
{
  $arr = $_POST['check_list'];
  foreach ($arr as $value) {
    echo $value . '<br>';
    echo $_POST[$value] . "<br>";
  }
  // $_SESSION['cart'] = array();
  // $_SESSION['cart'][$product_id] = 1;
}

switch ($action) {
  case 'add':
    $result = getProducts();
    break;
  case 'store':
    break;
  case 'edit':
    break;
  case 'update':
    break;
  case 'destroy':
    break;
  case 'addProduct':
    storeSession();
    break;
}
