<link href="<?=BASE?>lib/css/index.css" rel="stylesheet">
<?php
include('class.php');
$main = new Main;
?>
<section id="hero" class="full">
		<div class="wrapper">
			<div id="search">
				<h2>Choose professionals</h2>
				<div id="form">
					<form action="<?=BASE?>search/" method="post">
						<div class="drop_cont">
							<input type="hidden" name="table"/>
							<input type="hidden" name="category"/>
							<input type="text" id="subject" name="query" class="input drop_trigger" autocomplete="off" placeholder="Enter a specialty or service ..."/>
							<div class="drop subject">
								<?php
									$main->subject_list();
									$main->lesson_list();
								?>
								<span id="nfound">Try changing request</span>
							</div>
						</div>
						
						<div class="drop_cont">
							<input type="hidden" name="region"/>
							<input type="text" id="location" class="input drop_trigger" placeholder="Choose district..."/>
							<div class="drop row region">
								<ul class="nostyle grid grid-6">
									<li><a href="#" rid="0">Any district</a></li>
									<li><a href="#" rid="1">Olmozor district</a></li>
									<li><a href="#" rid="2">Behktemir district</a></li>
									<li><a href="#" rid="3">Mirobod district</a></li>
									<li><a href="#" rid="4">Mirzo Ulugbek district</a></li>
									<li><a href="#" rid="5">Sergeli district</a></li>
								</ul>
								<ul class="nostyle grid grid-6">
									<li><a href="#" rid="6">Uchtepa district</a></li>
									<li><a href="#" rid="7">Yashnaobod district</a></li>
									<li><a href="#" rid="8">Chilonzor district</a></li>
									<li><a href="#" rid="9">Shaykhontoxur district</a></li>
									<li><a href="#" rid="10">Yunusobod district</a></li>
									<li><a href="#" rid="11">Yakkasaroy district</a></li>
								</ul>
							</div>
						</div>
						<input type="submit" value="Find"/>
						<span id="example_subject">Example, <?=$main->example_sub()?></span>
					</form>
				</div>
			</div>
		</div>
	</section>

	<section id="features" class="wrapper row">
		<div class="grid grid-4 row">
			<i class="ton-li-speech-buble-3"></i>
			<span class="title">Authentic Reviews</span>
			<span>"I found good tutor.Thanks to authors of site!!!"-Fazlik</span>
			<span>Good site!!!</span>
			<span>Well done!!!</span>
			
			</div>

		<div class="grid grid-4 row">
			<i class="ton-li-id"></i>
			<span class="title">Verified tutors</span>
			<span>In our site you find professional tutors with many certificates. Most of them are doctor in their sphere.</span>
		</div>

		<div class="grid grid-4 row">
			<i class="ton-li-star-1"></i>
			<span class="title">Selection of specialists</span>
			<span>All professors are selected from top universities of Uzbeksistan. All of them have huge experience.</span>
		</div>
	</section>

	<section id="subjects" class="full">
		<div class="wrapper">
			<h2>Tutors Repetitor.uz in Tashkent</h2>

			<div class="row">
				<?php
					$main->show_subjects();
				?>
			</div>
		</div>
	</section>

	<section id="how_it_works" class="wrapper">
		<h2>How it works?</h2>
		<table>
			<tr>
				<td class="step"><span>1 <img src="<?=BASE?>img/step1.png"/></span></td>
				<td><img src="<?=BASE?>img/arrow.png"/></td>
				<td class="step"><span>2 <img src="<?=BASE?>img/step2.png"/></span></td>
				<td><img src="<?=BASE?>img/arrow.png"/></td>
				<td class="step"><span>3 <img src="<?=BASE?>img/step3.png"/></span></td>
			</tr>

			<tr>
				<td>Specify the required service and district</td>
				<td></td>
				<td>Check out the feedback form and send an application</td>
				<td></td>
				<td>After confirming the application, the specialist will contact you</td>
			</tr>
		</table>
		<p>Or <a href="#order_form">Leave an application </a>, And we will select a specialist according to your criteria.</p>
	

					<div>
		<title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 43.28, lng:69.13 },
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzT2rKWgktsscAk1vkumMV5ataa0CkbAQ&callback=initMap"
    async defer></script>
					</div>

	</section>

	<section id="order_form" class="full">
		<div class="wrapper">
			<h2>Help in selection</h2>
			<p>Fill out an application, and the administrator will contact you and recommend a professional according to your criteria.</p>
			<div id="form">
				<h4>Who are you looking for? With what it is necessary to help?</h4>
				<form action="<?=BASE?>order/" method="post">
					<textarea class="input" name="comment" cols="80" rows="6"></textarea>
					<input type="text" name="name" class="input" placeholder="Your name"/>
					<input type="text" name="phone" class="input" placeholder="Your number"/>
					<input type="submit" name="order" value="Select" class="input button"/>	
				</form>
				<p>Sending the application, I confirm my acquaintance and consent with <a href="#">Terms of Use</a> Completely.</p>
			</div>
		</div>
	</section>