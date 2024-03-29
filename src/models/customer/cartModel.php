<?php
function indexCart()
{
    include_once 'connect/openDB.php';
    $cart = array();
    $infor = array();
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product_id => $amount) {
            $sql = "SELECT products.*, authors.name AS nameAuthor, genres.name AS nameGenre FROM ((products INNER JOIN authors ON products.idAuthor = authors.idAuthor) INNER JOIN genres ON products.idGenre = genres.idGenre) WHERE idProduct = '$product_id'";
            $products = mysqli_query($connect, $sql);
            foreach ($products as $product) {
                $cart[$product_id]['img'] = $product['img'];
                $cart[$product_id]['product_name'] = $product['name'];
                $cart[$product_id]['price'] = $product['price'];
                $cart[$product_id]['amount'] = $amount;
                $cart[$product_id]['totalPrice'] = $product['price'] * $amount;
                $cart[$product_id]['author'] = $product['nameAuthor'];
            }
        }
    }
    include_once 'connect/closeDB.php';
    $count = count($cart);
    $infor['cart'] = $cart;
    $infor['count'] = $count;
    return $infor;
}

function add_to_cart()
{
    function header_mode($product_id, $page, $idG, $mode, $tele, $key)
    {
        if ($_GET['modeA'] == 1) {
            header('Location: index.php?controller=productCustomer&added_to_cart&action=single_product&id=' . $product_id);
        } elseif ($_GET['modeA'] == 3) {
            header('Location:index.php?controller=productCustomer&added_to_cart&key=' . $key . '&idG=' . $idG . '&mode=' . $mode . '&page=' . $page . '#' . $product_id);
        } elseif ($_GET['modeA'] == 4) {
            header('Location: index.php?added_to_cart#' . $tele);
        } else {
            header('Location:index.php?controller=cart&added_to_cart&page=' . $page . '#' . $product_id);
        }
    }
    $product_id = $_GET['id'];
    isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
    isset($_GET['amount']) ? $amount = $_GET['amount'] : $amount = 1;
    isset($_GET['idG']) ? $idG = $_GET['idG'] : $idG = "";
    isset($_GET['mode']) ? $mode = $_GET['mode'] : $mode = 1;
    isset($_GET['tele']) ? $tele = $_GET['tele'] : "";
    isset($_GET['key']) ? $key = $_GET['key'] : "";

    include_once 'connect/openDB.php';
    $sql = "SELECT amount FROM products WHERE idProduct = $product_id";
    $amount_DB = mysqli_fetch_assoc(mysqli_query($connect, $sql));
    include_once 'connect/closeDB.php';
    if (isset($_SESSION['cart'])) {
        if (isset($_SESSION['cart'][$product_id])) {
            if ($_SESSION['cart'][$product_id] < $amount_DB['amount']) {
                $_SESSION['cart'][$product_id] = $_SESSION['cart'][$product_id] + $amount;
                header_mode($product_id, $page, $idG, $mode, $tele, $key);
            } else {
                switch ($_GET['modeA']) {
                    case 3:
                        echo '<script language="javascript">';
                        echo 'alert("Product out of stock");';
                        echo 'window.location.href="?controller=productCustomer&key=' . $key . '&idG=' . $idG . '&mode=' . $mode . '&page=' . $page . '#' . $product_id . '";';
                        echo '</script>';
                        break;
                    case 1:
                        echo '<script language="javascript">';
                        echo 'alert("Product out of stock");';
                        echo 'window.location.href="?controller=productCustomer&action=single_product&id=' . $product_id . '";';
                        echo '</script>';
                        break;
                    case 4:
                        echo '<script language="javascript">';
                        echo 'alert("Product out of stock");';
                        echo 'window.location.href="index.php#' . $tele . '";';
                        echo '</script>';
                        break;
                    default:
                        echo '<script language="javascript">';
                        echo 'alert("Product out of stock");';
                        echo 'window.location.href="?controller=cart&page=' . $page . '#' . $product_id . '";';
                        echo '</script>';
                        break;
                }
            }
        } else {
            $_SESSION['cart'][$product_id] = $amount;
            header_mode($product_id, $page, $idG, $mode, $tele, $key);
        }
    } else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][$product_id] = $amount;
        header_mode($product_id, $page, $idG, $mode, $tele, $key);
    }
}
function change_amount()
{
    $productId = $_GET['id'];
    include_once 'connect/openDB.php';
    $sql = "SELECT amount FROM products WHERE idProduct = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "i", $productId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $amount_DB = mysqli_fetch_assoc($result);
    include_once 'connect/closeDB.php';
    if ($_GET['mode'] == 1) {
        foreach ($_SESSION['cart'] as $product_id => $amount_old) {
            if ($productId == $product_id) {
                if ($amount_old > 1) {
                    $_SESSION['cart'][$product_id] = $amount_old - 1;
                    header('Location:index.php?controller=cart');
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("The quantity is too small");';
                    echo 'window.location.href="?controller=cart";';
                    echo '</script>';
                }
            }
        }
    }
    if ($_GET['mode'] == 2) {
        foreach ($_SESSION['cart'] as $product_id => $amount_old) {
            if ($productId == $product_id) {
                if ($amount_old < $amount_DB['amount']) {
                    $_SESSION['cart'][$product_id] = $amount_old + 1;
                    header('Location:index.php?controller=cart');
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Insufficient products in stock");';
                    echo 'window.location.href="?controller=cart";';
                    echo '</script>';
                }
            }
        }
    }
    if ($_GET['mode'] == 3) {
        $amount_new = $_GET['amount'];
        if ($amount_new < 1) {
            echo '<script language="javascript">';
            echo 'alert("Wrong quantity format");';
            echo 'window.location.href="?controller=cart";';
            echo '</script>';
        } else {
            foreach ($_SESSION['cart'] as $product_id => $amount_old) {
                if ($productId == $product_id && $amount_new < $amount_DB['amount']) {
                    $_SESSION['cart'][$product_id] = $amount_new;
                    header('Location:index.php?controller=cart');
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Insufficient products in stock");';
                    echo 'window.location.href="?controller=cart";';
                    echo '</script>';
                }
            }
        }
    }
}
function trashPr()
{
    $id =  $_GET['id'];
    $previous_key = 0;
    foreach ($_SESSION['cart'] as $product_id => $value) {
        if ($product_id == $id) {
            header('Location:index.php?controller=cart&deleted_from_cart#' . $previous_key);
            unset($_SESSION['cart'][$product_id]);
            break;
        }
        $previous_key = $product_id;
    }
}

switch ($action) {
    case '':
        $carts = indexCart();
        break;
    case 'add_to_cart':
        add_to_cart();
        break;
    case 'change_amount':
        change_amount();
        break;
    case 'trashPr':
        trashPr();
        break;
}
