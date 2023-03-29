<?php
//function để lấy dữ liệu từ DB về

function index()
{
  include_once "connect/openDB.php";
  $result = [];
  $sqlGetOrders = "SELECT * FROM `order`";
  $queryGetOrders = mysqli_query($connect, $sqlGetOrders);
  $result['data'] = $queryGetOrders;
  foreach ($queryGetOrders as $each) {
    $total_price = 0;
    $idOrder = $each['idOrder'];
    $sqlTotalPrice = "SELECT sold_price, amount FROM order_detail WHERE idOrder = $idOrder";
    $query = mysqli_query($connect, $sqlTotalPrice);
    foreach ($query as $item) {
      $total_price += $item['amount'] * $item['sold_price'];
    }
    $result[$idOrder] = $total_price;
  }
  include_once "connect/closeDB.php";
  return $result;
}

function getProducts()
{
  include "connect/openDB.php";
  $page = 1;
  if (isset($_GET["page"])) {
    $page = $_GET["page"];
  }
  $product_per_page = 1;
  $sqlCount = "SELECT COUNT(*) FROM products";
  $queryQuantity = mysqli_query($connect, $sqlCount);
  $quantity = mysqli_fetch_array($queryQuantity)[0];
  $number_of_page = ceil($quantity / $product_per_page);
  $prod_show_per_page = $product_per_page * ($page  - 1);
  $sql = "SELECT *, products.name as name_prod,authors.name as name_author FROM products INNER JOIN authors on products.idAuthor = authors.idAuthor LIMIT $prod_show_per_page, $product_per_page";
  $result = mysqli_query($connect, $sql);
  include "connect/closeDB.php";
  $array = array();
  $array['data'] = $result;
  $array['total_page'] = $number_of_page;
  return $array;
}

function getProductsInSession()
{
  if (!isset($_SESSION['order'])) return ['data' => [], 'total_price' => 0];
  $result = [];
  $total_price = 0;
  $array = [];
  $arr = $_SESSION['order'];
  include "connect/openDB.php";
  foreach ($arr as $key => $value) {
    $sql = "SELECT *, products.name as name_prod, authors.name as name_author FROM products INNER JOIN authors on products.idAuthor = authors.idAuthor WHERE idProduct = $key";
    $query = mysqli_query($connect, $sql);
    $item = mysqli_fetch_array($query);
    $item['amount_order'] = $value;
    $total_price += $item['price'] * $value;
    array_push($result, $item);
  }
  $array['total_price'] = $total_price;
  $array['data'] = $result;
  include "connect/closeDB.php";
  return $array;
}

//    Function lưu dữ liệu lên DB
function store()
{
  if (!isset($_SESSION['order']) || count($_SESSION['order']) === 0) {
    header("location: ?controller=orderAdmin&action=add");
    return;
  }
  $cus_name = $_POST["cus_name"];
  $address = $_POST["address"];
  $status = $_POST["status"];
  $phone_number = $_POST["phone_number"];
  include "connect/openDB.php";
  $arr = $_SESSION['order'];
  $bill_code = generate_string('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 20);
  $sqlAddOrder = "INSERT INTO `order`(idAdmin, status, name_customer, phone_number, address_customer, bill_code) 
    VALUES (7, $status, '$cus_name', '$phone_number', '$address', '$bill_code')";
  if (mysqli_query($connect, $sqlAddOrder)) {
    $last_id = mysqli_insert_id($connect);
    foreach ($arr as $key => $value) {
      $sqlSelectProd = "SELECT price FROM products WHERE idProduct = $key";
      $query = mysqli_query($connect, $sqlSelectProd);
      $sold_price = mysqli_fetch_array($query)['price'];
      $sqlInsertOrderDetail = "INSERT INTO order_detail(amount, sold_price, idOrder, idProduct) VALUES($value, $sold_price, $last_id, $key)";
      $query = mysqli_query($connect, $sqlInsertOrderDetail);
      header("Location: ?controller=orderAdmin");
    }
    unset($_SESSION['order']);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
  }

  include "connect/closeDB.php";
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
    $amount = 1;
    if (isset($_POST[$value]) && !empty($_POST[$value])) {
      $amount = (int)$_POST[$value];
    }
    if (isset($_SESSION['order'][$value])) {
      $amount = $amount + $_SESSION['order'][$value];
    }
    $_SESSION['order'][$value] = $amount;
  }
  header("location: ?controller=orderAdmin&action=add");
}

function deleteProdInSession()
{
  if (!isset($_GET['id'])) return;
  $id = $_GET['id'];
  unset($_SESSION['order'][$id]);
  header("location: ?controller=orderAdmin&action=add");
}

switch ($action) {
  case '': {
      $result = index();
    }
    break;
  case 'add': {
      $result = getProducts();
      $array = getProductsInSession();
    }
    break;
  case 'store': {
      store();
    }
    break;
  case 'checkout': {
      if (!isset($_SESSION['order']) || count($_SESSION['order']) === 0) {
        header("Location: ?controller=orderAdmin&action=add");
        return ['data' => [], 'total_price' => 0];
      }
      $array = getProductsInSession();
    }
    break;
  case 'edit': {
    }
    break;
  case 'update': {
    }
    break;
  case 'destroy': {
    }
    break;
  case 'addProduct': {
      storeSession();
    }
    break;
  case 'deleteProd': {
      deleteProdInSession();
    }
    break;
}
