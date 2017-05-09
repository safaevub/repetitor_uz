<?php
include('class.php');
$order = new Order;
$order->send_order();
?>
<section id="content" class="wrapper row">
	<section id="article" class="grid block">		
		<h2>Leave the contact details and briefly describe the task</h2>
		<?php
			$order->show_cart();
			echo $order->message;
		?>
		<form action="<?=BASE?>order/" method="post">
			<table id="order" cellpadding="0" cellspacing="0">
				<tr>
					<th colspan="2">Your contacts</th>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" class="input" value="<?=$order->input_data[name]?>"/></td>
				</tr>

				<tr>
					<td>Number</td>
					<td><input type="text" name="phone" class="input" value="<?=$order->input_data[phone]?>"/></td>
				</tr>

				<tr>
					<td>Email</td>
					<td><input type="text" name="email" class="input"/></td>
				</tr>

				<tr>
					<th colspan="2">Comments on the application</th>
				</tr>

				<tr>
					<td colspan="2"><textarea name="comment" class="input" cols="60" rows="6"><?=$order->input_data[comment]?></textarea></td>
				</tr>

				<tr>
					<td colspan="2"><input type="submit" name="place_order" value="Send" class="input button"/></td>
				</tr>
			</table>
		</form>
	</section>

	<section id="side" class="grid sright block">
		<ul id="side_menu" class="nostyle">
			<li><a href="<?=BASE?>about/">About Company</a></li>
			<li><a href="<?=BASE?>terms/">Terms of Use</a></li>
			<li><a href="<?=BASE?>contact/">Contact</a></li>
			<li><a href="<?=BASE?>sitemap/">Site Map</a></li>
			<li class="border"></li>
			<li>Free selection</li>
			<!-- <li><a href="<?=BASE?>register/">Стать специалистом</a></li> -->
		</ul>
	</section>
</section>