<?php
	if(isset($_POST['lang']) && $_POST['lang'] == 'uz'){
		setcookie('lang', 'uz', time()+(86400*30), '/');
	} else{
		setcookie('lang', null, -1, '/');
	}
?>