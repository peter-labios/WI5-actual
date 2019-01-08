<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
<section>
	<div id="scene13" class="scene">
		<?php if($this->session->userdata('Avatar') == 'boy'){?>
            <div id="sld" class="animated slideInLeft">
				<img src="<?= base_url();?>img/sld.png" width="980" height="580">
			</div>
            <?php } else { ?>
            <div id="sld" class="animated slideInLeft">
				<img src="<?= base_url();?>img/j_sld.png" width="980" height="580">
			</div>
            <?php } ?>
		

	</div>
</section>
<!-- ung scene13.html palitan nyo nlng ng link sa exam nyo-->
<a href="<?= base_url();?>Game/Quiz_Easy" class="btn" class="animated bounceOutUp"> Next </a>
<a href="<?= base_url();?>Load/Easy13" class="btn2" class="animated bounceOutUp"> Back </a>
