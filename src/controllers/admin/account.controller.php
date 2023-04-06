<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
switch ($action) {
  case '':
    include_once 'models/admin/accountModel.php';
    include_once 'views/admin/account/index.php';
    break;
  case 'show_formAdd':
    include_once 'models/admin/accountModel.php';
    include_once 'views/admin/account/addAccount.php';
    break;
  case 'add':
    include_once 'models/admin/accountModel.php';
    break;
  case 'clone_data_edit':
    include_once 'models/admin/accountModel.php';
    include_once 'views/admin/account/editAccount.php';
    break;
  case 'edit':
    include_once 'models/admin//accountModel.php';
    break;
  case 'delete':
    include_once 'models/admin/accountModel.php';
    header('Location:?controller=accountAdmin');
    break;
  case 'search': {
      include_once 'models/admin/accountModel.php';
    }
}
