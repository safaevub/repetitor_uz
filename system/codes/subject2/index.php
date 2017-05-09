<?php
include('class.php');
$subject = new Subject;

$subject->show_breadcrumb();
?>

	<section id="category_head" class="wrapper">
		<!-- <h3>1 482 Tutors</h3> -->
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
					<input type="submit" name="order" value="Подобрать" class="input button"/>
				</form>
			</div>

			<div class="grid grid-12">Sending the application, I confirm my acquaintance and consent with <a href="#">Terms of Use</a> completely</div>
		</div>
	</section>

	<section id="content" class="wrapper row">
		<section id="side" class="grid sleft">
			<div id="param" class="block">
				<h4>Subject</h4>
				<input type="text" class="input" disabled placeholder="English"/>
				<h4>District</h4>
				<!-- <input type="text" class="input" placeholder="Choose district"/> -->
				<select name="region" class="input">
					<option selected>Any district</option>
					<?=$subject->region_option($this->get_location())?>
				</select>

				<ul id="location" class="nostyle">
					<li><label><input type="radio" name="location" checked="checked"/> At me or the tutor</label></li>
					<li><label><input type="radio" name="location"/> At me</label></li>
					<li><label><input type="radio" name="location"/> At the tutor</label></li>
					<!-- <li><label><input type="radio" name="location"/> Online (Skype)</label></li> -->
				</ul>

				<ul class="nostyle">
					<li><h4>Knowledge level</h4></li>
					<li><label><input type="radio" name="edu_level"/> Student</label></li>
					<li><label><input type="radio" name="edu_level"/> Graduate / Graduate Student</label></li>
					<li><label><input type="radio" name="edu_level"/> PhD</label></li>
					<li><label><input type="radio" name="edu_level"/> Native speaker</label></li>
					<li><label><input type="radio" name="edu_level"/> Ph.D</label></li>
				</ul>
				
				<ul class="nostyle toggle">
					<li><h4>Experience, practice</h4></li>
					<li><label><input type="radio" name="exp"/> Little experience</label></li>
					<li><label><input type="radio" name="exp"/> Average Experience</label></li>
					<li><label><input type="radio" name="exp"/> School teacher</label></li>
					<li><label><input type="radio" name="exp"/> Course Instructor</label></li>
					<li><label><input type="radio" name="exp"/> Serious experience
