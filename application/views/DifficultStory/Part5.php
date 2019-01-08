<audio autoplay hidden>
	<source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
	</audio>
	<section>
		<div id="d5">
			<div id="int" class="animated slideInRight">
				<img src="<?= base_url();?>img/int.png" width="720" height="430">
			</div>
			<div id="tbl">
				<img src="<?= base_url();?>img/tbl.png" width="790" height="520">
			</div>
			<?php if($this->session->userdata('Avatar') == 'boy'){?>
			<div id="jes" class="animated slideInLeft">
				<img src="<?= base_url();?>img/sld.png" width="720" height="430">
			</div>
			<?php } else { ?>
			<div id="jes" class="animated slideInLeft">
				<img src="<?= base_url();?>img/j_sld.png" width="720" height="430">
			</div>
			<?php } ?>

		</div>

	</section>

	<a href="<?= base_url();?>Load/Difficult6" class="btn" class="animated bounceOutUp"> Next </a>
	<a href="<?= base_url();?>Load/Difficult4" class="btn2" class="animated bounceOutUp"> Back </a>
