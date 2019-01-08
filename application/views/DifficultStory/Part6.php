<audio autoplay hidden>
	<source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
	</audio>
	<section>
		<?php if($this->session->userdata('Avatar') == 'boy'){?>
		<div id="d6">
			<div id="d61" class="animated slideInLeft">
				<img src="<?= base_url();?>img/61.png"width="980" height="582">
			</div>
			<div id="d62" class="animated slideInRight">
				<img src="<?= base_url();?>img/62.png" width="980" height="582">
			</div>
			<div id="d63" class="animated slideInLeft">
				<img src="<?= base_url();?>img/63.png" width="980" height="582">
			</div>
		</div>
		<?php } else { ?>
		<div id="j_d6">
			<div id="d61" class="animated slideInLeft">
				<img src="<?= base_url();?>img/j_61.png"width="980" height="582">
			</div>
			<div id="d62" class="animated slideInRight">
				<img src="<?= base_url();?>img/j_62.png" width="980" height="582">
			</div>
			<div id="d63" class="animated slideInLeft">
				<img src="<?= base_url();?>img/j_63.png" width="980" height="582">
			</div>
		</div>
		<?php } ?>

	</section>

	<a href="<?= base_url();?>Load/Difficult7" class="btn" class="animated bounceOutUp"> Next </a>
	<a href="<?= base_url();?>Load/Difficult5" class="btn2" class="animated bounceOutUp"> Back </a>
