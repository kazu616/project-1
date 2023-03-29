<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
switch ($action) {
  case '':
    // include_once 'models/customer/cartModel.php';
    include_once 'views/customer/cart/index.php';
    break;
  case 'add_to_cart':
    include_once 'models/customer/cartModel.php';
    header('Location:index.php?controller=cart');
    break;
}