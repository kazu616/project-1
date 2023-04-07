<?php

function index()
{
  $status = 0;
  $id = $_SESSION['customer_id'];
  $sql = "SELECT * FROM `order` WHERE idCustomer = $id ORDER BY createdDate DESC";
  if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $sql = "SELECT * FROM `order` WHERE idCustomer = $id AND status = $status ORDER BY createdDate DESC";
  }
  include_once 'connect/openDB.php';
  $result = mysqli_query($connect, $sql);
  $array = [];
  foreach ($result as $each) {
    $order = [];
    $total_price = 0;
    $idOrder = $each['idOrder'];
    $sqlOrderDetail = "SELECT *,products.name as productName, products.img as prod_image, authors.name as authorName, order_detail.amount as amount_order FROM order_detail INNER JOIN products ON order_detail.idProduct = products.idProduct INNER JOIN authors ON authors.idAuthor = products.idAuthor WHERE idOrder = $idOrder";
    $query = mysqli_query($connect, $sqlOrderDetail);
    foreach ($query as $item_order) {
      $total_price += ((int)$item_order['sold_price'] * (int)$item_order['amount_order']);
    }
    $order['data'] = $query;
    $order['order'] = $each;
    $order['total_price'] = $total_price;
    $array[] = $order;
  }
  include_once 'connect/closeDB.php';
  return $array;
}

function update()
{
  if (!isset($_GET['status']) || !isset($_GET['id'])) return;
  $status = $_GET['status'];
  $id = $_GET['id'];
  include_once 'connect/openDB.php';
  $sqlCheck = "SELECT status FROM `order` WHERE idOrder = $id";
  $query = mysqli_query($connect, $sqlCheck);
  $result = mysqli_fetch_array($query);
  $status_old = $result['status'];
  if ($status_old == COMPLETED || $status_old == CANCELED) {
    echo '<script language="javascript">
    alert("Update failed!!");
    window.location.href="?controller=order_history";
    </script>';
    return;
  }
  $sql = "UPDATE `order` SET status = $status WHERE idOrder = $id";
  mysqli_query($connect, $sql);
  include_once 'connect/closeDB.php';
  header("Location: ?controller=order_history");
}

switch ($action) {
  case '':
    $array = index();
    break;
  case 'update': {
      update();
    }
}
