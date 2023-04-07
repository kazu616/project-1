<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
switch ($action) {
  case '': {
      include_once 'models/customer/orderModel.php';
      include_once 'views/customer/order/index.php';
    }
    break;
  case 'add_data': {
      include_once 'models/customer/orderModel.php';
    }
    break;
  case 'order_detail': {
      include_once 'models/customer/orderModel.php';
      include_once 'views/customer/order/order_detail.php';
    }
    break;
}
