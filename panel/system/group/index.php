<?php
switch ($router[1]) {
    case 'manage':
        $db->saveGroup($_POST['id'], $_POST['name'], $_POST['name_uz'], $_POST['order_by']);
        header('Location: ' . path().'group');
        exit;
        break;
    case 'delete':
        $db->remove('group', intval($router[2]));
        header('Location: ' . path().'group');
        exit;
        break;
}
include('view.php');