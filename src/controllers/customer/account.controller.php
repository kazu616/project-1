<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

switch ($action) {
  case '':
    include_once 'models/customer/accountModel.php';
    include_once 'views/account/index.php';
    break;
  case 'update': {
      include_once 'models/customer/accountModel.php';
    }
    break;
}
