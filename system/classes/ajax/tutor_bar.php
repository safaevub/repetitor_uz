<?php
	include("../config.php");

	if(isset($_POST['action']) && !empty($_POST['action'])){
		if($_POST['action'] == "show"){
			if(isset($_COOKIE['tutor']) && !empty($_COOKIE['tutor'])){
				echo '<section id="selected_tutor" class="full"><div class="wrapper">';

				$count = 0;
				$more = 0;
				foreach($_COOKIE['tutor'] as $key => $val){
					if($count < 3){
						$tlist .= '<span class="tutor">
						<img src="'.BASE.'img/profile/'.$val[img].'" width="35px" height="45px"/>
						<a href="'.BASE.'profile/'.$key.'/">'.$val[name].'</a>
						<button id="tutor_remove" class="lnr lnr-cross" item="'.$key.'"></button>
						</span>';
					} elseif($count >= 3){
						$more++;
					}

					$count++;
				}

				echo '<div class="row"><h3>Selected specialists('.$count.')</h3><span id="remove_all"><a href="#">[Clear]</a></span></div><p class="row">';
				echo $tlist;

				if($count < 3){
					echo '<span class="tutor disabled"><img src="'.BASE.'img/profile/default.jpg" width="35px" height="45px"/><i> You can add one more specialist</i></span>';
				}

				if($more > 0){
					echo '<span class="more_tutors"><i class="lnr lnr-user"></i>Еще '.$more.'</span>';
				}

				echo '<span id="tutor_order" class="btn btn-blue"><a href="'.BASE.'order/">Contact</a></span>';
				echo '</p></div></section>';
			}
		} elseif($_POST['action'] == "set"){
			if(isset($_POST[item]) && is_numeric($_POST[item])){
				$get_tutor = mysql_query("SELECT * FROM tutor WHERE id = '$_POST[item]'") or die(mysql_error());
				if(mysql_num_rows($get_tutor) > 0){
					$tutor = mysql_fetch_array($get_tutor);

					setcookie('tutor['.$tutor[id].'][img]', $tutor[image], time()+3600, '/');
					setcookie('tutor['.$tutor[id].'][name]', $tutor[name], time()+3600, '/');
				}
			}
		} elseif($_POST['action'] == "unset"){
			if(isset($_POST[item]) && is_numeric($_POST[item])){
				$id = $_POST[item];
				// unset($_COOKIE['tutor'][$id]);
				
				setcookie('tutor['.$id.'][img]', null, -1, '/');
				setcookie('tutor['.$id.'][name]', null, -1, '/');
			}
		} elseif($_POST['action'] == "empty_cart"){
			foreach($_COOKIE['tutor'] as $key => $val){
				setcookie('tutor['.$key.'][img]', null, -1, '/');
				setcookie('tutor['.$key.'][name]', null, -1, '/');
			}
		}
	}
?>