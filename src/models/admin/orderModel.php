<?php
//function để lấy dữ liệu từ DB về

function index()
{
  include_once "connect/openDB.php";
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
  $sqlGetTotalOrder = "SELECT COUNT(*) FROM `order` WHERE bill_code LIKE '$search_bill%'";
  $query = mysqli_query($connect, $sqlGetTotalOrder);
  $total_order = mysqli_fetch_array($query)[0];
  $number_of_page = ceil($total_order / $prod_per_page);
  $prod_offset = ($page - 1) * $prod_per_page;

  $sqlGetOrders = "SELECT * FROM `order` WHERE bill_code LIKE '$search_bill%' ORDER BY createdDate DESC LIMIT $prod_per_page OFFSET $prod_offset";
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
  $result['number_of_page'] = $number_of_page;
  $result['page'] = $page;
  include_once "connect/closeDB.php";
  return $result;
}

function getProducts()
{
  include "connect/openDB.php";
  $sql = "SELECT *, products.name as name_prod,authors.name as name_author, products.img as prod_image FROM products INNER JOIN authors on products.idAuthor = authors.idAuthor WHERE amount > 0";
  $result = mysqli_query($connect, $sql);
  include "connect/closeDB.php";
  $array = array();
  $array['data'] = $result;
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
    $sql = "SELECT *, products.name as name_prod, authors.name as name_author, products.img as prod_image FROM products INNER JOIN authors on products.idAuthor = authors.idAuthor WHERE idProduct = $key";
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
  $idAdmin = $_SESSION['customer_id'];
  include "connect/openDB.php";
  $arr = $_SESSION['order'];
  $bill_code = generate_string('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
  foreach ($arr as $key => $value) {
    $sqlSelectProd = "SELECT amount FROM products WHERE idProduct = $key";
    $query = mysqli_query($connect, $sqlSelectProd);
    $amount = mysqli_fetch_array($query)['amount'];
    if ($amount < $value) {
      unset($_SESSION['order']);
      echo '<script language="javascript">
      alert("Quantity exceeds the number of products please add again ❤️❤️");
      window.location.href="?controller=orderAdmin&action=add";
      </script>';
      return;
    }
  }
  $sqlAddOrder = "INSERT INTO `order`(status, name_customer, phone_number, address_customer, bill_code, idAdmin, idPayment, idDelivery) 
    VALUES ($status, '$cus_name', '$phone_number', '$address', '$bill_code', $idAdmin, 1, 1)";
  if (mysqli_query($connect, $sqlAddOrder)) {
    $last_id = mysqli_insert_id($connect);
    foreach ($arr as $key => $value) {
      $sqlSelectProd = "SELECT price, amount FROM products WHERE idProduct = $key";
      $query = mysqli_query($connect, $sqlSelectProd);
      $result = mysqli_fetch_array($query);
      $sold_price = $result['price'];
      $amount = $result['amount'];
      $amount_remain = $amount - $value;
      $sqlInsertOrderDetail = "INSERT INTO order_detail(amount, sold_price, idOrder, idProduct) VALUES($value, $sold_price, $last_id, $key)";
      $query = mysqli_query($connect, $sqlInsertOrderDetail);
      $sqlUpdateAmount = "UPDATE products SET amount = $amount_remain WHERE idProduct = $key";
      mysqli_query($connect, $sqlUpdateAmount);
    }
    unset($_SESSION['order']);
    echo '<script language="javascript">
    alert("Add order successfully!!");
    window.location.href="?controller=orderAdmin";
    </script>';
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
  }
  include "connect/closeDB.php";
}
//function lấy dữ liệu trên db dựa theo id
function edit()
{
  if (!isset($_GET['id'])) return;
  $id = $_GET['id'];
  $array = [];
  $data = [];
  $total_price = 0;
  include "connect/openDB.php";
  $sqlCheck = "SELECT status FROM `order` WHERE idOrder = $id";
  $query = mysqli_query($connect, $sqlCheck);
  $result = mysqli_fetch_array($query);
  $status_old = $result['status'];
  if ($status_old == COMPLETED || $status_old == CANCELED) {
    echo '<script language="javascript">
    alert("Update failed!!");
    window.location.href="?controller=orderAdmin";
    </script>';
    return;
  }
  $sql = "SELECT * FROM `order` WHERE idOrder = $id";
  $query = mysqli_query($connect, $sql);
  $order = mysqli_fetch_array($query);
  if ($order['status'] == COMPLETED || $order['status'] == CANCELED) {
    return header("Location: ?controller=orderAdmin");
  }
  $array['order'] = $order;
  $sql = "SELECT *, order_detail.amount as amount_order FROM order_detail INNER JOIN products ON order_detail.idProduct = products.idProduct WHERE idOrder = $id";
  $query = mysqli_query($connect, $sql);
  foreach ($query as $each) {
    $idProduct = $each['idProduct'];
    $sql = "SELECT *, products.name as name_prod, authors.name as name_author, products.img as prod_image FROM products INNER JOIN authors on products.idAuthor = authors.idAuthor WHERE idProduct = $idProduct";
    $query = mysqli_query($connect, $sql);
    $item = mysqli_fetch_array($query);
    $item['amount_order'] = $each['amount_order'];
    $total_price += $each['sold_price'] * $each['amount_order'];
    $data[] = $item;
  }
  include "connect/openDB.php";
  $array['data'] = $data;
  $array['total_price'] = $total_price;
  return $array;
}
//    function update dữ liệu trên db
function update()
{
  if (!isset($_GET['id'])) return;
  $id = $_GET['id'];
  $status = $_POST['status'];
  $idAdmin = $_SESSION['customer_id'];
  include "connect/openDB.php";
  $sqlCheck = "SELECT status FROM `order` WHERE idOrder = $id";
  $query = mysqli_query($connect, $sqlCheck);
  $result = mysqli_fetch_array($query);
  $status_old = $result['status'];
  if ($status_old == COMPLETED || $status_old == CANCELED) {
    echo '<script language="javascript">
    alert("Update failed!!");
    window.location.href="?controller=orderAdmin";
    </script>';
    return;
  }
  $sql = "UPDATE `order` SET status = $status, idAdmin = $idAdmin WHERE idOrder = $id";
  mysqli_query($connect, $sql);
  include "connect/openDB.php";
  echo '<script language="javascript">
  alert("Update order successfully!!");
  window.location.href="?controller=orderAdmin";
  </script>';
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
  header("Location: ?controller=orderAdmin&action=add");
}

function deleteProdInSession()
{
  if (!isset($_GET['id'])) return;
  $id = $_GET['id'];
  unset($_SESSION['order'][$id]);
  header("location: ?controller=orderAdmin&action=add");
}

function handleSearch()
{
  if (!isset($_POST['search'])) return;
  $search = $_POST['search'];
  header("location: ?controller=orderAdmin&search=$search");
}

function changeAmount()
{
  if (!isset($_GET['id']) ||  !isset($_GET['func']) || !isset($_SESSION['order'][$_GET['id']])) {
    echo '<script language="javascript">
    alert("Change amount error!!");
    window.location.href="?controller=orderAdmin&action=add";
    </script>';
    return;
  }
  $id = $_GET['id'];
  include "connect/openDB.php";
  $sql = "SELECT * FROM products WHERE idProduct = $id";
  $query = mysqli_query($connect, $sql);
  $result = mysqli_fetch_array($query);
  $amount_prod = $result['amount'];
  include "connect/closeDB.php";
  $amount = (int)$_SESSION['order'][$id];
  $func = $_GET['func'];
  switch ($func) {
    case 'add':
      if ($amount >= $amount_prod) {
        echo '<script language="javascript">
        alert("Quantity does not exceed ' . $amount_prod . ' products!!");
        window.location.href="?controller=orderAdmin&action=add#' . $id . '";
        </script>';
        return;
      }
      $amount = 1 + $amount;
      break;
    case 'minus':
      if ($amount <= 1) {
        unset($_SESSION['order'][$id]);
        header("Location: ?controller=orderAdmin&action=add");
        return;
      }
      $amount = $amount - 1;
      break;
    default: {
        echo '<script language="javascript">
        alert("Change amount error!!");
        window.location.href="?controller=orderAdmin&action=add";
        </script>';
        return;
      }
  }
  $_SESSION['order'][$id] = $amount;
  header("Location: ?controller=orderAdmin&action=add");
}

function func_order_detail()
{
  if (!isset($_GET['id'])) return;
  $id = $_GET['id'];
  $array = [];
  $data = [];
  $total_price = 0;
  include "connect/openDB.php";
  $sql = "SELECT * FROM `order` WHERE idOrder = $id";
  $query = mysqli_query($connect, $sql);
  $order = mysqli_fetch_array($query);
  $array['order'] = $order;
  $sql = "SELECT *, order_detail.amount as amount_order FROM order_detail INNER JOIN products ON order_detail.idProduct = products.idProduct WHERE idOrder = $id";
  $query = mysqli_query($connect, $sql);
  foreach ($query as $each) {
    $idProduct = $each['idProduct'];
    $sql = "SELECT *, products.name as name_prod, authors.name as name_author, products.img as prod_image FROM products INNER JOIN authors on products.idAuthor = authors.idAuthor WHERE idProduct = $idProduct";
    $query = mysqli_query($connect, $sql);
    $item = mysqli_fetch_array($query);
    $item['amount_order'] = $each['amount_order'];
    $total_price += $each['sold_price'] * $each['amount_order'];
    $data[] = $item;
  }
  include "connect/openDB.php";
  $array['data'] = $data;
  $array['total_price'] = $total_price;
  return $array;
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
      $array = edit();
    }
    break;
  case 'update': {
      update();
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
  case 'search': {
      handleSearch();
    }
    break;
  case 'changeAmount': {
      changeAmount();
    }
    break;
  case 'detail': {
      $array = func_order_detail();
    }
    break;
}
