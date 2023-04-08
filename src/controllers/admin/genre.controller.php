<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

switch ($action) {
  case '': {
      include_once "models/admin/genreModel.php";
      include_once 'views/admin/genre/index.php';
    }
    break;
  case "add": {
      include_once "models/admin/genreModel.php";
    }
    break;
  case "destroy": {
      include_once "models/admin/genreModel.php";
    }
    break;
  case "edit": {
      include_once "models/admin/genreModel.php";
    }
    break;
  case 'search': {
      include_once "models/admin/genreModel.php";
    }
    break;
}
