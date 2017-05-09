<?php
class Main{
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
			echo '<li><a href="'.BASE.'subject/'.$subject[wordid].'">'.$subject[name.TIL_SFX].'</a></li>';
			$count ++;
		}
		echo '</ul></div>';
	}
#-------------------------------------------------
	function subject_list(){
		$get_sub_list = mysql_query("SELECT * FROM subject ORDER BY id") or die(mysql_error());
		echo '<ul class="nostyle">';
		while($subject = mysql_fetch_array($get_sub_list)){
			echo '<li><a href="#" target="subject" item="'.$subject[id].'">'.$subject[name.TIL_SFX].'</a></li>';
		}
		echo '</ul>';
	}	
#-------------------------------------------------
	function lesson_list(){
		$get_lesson_list = mysql_query("SELECT * FROM lesson ORDER BY id") or die(mysql_error());
		echo '<ul class="nostyle lesson">';
		while($lesson = mysql_fetch_array($get_lesson_list)){
			echo '<li><a href="#" target="lesson" item="'.$lesson[id].'">'.$lesson[name.TIL_SFX].'</a></li>';
		}
		echo '</ul>';
	}
#-------------------------------------------------
	function example_sub(){
		$get_random_sub = mysql_query("SELECT * FROM subject ORDER BY RAND() LIMIT 1") or die(mysql_error());
		$random_sub = mysql_fetch_array($get_random_sub);
		$sub_name = mb_strtolower($random_sub[name.TIL_SFX], "utf-8");
		echo '<a href="#" target="subject" item="'.$random_sub[id].'">'.$sub_name.'</a>';
	}
#-------------------------------------------------
}
?>