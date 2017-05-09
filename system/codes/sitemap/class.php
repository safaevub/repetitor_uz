<?php
class SiteMap{
#-------------------------------------------------
	function generate_sitemap(){
		$get_subjects = mysql_query("SELECT * FROM subject ORDER BY id") or die(mysql_error());
		while($subject = mysql_fetch_array($get_subjects)){
			echo '<h3><a href="'.BASE.'subject/'.$subject[wordid].'/">'.$subject[name.TIL_SFX].'</a></h3>';

			$get_lessons = mysql_query("SELECT * FROM lesson WHERE subject_id = '$subject[id]' ORDER BY id") or die(mysql_error());
			if(mysql_num_rows($get_lessons) > 0){
				echo '<div id="lessons" class="row">';
				while($lesson = mysql_fetch_array($get_lessons)){
					echo '<div class="grid grid-6"><a href="'.BASE.'subject/'.$subject[wordid].'/'.$lesson[wordid].'/">'.$lesson[name.TIL_SFX].'</a></div>';
				}
				echo '</div>';
			}
		}
	}
#-------------------------------------------------
}
?>