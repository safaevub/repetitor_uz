<?php
$path = 'Location: ' . path().'location';
if (isset($router[1]))
switch ($router[1]) {
    case 'manage':
        $db->saveLocation($_POST['id'], $_POST['name'], $_POST['name_uz'], $_POST['order_by']);
        header($path);
        exit;
        break;
    case 'delete':
        $db->remove('location', intval($router[2]));
        header($path);
        exit;
        break;
}
include('view.php');