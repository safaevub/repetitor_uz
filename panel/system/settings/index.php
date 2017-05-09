<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (doHash($_POST['_pwd0_']) !== $config['password']) {
		$profile_error[] = 'Old password is incorrect';
	}
	if ($_POST['_pwd1_'] !== $_POST['_pwd2_']) {
		$profile_error[] = 'Passwords do not match';
	}
	if (!isset($profile_error)) {
		$conf = array('name'=>$_POST['_nm_'], 'login'=>$_POST['_lgn_'], 'password' => doHash($_POST['_pwd1_']));
		if (changeConfigs($conf)) {
			$profile_changed = true;
		}
	}
}

include('view.php');