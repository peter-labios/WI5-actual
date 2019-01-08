<audio autoplay hidden>
	<source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
	</audio>
	<section>
		
		<?php if($this->session->userdata('Avatar') == 'boy'){?>
		<div id="scene7" class="scene">
			<p>As soon as Nick saw a position he could possibly <u>fill in</u> and apply for, he immediately <u>logged on</u> to his laptop and started writing his resume.</p>
		</div>
		<?php } else { ?>
		<div id="j_scene7" class="scene">
			<p>As soon as Jesse saw a position she could possibly <u>fill in</u> in and apply for, she immediately <u>logged on</u> to her laptop and started writing her resume.</p>
		</div>
		<?php } ?>
		
		
	</section>
	<a href="<?= base_url();?>Load/Easy9" class="btn" class="animated bounceOutUp"> Next </a>
	<a href="<?= base_url();?>Load/Easy7" class="btn2" class="animated bounceOutUp"> Back </a>
