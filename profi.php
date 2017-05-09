<?php
	session_start();
	ob_start();
	
	include("system/classes/system.php");
	$system = new System;
	include("system/core/main.php");
?>