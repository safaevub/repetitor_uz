<?php

if (!defined('PANEL_INDEX')) {
	die('GO TO INDEX');
}

$app = 'main';
$path = 'Location: ' . path().'main';
if (isset($router[1])) {
	switch ($router[1]) {
		case 'manage':
			$id = null;
			$var = null;
			if (intval($_POST['id']) > 0) {
				$id = intval($_POST['id']);
			}
			if (is_int($var = $db->saveOrder($_POST['id'], $_POST['name'], $_POST['phone'], $_POST['email'], $_POST['comment'], $_POST['status'], $_POST['system_comment']))) {
				$id = intval($var);
			}
			$db->saveOrderTutor($id, $_POST['tutor_id']);
			header($path);
			exit;
			break;
		case 'delete':
			$db->remove('orders', intval($router[2]));
			header($path);
			exit;
			break;
	}
}
include('view.php');