<?php
$path = 'Location: ' . path().'lesson';
if (isset($router[1]))
switch ($router[1]) {
    case 'manage':
        $db->saveLesson($_POST['id'], $_POST['name'], $_POST['name_uz'], $_POST['subject_id'], $_POST['order_by'], $_POST['if_exam']);
        header($path);
        exit;
        break;
    case 'delete':
        $db->remove('lesson', intval($router[2]));
        header($path);
        exit;
        break;
}
include('view.php');