<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

switch ($action) {
  case '': {
      include_once "models/admin/categoryModel.php";
      include_once 'views/admin/category/index.php';
    }
    break;
  case "add": {
      include_once "models/admin/categoryModel.php";
    }
    break;
  case "destroy": {
      include_once "models/admin/categoryModel.php";
    }
    break;
  case "edit": {
      include_once "models/admin/categoryModel.php";
    }
    break;
}
