<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
<section>
    <div id="scene10" class="scene">
    <?php if($this->session->userdata('Avatar') == 'boy'){?>
            <div id="bb1">
            <img src="<?= base_url();?>img/22.png" width="250" height="606">
        </div>
        <div id="gg1">
            <img src="<?= base_url();?>img/32.png" width="313" height="568">
        </div>
            <?php } else { ?>
            <div id="bb1">
            <img src="<?= base_url();?>img/j_22.png" width="250" height="606">
        </div>
        <div id="gg1">
            <img src="<?= base_url();?>img/j_10.png" width="360" height="720">
        </div>
            <?php } ?>
    
        
    </div>
</section>
<a href="<?= base_url();?>Load/Easy12" class="btn" class="animated bounceOutUp"> Next </a>
<a href="<?= base_url();?>Load/Easy10" class="btn2" class="animated bounceOutUp"> Back </a>
