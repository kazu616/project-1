<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
switch ($action) {
  case '': {
      include_once 'models/admin/orderModel.php';
      include_once 'views/admin/order/index.php';
    }
    break;
  case 'add': {
      include_once 'models/admin/orderModel.php';
      include_once 'views/admin/order/addOrder.php';
    }
    break;
  case 'addProduct': {
      include_once 'models/admin/orderModel.php';
    }
    break;
  case 'deleteProd': {
      include_once 'models/admin/orderModel.php';
      // header("location: ?controller=orderAdmin&action=add");
    }
    break;
  case 'store': {
      include_once 'models/admin/orderModel.php';
    }
    break;
  case 'checkout': {
      include_once 'models/admin/orderModel.php';
      include_once 'views/admin/order/checkout.php';
    }
    break;
  case 'edit': {
      include_once 'models/admin/orderModel.php';
      include_once 'views/admin/order/editOrder.php';
    }
    break;
  case 'update': {
      include_once 'models/admin/orderModel.php';
    }
    break;
  case 'search': {
      include_once 'models/admin/orderModel.php';
    }
    break;
  case 'changeAmount': {
      include_once 'models/admin/orderModel.php';
    }
    break;
  case 'detail': {
      include_once 'models/admin/orderModel.php';
      include_once 'views/admin/order/detail_order.php';
    }
}
