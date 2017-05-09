<?php
class Order{

var $message;
var $input_data;
#-------------------------------------------------
	function send_order(){
		if(isset($_POST['place_order'])){
			$name1 = preg_replace('/<.*?>.*?<\/.*?>/is', '', $_POST['name']);
			$name = mysql_real_escape_string($name1);

			$phone1 = preg_replace('/<.*?>.*?<\/.*?>/is', '', $_POST['phone']);
			$phone = mysql_real_escape_string($phone1);

			$comment1 = preg_replace('/<.*?>.*?<\/.*?>/is', '', $_POST['comment']);
			$comment = mysql_real_escape_string($comment1);

			$email1 = preg_replace('/<.*?>.*?<\/.*?>/is', '', $_POST['email']);
			$email = mysql_real_escape_string($email1);

			if(isset($_POST['name']) && !empty($name)){
				if(isset($_POST['phone']) && !empty($phone)){
					if(isset($_POST['comment']) && !empty($comment)){
						$date = time();
						
						mysql_query("INSERT INTO orders(name, phone, email, comment, order_date) VALUES ('$name', '$phone', '$email', '$comment', '$date')") or die(mysql_error());
						
						if(isset($_COOKIE['tutor']) && !empty($_COOKIE['tutor'])){
							$order_id = mysql_insert_id();

							foreach($_COOKIE['tutor'] as $key => $val){
								mysql_query("INSERT INTO order_tutors(order_id, tutor_id) VALUES ('$order_id', '$key')") or die(mysql_error());
								setcookie('tutor['.$key.'][img]', null, -1, '/');
								setcookie('tutor['.$key.'][name]', null, -1, '/');
							}
						}

						$this->message = '<p class="msg success">Your order has been placed! We will contact you in 8 hours</p>';
					} else{
						$this->message = '<p class="msg error">Please enter description</p>';
					}
				} else{
					$this->message = '<p class="msg error">Please enter your phone</p>';
				}
			} else{
				$this->message = '<p class="msg error">Please enter your name</p>';
			}
		} elseif(isset($_POST['order'])){
			foreach($_POST as $key=>$val){
				$this->input_data[$key] = $val;
			}
		}
	}
#-------------------------------------------------
	function show_cart(){
		if(isset($_COOKIE['tutor']) && !empty($_COOKIE['tutor'])){
			echo '<div id="cart" class="row">';
			echo '<h3>Выбранные специалисты</h3><p>';

			foreach($_COOKIE['tutor'] as $key => $val){
				$arr = explode(' ', trim($val['name']));

				echo '<span class="tutor">
				<img src="'.BASE.'img/profile/'.$val[img].'" width="30px" height="40px"/>
				<a href="'.BASE.'profile/'.$key.'/">'.$arr[0].' '.$arr[1].'</a>
				<button id="tutor_remove" class="lnr lnr-cross" item="'.$key.'"></button>
				</span>';
			}

			echo '</p></div>';
			}
	}
#-------------------------------------------------
}
?>