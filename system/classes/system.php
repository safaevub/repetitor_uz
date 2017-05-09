<?php
session_start();
ob_start();

include('config.php');

class System{
	var $message;
#-------------------------------------------------
	function browse($page = null){
		if($page == ""){
			$inc = "system/codes/main/index.php";
		} else{
			$inc = "system/codes/$page/index.php";
		}
		
		if(file_exists($inc)){
			include($inc);
		} else{
			include("system/core/404.php");
		}
	}
#-------------------------------------------------
	function include_css($page = null){
		if($page != "" && file_exists("system/codes/$page/index.php")){
			echo '<link href="'.BASE.'lib/css/style.css" rel="stylesheet">';
			if(file_exists('lib/css/'.$page.'.css')){
				echo '<link href="'.BASE.'lib/css/'.$page.'.css" rel="stylesheet">';
			}
		}
	}
#-------------------------------------------------
	function include_js($page = null){
		if($page == ""){
			$inc = "system/codes/main/index.js.php";
		} else{
			$inc = "system/codes/$page/index.js.php";
		}

		if(file_exists($inc)){
			include($inc);
		}

		if($page != "order"){
			include("lib/js/cart.js.php");
		}
	}
#-------------------------------------------------
	function show_subjects(){
		$get_sub_list = mysql_query("SELECT * FROM subject ORDER BY id") or die(mysql_error());
		$sub_count = mysql_num_rows($get_sub_list);
		$row_per_col = ceil($sub_count/4);

		$count = 0;
		echo '<div class="grid grid-3"><ul class="nostyle">';
		while($subject = mysql_fetch_array($get_sub_list)){
			if($count == $row_per_col){
				echo '</ul></div><div class="grid grid-3"><ul class="nostyle">';
				$count = 0;
			}
			echo '<li><a href="'.BASE.'subject/'.$subject[wordid].'">'.$subject[name].'</a></li>';
			$count ++;
		}
		echo '</ul></div>';
	}
#-------------------------------------------------
	function get_location() {
		if (empty($_COOKIE['location_id'])) {
			return DEFAULT_LOCATION;
		}
	}
#-------------------------------------------------
	function show_lang(){
		if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'uz'){
			echo '<a href="#" id="localize" lang="ru">English</a><span>Русский</span>';
		} else{
			echo '<span>English</span><a href="#" id="localize" lang="uz">Русский</a>';
		}
	}
#-------------------------------------------------
}
?>