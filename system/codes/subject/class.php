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

						$links = '<span><a href="'.BASE.'">Home</a></span><i>&rarr;</i><span><a href="'.BASE.'subject/'.$target[wordid].'/">'.$target[name.TIL_SFX].'</a></span><i>&rarr;</i><span>'.$item[name.TIL_SFX].'</span>';
					} else{
						header('Location: '.BASE.'subject/'.$target[wordid].'/');
					}
				} else{
					$links = '<span><a href="'.BASE.'">Home</a></span><i>&rarr;</i><span>'.$target[name.TIL_SFX].'</span>';
				}

				echo '<section id="breadcrumb" class="wrapper">'.$links.'</section>';
			} else{
				include('./system/core/404.php');
				include('./system/core/footer.php');
				include('./system/core/scripts.php');
				exit;
			}
		} else{
			// include('./system/core/404.php');
			// include('./system/core/footer.php');
			// exit;
		}
	}
#-------------------------------------------------
	function show_sub_head(){
		if(isset($_GET[target]) && !empty($_GET[target])){
			if(isset($_GET[item]) && !empty($_GET[item])){
				$get_item = mysql_query("SELECT * FROM lesson WHERE wordid = '$_GET[item]'") or die(mysql_error());
				if(mysql_num_rows($get_item) > 0){
					$item = mysql_fetch_array($get_item);
					echo '<h2>'.$item[name.TIL_SFX].'</h2>';

					$get_subject = mysql_query("SELECT * FROM subject WHERE id = '$item[subject_id]'") or die(mysql_error());
					$subject = mysql_fetch_array($get_subject);

					$get_lessons = mysql_query("SELECT * FROM lesson WHERE NOT id = '$item[id]' AND subject_id = '$item[subject_id]' ORDER BY id") or die(mysql_error());
					if(mysql_num_rows($get_lessons) > 0){
						echo '<div id="lessons">';
						while($lesson = mysql_fetch_array($get_lessons)){
							echo '<span><a href="'.BASE.'subject/'.$subject[wordid].'/'.$lesson[wordid].'/">'.$lesson[name.TIL_SFX].'</a></span>&nbsp;';
						}
						echo '</div>';
					}
				} else{
					header('Location: '.BASE.'subject/'.$_GET[target].'/');
				}
			} else{
				$get_target = mysql_query("SELECT * FROM subject WHERE wordid = '$_GET[target]'") or die(mysql_error());
				$target = mysql_fetch_array($get_target);
				echo '<h2>'.$target[name.TIL_SFX].'</h2>';

				$get_lessons = mysql_query("SELECT * FROM lesson WHERE subject_id = '$target[id]' ORDER BY id") or die(mysql_error());
				if(mysql_num_rows($get_lessons) > 0){
					echo '<div id="lessons">';
					while($lesson = mysql_fetch_array($get_lessons)){
						echo '<span><a href="'.BASE.'subject/'.$target[wordid].'/'.$lesson[wordid].'/">'.$lesson[name.TIL_SFX].'</a></span>&nbsp;';
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
			echo '<li><a href="'.BASE.'subject/'.$subject[wordid].'/">'.$subject[name.TIL_SFX].'</a></li>';
		}
	}
#-------------------------------------------------
	function current_subject(){
		if(isset($_GET[target]) && !empty($_GET[target])){
			if(isset($_GET[item]) && !empty($_GET[item])){
				$get_item = mysql_query("SELECT * FROM lesson WHERE wordid = '$_GET[item]'") or die(mysql_error());
				$item = mysql_fetch_array($get_item);
				return $item[name.TIL_SFX];
			} else{
				$get_subject = mysql_query("SELECT * FROM subject WHERE wordid = '$_GET[target]'") or die(mysql_error());
				$subject = mysql_fetch_array($get_subject);
				return $subject[name.TIL_SFX];
			}
		}
	}
#-------------------------------------------------
	function subject_list(){
		$get_sub_list = mysql_query("SELECT * FROM subject ORDER BY id") or die(mysql_error());
		echo '<ul class="nostyle">';
		while($subject = mysql_fetch_array($get_sub_list)){
			echo '<li><a href="'.BASE.'subject/'.$subject[wordid].'">'.$subject[name.TIL_SFX].'</a></li>';
		}
		echo '</ul>';
	}	
#-------------------------------------------------
	function lesson_list(){
		$get_lesson_list = mysql_query("SELECT * FROM lesson ORDER BY id") or die(mysql_error());
		echo '<ul class="nostyle lesson">';
		while($lesson = mysql_fetch_array($get_lesson_list)){
			$get_sub = mysql_query("SELECT * FROM subject WHERE id = '$lesson[subject_id]'") or die(mysql_error());
			$sub = mysql_fetch_array($get_sub);
			echo '<li><a href="'.BASE.'subject/'.$sub[wordid].'/'.$lesson[wordid].'/">'.$lesson[name.TIL_SFX].'</a></li>';
		}
		echo '</ul>';
	}
#-------------------------------------------------
	function region_option($loc_id) {
		$get_region_list = mysql_query("SELECT * FROM region WHERE location_id = ".$loc_id." ORDER BY order_by");
		while($region_list = mysql_fetch_array($get_region_list)){
			if(isset($_GET[region]) && $_GET[region] == $region_list[id]){
				echo '<option value="'.$region_list[id].'" selected>'.$region_list[name.TIL_SFX].'</option>';
			} else{
				echo '<option value="'.$region_list[id].'">'.$region_list[name.TIL_SFX].'</option>';
			}
		}
	}
#-------------------------------------------------
	function teach_place(){
		$both = '<li><label><input type="radio" name="place" value="BOTH"/> At me or the tutor</label></li>';
		$home = '<li><label><input type="radio" name="place" value="HOME"/> At me</label></li>';
		$away = '<li><label><input type="radio" name="place" value="AWAY"/> At the tutor</label></li>';
		
		if(isset($_GET['place'])){
			if($_GET['place'] == 'HOME'){
				$home = '<li><label><input type="radio" name="place" value="HOME" checked="checked"/> At me</label></li>';
			} elseif($_GET['place'] == 'AWAY'){
				$away = '<li><label><input type="radio" name="place" value="AWAY" checked="checked"/> At the tutor</label></li>';
			} else{
				$both = '<li><label><input type="radio" name="place" value="BOTH" checked="checked"/> At me or the tutor</label></li>';
			}
		} else{
			$both = '<li><label><input type="radio" name="place" value="BOTH" checked="checked"/> At me or at the tutor </label></li>';
		}

		echo $both . $home . $away;
	}
#-------------------------------------------------
	function teach_lang(){
		$uz = '<li><label><input type="radio" name="lang" value="UZ"/> English</label></li>';
		$ru = '<li><label><input type="radio" name="lang" value="RU"/> Russian</label></li>';
		$both = '<li><label><input type="radio" name="lang" value="BOTH"/> English and Russian</label></li>';
		
		if(isset($_GET['lang'])){
			if($_GET['lang'] == 'UZ'){
				$uz = '<li><label><input type="radio" name="teach_lang" value="UZ" checked="checked"/> English</label></li>';
			} elseif($_GET['lang'] == 'RU'){
				$ru = '<li><label><input type="radio" name="lang" value="RU" checked="checked"/> Russian</label></li>';
			} else{
				$both = '<li><label><input type="radio" name="lang" value="BOTH" checked="checked"/> English and Russian</label></li>';
			}
		} else{
			$both = '<li><label><input type="radio" name="lang" value="BOTH" checked="checked"/> English and Russian</label></li>';
		}

		echo $uz . $ru . $both;
	}
#-------------------------------------------------
	function edu_levels() {
		$edu_levels = mysql_query("SELECT * FROM education ORDER BY order_by");
		while($edu_level = mysql_fetch_assoc($edu_levels)){
			if(isset($_GET[edu_level]) && $_GET[edu_level] == $edu_level['id']){
				echo '<li><label><input type="radio" name="edu_level" value="'.$edu_level['id'].'" checked/> '.$edu_level['name'.TIL_SFX].'</label></li>';
			} else{
				echo '<li><label><input type="radio" name="edu_level" value="'.$edu_level['id'].'"/> '.$edu_level['name'.TIL_SFX].'</label></li>';
			}
		}
	}
#-------------------------------------------------
	function experience() {
		$experiences = mysql_query("SELECT * FROM experience ORDER BY order_by");
		while($experience = mysql_fetch_assoc($experiences)){
			if(isset($_GET[exp]) && $_GET[exp] == $experience['id']){
				echo '<li><label><input type="radio" name="exp" value="'.$experience['id'].'" checked/> '.$experience['name'].'</label></li>';
			} else{
				echo '<li><label><input type="radio" name="exp" value="'.$experience['id'].'"/> '.$experience['name'].'</label></li>';
			}
		}
	}
#-------------------------------------------------
	function price_group() {
		$price_groups = mysql_query("SELECT * FROM price_group ORDER BY order_by");
		while($price_group = mysql_fetch_assoc($price_groups)){
			if(isset($_GET[price]) && $_GET[price] == $price_group['id']){
				echo '<li><label><input type="radio" name="price" value="'.$price_group['id'].'" checked/> '.$price_group['name'].'</label></li>';
			} else{
				echo '<li><label><input type="radio" name="price" value="'.$price_group['id'].'"/> '.$price_group['name'].'</label></li>';
			}
		}
	}

#-------------------------------------------------
	function show_gender(){
		$male = '<li><label><input type="radio" name="gender" value="MALE"/> Male</label></li>';
		$female = '<li><label><input type="radio" name="gender" value="FEMALE"/> Female</label></li>';
		
		if(isset($_GET['gender'])){
			if($_GET['gender'] == 'MALE'){
				$male = '<li><label><input type="radio" name="gender" value="MALE" checked/> Мale</label></li>';
			} elseif($_GET['gender'] == 'FEMALE'){
				$female = '<li><label><input type="radio" name="gender" value="FEMALE" checked/> Female</label></li>';
			}
		}

		echo $male . $female;
	}
#-------------------------------------------------
	function tutor_list($location_id){
		//Get tutors who teach selected subject and lesson
		if(isset($_GET['target'])){
			if(isset($_GET['item'])){
				$get_lesson = mysql_query("SELECT * FROM lesson WHERE wordid = '$_GET[item]'") or die(mysql_error());
				$lesson = mysql_fetch_array($get_lesson);

				$condition = "teaching.lesson_id = '$lesson[id]' AND ";
			} else{
				$get_subject = mysql_query("SELECT * FROM subject WHERE wordid = '$_GET[target]'") or die(mysql_error());
				$subject = mysql_fetch_array($get_subject);

				$condition = "teaching.subject_id = '$subject[id]' AND ";
			}
		}

		//Get tutors from given location
		//and with preferred teaching locations
		if(isset($_GET['region']) && $_GET['region'] != 0){
			if(isset($_GET['place']) && $_GET['place'] != 'BOTH'){
				if($_GET['place'] == 'HOME'){
					$condition .= "tutor_region.region_id = '$_GET[region]'";
				} elseif($_GET['place'] == 'AWAY'){
					$condition .= "(tutor.living_region_id = '$_GET[region]' AND NOT tutor.to_home = 'AWAY')";
				} else{
					$condition .= "(tutor.living_region_id = '$_GET[region]' OR tutor_region.region_id = '$_GET[region]')";
				}
			} else{
				$condition .= "(tutor.living_region_id = '$_GET[region]' OR tutor_region.region_id = '$_GET[region]')";
			}
		} else{
			if(isset($_GET['place']) && $_GET['place'] != 'BOTH'){
				if($_GET['place'] == 'HOME'){
					$condition .= "tutor.location_id = '$location_id' AND NOT tutor.to_home = 'HOME'";
				} elseif($_GET['place'] == 'AWAY'){
					$condition .= "tutor.location_id = '$location_id' AND NOT tutor.to_home = 'AWAY'";
				} else{
					$condition .= "tutor.location_id = '$location_id'";
				}
			} else{
				$condition .= "tutor.location_id = '$location_id'";
			}
		}

		//Get tutors who teach in a given language
		if(isset($_GET['lang']) && $_GET['lang'] == 'UZ'){
			$condition .= " AND (tutor.teach_lang = 'UZ' OR tutor.teach_lang = 'BOTH')";
		} elseif(isset($_GET['lang']) && $_GET['lang'] == 'RU'){
			$condition .= " AND (tutor.teach_lang = 'RU' OR tutor.teach_lang = 'BOTH')";
		}

		//Get tutors with given education
		if(isset($_GET['edu_level']) && is_numeric($_GET['edu_level'])){
			$condition .= " AND tutor.edu_level = '$_GET[edu_level]'";
		}

		//Get tutors who has given experience
		if(isset($_GET['exp']) && is_numeric($_GET['exp'])){
			$condition .= " AND teaching.experience = '$_GET[exp]'";
		}

		//Get tutors who match given price group
		if(isset($_GET['price']) && is_numeric($_GET['price'])){
			$condition .= " AND teaching.price_group = '$_GET[price]'";
		}

		//Get tutors who match given gender
		if(isset($_GET['gender']) && !empty($_GET['gender'])){
			$condition .= " AND tutor.gender = '$_GET[gender]'";
		}

		$zapros = "SELECT tutor.*, GROUP_CONCAT(DISTINCT subject.name SEPARATOR ', ') as lessons, COUNT(DISTINCT tutor_review.id) as review_count
		FROM tutor
		JOIN teaching ON tutor.id = teaching.tutor_id
		JOIN subject ON subject.id = teaching.subject_id
		LEFT JOIN tutor_region ON tutor.id = tutor_region.tutor_id
		LEFT JOIN tutor_review ON tutor.id = tutor_review.tutor_id
		WHERE $condition GROUP BY tutor.id ORDER BY tutor.id";

		$return = $this->paginate($zapros, 10);

		$q = $return['query'];
		$query = mysql_query($q) or die(mysql_error());

		$result['query'] = $query;
		$result['pages'] = $return['pages'];

		return $result;
	}
#-------------------------------------------------
	function get_location($tutor_id){
		$query = "SELECT r1.name as region, GROUP_CONCAT(r2.name SEPARATOR ', ') as viezd
		FROM tutor
		LEFT JOIN tutor_region ON tutor.id = tutor_region.tutor_id
		LEFT JOIN region r1 ON tutor.living_region_id = r1.id
		LEFT JOIN region r2 ON tutor_region.region_id = r2.id
		WHERE tutor.id = '$tutor_id'";

		$location_list = mysql_query($query) or die(mysql_error());
		return $location_list;
	}
#-------------------------------------------------
	function get_lessons($tutor_id){
		if(isset($_GET['target'])){
			$get_subject = mysql_query("SELECT * FROM subject WHERE wordid = '$_GET[target]'") or die(mysql_error());
			$subject = mysql_fetch_array($get_subject);
			$condition = "AND teaching.subject_id = '$subject[id]'";
		} elseif(isset($_GET['item'])){
			$get_lesson = mysql_query("SELECT * FROM lesson WHERE wordid = '$_GET[item]'") or die(mysql_error());
			$lesson = mysql_fetch_array($get_lesson);
			$condition = "AND teaching.lesson_id = '$lesson[id]'";
		}

		$query = "SELECT teaching.*, subject.name as fan, lesson.name as dars
		FROM teaching
		JOIN subject ON teaching.subject_id = subject.id
		LEFT JOIN lesson ON teaching.lesson_id = lesson.id
		WHERE teaching.tutor_id = '$tutor_id' $condition ORDER BY teaching.subject_id LIMIT 3";

		$lesson_list = mysql_query($query) or die(mysql_error());
		return $lesson_list;
	}
#-------------------------------------------------
	function lesson_count($tutor_id){
		$total_lessons = mysql_query("SELECT COUNT(teaching.id) as les_count FROM teaching WHERE tutor_id = '$tutor_id'") or die(mysql_error());
		$count = mysql_fetch_array($total_lessons);
		return $count['les_count'];
	}
#-------------------------------------------------
	function paginate($zapros, $limit){
		//EXECUTE QUERY
		$query = mysql_query($zapros) or die(mysql_error());
		$num_rows = mysql_num_rows($query);

		if(!isset($_GET[pg]) || !is_numeric($_GET[pg]) || $_GET[pg] == 0){
			$page = 1;
		} else{
			$page = $_GET[pg];
		}

		$pages = ceil($num_rows/$limit);

		//GENERATE QUERY LIMIT
		$limit_from = ($page - 1)*$limit;

		$zapros .= " LIMIT $limit_from, $limit";
		$return['query'] = $zapros;

		//GET URL
		$qstring = $_SERVER[QUERY_STRING];
		parse_str($qstring, $qs_array);
		foreach($qs_array as $key=>$val){
			if($key != "page" && $key != "target" && $key != "item" && $key != "pg"){
				$new_arr[$key] = $val;
			}
		}

		//GENERATE URL LINK
		if(!empty($new_arr)){
			$c = 0;
			$link = parse_url($_SERVER[REQUEST_URI], PHP_URL_PATH);
			
			foreach($new_arr as $key=>$val){
				if($c == 0){
					$link .= '?'.$key.'='.$val;
				} else{
					$link .= '&'.$key.'='.$val;
				}

				$c += 1;
			}

			$link .= "&";
		} else{
			$link = parse_url($_SERVER[REQUEST_URI], PHP_URL_PATH).'?';
		}

		$ul_pages = '<div id="page_cont"><ul class="pagination">';

		if(isset($_GET[pg])){
			$pg = $_GET[pg];
		} else{
			$pg = 1;
		}
		
		//CONSTRUCT PAGINATION PREVIOUS BUTTON
		if($pg == 1){
			$ul_pages .= '<li class="disabled"><a href="#">&laquo;</a></li>';	
		} else{
			$prev = $pg - 1;
			$ul_pages .= '<li><a href="'.$link.'pg='.$prev.'">&laquo;</a></li>';	
		}

		//SEARCHING IF PAGES ARE TOO MANY
		//IF SO, GENERATE ONLY 6 PAGES AROUND CURRENT PAGE
		if($pages > 7){
			if($pg == 1){
				$first_pg = 1;
				$loop_end = 7;
			} else{
				$pages_before = $pg - 1;
				$pages_after = $pages - $pg;

				if($pages_before <= 3){
					$pages_after = 6 - $pages_before;
				} elseif ($pages_after <= 3) {
					$pages_before = 6 - $pages_after;
				} else{
					$pages_before = 3;
					$pages_after = 3;
				}

				$first_pg = $pg - $pages_before;
				$loop_end = $pg + $pages_after;
			}
		} else{
			$first_pg = 1;
			$loop_end = $pages;
		}

		//GENERATE PAGES
		for($i = $first_pg; $i <= $loop_end; $i++){
			if($pg == $i){
				$ul_pages .= '<li class="active"><a href="#">'.$i.'</a></li>';
			} else{
				$ul_pages .= '<li><a href="'.$link.'pg='.$i.'">'.$i.'</a></li>';
			}
		}

		//CONSTRUCT PAGINATION NEXT BUTTON
		if($pg == $pages){
			$ul_pages .= '<li class="disabled"><a href="#">&raquo;</a></li></ul></div>';
		} else{
			$next = $pg + 1;
			$ul_pages .= '<li><a href="'.$link.'pg='.$next.'">&raquo;</a></li></ul></div>';
		}

		$return['pages'] = $ul_pages;

		return $return;
	}
#-------------------------------------------------
}
?>