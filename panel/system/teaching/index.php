<?php
$app = 'teaching';
$path = 'Location: ' . path().'teaching';
$tutor = null;
$obj = null;
if (isset($router[1])) {
    foreach($router as $route)
        if (substr($route, 0, 5) == 'tutor') {
            $tutor = intval(substr($route, 5, strlen($route)));
            $obj = $db->getTutorById($tutor);
            $path .= '/tutor'.$tutor;
        }
    switch ($router[1]) {
        case 'manage':
            $db->saveTeaching($_POST['id'], $_POST['subject_id'], $_POST['lesson_id'], $_POST['tutor_id'], $_POST['experience_id'], $_POST['price'], $_POST['price_group_id'], $_POST['lesson_duration']);
            header($path);
            exit;
            break;
        case 'delete':
            $db->remove($app, intval($router[2]));
            header($path);
            exit;
            break;
    }
}
include('view.php');