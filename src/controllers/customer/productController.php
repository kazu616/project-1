<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
switch ($action) {
    case '':
        include_once 'models/customer/productModel.php';
        include_once 'views/customer/Product/index.php';
        break;
    case 'single_product':
        include_once 'models/customer/productModel.php';
        include_once 'views/customer/Product/singleProduct.php';
        break;
}