<audio autoplay hidden>
	<source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
	</audio>
	<section>
		<div id="scene3" class="scene">
			<?php if($this->session->userdata('Avatar') == 'boy'){?>
			<div id="bb1">
				<img src="<?= base_url();?>img/21.png" width="250" height="606">
			</div>
			<p>Just like any other newly graduate, Nick is eager to apply for a job so he sent applications to different companies. One of the companies that <br> caught his eye is WIT Solutions.</p>

			<?php } else { ?>
			<div id="bb1">
				<img src="<?= base_url();?>img/j_21.png" width="250" height="606">
			</div>
			<p>Just like any other newly graduate, Jesse is eager to apply for a job so she sent applications to different companies. One of the companies that <br> caught her eye is WIT Solutions.</p>
			<?php } ?>

		</div>
	</section>
	<a href="<?= base_url();?>Load/Easy4" class="btn" class="animated bounceOutUp"> Next </a>
	<a href="<?= base_url();?>Load/Easy2" class="btn2" class="animated bounceOutUp"> Back </a>