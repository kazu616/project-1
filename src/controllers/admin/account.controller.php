<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
switch ($action) {
  case '': {
      include_once 'models/admin/Account/accountModel.php';
      include_once 'views/admin/account/index.php';
    }
    break;
  case 'show_formAdd': {
      include_once 'views/admin/account/addAccount.php';
    }
  case 'add': {
      include_once 'models/admin/Account/accountModel.php';
    }
    break;
}
