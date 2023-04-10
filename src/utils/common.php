<?php
function generate_string($input, $strength = 10)
{
  $input_length = strlen($input);
  $random_string = '';
  for ($i = 0; $i < $strength; $i++) {
    $random_character = $input[mt_rand(0, $input_length - 1)];
    $random_string .= $random_character;
  }
  return $random_string;
}

function chechAuth()
{
  if (!isset($_SESSION['email']) || !isset($_SESSION['customer_role']) || $_SESSION['email'] == "") {
    session_destroy();
    return false;
  }
  $connect = mysqli_connect("localhost", "root", "", "book_store");
  if ($connect == false) {
    die("ERROR: COULD NOT CONNECT." . mysqli_connect_error());
  }
  $email = $_SESSION['email'];
  $role = $_SESSION['customer_role'];
  $sql = "SELECT * FROM accounts WHERE email = '$email' AND idRole = $role";
  $query = mysqli_query($connect, $sql);
  if ($query && mysqli_num_rows($query) <= 0) { {
      session_destroy();
      return false;
    }
  }
  mysqli_close($connect);
  return true;
}
