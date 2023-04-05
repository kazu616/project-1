<?php
session_start();
include_once "utils/common.php";
define("PENDING", 1);
define("DELIVERING", 2);
define("COMPLETED", 3);
define("CANCELED", 4);
//Lấy controller đang làm việc
$controller = '';
if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
}
//Kiểm tra đó là controller nào
switch ($controller) {
  case 'admin':
    if (isset($_SESSION['email']) && $_SESSION['customer_role'] == 1) {
      include_once 'controllers/admin/admin.controller.php';
    } else {
      header('Location:index.php?controller=auth_admin');
    }
    break;
  case 'productAdmin':
    if (isset($_SESSION['email']) && $_SESSION['customer_role'] == 1) {
      include_once 'controllers/admin/product.controller.php';
    } else {
      header('Location:index.php?controller=auth_admin');
    }
    break;
  case 'accountAdmin':
    if (isset($_SESSION['email']) && $_SESSION['customer_role'] == 1) {
      include_once 'controllers/admin/account.controller.php';
    } else {
      header('Location:index.php?controller=auth_admin');
    }
    break;
  case 'authorAdmin':
    if (isset($_SESSION['email']) && $_SESSION['customer_role'] == 1) {
      include_once 'controllers/admin/author.controller.php';
    } else {
      header('Location:index.php?controller=auth_admin');
    }
    break;
  case 'orderAdmin':
    if (isset($_SESSION['email']) && $_SESSION['customer_role'] == 1) {
      include_once 'controllers/admin/order.controller.php';
    } else {
      header('Location:index.php?controller=auth_admin');
    }
    break;
  case 'genreAdmin':
    if (isset($_SESSION['email']) && $_SESSION['customer_role'] == 1) {
      include_once 'controllers/admin/genre.controller.php';
    } else {
      header('Location:index.php?controller=auth_admin');
    }
    break;
  case 'user':
    include_once 'controllers/customer/user.controller.php';
    break;
  case 'order_history': {
      if (isset($_SESSION['email']) && $_SESSION['customer_role'] == 2) {
        include_once 'controllers/customer/order_history.controller.php';
      } else {
        header('Location:index.php?controller=user&action=login');
      }
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
    include_once 'controllers/customer/productController.php';
    break;
  case 'cart':
    if (isset($_SESSION['email']) && $_SESSION['customer_role'] == 2) {
      include_once 'controllers/customer/cart.controller.php';
    } else {
      header('Location:index.php?controller=user&action=login');
    }
    break;
  case 'order_detail':
    if (isset($_SESSION['email']) && $_SESSION['customer_role'] == 2) {
      include_once 'controllers/customer/order_detail.controller.php';
    } else {
      header('Location:index.php?controller=user&action=login');
    }
    break;
  case 'auth_admin': {
      include_once 'controllers/admin/auth.controller.php';
    }
    break;
  case 'account': {
      if (isset($_SESSION['email']) && $_SESSION['customer_role'] == 2) {
        include_once 'controllers/customer/account.controller.php';
      } else {
        header('Location:index.php?controller=user&action=login');
      }
    }
    break;
  default:
    include_once 'controllers/customer/customer.controller.php';
    break;
}
