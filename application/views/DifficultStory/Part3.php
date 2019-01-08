<audio autoplay hidden>
	<source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
	</audio>
	<section>
		<div id="d3">

			<?php if($this->session->userdata('Avatar') == 'boy'){?>
			<div id="ds" class="animated slideInRight">
				<img src="<?= base_url();?>img/d2a.png" width="920" height="522">
			</div>
			<p>Nick arrived at the office. He is trying to walk slowly as he was trying his very best not to create a <u>fiasco</u>. He entered the room where he was told  <br> to wait, trying to retain his <u>gentility</u> despite his nervousness. He repeated his <u>mantra</u> once again, “I am a <u>high flyer</u>, I can do this” to calm his nerves.</p>
			<?php } else { ?>
			<div id="ds" class="animated slideInRight">
				<img src="<?= base_url();?>img/j_d2a.png" width="920" height="522">
			</div>
			<p>Jesse arrived at the office. She is trying to walk slowly as she was trying her very best not to create a <u>fiasco</u>. She entered the room where she was told  <br> to wait, trying to retain her <u>gentility</u> despite her nervousness. She repeated his <u>mantra</u> once again, “I am a <u>high flyer</u>, I can do this” to calm her nerves.</p>
			<?php } ?>
			
		</div>
	</div>
</section>

<a href="<?= base_url();?>Load/Difficult4" class="btn" class="animated bounceOutUp"> Next </a>
<a href="<?= base_url();?>Load/Difficult2" class="btn2" class="animated bounceOutUp"> Back </a>
