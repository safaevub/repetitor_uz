<?php
session_start();
ob_start();
$dbLink = mysql_connect("localhost", "root", "mysql") or die(mysql_error());
mysql_query("SET character_set_results=utf8", $dbLink);

//$database = mysql_real_escape_string($_SESSION['org']);
$database = "yourprofidb";

mysql_select_db($database, $dbLink) or die(mysql_error());
mysql_query("set names 'utf8'", $dbLink);
mysql_query("SET SQL_BIG_SELECTS=1");
// session_start();
// ob_start();

if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'eng'){
	include('langs/uz.lang.php');
	define(TIL_SFX, "_uz");
} else{
	include('langs/ru.lang.php');
	define(TIL_SFX, "");
}

define(BASE, "http://localhost/yourprofi/");
define(DEFAULT_LOCATION, '1');
?>