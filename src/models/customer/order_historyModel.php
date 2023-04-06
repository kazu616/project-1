<?php

function index()
{
  $status = '';
  if (isset($_GET['status'])) {
    $status = $_GET['status'];
  }
  $id = $_SESSION['customer_id'];
  include_once 'connect/openDB.php';
  $sql = "SELECT * FROM `order` WHERE idCustomer = $id";
  $result = mysqli_query($connect, $sql);
  $array = [];
  foreach ($result as $each) {
    $order = [];
    $total_price = 0;
    $idOrder = $each['idOrder'];
    $sqlOrderDetail = "SELECT *,products.name as productName, authors.name as authorName, order_detail.amount as amount_order FROM order_detail INNER JOIN products ON order_detail.idProduct = products.idProduct INNER JOIN authors ON authors.idAuthor = products.idAuthor WHERE idOrder = $idOrder";
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

switch ($action) {
  case '':
    $array = index();
    break;
}
