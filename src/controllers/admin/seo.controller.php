<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
switch ($action) {
    case '':
        include_once 'models/admin/seoModel.php';
        break;
}