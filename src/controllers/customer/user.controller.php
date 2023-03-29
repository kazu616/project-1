<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
switch ($action) {
  case '': {
      include_once 'views/customer/login.php';
    }
    break;
  case 'login': {
      include_once 'views/customer/login.php';
    }
    break;
  case 'signup': {
      include_once 'views/customer/Signup.php';
    }
    break;
  case 'loginAccess': {
      include_once 'models/customer/userModel.php';
      if ($test == 0) {
        header('Location:index.php?controller=user&action=signup');
      } elseif ($test == 1) {
        header('Location:index.php?controller=productCustomer');
      }
      break;
    }
    break;
  case 'signupAccess': {
      include_once 'models/customer/userModel.php';
    }
    break;
  case 'logout':
    include_once 'models/customer/userModel.php';
    header('Location:index.php?controller=user&action=signup');
    break;
}
