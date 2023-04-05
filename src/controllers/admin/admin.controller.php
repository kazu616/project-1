<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
switch ($action) {
  case 'login': {
      include_once 'views/admin/login.php';
    }
    break;
  case '': {
      include_once 'models/admin/adminModel.php';
      include_once 'views/admin/index.php';
    }
    break;
}
