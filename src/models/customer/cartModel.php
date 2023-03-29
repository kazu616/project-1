<?php
function indexCart()
{
    include_once 'connect/openDB.php';
    $sqlCustomer = "SELECT * FROM accounts";
    $customers = mysqli_query($connect, $sqlCustomer);
    $cart = array();
    $infor = array();
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product_id => $amount) {
            $sql = "SELECT products.*, authors.name AS nameAuthor, genres.name AS nameGenre FROM ((products INNER JOIN authors ON products.idAuthor = authors.idAuthor) INNER JOIN genres ON products.idGenre = genres.idGenre) WHERE idProduct = '$product_id'";
            $products = mysqli_query($connect, $sql);
            foreach ($products as $product) {
                $cart[$product_id]['product_name'] = $product['name'];
                $cart[$product_id]['price'] = $product['price'];
                $cart[$product_id]['amount'] = $amount;
                $cart[$product_id]['totalPrice'] = $product['price'] * $amount;
                $cart[$product_id]['author'] = $product['nameAuthor'];
            }
        }
    }
    include_once 'connect/closeDB.php';
    $infor['customer'] = $customers;
    $infor['cart'] = $cart;
    // return $infor;
    var_dump($infor);
}
function add_to_cart()
{
    //        Lấy được id của sản phẩm vừa được thêm vào
    $product_id = $_GET['id'];
    //        Lưu lên session id sản phầm và số lượng mặc định là 1
    //        Kiểm tra xem giỏ hàng đã tồn tại hay chưa
    if (isset($_SESSION['cart'])) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]++;
        } else {
            $_SESSION['cart'][$product_id] = 1;
        }
    } else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][$product_id] = 1;
    }
    var_dump($_SESSION['cart']);
}
switch ($action) {
    case '':
        $carts = indexCart();
        break;
    case 'add_to_cart':
        add_to_cart();
        break;
}
