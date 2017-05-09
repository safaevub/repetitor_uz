<?php
class Search{
var $query;
#-------------------------------------------------
	function handle_search(){
		if(isset($_POST[table]) && ($_POST[table] == "subject" || $_POST[table] == "lesson")){
			if(isset($_POST[category]) && is_numeric($_POST[category])){
				if(isset($_POST[region]) && is_numeric($_POST[region]) && $_POST[region] != 0){
					$qstring = '?region='.$_POST[region];
				}

				if($_POST[table] == "subject"){
					$get_subject = mysql_query("SELECT * FROM subject WHERE id = '$_POST[category]'") or die(mysql_error());
					if(mysql_num_rows($get_subject) > 0){
						$subject = mysql_fetch_array($get_subject);
						header('Location: '.BASE.'subject/'.$subject[wordid].'/'.$qstring);
					}
				} else{
					$get_lesson = mysql_query("SELECT * FROM lesson WHERE id = '$_POST[category]'") or die(mysql_error());
					if(mysql_num_rows($get_lesson) > 0){
						$lesson = mysql_fetch_array($get_lesson);
						$get_subject = mysql_query("SELECT * FROM subject WHERE id = '$lesson[subject_id]'") or die(mysql_error());
						$subject = mysql_fetch_array($get_subject);
						header('Location: '.BASE.'subject/'.$subject[wordid].'/'.$lesson[wordid].'/'.$qstring);
					}
				}
			}
		}

		if(!empty($_POST[query])){
			$query = htmlspecialchars($_POST[query]);
			$this->query = '"<b>'.$query.'</b>"';
		}
	}
#-------------------------------------------------
}
?>