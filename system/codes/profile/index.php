<?php
include('class.php');
$profile = new Profile;
$tutor = $profile->get_tutor();

if(empty($tutor[name])){
	include('./system/core/404.php');
	include('./system/core/footer.php');
	include('./system/core/scripts.php');
	exit;
}

if(isset($_COOKIE['tutor'][$tutor[id]])){
	$btn_class = 'disabled';
} else{
	$btn_class = '';
}
?>
<section id="breadcrumb" class="wrapper">
	<span><a href="<?=BASE?>">Home</a></span><i>&rarr;</i><span><?=$tutor[name]?></span>
</section>

<section id="content" class="profile wrapper row">
	<section id="profile" class="grid block">
		<div id="profile_head" class="row">
			<img src="<?=BASE?>img/profile/<?=$tutor[image]?>" class="avatar" width="130px" height="174px" alt="<?=$tutor['name']?> (<?=$tutor['lessons.TIL_SFX']?>)" title="<?=$tutor['name']?> (<?=$tutor['lessons.TIL_SFX']?>)"/>
			<h2><?=$tutor[name]?></h2>
			<span><?=$tutor[lessons.TIL_SFX]?></span>
			<div id="checks">
				<span><i class="glyphicons glyphicons-ok"></i> Interview completed</span>
				<span><i class="glyphicons glyphicons-ok"></i> Data checked</span>
				<span><i class="glyphicons glyphicons-ok"></i> Video call</span>
				<span><i class="glyphicons glyphicons-ok"></i> Registered in 2011</span>
			</div>
		</div>
		
		<div id="pinfo">
			<div class="group">
				<h3><i class="glyphicons glyphicons-usd"></i> Services and prices</h3>
				<table cellpadding="0" cellspacing="0">
					<?php
						$lesson_list = $profile->get_lessons();
						$headers = array();
						while($lesson = mysql_fetch_array($lesson_list)){
							echo '<tr><td>'.(empty($lesson['dars'.TIL_SFX])? $lesson['fan'.TIL_SFX] : $lesson['dars'.TIL_SFX]).'</td><td>'.number_format($lesson[price], 0).' сўм  / '.$lesson[lesson_duration].' мин.</td></tr>';
						}
					?>
				</table>
			</div>
			
			<div class="group">
				<h3><i class="glyphicons glyphicons-book_open"></i> Education</h3>
				<p><?=$tutor['edu'.TIL_SFX]?></p>
			</div>

			<div class="group">
				<h3><i class="glyphicons glyphicons-briefcase"></i> Experience</h3>
				<p><?=$tutor['exp'.TIL_SFX]?></p>
			</div>
			
			<?php if(!empty($tutor['fact'.TIL_SFX])){ ?>

			<div class="group">
				<h3><i class="glyphicons glyphicons-notes"></i> Facts</h3>
				<p><?=$tutor['fact'.TIL_SFX]?></p>
			</div>

			<?php } ?>

			<?php if(!empty($tutor['info'.TIL_SFX])){ ?>

			<div class="group">
				<h3><i class="glyphicons glyphicons-suitcase"></i> Additional informations </h3>
				<p><?=$tutor['info'.TIL_SFX]?></p>
			</div>

			<?php } ?>
		</div>
	</section>

	<section id="side" class="grid sright">
		<span id="tutor_select" class="btn btn-blue <?=$btn_class?>"><a href="#" item="<?=$tutor['id']?>">Choose</a></span>
		<div id="rating">
			<span><i><?=(empty($tutor['rating'])?'--':$tutor['rating'])?></i> Rating</span>
			<span><i><?=$tutor['review_count']?></i> Feedback</span>
		</div>
		<?php
			$loc = mysql_fetch_array($profile->get_location());
		?>
		<div class="group">
			<h3>Location:</h3>
			<p><b>District:</b> <?=$loc[region.TIL_SFX]?></p>
			<p><b>Departure to the student:</b> <?=$loc[viezd.TIL_SFX]?></p>
		</div>

		<div class="group tutor_docs">
			<h3>Certificates and documents</h3>
			<?php
				$profile->get_docs();
			?>
		</div>

		<div class="group">
			<h3>Tell a tutor</h3>
			<div class="social-likes" data-counters="no" data-title="I recommend a specialist on Profi.ru: <?=$tutor[name]?> (<?=$tutor[lessons.TIL_SFX]?>).">
				<div class="facebook" title="Share on Facebook">&nbsp;</div>
				<div class="twitter" title="Share this link on Twitter">&nbsp;</div>
				<div class="mailru" title="Share link in My world">&nbsp;</div>
				<div class="vkontakte" title="Share link to Vkontakte">&nbsp;</div>
				<div class="odnoklassniki" title="Share link in Classmates">&nbsp;</div>
				<div class="plusone" title="Share link in Google Plus">&nbsp;</div>
			</div>
		</div>

		<div class="group">
			<h3>See also</h3>
			<ul class="nostyle">
				<?php
					$profile->see_also();
				?>
			</ul>
		</div>

		<div class="group">
			<h3>You may be interested in</h3>
			<?php
				$profile->similar_tutors();
			?>
		</div>
	</section>
</section>