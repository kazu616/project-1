<?php
session_start();
//Lấy controller đang làm việc
$controller = '';
if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
}
//Kiểm tra đó là controller nào
switch ($controller) {
  case 'admin':
    include_once 'controllers/admin/admin.controller.php';
    break;
  case 'productAdmin':
    include_once 'controllers/admin/product.controller.php';
    break;
  case 'accountAdmin':
    include_once 'controllers/admin/account.controller.php';
    break;
  case 'authorAdmin':
    include_once 'controllers/admin/author.controller.php';
    break;
  case 'orderAdmin':
    include_once 'controllers/admin/order.controller.php';
    break;
  default:
    include_once 'controllers/customer/customer.controller.php';
    break;
}
