<?php
class Subject{
#-------------------------------------------------
	function show_breadcrumb(){
		if(isset($_GET[target]) && !empty($_GET[target])){
			$get_target = mysql_query("SELECT * FROM subject WHERE wordid = '$_GET[target]'") or die(mysql_error());
			if(mysql_num_rows($get_target) > 0){
				$target = mysql_fetch_array($get_target);

				if(isset($_GET[item]) && !empty($_GET[item])){
					$get_item = mysql_query("SELECT * FROM lesson WHERE wordid = '$_GET[item]'") or die(mysql_error());

					if(mysql_num_rows($get_item) > 0){
						$item = mysql_fetch_array($get_item);

						$links = '<span><a href="'.BASE.'">Home</a></span><i>&rarr;</i><span><a href="'.BASE.'subject/'.$target[wordid].'/">'.$target[name].'</a></span><i>&rarr;</i><span>'.$item[name].'</span>';
					} else{
						header('Location: '.BASE.'subject/'.$target[wordid].'/');
					}
				} else{
					$links = '<span><a href="'.BASE.'">Home</a></span><i>&rarr;</i><span>'.$target[name].'</span>';
				}

				echo '<section id="breadcrumb" class="wrapper">'.$links.'</section>';
			} else{
				include('./system/core/404.php');
				exit;
			}
		}
	}
#-------------------------------------------------
	function show_sub_head(){
		if(isset($_GET[target]) && !empty($_GET[target])){
			if(isset($_GET[item]) && !empty($_GET[item])){
				$get_item = mysql_query("SELECT * FROM lesson WHERE wordid = '$_GET[item]'") or die(mysql_error());
				if(mysql_num_rows($get_item) > 0){
					$item = mysql_fetch_array($get_item);
					echo '<h2>'.$item[name].'</h2>';

					$get_subject = mysql_query("SELECT * FROM subject WHERE id = '$item[subject_id]'") or die(mysql_error());
					$subject = mysql_fetch_array($get_subject);

					$get_lessons = mysql_query("SELECT * FROM lesson WHERE NOT id = '$item[id]' AND subject_id = '$item[subject_id]' ORDER BY id") or die(mysql_error());
					if(mysql_num_rows($get_lessons) > 0){
						echo '<div id="lessons">';
						while($lesson = mysql_fetch_array($get_lessons)){
							echo '<span><a href="'.BASE.'subject/'.$subject[wordid].'/'.$lesson[wordid].'/">'.$lesson[name].'</a></span>&nbsp;';
						}
						echo '</div>';
					}
				} else{
					header('Location: '.BASE.'subject/'.$_GET[target].'/');
				}
			} else{
				$get_target = mysql_query("SELECT * FROM subject WHERE wordid = '$_GET[target]'") or die(mysql_error());
				$target = mysql_fetch_array($get_target);
				echo '<h2>'.$target[name].'</h2>';

				$get_lessons = mysql_query("SELECT * FROM lesson WHERE subject_id = '$target[id]' ORDER BY id") or die(mysql_error());
				if(mysql_num_rows($get_lessons) > 0){
					echo '<div id="lessons">';
					while($lesson = mysql_fetch_array($get_lessons)){
						echo '<span><a href="'.BASE.'subject/'.$target[wordid].'/'.$lesson[wordid].'/">'.$lesson[name].'</a></span>&nbsp;';
					}
					echo '</div>';
				}
			}
		} else{
			echo '<h2>Tutors</h2>';
		}
	}
#-------------------------------------------------
	function show_similar_subjects(){
		$get_subjects = mysql_query("SELECT * FROM subject WHERE NOT wordid = '$_GET[target]' ORDER BY id LIMIT 5") or die(mysql_error());
		while($subject = mysql_fetch_array($get_subjects)){
			echo '<li><a href="'.BASE.'subject/'.$subject[wordid].'/">'.$subject[name].'</a></li>';
		}
	}
#-------------------------------------------------
	function subject_list(){
		$get_sub_list = mysql_query("SELECT * FROM subject ORDER BY id") or die(mysql_error());
		echo '<ul class="nostyle">';
		while($subject = mysql_fetch_array($get_sub_list)){
			echo '<li><a href="#" target="subject" item="'.$subject[id].'">'.$subject[name].'</a></li>';
		}
		echo '</ul>';
	}	
#-------------------------------------------------
	function lesson_list(){
		$get_lesson_list = mysql_query("SELECT * FROM lesson ORDER BY id") or die(mysql_error());
		echo '<ul class="nostyle lesson">';
		while($lesson = mysql_fetch_array($get_lesson_list)){
			echo '<li><a href="#" target="lesson" item="'.$lesson[id].'">'.$lesson[name].'</a></li>';
		}
		echo '</ul>';
	}
#-------------------------------------------------
	function region_option($loc_id) {
		$get_region_list = mysql_query("SELECT * FROM region WHERE location_id = ".$loc_id." ORDER BY order_by");
		while($region_list = mysql_fetch_array($get_region_list)){
			echo '<option value="'.$region_list[id].'">'.$region_list[name].'</option>';
		}
	}
}
?>