<?php
$path = 'Location: ' . path().'subject';
if (isset($router[1]))
switch ($router[1]) {
    case 'manage':
        $db->saveSubject($_POST['id'], $_POST['name'], $_POST['name_uz'], $_POST['order_by']);
        header($path);
        exit;
        break;
    case 'delete':
        $db->remove('subject', intval($router[2]));
        header($path);
        exit;
        break;
}
include('view.php');