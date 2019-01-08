<audio autoplay hidden>
	<source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
	</audio>
	<section>
		<div id="scene3" class="scene">
			<?php if($this->session->userdata('Avatar') == 'boy'){?>
			<div id="bb2">
				<img src="<?= base_url();?>img/22.png" width="250" height="606">
			</div>
			<p id="p1" class="text-story">According to JobStreet.com’s Philippines Employers' Survey, employers <u>prefer</u> hiring people who are willing to learn instead of those <br> who know a lot already which is <u>prevalently favorable</u> for newly graduates like Nick.
			</p>

			<?php } else { ?>
			<div id="bb2">
				<img src="<?= base_url();?>img/j_22.png" width="250" height="606">
			</div>
			<p id="p1" class="text-story">According to JobStreet.com’s Philippines Employers' Survey, employers <u>prefer</u> hiring people who are willing to learn instead of those <br> who know a lot already which is <u>prevalently favorable</u> for newly graduates like Jesse.
			</p>
			<?php } ?>


		</div>
	</section>
	<a href="<?= base_url();?>Load/Easy5" class="btn" class="animated bounceOutUp"> Next </a>
	<a href="<?= base_url();?>Load/Easy3" class="btn2" class="animated bounceOutUp"> Back </a>
