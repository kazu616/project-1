<?php
function loginCustomer()
{
    $email = $_POST['email_login'];
    $password = $_POST['password_login'];
    $trimed_email = trim($email);
    $trimed_password = trim($password);
    // Open database connection
    include_once 'connect/openDB.php';

    // Prepare and execute SQL query
    $sql = "SELECT * FROM accounts WHERE email = ? AND password = ? AND idRole = 2";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $trimed_email, $trimed_password);
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
        $_SESSION['customer_img'] = $row['img'];
        $_SESSION['customer_name'] = $row['name'];

        // Return success indicator
        return 1;
    }
}
function signUp()
{
    $email = $_POST['email_signup'];
    $phone = $_POST['phoneNumber'];
    $password = $_POST['password_signup'];
    include_once 'connect/openDB.php';
    $trimed_email = trim($email);
    $trimed_password = trim($password);
    $trimed_phone = trim($phone);

    $sql_check = "SELECT * FROM accounts WHERE email = ?";
    $stmt = mysqli_prepare($connect, $sql_check);
    mysqli_stmt_bind_param($stmt, "s", $trimed_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">';
        echo 'alert("Duplicate email");';
        echo 'window.location.href="?controller=user&action=signup";';
        echo '</script>';
    } else {
        $stmt = mysqli_prepare($connect, "INSERT INTO accounts (phoneNumber, password, email) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "iss", $trimed_phone, $trimed_password, $trimed_email);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            include_once 'connect/closeDB.php';
            echo '<script language="javascript">';
            echo 'alert("Sign up  successfull");';
            echo 'window.location.href="?controller=user&action=login";';
            echo '</script>';
        } else {
            include_once 'connect/closeDB.php';
            echo '<script language="javascript">';
            echo 'alert("Sign up  error");';
            echo 'window.location.href="?controller=user&action=signup";';
            echo '</script>';
        }
    }
}
switch ($action) {
    case 'loginAccess': {
            $test = loginCustomer();
        }
        break;
    case 'signupAccess': {
            signUp();
        }
        break;
    case 'logout':
        session_unset();
        session_destroy();
        break;
}
