<?php
function indexAccount()
{
    include_once 'connect/openDB.php';
    $sql = "SELECT accounts.*, roles.name FROM accounts INNER JOIN roles ON accounts.idRole = roles.idRole";
    $accounts = mysqli_query($connect, $sql);
    include_once 'connect/closeDB.php';
    return $accounts;
}
function addAccount()
{
    $name = $_POST['username'];
    $phoneNumber = $_POST['phone_number'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $roles = $_POST['roles'];
    include_once 'connect/openDB.php';
    $sql = "INSERT INTO accounts(name, phoneNumber, password, email,address,idRole) VALUES ('$name', '$phoneNumber', '$password', '$email',$address,$roles)";
    mysqli_query($connect, $sql);
    include_once 'connect/closeDB.php';
}


switch ($action) {
    case '':
        $accounts = indexAccount();
        break;
    case 'add':
        addAccount();
        break;
}
