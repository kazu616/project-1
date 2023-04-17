<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

function checkLogin()
{
  if (isset($_SESSION['email']) && isset($_SESSION['customer_role'])) {
    if ($_SESSION['customer_role'] == 2) {
      return true;
    }
  } else {
    return false;
  }
}

switch ($action) {
  case '':
    if (checkLogin()) {
      header('Location:index.php?controller=productCustomer');
    } else {
      include_once 'views/customer/login.php';
    }
    break;
  case 'login':
    if (checkLogin()) {
      header('Location:index.php?controller=productCustomer');
    } else {
      include_once 'views/customer/login.php';
    }

    break;
  case 'signup':
    if (checkLogin()) {
      header('Location:index.php?controller=productCustomer');
    } else {
      include_once 'views/customer/Signup.php';
    }

    break;
  case 'loginAccess':
    if (checkLogin()) {
      header('Location:index.php?controller=productCustomer');
    } else {
      include_once 'models/customer/userModel.php';
      if ($test == 2) {
        echo '<script language="javascript">';
        echo 'alert("Email or password wrong");';
        echo 'window.location.href="?controller=user&action=login";';
        echo '</script>';
      } elseif ($test == 1) {
        header('Location:index.php?controller=productCustomer');
      }
    }

    break;
  case 'signupAccess':
    if (checkLogin()) {
      header('Location:index.php?controller=productCustomer');
    } else {
      include_once 'models/customer/userModel.php';
    }

    break;
  case 'logout':
    if (checkLogin()) {
      include_once 'models/customer/userModel.php';
      header('Location:index.php?controller=user&action=login');
    } else {
      header('Location:index.php?controller=user');
    }
    break;
}
