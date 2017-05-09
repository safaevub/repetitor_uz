<?php
if (!defined('PANEL_INDEX')) {
	die('GO TO INDEX');
}
$config['db'] = array(
	'host' => 'localhost',
	'port' => 3306,
	'db_name' => 'yourprofidb',
	'user' => 'root',
	'password' => 'mysql'
);
$config['host'] = 'localhost';
$config['panel_path'] = '/yourprofi/panel/';
$config['salt'] = '97ds745sdfa48ereq4e5rf35sd';
$config['debug'] = true;
$config['lang'] = 'ru';
$config['photo_url'] = '/yourprofi/img/profile/';
$config['photo_upload'] = '../img/profile';
$config['per_page'] = 15;