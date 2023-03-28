<?php
function indexProduct()
{
    include_once 'connect/openDB.php';
    $sql = "SELECT products.*, authors.name AS nameAuthor, genres.name AS nameGenre FROM ((products INNER JOIN authors ON products.idAuthor = authors.idAuthor) INNER JOIN genres ON products.idGenre = genres.idGenre)";
    $products = mysqli_query($connect, $sql);
    include_once 'connect/closeDB.php';
    return $products;
}
function clone_data_genres_authors()
{
    include_once 'connect/openDB.php';
    $sql = "SELECT * FROM authors";
    $authors = mysqli_query($connect, $sql);
    $sql_genres = "SELECT * FROM genres";
    $genres = mysqli_query($connect, $sql_genres);
    include_once 'connect/closeDB.php';
    $array_genre_author = array();
    $array_genre_author['authors'] = $authors;
    $array_genre_author['genres'] = $genres;
    return $array_genre_author;
}

function addProduct()
{
    $name = $_POST['name'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $issuingDate = $_POST['issuingDate'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $img = $_FILES["image"]["name"];
    $image_name_default = explode(".", $_FILES["image"]["name"]);
    $image_name = str_replace(" ", "", ($image_name_default[0] . floor(microtime(true) * 1000) . "." . $image_name_default[1]));
    $target_file = "imgs/" . basename($image_name);
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }
    include_once 'connect/openDB.php';

    // check if the product name already exists
    $sql_check = "SELECT * FROM products WHERE name = ?";
    $stmt = mysqli_prepare($connect, $sql_check);
    mysqli_stmt_bind_param($stmt, "s", trim($name));
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">';
        echo 'alert("Duplicate name book");';
        echo 'window.location.href="?controller=productAdmin&action=show_formAdd";';
        echo '</script>';
    } else {
        // insert the new product
        if ($price >= 0 && $amount >= 0) {
            $sql = "INSERT INTO products(name,img, price, amount, openingDate,description,idGenre,idAuthor)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($connect, $sql);
            mysqli_stmt_bind_param($stmt, "ssddssii", trim($name), $image_name, $price, $amount, $issuingDate, $description, $genre, $author);
            mysqli_stmt_execute($stmt);
            echo "Product added successfully!";
            header('Location:?controller=productAdmin');
        } else {
            echo '<script language="javascript">';
            echo 'alert("Price and amount must be non-negative!");';
            echo 'window.location.href="?controller=productAdmin&action=show_formAdd";';
            echo '</script>';
        }
    }
    include_once 'connect/closeDB.php';
}
function clone_data_edit()
{
    $id = $_GET['id'];
    include_once 'connect/openDB.php';
    $sql = "SELECT * FROM products WHERE idProduct = $id";
    $data_product = mysqli_query($connect, $sql);
    $sql_authors = "SELECT * FROM authors";
    $authors = mysqli_query($connect, $sql_authors);
    $sql_genres = "SELECT * FROM genres";
    $genres = mysqli_query($connect, $sql_genres);
    include_once 'connect/closeDB.php';
    $clone_data_edit = array();
    $clone_data_edit['authors'] = $authors;
    $clone_data_edit['product'] = $data_product;
    $clone_data_edit['genres'] = $genres;
    return $clone_data_edit;
}
function edit()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $issuingDate = $_POST['issuingDate'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $old_image = $_POST['old_img'];
    if ((!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) && isset($_POST["old_img"])) {
        $image_name = $old_image;
    } else {
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
    // Check if product name already exists
    $sql_check = "SELECT * FROM products WHERE name = ? AND idProduct != ?";
    $stmt = mysqli_prepare($connect, $sql_check);
    mysqli_stmt_bind_param($stmt, "si", trim($name), $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        // Product name already exists, notify user
        echo '<script language="javascript">';
        echo 'alert("Name book is created");';
        echo 'window.location.href="?controller=productAdmin&action=clone_data_edit&id=' . $id . '";';
        echo '</script>';
    } else {
        // Product name doesn't exist, proceed with update
        $sql_update = "UPDATE products SET name = ?, img = ?, amount = ?, price = ?, idAuthor = ?, idGenre = ?, issuingDate = ?, description = ? WHERE idProduct = ?";
        $stmt = mysqli_prepare($connect, $sql_update);
        mysqli_stmt_bind_param($stmt, "ssddiiisi", trim($name), $image_name, $amount, $price, $author, $genre, $issuingDate, $description, $id);
        mysqli_stmt_execute($stmt);
        include_once 'connect/closeDB.php';
        header('Location:?controller=productAdmin');
    }
}

function delete()
{
    $id = $_GET['id'];
    include_once 'connect/openDB.php';
    $sql = "DELETE FROM products WHERE idAccount = '$id'";
    $data_clone = mysqli_query($connect, $sql);
    include_once 'connect/closeDB.php';
}


switch ($action) {
    case '':
        $products = indexProduct();
        break;
    case 'show_formAdd':
        $array_genre_author = clone_data_genres_authors();
        break;
    case 'add':
        addProduct();
        break;
    case 'clone_data_edit':
        $data_clone = clone_data_edit();
        break;
    case 'edit':
        edit();
        break;
    case 'delete':
        delete();
        break;
}
