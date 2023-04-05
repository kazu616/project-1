<?php
function indexAccount()
{
  if (!isset($_SESSION['customer_id']) || $_SESSION['customer_role'] == 1) {
    session_unset();
    session_destroy();
    echo '<script type="text/JavaScript"> 
    window.location.href="?controller=user&action=login";
    </script>';
    return;
  }
  $id = $_SESSION['customer_id'];
  include_once 'connect/openDB.php';
  $sql = "SELECT * FROM accounts WHERE idAccount = $id";
  $account = mysqli_query($connect, $sql);
  $result = mysqli_fetch_array($account);
  include_once 'connect/closeDB.php';
  return $result;
}

function update()
{
  if (!isset($_SESSION['customer_id'])) {
    session_unset();
    session_destroy();
    echo '<script language="javascript">';
    echo 'window.location.href="?controller=user&action=login';
    echo '</script>';
    return;
  }
  $id = $_SESSION['customer_id'];
  $name = $_POST['name'];
  $phoneNumber = $_POST['phone_number'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $old_image = $_POST['old_img'];
  include_once 'connect/openDB.php';

  $sql_check = "SELECT * FROM accounts WHERE email = '$email' AND idAccount != $id";
  $query = mysqli_query($connect, $sql_check);
  if ($query && mysqli_num_rows($query) > 0) {
    echo '<script language="javascript">
    alert("Duplicate emails");
    window.location.href="?controller=account";
    </script>';
  } else {
    if ((!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) && isset($_POST["old_img"])) {
      $image_name = $old_image;
    } else {
      $image_name_default = explode(".", $_FILES["image"]["name"]);
      $image_name = str_replace(" ", "", ($image_name_default[0] . floor(microtime(true) * 1000) . "." . $image_name_default[1]));
      $target_file = "imgs/" . basename($image_name);
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if ($check) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $_SESSION['customer_img'] = $image_name;
      }
    }
    $sql_update = "UPDATE accounts SET email='$email', name='$name', img='$image_name', phoneNumber='$phoneNumber', password='$password', address='$address' WHERE idAccount=$id";
    mysqli_query($connect, $sql_update);
    $_SESSION['customer_name'] = $name;
    $_SESSION['email'] = $email;
    include_once 'connect/closeDB.php';
    header('Location:?controller=account');
  }
}

switch ($action) {
  case '':
    $account = indexAccount();
    break;
  case 'update':
    update();
    break;
}
