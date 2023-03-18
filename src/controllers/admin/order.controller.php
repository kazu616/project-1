<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
switch ($action) {
  case '': {
      include_once 'views/admin/order/index.php';
    }
    break;
  case 'add': {
      include_once 'views/admin/order/addOrder.php';
    }
    break;
}
