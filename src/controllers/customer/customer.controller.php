<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
switch ($action) {
  case '': {
      include_once 'models/customer/customerModel.php';
      include_once 'views/home/index.php';
    }
    break;
}
