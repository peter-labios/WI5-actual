<audio autoplay hidden>
	<source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
	</audio>
	<section>

		<?php if($this->session->userdata('Avatar') == 'boy'){?>
		<div id="d4">
			<div id="dd1" class="animated slideInLeft">
				<img src="<?= base_url();?>img/d41.png" width="980" height="562">
			</div>
			<div id="dd2" class="animated slideInRight">
				<img src="<?= base_url();?>img/d42.png" width="980" height="562">
			</div>
			<div id="dd3" class="animated slideInLeft">
				<img src="<?= base_url();?>img/d43.png" width="980" height="562">
			</div>
		</div>
		<?php } else { ?>
		<div id="j_d4">
			<div id="dd1" class="animated slideInLeft">
				<img src="<?= base_url();?>img/j_d41.png" width="980" height="562">
			</div>
			<div id="dd2" class="animated slideInRight">
				<img src="<?= base_url();?>img/j_d42.png" width="980" height="562">
			</div>
			<div id="dd3" class="animated slideInLeft">
				<img src="<?= base_url();?>img/j_d43.png" width="980" height="562">
			</div>
		</div>
		<?php } ?>
		


	</section>

	<a href="<?= base_url();?>Load/Difficult5" class="btn" class="animated bounceOutUp"> Next </a>
	<a href="<?= base_url();?>Load/Difficult3" class="btn2" class="animated bounceOutUp"> Back </a>
