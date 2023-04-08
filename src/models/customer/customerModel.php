<?php

function index()
{
  $array = [];
  include 'connect/openDB.php';
  $sqlGenres = "SELECT * FROM genres LIMIT 5";
  $genres = mysqli_query($connect, $sqlGenres);
  $array['genres'] = $genres;
  include 'connect/closeDB.php';
  return $array;
}

function getProducts($limit = 10)
{
  include 'connect/openDB.php';
  $sql = "SELECT * FROM products WHERE amount > 0 LIMIT $limit";
  $products = mysqli_query($connect, $sql);
  include 'connect/closeDB.php';
  return $products;
}

function getAllProducts()
{
  include 'connect/openDB.php';
  $sql = "SELECT * FROM products WHERE amount > 0";
  $products = mysqli_query($connect, $sql);
  include 'connect/closeDB.php';
  return $products;
}

function getProductByCategory()
{
  $sql = "SELECT * FROM products WHERE amount > 0 LIMIT 8";
  include 'connect/openDB.php';
  if (isset($_GET['genre'])) {
    $genre = $_GET['genre'];
    $sql = "SELECT * FROM products WHERE amount > 0 AND idGenre = $genre LIMIT 8";
  }
  $products = mysqli_query($connect, $sql);
  include 'connect/closeDB.php';
  return $products;
}

function seo()
{
  if (!isset($_POST['email'])) {
    echo '<script language="javascript">
    alert("Subcribe Error!!");
    window.location.href="index.php#subcribe";
    </script>';
    return;
  }
  $email = $_POST['email'];
  include 'connect/openDB.php';
  $sql = "INSERT INTO ceo(email) VALUES ('$email')";
  mysqli_query($connect, $sql);
  include 'connect/closeDB.php';
  echo '<script language="javascript">
    alert("Subcribe Successfully!!");
    window.location.href="index.php#subcribe";
  </script>';
}

switch ($action) {
  case '': {
      $array = index();
      $slide_prods = getProducts(5);
      $feature_prods = getAllProducts();
      $prod_by_category = getProductByCategory();
    }
    break;
  case 'seo': {
      seo();
    }
}
