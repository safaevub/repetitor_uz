<!DOCTYPE html>
<html>
	<head>
		<?php 
			include_once('head.php');
			$system->include_css($_GET[page]);
		?>
	</head>

	<body>
		<?php include_once('header.php'); ?>

		<?php 
			$system->browse($_GET[page]);
		?>

		<?php 
			include_once('footer.php');
			include_once('scripts.php');
			$system->include_js($_GET[page]);
		?>
		<!-- BEGIN JIVOSITE CODE {literal} -->
		<script type='text/javascript'>
		(function(){ var widget_id = 'Ss4yKKAak2';
		var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
		<!-- {/literal} END JIVOSITE CODE -->
	</body>
</html>