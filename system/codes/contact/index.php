<?php
// include('class.php');
// $order = new Order;
// $order->send_order();
?>
<style>
	div#contact span{
		display:inline-block;
		color:#333;
		font-size:18px;
		width:40%;
	}

	div#contact span b{
		margin-right:5px;
	}

	table#aloqa{
		width:100%;
	}

	table#aloqa td{
		padding:5px 0;
	}

	table#aloqa td.top{
		vertical-align:top;
	}

	table#aloqa td input[type="text"]{
		width:230px;
	}
</style>
<section id="content" class="wrapper row">
	<section id="article" class="grid block text">		
		<h2>Contact</h2>
		<div id="contact">
			<span><b>Тел.:</b> +998 93 5244334</span>
			<span><b>Email:</b> info@Repetitor.uz</span>
		</div>
		<br/>
		<h3>Feedback</h3>
		<table id="aloqa">
			<tr>
				<td>Name:</td>
				<td><input type="text" class="input"/></td>
			</tr>

			<tr>
				<td>Email:</td>
				<td><input type="text" class="input"/></td>
			</tr>

			<tr>
				<td class="top">Text of message:</td>
				<td><textarea class="input" cols="45" rows="4"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="order" value="Send" class="input button">
				</td>
			</tr>
		</table>
	</section>

	<section id="side" class="grid sright block">
		<ul id="side_menu" class="nostyle">
			<li><a href="<?=BASE?>about/">About Company</li>
			<li><a href="<?=BASE?>terms/">Terms of Use</a></li>
			<li>Contact</a></li>
			<li><a href="<?=BASE?>sitemap/">Site Map</a></li>
			<li class="border"></li>
			<li><a href="<?=BASE?>order/">Free selection</a></li>
			<!-- <li><a href="<?=BASE?>register/">Стать специалистом</a></li> -->
		</ul>
	</section>
</section>