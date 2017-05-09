<?php
class Profile{

var $message;
#-------------------------------------------------
	function get_tutor(){
		if(isset($_GET[target]) && !empty($_GET[target])){
			$query = "SELECT tutor.*, GROUP_CONCAT(DISTINCT subject.name SEPARATOR ', ') as lessons, GROUP_CONCAT(DISTINCT subject.name_uz SEPARATOR ', ') as lessons_uz, COUNT(DISTINCT tutor_review.id) as review_count
			FROM tutor
			JOIN teaching ON tutor.id = teaching.tutor_id
			JOIN subject ON subject.id = teaching.subject_id
			LEFT JOIN tutor_review ON tutor.id = tutor_review.tutor_id
			WHERE tutor.id = '$_GET[target]'";

			$get_tutor = mysql_query($query) or die(mysql_error());
			if(mysql_num_rows($get_tutor) > 0){
				$tutor = mysql_fetch_array($get_tutor);
				return $tutor;
			}
		}
	}
#-------------------------------------------------
	function get_lessons(){
		$query = "SELECT teaching.*, subject.name as fan, subject.name_uz as fan_uz, lesson.name as dars, lesson.name_uz as dars_uz
		FROM teaching
		JOIN subject ON teaching.subject_id = subject.id
		LEFT JOIN lesson ON teaching.lesson_id = lesson.id
		WHERE teaching.tutor_id = '$_GET[target]' ORDER BY teaching.subject_id";

		$lesson_list = mysql_query($query) or die(mysql_error());
		return $lesson_list;
	}
#-------------------------------------------------
	function get_location(){
		$query = "SELECT r1.name as region, r1.name_uz as region_uz, GROUP_CONCAT(r2.name SEPARATOR ', ') as viezd, GROUP_CONCAT(r2.name_uz SEPARATOR ', ') as viezd_uz
		FROM tutor
		LEFT JOIN tutor_region ON tutor.id = tutor_region.tutor_id
		LEFT JOIN region r1 ON tutor.living_region_id = r1.id
		LEFT JOIN region r2 ON tutor_region.region_id = r2.id
		WHERE tutor.id = '$_GET[target]'";

		$location_list = mysql_query($query) or die(mysql_error());
		return $location_list;
	}
#-------------------------------------------------
	function get_docs(){
		$doc_list = mysql_query("SELECT * FROM tutor_doc WHERE tutor_id = '$_GET[target]'") or die(mysql_error());
		while($docs = mysql_fetch_array($doc_list)){
			
			list($width, $height) = getimagesize(BASE.'img/profile/'.$docs[doc]);
			if($width > $height){
				$wresize = 'width="65px"';
				$hresize = '';
			} else{
				$hresize = 'height="65px"';
				$wresize = '';
			}

			//echo '<img src="'.BASE.'img/profile/'.$docs[doc].'" width="70px" title="'.$docs[name.TIL_SFX].'" alt="'.$docs[name.TIL_SFX].'"/>';
			echo '<a class="fancybox" href="'.BASE.'img/profile/'.$docs[doc].'" data-fancybox-group="gallery" title="'.$docs[name.TIL_SFX].'"><img src="'.BASE.'img/profile/'.$docs[doc].'" '.$wresize.' '.$hresize.' title="'.$docs[name.TIL_SFX].'" alt="'.$docs[name.TIL_SFX].'"/></a>';
		}
	}
#-------------------------------------------------
	function see_also(){
		$query = "SELECT DISTINCT teaching.subject_id, subject.name AS fan, subject.name_uz as fan_uz, subject.wordid AS fan_wid, region.id AS reg_id, region.name AS regname, region.name_uz as regname_uz
		FROM tutor
		LEFT JOIN teaching ON tutor.id = teaching.tutor_id
		LEFT JOIN subject ON subject.id = teaching.subject_id
		LEFT JOIN region ON tutor.living_region_id = region.id
		WHERE tutor.id = '$_GET[target]'";

		$salso = mysql_query($query) or die(mysql_error());
		while($list = mysql_fetch_array($salso)){
			$txt = '<li><a href="'.BASE.'subject/'.$list[fan_wid].'/?region='.$list[reg_id].'">'.$list[fan].' в р. '.$list[regname].'</a></li>';
			$txt_uz = '<li><a href="'.BASE.'subject/'.$list[fan_wid].'/?region='.$list[reg_id].'">'.$list[fan.TIL_SFX].' '.$list[regname.TIL_SFX].'да</a></li>';
			$vname = 'txt'.TIL_SFX;
			echo $$vname;
		}
	}
#-------------------------------------------------
	function similar_tutors(){
		$query = "SELECT GROUP_CONCAT(DISTINCT teaching.subject_id SEPARATOR ' OR teaching.subject_id = ') as subs
		FROM tutor
		LEFT JOIN teaching ON tutor.id = teaching.tutor_id
		WHERE tutor.id = '$_GET[target]'";

		$get_subs = mysql_query($query) or die(mysql_error());
		$subs = mysql_fetch_row($get_subs);

		$zapros = "SELECT tutor.*, GROUP_CONCAT(DISTINCT subject.name SEPARATOR ', ') as lessons, GROUP_CONCAT(DISTINCT subject.name_uz SEPARATOR ', ') as lessons_uz
		FROM tutor
		JOIN teaching ON tutor.id = teaching.tutor_id
		JOIN tutor_region ON tutor.id = tutor_region.tutor_id
		JOIN subject ON subject.id = teaching.subject_id
		WHERE NOT tutor.id = '$_GET[target]' AND (teaching.subject_id = $subs[0]) GROUP BY tutor.id ORDER BY RAND() LIMIT 3";

		$get_tutor = mysql_query($zapros) or die(mysql_error());
		while($stutor = mysql_fetch_array($get_tutor)){
			echo '<div class="similar_tutor row">';
			echo '<img src="'.BASE.'img/profile/'.$stutor[image].'" width="60px" height="80px"/>';
			echo '<a href="'.BASE.'profile/'.$stutor[id].'/">'.$stutor[name].'</a>';
			echo '<span>'.$stutor[lessons.TIL_SFX].'</span>';
			echo '</div>';
		}
	}
#-------------------------------------------------
}
?>