<?php
include('class.php');
$sitemap = new SiteMap;
?>
<section id="content" class="wrapper row">
	<section id="article" class="grid block text">		
		<h2>Site Map</h2>
		<?php
			$sitemap->generate_sitemap();
		?>
	</section>

	<section id="side" class="grid sright block">
		<ul id="side_menu" class="nostyle">
			<li><a href="<?=BASE?>about/">About Company</a></li>
			<li><a href="<?=BASE?>terms/">Term of use</a></li>
			<li><a href="<?=BASE?>contact/">Contact</a></li>
			<li>Site Map</li>
			<li class="border"></li>
			<li><a href="<?=BASE?>order/">Free selection</a></li>
			<!-- <li><a href="<?=BASE?>register/">Become an expert</a></li> -->
		</ul>
	</section>
</section>