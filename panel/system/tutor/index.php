<?php
//TODO: rasmlarni cropit.js orqali olish, edit paytida user rasmini chiqarish
$app = 'tutor';
$path = 'Location: ' . path().$app;
if (isset($router[1]))
switch ($router[1]) {
    case 'manage':
        $fileName = $_POST['image'];
        if ($_FILES['photo']['error'] == UPLOAD_ERR_OK && $_FILES['photo']['size'] < 1048576) {
            if (substr($_FILES['photo']['type'], 0, 5) == 'image') {
                $tmp = uniqid() . '.';
                $nameParts = explode('.', $_FILES['photo']['name']);
                if (!empty($nameParts[count($nameParts) - 1]))
                    $tmp .= $nameParts[count($nameParts) - 1];
                else
                    $tmp .= substr($_FILES['photo']['type'], 6, strlen($_FILES['photo']['type']));
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $config['photo_upload'] . '/' . $tmp)) {
                    $fileName = $tmp;
                }
            }
        }
        $res = $db->saveTutor($_POST['id'], $_POST['name'], $_POST['gender'], $fileName, $_POST['phone'], $_POST['email'], $_POST['dob'], $_POST['location_id'], $_POST['living_region_id'], $_POST['living_addr'], $_POST['serving_dist'], $_POST['education_id'], $_POST['to_home'], $_POST['edu'], $_POST['exp'], $_POST['edu_uz'], $_POST['exp_uz'], $_POST['teach_lang'], $_POST['rating'], $_POST['fact'], $_POST['info'], $_POST['fact_uz'], $_POST['info_uz']);
        $id = null;
        if (!empty($_POST['id'])) {
            $id = intval($_POST['id']);
        } else {
            $id = $res;
        }
        $db->saveTutorRegion($id, $_POST['region_id']);
        header($path);
        exit;
        break;
    case 'docManage':
        $fileName = $_POST['image'];
        if ($_FILES['doc']['error'] == UPLOAD_ERR_OK && $_FILES['doc']['size'] < 1048576) {
            if (substr($_FILES['doc']['type'], 0, 5) == 'image') {
                $tmp = uniqid() . '.';
                $nameParts = explode('.', $_FILES['doc']['name']);
                if (!empty($nameParts[count($nameParts) - 1]))
                    $tmp .= $nameParts[count($nameParts) - 1];
                else
                    $tmp .= substr($_FILES['doc']['type'], 6, strlen($_FILES['doc']['type']));
                if (move_uploaded_file($_FILES['doc']['tmp_name'], $config['photo_upload'] . '/' . $tmp)) {
                    $fileName = $tmp;
                }
            }
        }
        $res = $db->saveTutorDoc($_POST['id'], $_POST['name'], $_POST['name_uz'], $fileName, $_POST['tutor_id']);
        $id = null;
        if (!empty($_POST['id'])) {
            $id = intval($_POST['id']);
        } else {
            $id = $res;
        }
        $db->saveTutorRegion($id, $_POST['region_id']);
        header($path.'/doc/'.intval($_POST['tutor_id']));
        exit;
        break;
    case 'reviewManage':
        $db->saveReview($_POST['id'], $_POST['tutor_id'], $_POST['review'], $_POST['review_uz'], $_POST['reviewer'], $_POST['mark']);
        header($path.'/review/'.$_POST['tutor_id']);
        exit;
        break;
    case 'delete':
        $obj = $db->getById('tutor', intval($router[2]));
        $db->remove($app, intval($router[2]));
        unlink($config['photo_upload'] . '/' . $obj['image']);
        header($path);
        exit;
        break;
    case 'docDelete':
        $obj = $db->getById('tutor_doc', intval($router[2]));
        if ($obj) {
            $db->remove('tutor_doc', intval($obj['id']));
            unlink($config['photo_upload'] . '/' . $obj['doc']);
            header($path.'/doc/'.intval($obj['tutor_id']));
        }
        exit;
        break;
    case 'edit':
        $tutor = null;
        if (!empty($router[2])) {
            $tutor = $db->getTutorById($router[2]);
        }
        include('edit.php');
        break;
    case 'doc':
        $tutor = null;
        if (!empty($router[2])) {
            $tutor = $db->getTutorById($router[2]);
            if (!empty($tutor))
                include('doc.php');
        }
        break;
    case 'review':
        $tutor = null;
        if (!empty($router[2])) {
            $tutor = $db->getTutorById($router[2]);
            if (!empty($tutor))
                include('review.php');
        }
        break;
}
else
    include('view.php');