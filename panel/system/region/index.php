<?php
$app = 'region';
$path = 'Location: ' . path().'region';
if (isset($router[1]))
switch ($router[1]) {
    case 'manage':
        $db->saveRegion($_POST['id'], $_POST['name'], $_POST['name_uz'], $_POST['location_id'], $_POST['order_by']);
        header($path);
        exit;
        break;
    case 'delete':
        $db->remove($app, intval($router[2]));
        header($path);
        exit;
        break;
}
include('view.php');