</label></li>
					<li><label><input type="radio" name="exp"/> Professor of university</label></li>
					<li><label><input type="radio" name="exp"/> Tutor-expert</label></li>
					<li><label><input type="radio" name="exp"/> Professor</label></li>
				</ul>
				
				<ul class="nostyle toggle">
					<li><h4>Cost</h4></li>
					<li><label><input type="checkbox" name="price"/> Minumum</label></li>
					<li><label><input type="checkbox" name="price"/> Average</label></li>
					<li><label><input type="checkbox" name="price"/> Above average</label></li>
					<li><label><input type="checkbox" name="price"/> Maximum</label></li>
				</ul>

				<ul class="nostyle toggle">
					<li><h4>Gender of tutor</h4></li>
					<li><label><input type="checkbox" name="price"/> Male</label></li>
					<li><label><input type="checkbox" name="price"/> Female</label></li>
				</ul>

				<div id="toggle_button">
					More options
				</div>
			</div>

			<div id="rec_subjects" class="sticky">
				<h3>see also</h3>
				<ul class="nostyle">
					<?php
						$subject->show_similar_subjects();
					?>
				</ul>
			</div>
		</section>

		<section id="tutors" class="grid">
			<div class="block">
				<div id="tutor" class="row">
					<div id="tinfo" class="grid grid-8">
						<div id="tutor_head" class="row">
							<img src="<?=BASE?>img/avatars/1.jpg"/>
							<a href="#">Ainurina Nadezhda Amirovna</a>
							<span>English.</span>
						</div>
						<div id="tutor_edu">
							<h4>Education and experience</h4>
							<p>Education: National Institute of Uzbekistan ​​(1988).</p>

							<p>
								Teaching experience is 32 years (school, institute, English language courses). <br/>
							Tutoring - 16 years (schoolchildren, adults).
							</p>
						</div>
						<div id="tutor_price">
							<h4>Cost</h4>
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td>English</td>
									<td>from 15000 to 20000  / 60 min.</td>
								</tr>

								<tr>
									<td>Business English</td>
									<td>20000  / 60 min.</td>
								</tr>
							</table>
							<a href="#" class="expand">All services and prices (12)</a>
						</div>
					</div>
					<div id="tside" class="grid grid-4">
						<div id="checks">
							<ul class="nostyle">
								<li><i class="glyphicons glyphicons-ok"></i> Interview completed</li>
								<li><i class="glyphicons glyphicons-ok"></i> Data checked</li>
							</ul>
						</div>

						<div id="location">
							<h4>District</h4>
							Mirzo Ulugbek
							<h4>Departure to the student</h4>
							East (Tashkent).	
						</div>
					</div>
				</div>
				
				<div id="tutor" class="row">
					<div id="tinfo" class="grid grid-8">
						<div id="tutor_head" class="row">
							<img src="<?=BASE?>img/avatars/2.jpg"/>
							<a href="#">Kirillova Ekaterina Igorevna</a>
							<span>English.</span>
						</div>
						<div id="tutor_edu">
							<h4>Education and experience</h4>
							<p>Education: Moscow State Pedagogical University, Faculty of Romance and Germanic Philology, specialty - Linguistics (French and English) (2008).</p>

							<p>
								Teaching experience - half a year (in 2008). <br/>
								Tutoring experience - since 2006.
							</p>
						</div>
						<div id="tutor_price">
							<h4>Cost</h4>
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td>English</td>
									<td>from 15000 to 20000  / 60 min.</td>
								</tr>

								<tr>
									<td>Business English</td>
									<td>20000  / 60 min.</td>
								</tr>
							</table>
							<a href="#" class="expand">All services and prices (12)</a>
						</div>
					</div>
					<div id="tside" class="grid grid-4">
						<div id="checks">
							<ul class="nostyle">
								<li><i class="glyphicons glyphicons-ok"></i>Interview completed</li>
								<li><i class="glyphicons glyphicons-ok"></i> Data checked</li>
							</ul>
						</div>

						<div id="location">
							<h4>District</h4>
							Yunusobod
							<h4>Departure to the student</h4>
							West (Tashkent).
						</div>
					</div>
				</div>

				<div id="tutor" class="row">
					<div id="tinfo" class="grid grid-8">
						<div id="tutor_head" class="row">
							<img src="<?=BASE?>img/avatars/3.jpg"/>
							<a href="#">Thiago Freire</a>
							<span>English.</span>
							<span>Native English (USA).</span>
						</div>
						<div id="tutor_edu">
							<h4>Education and experience</h4>
							<p>
								Education: PFUR, medical faculty, specialty - medical business (training in English - for foreigners), 6 year.<br/>
								Kursk State Medical University, preparatory faculty, Russian language (2010-2011). <br/>
								Solar High School, Ceres (США, 2007 г.). <br/>
								Ridge High School, New Jersey (USA, 2005-2006).<br/>
								Anglo-American Cultural Center, Spanish (2000-2004).</p>

							<p>
								Experience tutoring - since 2008.
							</p>
						</div>
						<div id="tutor_price">
							<h4>Cost</h4>
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td>English</td>
									<td>from 15000 to 20000  / 60 min.</td>
								</tr>

								<tr>
									<td>Business English</td>
									<td>20000  / 60 min.</td>
								</tr>
							</table>
							<a href="#" class="expand">All services and prices(12)</a>
						</div>
					</div>
					<div id="tside" class="grid grid-4">
						<div id="checks">
							<ul class="nostyle">
								<li><i class="glyphicons glyphicons-ok"></i> Interview completed</li>
								<li><i class="glyphicons glyphicons-ok"></i> Data checked</li>
							</ul>
						</div>

						<div id="location">
							<h4>District</h4>
							Chilonzor
							<h4>Departure to the student</h4>
							North (Tashkent).	
						</div>
					</div>
				</div>

				<div id="tutor" class="row">
					<div id="tinfo" class="grid grid-8">
						<div id="tutor_head" class="row">
							<img src="<?=BASE?>img/avatars/4.jpg"/>
							<a href="#">Vedyanina Irina Yulevna</a>
							<span>English.</span>
						</div>
						<div id="tutor_edu">
							<h4>Education and experience</h4>
							<p>Education: National Institute of Uzbkistan ​​(1988).</p>

							<p>	Teaching experience is 32 years (school, institute, English language courses). <br/>
							Tutoring - 16 years (schoolchildren, adults).
							</p>
						</div>
						<div id="tutor_price">
							<h4>Cost</h4>
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td>English</td>
									<td>from 15000 to 20000  / 60 min.</td>
								</tr>

								<tr>
									<td>Business English</td>
									<td>20000  / 60 min.</td>
								</tr>
							</table>
							<a href="#" class="expand">All services and prices (12)</a>
						</div>
					</div>
					<div id="tside" class="grid grid-4">
						<div id="checks">
							<ul class="nostyle">
								<li><i class="glyphicons glyphicons-ok"></i> Interview completed</li>
								<li><i class="glyphicons glyphicons-ok"></i> Data checked</li>
							</ul>
						</div>

						<div id="location">
							<h4>District</h4>
							Olmozor
							<h4>Departure to the student</h4>
							South (Tashkent).	
						</div>
					</div>
				</div>

				<div id="tutor" class="row">
					<div id="tinfo" class="grid grid-8">
						<div id="tutor_head" class="row">
							<img src="<?=BASE?>img/avatars/5.jpg"/>
							<a href="#">Grinberg Mikhail Markovich</a>
							<span>English.</span>
						</div>
						<div id="tutor_edu">
							<h4>Education and experience</h4>
							<p>Education: National Institute of Uzbekistan (1988 y.).</p>

							<p>Teaching experience is 32 years (school, institute, English language courses). <br/>
								Tutoring - 16 years (schoolchildren, adults).						</p>
						</div>
						<div id="tutor_price">
							<h4>Cost</h4>
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td>English</td>
									<td>from 15000 to 20000  / 60 min.</td>
								</tr>

								<tr>
									<td>Business English</td>
									<td>20000  / 60 min.</td>
								</tr>
							</table>
							<a href="#" class="expand">All services and prices (12)</a>
						</div>
					</div>
					<div id="tside" class="grid grid-4">
						<div id="checks">
							<ul class="nostyle">
								<li><i class="glyphicons glyphicons-ok"></i> Interview completed</li>
								<li><i class="glyphicons glyphicons-ok"></i> Data checked</li>
							</ul>
						</div>

						<div id="location">
							<h4>District</h4>
							Uchtepa.
							<h4>Departure to the student</h4>
							East (Tashkent).	
						</div>
					</div>
				</div>

				<div id="tutor" class="row">
					<div id="tinfo" class="grid grid-8">
						<div id="tutor_head" class="row">
							<img src="<?=BASE?>img/avatars/6.jpg"/>
							<a href="#">Fazliddin Anvarov Khabibullevich</a>
							<span>Mathematics.</span>
						</div>
						<div id="tutor_edu">
							<h4>Education and experience</h4>
							<p>Education: Inha University in Tashkent (~now y.).</p>

							<p>Teaching experience is 2 years 	</div>
						<div id="tutor_price">
							<h4>Cost</h4>
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td>English</td>
									<td>from 15000 to 20000  / 60 min.</td>
								</tr>

								<tr>
									<td>Business English</td>
									<td>20000  / 60 min.</td>
								</tr>
							</table>
							<a href="#" class="expand">All services and prices(12)</a>
						</div>
					</div>
					<div id="tside" class="grid grid-4">
						<div id="checks">
							<ul class="nostyle">
								<li><i class="glyphicons glyphicons-ok"></i> Interview completed</li>
								<li><i class="glyphicons glyphicons-ok"></i> Data checked</li>
							</ul>
						</div>

						<div id="location">
							<h4>District</h4>
							Mirzo Ulugbek
							<h4>Departure to the student</h4>
							West (Tashkent).	
						</div>
					</div>
				</div>
			</div>

			<span id="show_more" class="btn btn-blue"><a href="#"><i class="lnr lnr-sync"></i>&nbsp; Show more</a></span>
		</section>
	</section>