<?php
$action = '';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
switch ($action) {
  case '':
    include_once 'models/admin/authorModel.php';
    include_once 'views/admin/author/index.php';
    break;
  case 'add':
    include_once 'models/admin/authorModel.php';
    break;
  case 'clone_data_edit':
    include_once 'models/admin/authorModel.php';
    include_once 'views/admin/author/editAuthor.php';
    break;
  case 'edit':
    include_once 'models/admin/authorModel.php';
    break;
  case 'delete':
    include_once 'models/admin/authorModel.php';
}
