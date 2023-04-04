<?php

function index()
{
  $status = '';
  if (isset($_GET['status'])) {
    $status = $_GET['status'];
  }
  include_once 'connect/openDB.php';
  $sql = "SELECT * FROM `order`";
  $result = mysqli_query($connect, $sql);
  $array = [];
  foreach ($result as $each) {
    $order = [];
    $idOrder = $each['idOrder'];
    $sqlOrderDetail = "SELECT *,products.name as productName, authors.name as authorName, order_detail.amount as amount_order FROM order_detail INNER JOIN products ON order_detail.idProduct = products.idProduct INNER JOIN authors ON authors.idAuthor = products.idAuthor WHERE idOrder = $idOrder";
    $query = mysqli_query($connect, $sqlOrderDetail);
    $order['data'] = $query;
    $order['order'] = $each;
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
