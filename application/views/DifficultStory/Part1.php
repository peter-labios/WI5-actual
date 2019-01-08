<audio autoplay hidden>
	<source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
	</audio>
	<section>
		<div id="d1" class="scene">
			<?php if($this->session->userdata('Avatar') == 'boy'){?>
			<p>Finally, Nick’s most anticipated day came…</p>
			<?php } else { ?>
			<p>Finally, Jesse's most anticipated day came…</p>
			<?php } ?>
		</div>
	</section>
	<a href="<?= base_url();?>Load/Difficult2" class="btn" class="animated bounceOutUp"> Next </a>
</div>
