<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
switch ($action) {
  case '': {
      include_once 'models/customer/order_historyModel.php';
      include_once 'views/order_history/index.php';
    }
    break;
  case 'update': {
      include_once 'models/customer/order_historyModel.php';
    }
}