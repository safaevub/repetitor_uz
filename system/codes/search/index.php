<?php
include('class.php');
$search = new Search;
$search->handle_search();
?>
<link href="<?=BASE?>lib/css/index.css" rel="stylesheet">
<link href="<?=BASE?>lib/css/404.css" rel="stylesheet">
<section id="not_found" class="full">
	<h2>According to your request<?=$search->query?> Nothing found</h2>
	<p>Try to choose a suitable category or<a href="#">Leave an order</a>, And we will select a specialist according to your criteria.
</p>
</section>

<section id="order_form" class="full">
	<div class="wrapper">
		<h2>Help in selection</h2>
		<p>Fill out an application, and the administrator will contact you and recommend a professional according to your criteria.</p>
		<div id="form">
			<h4>Who are you looking for? With what it is necessary to help?</h4>
			<textarea class="input" cols="80" rows="6"></textarea>
			<input type="text" class="input" placeholder="Your name"/>
			<input type="text" class="input" placeholder="Your number"/>
			<input type="submit" value="Подобрать" class="input button"/>
			<p>Sending the application, I confirm my acquaintance and consent with <a href="#">Terms of Use</a> Completely</p>
		</div>
	</div>
</section>