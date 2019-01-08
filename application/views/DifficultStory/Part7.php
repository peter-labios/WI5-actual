<audio autoplay hidden>
	<source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
	</audio>
	<section>
		<?php if($this->session->userdata('Avatar') == 'boy'){?>
		<div id="d7">
			<div id="d71" class="animated slideOutRight">
				<img src="<?= base_url();?>img/61.png"width="980" height="582">
			</div>
			<div id="d72" class="animated slideOutLeft">
				<img src="<?= base_url();?>img/62.png" width="980" height="582">
			</div>
			<div id="d73" class="animated slideOutRight">
				<img src="<?= base_url();?>img/63.png" width="980" height="582">
			</div>
			<div id="da" class="animated slideInLeft">
				<img src="<?= base_url();?>img/d71.png" width="980" height="582">
			</div>
			<div id="daa" class="animated slideInLeft">
				<img src="<?= base_url();?>img/d72.png" width="980" height="582">
			</div>
			<div id="daaa" class="animated slideInLeft">
				<img src="<?= base_url();?>img/d73.png" width="980" height="582">
			</div>
		</div>
		<?php } else { ?>
		<div id="j_d7">
			<div id="d71" class="animated slideOutRight">
				<img src="<?= base_url();?>img/j_61.png"width="980" height="582">
			</div>
			<div id="d72" class="animated slideOutLeft">
				<img src="<?= base_url();?>img/j_62.png" width="980" height="582">
			</div>
			<div id="d73" class="animated slideOutRight">
				<img src="<?= base_url();?>img/j_63.png" width="980" height="582">
			</div>
			<div id="da" class="animated slideInLeft">
				<img src="<?= base_url();?>img/j_d71.png" width="980" height="582">
			</div>
			<div id="daa" class="animated slideInLeft">
				<img src="<?= base_url();?>img/j_d72.png" width="980" height="582">
			</div>
			<div id="daaa" class="animated slideInLeft">
				<img src="<?= base_url();?>img/j_d73.png" width="980" height="582">
			</div>
		</div>
		<?php } ?>

	</section>

	<a href="<?= base_url();?>Game/Quiz_Difficult" class="btn" class="animated bounceOutUp"> Next </a>
	<a href="<?= base_url();?>Load/Difficult6" class="btn2" class="animated bounceOutUp"> Back </a>
