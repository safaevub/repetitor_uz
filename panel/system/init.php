<?php
if (!defined('PANEL_INDEX')) {
	die('GO TO INDEX');
}
session_start();
require_once('config.php');
require_once('func.php');
$router = router();
$_POST = doSecure($_POST);
$_GET = doSecure($_GET);
require_once('db.php');
require_once('ru.lang.php');
$db = new DB($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['db_name']);
$db->query("SET character_set_results=utf8");
$db->query("set names 'utf8'");
if ($result = $db->query('SELECT * FROM `parameter`')) {
		while ($row = $result->fetch_assoc()) {
			$config[$row['name']] = $row['value'];
		}
}
