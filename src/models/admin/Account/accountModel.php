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
    if (isset($_FILES["image"]["name"])) {
        echo 'abc';
        $img = $_FILES["image"]["name"];
        $image_name_default = explode(".", $_FILES["image"]["name"]);
        $image_name = str_replace(" ", "", ($image_name_default[0] . floor(microtime(true) * 1000) . "." . $image_name_default[1]));
        $target_file = "imgs/" . basename($image_name);
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }
    }
    include_once 'connect/openDB.php';
    $sql = "INSERT INTO accounts(name, phoneNumber, password, email,address,idRole,img) VALUES ('$name', '$phoneNumber', '$password', '$email',$address,$roles,$image_name)";
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
