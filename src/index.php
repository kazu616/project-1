<?php
session_start();
include_once "utils/common.php";
define("PENDING", 1);
define("DELIVERING", 2);
define("RECEIVED", 3);
//Lấy controller đang làm việc
$controller = '';
if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
}
//Kiểm tra đó là controller nào
switch ($controller) {
  case 'admin':
    if (isset($_SESSION['email'])) {
      include_once 'controllers/admin/admin.controller.php';
    } else {
      header('Location:index.php?controller=user&action=login');
    }
    break;
  case 'productAdmin':
    if (isset($_SESSION['email'])) {
      include_once 'controllers/admin/product.controller.php';
    } else {
      header('Location:index.php?controller=user&action=login');
    }
    break;
  case 'accountAdmin':
    include_once 'controllers/admin/account.controller.php';
    break;
  case 'authorAdmin':
    if (isset($_SESSION['email'])) {
      include_once 'controllers/admin/author.controller.php';
    } else {
      header('Location:index.php?controller=user&action=login');
    }
    break;
  case 'orderAdmin':
    if (isset($_SESSION['email'])) {
      include_once 'controllers/admin/order.controller.php';
    } else {
      header('Location:index.php?controller=user&action=login');
    }
    break;
  case 'genreAdmin':
    if (isset($_SESSION['email'])) {
      include_once 'controllers/admin/genre.controller.php';
    } else {
      header('Location:index.php?controller=user&action=login');
    }
    break;
  case 'user':
    if (!isset($_SESSION['email'])) {
      include_once 'controllers/customer/user.controller.php';
    } elseif (isset($_SESSION['email']) && $_GET['action'] == "logout") {
      include_once 'controllers/customer/user.controller.php';
    } else {
      header('Location:index.php?controller=productCustomer');
    }
    break;
  case 'order_history': {
      include_once 'controllers/customer/order.controller.php';
    }
    break;
  case 'order':
    if (isset($_SESSION['email']) && $_SESSION['customer_role'] == 2) {
      include_once 'controllers/customer/order.controller.php';
    } else {
      header('Location:index.php?controller=user&action=login');
    }
    break;
  case 'productCustomer':
    if (isset($_SESSION['email']) && $_SESSION['customer_role'] == 2) {
      include_once 'controllers/customer/productController.php';
    } else {
      header('Location:index.php?controller=user&action=login');
    }
    break;
  case 'cart':
    include_once 'controllers/customer/cart.controller.php';
    break;
  case 'order_detail':
    include_once 'controllers/customer/order_detail.controller.php';
    break;
  default:
    header('Location:index.php?controller=user&action=login');
    break;
}
