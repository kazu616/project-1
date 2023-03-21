<?php
//function để lấy dữ liệu từ DB về
function index()
{
}

function getProducts()
{
  include_once "connect/openDB.php";
  $sql = "SELECT *, authors.name as nameAuthor FROM products INNER JOIN authors on products.idAuthor = authors.idAuthor";
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
}

switch ($action) {
  case 'add':
    // $result = getProducts();
    break;
  case 'store':
    break;
  case 'edit':
    break;
  case 'update':
    break;
  case 'destroy':
    break;
  case 'storeSession':
    storeSession();
    break;
}
