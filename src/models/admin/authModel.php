<?php
function index()
{
}

function loginAccess()
{
  $_SESSION['email'] = "a@gmail.com";
  $_SESSION['customer_id'] = "3";
  $_SESSION['customer_role'] = 2;

  $email = $_POST['email_login'];
  $password = $_POST['password_login'];

  // Open database connection
  include_once 'connect/openDB.php';

  // Prepare and execute SQL query
  $sql = "SELECT * FROM accounts WHERE email = ? AND password = ? AND idRole = 1";
  $stmt = mysqli_prepare($connect, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $email, $password);
  mysqli_stmt_execute($stmt);
  // Retrieve result set as associative array
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);
  // Close database connection
  include_once 'connect/closeDB.php';
  if (!$row) {
    // If no matching account is found, return 0
    return 0;
  } else {
    // Start session if not already started
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    // Store user information in session variables
    $_SESSION['email'] = $email;
    $_SESSION['customer_id'] = $row['idAccount'];
    $_SESSION['customer_role'] = $row['idRole'];
    $_SESSION['customer_name'] = $row['name'];
    $_SESSION['customer_img'] = $row['img'];

    // Return success indicator
    return 1;
  }
}

function logout()
{
}

switch ($action) {
  case '':
    break;
  case 'loginAccess': {
      $check = loginAccess();
    }
    break;
  case 'logout': {
      session_unset();
      session_destroy();
    }
    break;
}
