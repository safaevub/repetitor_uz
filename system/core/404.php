<link href="<?=BASE?>lib/css/index.css" rel="stylesheet">
<link href="<?=BASE?>lib/css/404.css" rel="stylesheet">
<section id="not_found" class="full">
	<h2>Nothing found on your request</h2>
	<p>Try to choose a suitable category or <a href="#order_form">	Leave an order </a>, And we will select a specialist according to your criteria.</p>
</section>

<section id="order_form" class="full">
	<div class="wrapper">
		<h2>Help in selection</h2>
		<p>Fill out the application and the administrator will contact you and recommend a professional according to your criteria.</p>
		<div id="form">
			<h4>Who are you looking for? With what it is necessary to help?</h4>
			<form action="<?=BASE?>order/" method="post">
				<textarea class="input" name="comment" cols="80" rows="6"></textarea>
				<input type="text" name="name" class="input" placeholder="Your name"/>
				<input type="text" name="phone" class="input" placeholder="Your number"/>
				<input type="submit" name="order" value="Select" class="input button"/>	
			</form>
			<p>Sending the application, I confirm my acquaintance and consent with<a href="#">Terms of Use</a> completely.</p>
		</div>
	</div>
</section>