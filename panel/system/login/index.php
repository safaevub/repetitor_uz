<?php

if (!defined('PANEL_INDEX')) {
	die('GO TO INDEX');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (doAuth($_POST['_lgn_'], $_POST['_pwd_'])) {
		header('Location: ' . $config['panel_path']);
		exit;
	} else 
		$login_error = true;
}
if (isset($_GET['destroy'])) {
	session_destroy();
}
include('view.php');