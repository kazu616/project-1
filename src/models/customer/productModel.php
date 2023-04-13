<?php
function indexData()
{
  isset($_GET['mode']) ? $_GET['mode'] : $_GET['mode'] = 0;
  isset($_GET['idG']) ? $_GET['idG'] : $_GET['idG'] = "";
  isset($_GET['page']) ? $_GET['page'] : $_GET['page'] = 1;
  if (isset($_GET['mode']) || isset($_GET['idG']) || isset($_GET['page'])) {
    if ($_GET['mode'] == 0 && empty($_GET['idG'])) {
      include_once 'connect/openDB.php';
      $total_product = mysqli_query($connect, "SELECT * FROM products")->num_rows;
      $products_number = 16;
      $total_page = ceil($total_product / $products_number);
      $page = $_GET['page'];
      $offset = ($page - 1) * $products_number;

      $sql_genres = "SELECT * FROM genres";
      $genres = mysqli_query($connect, $sql_genres);
      $sql = "SELECT products.*, authors.name AS nameAuthor, genres.name AS nameGenre FROM ((products INNER JOIN authors ON products.idAuthor = authors.idAuthor) INNER JOIN genres ON products.idGenre = genres.idGenre) LIMIT " . $products_number . " OFFSET " . $offset;
      $products = mysqli_query($connect, $sql);
      $data = array();
      $data['products'] = $products;
      $data['genres'] = $genres;
      $data['totalPage'] = $total_page;
      include_once 'connect/closeDB.php';
      return $data;
    }
    if ($_GET['mode'] == 1 && empty($_GET['idG'])) {
      include_once 'connect/openDB.php';
      $sql_genres = "SELECT * FROM genres";
      $genres = mysqli_query($connect, $sql_genres);

      $total_product = mysqli_query($connect, "SELECT * FROM products ORDER BY price DESC")->num_rows;
      $products_number = 16;
      $total_page = ceil($total_product / $products_number);
      $page = empty($_GET['page']) ? 1 : $_GET['page'];
      $offset = ($page - 1) * $products_number;
      $sql = "SELECT 
            products.*, 
            authors.name AS nameAuthor, 
            genres.name AS nameGenre 
          FROM 
            ((products 
              INNER JOIN authors ON products.idAuthor = authors.idAuthor) 
              INNER JOIN genres ON products.idGenre = genres.idGenre)
          ORDER BY 
            products.price DESC LIMIT " . $products_number . " OFFSET " . $offset;
      $products = mysqli_query($connect, $sql);
      $data = array();
      $data['products'] = $products;
      $data['genres'] = $genres;
      $data['totalPage'] = $total_page;
      include_once 'connect/closeDB.php';
      return $data;
    }
    if ($_GET['mode'] == 2 && empty($_GET['idG'])) {
      include_once 'connect/openDB.php';
      $total_product = mysqli_query($connect, "SELECT * FROM products")->num_rows;
      $products_number = 16;
      $total_page = ceil($total_product / $products_number);
      $page = empty($_GET['page']) ? 1 : $_GET['page'];
      $offset = ($page - 1) * $products_number;

      $sql_genres = "SELECT * FROM genres";
      $genres = mysqli_query($connect, $sql_genres);
      $sql = "SELECT 
            products.*, 
            authors.name AS nameAuthor, 
            genres.name AS nameGenre 
          FROM 
            ((products 
              INNER JOIN authors ON products.idAuthor = authors.idAuthor) 
              INNER JOIN genres ON products.idGenre = genres.idGenre)
          ORDER BY 
            products.price ASC LIMIT " . $products_number . " OFFSET " . $offset;
      $products = mysqli_query($connect, $sql);
      $data = array();
      $data['products'] = $products;
      $data['genres'] = $genres;
      $data['totalPage'] = $total_page;
      include_once 'connect/closeDB.php';
      return $data;
    }
    if ($_GET['mode'] == "desc" && !empty($_GET['idG'])) {
      $id = $_GET['idG'];
      include_once 'connect/openDB.php';
      $total_product = mysqli_query($connect, "SELECT * FROM products WHERE idGenre = $id")->num_rows;
      $products_number = 16;
      $total_page = ceil($total_product / $products_number);
      $page = empty($_GET['page']) ? 1 : $_GET['page'];
      $offset = ($page - 1) * $products_number;

      $sql_genres = "SELECT * FROM genres";
      $genres = mysqli_query($connect, $sql_genres);
      $sql = "SELECT products.*, authors.name AS nameAuthor, genres.name AS nameGenre FROM ((products INNER JOIN authors ON products.idAuthor = authors.idAuthor) INNER JOIN genres ON products.idGenre = genres.idGenre) WHERE products.idGenre = $id ORDER BY products.price DESC LIMIT $products_number OFFSET $offset";
      $products = mysqli_query($connect, $sql);
      $data = array();
      $data['products'] = $products;
      $data['genres'] = $genres;
      $data['totalPage'] = $total_page;
      include_once 'connect/closeDB.php';
      return $data;
    }
    if ($_GET['mode'] == "asc" && !empty($_GET['idG'])) {
      $id = $_GET['idG'];
      include_once 'connect/openDB.php';
      $total_product = mysqli_query($connect, "SELECT * FROM products WHERE idGenre = $id")->num_rows;
      $products_number = 16;
      $total_page = ceil($total_product / $products_number);
      $page = empty($_GET['page']) ? 1 : $_GET['page'];
      $offset = ($page - 1) * $products_number;

      $sql_genres = "SELECT * FROM genres";
      $genres = mysqli_query($connect, $sql_genres);
      $sql = "SELECT products.*, authors.name AS nameAuthor, genres.name AS nameGenre FROM ((products INNER JOIN authors ON products.idAuthor = authors.idAuthor) INNER JOIN genres ON products.idGenre = genres.idGenre) WHERE products.idGenre = $id ORDER BY products.price ASC LIMIT $products_number OFFSET $offset";
      $products = mysqli_query($connect, $sql);
      $data = array();
      $data['products'] = $products;
      $data['genres'] = $genres;
      $data['totalPage'] = $total_page;
      include_once 'connect/closeDB.php';
      return $data;
    }
    if ($_GET['mode'] == 3 && !empty($_GET['idG'])) {
      $id = $_GET['idG'];
      include_once 'connect/openDB.php';
      $total_product = mysqli_query($connect, "SELECT * FROM products WHERE idGenre = $id")->num_rows;
      $products_number = 16;
      $total_page = ceil($total_product / $products_number);
      $page = empty($_GET['page']) ? 1 : $_GET['page'];
      $offset = ($page - 1) * $products_number;

      $sql_genres = "SELECT * FROM genres";
      $genres = mysqli_query($connect, $sql_genres);
      $sql = "SELECT products.*, authors.name AS nameAuthor, genres.name AS nameGenre FROM ((products INNER JOIN authors ON products.idAuthor = authors.idAuthor) INNER JOIN genres ON products.idGenre = genres.idGenre) WHERE products.idGenre = $id LIMIT " . $products_number . " OFFSET " . $offset;
      $products = mysqli_query($connect, $sql);
      $data = array();
      $data['products'] = $products;
      $data['genres'] = $genres;
      $data['totalPage'] = $total_page;
      include_once 'connect/closeDB.php';
      return $data;
    }
    if ($_GET['mode'] == "search" && empty($_GET['idG'])) {
      $search = $_POST['search'];
      include_once 'connect/openDB.php';
      $total_product = mysqli_query($connect, "SELECT * FROM products")->num_rows;
      $products_number = 16;
      $total_page = ceil($total_product / $products_number);
      $page = $_GET['page'];
      $offset = ($page - 1) * $products_number;
      $sql_genres = "SELECT * FROM genres";
      $genres = mysqli_query($connect, $sql_genres);

      $sql = "SELECT products.*, authors.name AS nameAuthor, genres.name AS nameGenre FROM ((products INNER JOIN authors ON products.idAuthor = authors.idAuthor) INNER JOIN genres ON products.idGenre = genres.idGenre) WHERE products.name LIKE '%$search%' LIMIT " . $products_number . " OFFSET " . $offset;
      $result = mysqli_query($connect, $sql);
      include_once 'connect/closeDB.php';
      $data = array();
      $data['products'] = $result;
      $data['genres'] = $genres;
      $data['totalPage'] = $total_page;
      $data['search'] = $search;
      return $data;
    }
    if ($_GET['mode'] = 'search_desc') {
      $search = $_GET['key'];
      include_once 'connect/openDB.php';
      $total_product = mysqli_query($connect, "SELECT * FROM products")->num_rows;
      $products_number = 16;
      $total_page = ceil($total_product / $products_number);
      $page = $_GET['page'];
      $offset = ($page - 1) * $products_number;
      $sql_genres = "SELECT * FROM genres";
      $genres = mysqli_query($connect, $sql_genres);

      $sql = "SELECT products.*, authors.name AS nameAuthor, genres.name AS nameGenre FROM ((products INNER JOIN authors ON products.idAuthor = authors.idAuthor) INNER JOIN genres ON products.idGenre = genres.idGenre)  WHERE products.name LIKE '%$search%' ORDER BY products.price DESC LIMIT " . $products_number . " OFFSET " . $offset;
      $result = mysqli_query($connect, $sql);
      include_once 'connect/closeDB.php';
      $data = array();
      $data['products'] = $result;
      $data['genres'] = $genres;
      $data['totalPage'] = $total_page;
      $data['search'] = $search;
      return $data;
    }
    if ($_GET['mode'] = 'search_asc') {
      $search = $_GET['key'];
      include_once 'connect/openDB.php';
      $total_product = mysqli_query($connect, "SELECT * FROM products")->num_rows;
      $products_number = 16;
      $total_page = ceil($total_product / $products_number);
      $page = $_GET['page'];
      $offset = ($page - 1) * $products_number;
      $sql_genres = "SELECT * FROM genres";
      $genres = mysqli_query($connect, $sql_genres);

      $sql = "SELECT products.*, authors.name AS nameAuthor, genres.name AS nameGenre FROM ((products INNER JOIN authors ON products.idAuthor = authors.idAuthor) INNER JOIN genres ON products.idGenre = genres.idGenre)  WHERE products.name LIKE '%$search%' ORDER BY products.price ASC LIMIT " . $products_number . " OFFSET " . $offset;
      $result = mysqli_query($connect, $sql);
      include_once 'connect/closeDB.php';
      $data = array();
      $data['products'] = $result;
      $data['genres'] = $genres;
      $data['totalPage'] = $total_page;
      $data['search'] = $search;
      return $data;
    }
  }
}
function single_product()
{
  $id = $_GET['id'];
  include_once 'connect/openDB.php';
  $sql = "SELECT products.*, authors.name AS nameAuthor, genres.name AS nameGenre FROM ((products INNER JOIN authors ON products.idAuthor = authors.idAuthor) INNER JOIN genres ON products.idGenre = genres.idGenre) WHERE idProduct = $id ";
  $data =  mysqli_query($connect, $sql);
  if ($data->num_rows == 0) {
    header('Location:?controller=error_404');
  }
  include_once 'connect/closeDB.php';
  return $data;
}

switch ($action) {
  case '':
    $data = indexData();
    break;
  case 'single_product':
    $data_pr = single_product();
    break;
}