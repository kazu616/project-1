<?php
function checkout()
{
    if ($_POST['idPr'] == "" && $_POST['totalPrice'] == "") {
        echo '<script language="javascript">';
        echo 'alert("You have not selected any products to pay");';
        echo 'window.location.href="?controller=cart";';
        echo '</script>';
    } else {
        $arrayId = trim($_POST['idPr']);
        $listId = explode(',', $arrayId);
        $listPr = array();
        $checkout = array();
        include_once 'connect/openDB.php';
        $id_customer = $_SESSION['customer_id'];
        $sql_inf_customer = "SELECT * FROM accounts WHERE idAccount = ?";
        $stmt = mysqli_prepare($connect, $sql_inf_customer);
        mysqli_stmt_bind_param($stmt, "i", $id_customer);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $inf_customer = mysqli_fetch_assoc($result);
        if (empty($inf_customer['name']) || empty($inf_customer['address']) || empty($inf_customer['phoneNumber'])) {
            echo '<script language="javascript">';
            echo 'alert("You need to enter the full address before placing an order");';
            echo 'window.location.href="?controller=productCustomer";';
            echo '</script>';
        } else {
            foreach ($_SESSION['cart'] as $product_id => $amount) {
                foreach ($listId as $id) {
                    if ($id == $product_id) {
                        $sql = "SELECT products.*, authors.name AS nameAuthor, genres.name AS nameGenre FROM ((products INNER JOIN authors ON products.idAuthor = authors.idAuthor) INNER JOIN genres ON products.idGenre = genres.idGenre) WHERE idProduct = '$id'";
                        $products = mysqli_query($connect, $sql);
                        foreach ($products as $product) {
                            $listPr[$id]['img'] = $product['img'];
                            $listPr[$id]['product_name'] = $product['name'];
                            $listPr[$id]['price'] = $product['price'];
                            $listPr[$id]['amount'] = $amount;
                            $listPr[$id]['totalPrice'] = $product['price'] * $amount;
                            $listPr[$id]['author'] = $product['nameAuthor'];
                        }
                    }
                }
            }
            $checkout['listPr'] = $listPr;
        }
        include_once 'connect/closeDB.php';
        $checkout['totalPrice'] = $_POST['totalPrice'];
        $checkout['inf_customer'] = $inf_customer;
        $checkout['listId'] = $arrayId;
        return $checkout;
    }
}
function add_data()
{
    $arrayId = trim($_POST['idPr']);
    $listId = explode(',', $arrayId);
    $name = $_POST['name'];
    $phone = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $id_customer = $_SESSION['customer_id'];
    $bill_code = generate_string('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 10);
    include_once 'connect/openDB.php';
    $sql = "INSERT INTO `order`(createdDate, idPayment, idDelivery, idCustomer, name_customer, phone_number, address_customer, bill_code) VALUES (NOW(),'1','1','$id_customer','$name','$phone','$address','$bill_code') ";
    mysqli_query($connect, $sql);
    $sql_get_idOrder = "SELECT idOrder FROM `order` ORDER BY idOrder DESC LIMIT 1";
    $id_DB = mysqli_fetch_assoc(mysqli_query($connect, $sql_get_idOrder));
    $idOrder = $id_DB['idOrder'];
    foreach ($_SESSION['cart'] as $product_id => $amount) {
        foreach ($listId as $id) {
            if ($id == $product_id) {
                $sql_get_price = "SELECT price FROM products WHERE idProduct = '$id'";
                $result = mysqli_fetch_assoc(mysqli_query($connect, $sql_get_price));
                $price_DB = $result['price'];
                $sql_detail_order = "INSERT INTO `order_detail`(amount, sold_price, idOrder, idProduct) VALUES ('$amount','$price_DB','$idOrder','$id')";
                mysqli_query($connect, $sql_detail_order);
                unset($_SESSION['cart'][$product_id]);
                $sql_delete_amount = "SELECT amount FROM products WHERE idProduct = '$id'";
                $amount_db = mysqli_fetch_assoc(mysqli_query($connect, $sql_delete_amount));
                $amount_new = $amount_db['amount'] - $amount;
                $sql_set_new = "UPDATE `products` SET amount = '$amount_new' WHERE idProduct = '$id'";
                mysqli_query($connect, $sql_set_new);
            }
        }
    }
    include_once 'connect/closeDB.php';
    header('Location:index.php?controller=cart');
}
switch ($action) {
    case '':
        $listPr = checkout();
        break;
    case 'add_data':
        add_data();
        break;
}
