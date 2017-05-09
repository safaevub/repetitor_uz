<?php
ob_start();
define('PANEL_INDEX', 1);
require('./system/init.php');
// var_dump($router);
if ($router[0] === '')
	$router[0] = 'main';
if ($router[0] !== 'login' && !is_authorized()) {
	header('Location: ' . $config['panel_path'] . 'login');
	exit;
}
$include_file = './system/' . $router[0] . '/index.php';
if (is_file($include_file)) {
	include($include_file);
} else {
	die('REQUESTED PAGE NOT FOUND!');
}