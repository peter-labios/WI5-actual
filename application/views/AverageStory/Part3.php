<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
    <section>
        <div id="a3" class="scene">
            <div id="as1">
                <img src="<?= base_url();?>img/as1.png" width="102" height="142">
            </div>
            <div id="ass">
                <img src="<?= base_url();?>img/as2.png" width="70" height="100">
            </div>
            <div id="as3">
                <img src="<?= base_url();?>img/as3.png" width="70" height="100">
            </div>
            <div id="as4">
                <img src="<?= base_url();?>img/as4.png" width="70" height="100">
            </div>
            <?php if($this->session->userdata('Avatar') == 'boy'){?>
            <p>Nick despite his current situation in job hunting, is continuing to <u>make hay while the sun shines</u>.</p>
            <?php } else { ?>
            <p>Jesse despite her current situation in job hunting, is continuing to <u>make hay while the sun shines</u>.</p>
            <?php } ?>
            
        </div>
    </section>
    <a href="<?= base_url();?>Load/Average4" class="btn" class="animated bounceOutUp"> Next </a>
    <a href="<?= base_url();?>Load/Average2" class="btn2" class="animated bounceOutUp"> Back</a>