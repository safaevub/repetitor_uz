

<div id="head_top" class="full"  style="  font-family: 'Tangerine', serif; font-size: 20px;">
	<nav class="wrapper row">
		<div id="choose_city" class="fleft">
			
			<!-- <i class="lnr lnr-map-marker"></i> Ташкент -->
			<a href="#" id="loc"><i class="lnr lnr-map-marker"></i> Tashkent</a>
			
			<div class="loc_list">
				<ul class="nostyle">
					<li><a href="#" rid="1">Andijan</a></li>
					<li><a href="#" rid="2">Bukhara</a></li>
					<li><a href="#" rid="3">Navai</a></li>
					<li><a href="#" rid="4">Samarkand</a></li>
					<li><a href="#" rid="5">Kharazem</a></li>
				</ul>
			</div>
		</div>

		<div id="hotline" class="fleft">
			<i class="lnr lnr-phone-handset"></i>+998 93 5244334
			</div>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="main.php">Registration</a>

		<div id="langs" class="fright">
			<?php $system->show_lang();?>
		</div>
	</nav>
</div>

<header id="head_main" class="full">
	<nav class="wrapper row">
		<div id="logo" class="fleft">
			<!-- <a href="<?=BASE?>">REPETITOR.UZ</a> -->
			<a href="<?=BASE?>"><img src="<?=BASE?>img/k.png"/></a>
		</div>

		<div id="slogan" class="fleft">
			<?=SLOGAN?>
		</div>
		
		<div id="head_order" class="fright">
			<span class="btn btn-blue"><a href="<?=BASE?>order/"><i class="lnr lnr-checkmark-circle"></i>&nbsp; <?=PODBOR?></a></span>
		</div>
	</nav>
</header>