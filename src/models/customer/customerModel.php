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
  $sql = "SELECT *, products.name as name_prod,authors.name as name_author, products.img as img_product FROM products INNER JOIN authors ON authors.idAuthor = products.idAuthor WHERE amount > 0";
  $products = mysqli_query($connect, $sql);
  include 'connect/closeDB.php';
  return $products;
}

function getProductByCategory()
{
  $sql = "SELECT *, products.name as name_prod,authors.name as name_author, products.img as img_product FROM products INNER JOIN authors ON authors.idAuthor = products.idAuthor WHERE amount > 0 LIMIT 8";
  include 'connect/openDB.php';
  if (isset($_GET['genre'])) {
    $genre = $_GET['genre'];
    $sql = "SELECT *, products.name as name_prod,authors.name as name_author products.img as img_product FROM products INNER JOIN authors ON authors.idAuthor = products.idAuthor WHERE amount > 0 AND idGenre = $genre LIMIT 8";
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
  $sql = "INSERT INTO seo(email) VALUES ('$email')";
  mysqli_query($connect, $sql);
  include 'connect/closeDB.php';
  echo '<script language="javascript">
    alert("Subcribe Successfully!!");
    window.location.href="index.php#subcribe";
  </script>';
}

function bestSellingProduct()
{
  include 'connect/openDB.php';
  $sql = "SELECT products.*, products.amount as amount_prod, products.img as prod_image, products.name as prod_name,authors.name as name_author, SUM(order_detail.amount) AS total_amount
  FROM order_detail
  JOIN products ON order_detail.idProduct = products.idProduct
  JOIN authors ON products.idAuthor = authors.idAuthor
  GROUP BY order_detail.idProduct
  ORDER BY total_amount DESC
  LIMIT 1";
  $query = mysqli_query($connect, $sql);
  if ($query && mysqli_num_rows($query) > 0) {
    $result = mysqli_fetch_array($query);
  } else {
    $sql = "SELECT products.*, products.amount as amount_prod, products.img as prod_image, products.name as prod_name,authors.name as name_author FROM products JOIN authors ON products.idAuthor = authors.idAuthor WHERE amount > 0 LIMIT 1";
    $query = mysqli_query($connect, $sql);
    $result = mysqli_fetch_array($query);
  }
  include 'connect/closeDB.php';
  return $result;
}

switch ($action) {
  case '': {
      $array = index();
      $slide_prods = getProducts(5);
      $feature_prods = getAllProducts();
      $prod_by_category = getProductByCategory();
      $prod_best_selling = bestSellingProduct();
    }
    break;
  case 'seo': {
      seo();
    }
}
