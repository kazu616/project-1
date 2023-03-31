<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

function checkLogin()
{
  if (isset($_SESSION['email']) && isset($_SESSION['customer_role'])) {
    if ($_SESSION['customer_role'] == 1) {
      return true;
    }
  } else {
    return false;
  }
}

switch ($action) {
  case '': {
      if (checkLogin()) {
        header("Location: ?controller=admin");
        return;
      }
      include_once 'views/admin/login.php';
    }
    break;
  case 'loginAccess': {
      if (checkLogin()) {
        header("Location: ?controller=admin");
        return;
      }
      include_once 'models/admin/authModel.php';
      if ($check == 0) {
        header('Location:index.php?controller=auth_admin');
      } elseif ($check == 1) {
        header('Location:index.php?controller=admin');
      }
    }
    break;
  case 'logout': {
      if (checkLogin()) {
        include_once 'models/admin/authModel.php';
        header('Location:index.php?controller=auth_admin');
      } else {
        header('Location:index.php?controller=auth_admin');
      }
    }
}
