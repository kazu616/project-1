<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
switch ($action) {
  case '':
    include_once 'models/admin/productModel.php';
    include_once 'views/admin/Product/index.php';
    break;
  case 'show_formAdd':
    include_once 'models/admin/productModel.php';
    include_once 'views/admin/product/addProduct.php';
    break;
  case 'add':
    include_once 'models/admin/productModel.php';
    break;
  case 'clone_data_edit':
    include_once 'models/admin/productModel.php';
    include_once 'views/admin/product/editproduct.php';
    break;
  case 'edit':
    include_once 'models/admin/productModel.php';
    break;
  case 'delete':
    include_once 'models/admin/productModel.php';
    header('Location:?controller=productAdmin');
  case 'search': {
      include_once 'models/admin/productModel.php';
    }
}
