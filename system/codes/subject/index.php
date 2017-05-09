<?php
include('class.php');
$subject = new Subject;

$subject->show_breadcrumb();
?>

	<section id="category_head" class="wrapper">
		<!-- <h3>1 482 репетиторов</h3> -->
		<?php
			$subject->show_sub_head();
		?>
	</section>

	<section id="free_select" class="wrapper">
		<div id="form" class="row block">
			<div class="grid grid-3">
				Free selection of the tutor
			</div>

			<div class="grid grid-9">
				<form action="<?=BASE?>order/" method="post">
					<input type="text" name="name" class="input" placeholder="Your name"/>
					<input type="text" name="phone" class="input" placeholder="Your number"/>
					<input type="submit" name="order" value="Select" class="input button"/>
				</form>
			</div>

			<div class="grid grid-12">Sending the application, I confirm my acquaintance and consent with <a href="#">Terms of Use</a> completely </div>
		</div>
	</section>

	<section id="content" class="wrapper row">
		<section id="side" class="grid sleft">
			<form role="form" action="" method="get">
				<div id="param" class="block">
					<h4>Subject</h4>
					<!-- <input type="text" class="input" disabled placeholder="English"/> -->
					<div class="drop_cont">
						<input type="text" id="subject" class="input drop_trigger" autocomplete="off" value="<?=$subject->current_subject()?>" text="<?=$subject->current_subject()?>" placeholder="Choose subject"/>
						<div class="drop subject">
							<?php
								$subject->subject_list();
								$subject->lesson_list();
							?>
							<span id="nfound">Try changing request</span>
						</div>
					</div>
					<h4>District</h4>
					<!-- <input type="text" class="input" placeholder="Choose district"/> -->
					<select name="region" class="input">
						<option value="">Any district</option>
						<?php $subject->region_option($this->get_location()); ?>
					</select>

					<ul id="to_home" class="nostyle">
						<?php $subject->teach_place();?>
					</ul>

					<ul id="to_home" class="nostyle">
						<li><h4>Language Teaching</h4></li>
						<?php $subject->teach_lang();?>
					</ul>

					<ul class="nostyle toggle">
						<li><h4>Language Teaching</h4></li>
						<?php $subject->edu_levels(); ?>
					</ul>

					<ul class="nostyle toggle">
						<li><h4>Experience, practice</h4></li>
						<?php $subject->experience(); ?>
					</ul>

					<ul class="nostyle toggle">
						<li><h4>Cost</h4></li>
						<?php $subject->price_group(); ?>
					</ul>

					<ul class="nostyle toggle">
						<li><h4>Gender of tutor</h4></li>
						<?php $subject->show_gender(); ?>
					</ul>
					<button type="submit" class="input button">Search</button>
					<div id="toggle_button">
						More options 
					</div>
				</div>
			</form>
			<div id="rec_subjects">
				<h3>See also</h3>
				<ul class="nostyle">
					<?php
						$subject->show_similar_subjects();
					?>
				</ul>
			</div>

			<div class="sticky">
				<div id="podbor" class="block">
					<h3>Need help selecting a tutor?</h3>
					<p>Leave your phone, we will call back within 15 minutes and get you an ideal candidate for free.</p>
					<span class="btn btn-yellow"><a href="<?=BASE?>order/">Pick me a tutor</a></span>
				</div>
				<div id="up">
					<span><i class="lnr lnr-arrow-up"></i></span>
				</div>
			</div>
		</section>

		<section id="tutors" class="grid">
			<div class="block">
				<?php
					$result = $subject->tutor_list($this->get_location());
					
					$pages = $result['pages'];
					$query = $result['query'];
					
					$num_rows = mysql_num_rows($query);

					if($num_rows > 0){
						while($tutor = mysql_fetch_array($query)){
							if(isset($_COOKIE['tutor'][$tutor[id]])){
								$btn_class = 'disabled';
							} else{
								$btn_class = '';
							}
				?>
				<div id="tutor" class="row">
					<div id="tinfo" class="grid grid-8">
						<div id="tutor_head" class="row">
							<img src="<?=BASE?>img/profile/<?=$tutor['image']?>" width="90px" height="120px" alt="<?=$tutor['name']?> (<?=$tutor['lessons']?>)" title="<?=$tutor['name']?> (<?=$tutor['lessons']?>)"/>
							<a href="<?=BASE?>profile/<?=$tutor['id']?>/"><?=$tutor['name']?></a>
							<span><?=$tutor['lessons']?></span>
						</div>
						<div id="tutor_edu">
							<h4>Education and experience</h4>
							<p><?=$tutor['edu']?></p>
							<p><?=$tutor['exp']?></p>
						</div>
						<div id="tutor_price">
							<h4>Cost</h4>
							<table cellpadding="0" cellspacing="0">
							<?php
								$lesson_list = $subject->get_lessons($tutor['id']);
								while($lesson = mysql_fetch_array($lesson_list)){
									echo '<tr><td>'.(empty($lesson['dars'])?$lesson['fan']:$lesson['dars']).'</td><td>'.number_format($lesson['price'], 0).' / '.$lesson['lesson_duration'].' min.</td></tr>';
								}
							?>
							</table>
							<a href="<?=BASE?>profile/<?=$tutor['id']?>/" class="expand">All services and prices (<?=$subject->lesson_count($tutor['id'])?>)</a>
						</div>
					</div>
					<div id="tside" class="grid grid-4">
						<span id="tutor_select" class="btn btn-blue <?=$btn_class?>"><a href="#" item="<?=$tutor['id']?>">Choose</a></span>
						<div id="rating">
							<span><i><?=(empty($tutor['rating'])?'--':$tutor['rating'])?></i> Rating</span>
							<span><i><?=$tutor['review_count']?></i> Feedback</span>
						</div>
						<div id="checks">
							<ul class="nostyle">
								<li><i class="glyphicons glyphicons-ok"></i> Interview completed</li>
								<li><i class="glyphicons glyphicons-ok"></i> Data checked</li>
							</ul>
						</div>
					<?php
						$loc = mysql_fetch_array($subject->get_location($tutor['id']));
					?>
						<div id="location">
							<h4>District</h4>
							<?=$loc['region']?>
							<h4>Departure to the student</h4>
							<?=$loc['viezd']?>
						</div>
					</div>
				</div>
				<?php } } else{ ?>
				
				<div class="empty_result">
					<i class="ton-li-id"></i>
					<p>Tutors not found. Try different search criteria.</p>
				</div>
				<?php } ?>
			</div>
			<?php
				if($num_rows > 0){
					echo $pages;
				}
			?>
			<!-- <span id="show_more" class="btn btn-blue"><a href="#"><i class="lnr lnr-sync"></i>&nbsp; Show more</a></span> -->
		</section>
	</section>