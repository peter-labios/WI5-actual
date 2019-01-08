<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
    <section>
        <div id="scene12" class="scene">
            <?php if($this->session->userdata('Avatar') == 'boy'){?>
            <div id="ba" class="animated slideOutRight">
                <img src="<?= base_url();?>img/ba.png" width="834" height="498">
            </div>
            <div id="baa" class="animated slideOutLeft">
                <img src="<?= base_url();?>img/baa.png" width="834" height="498">
            </div>
            <div id="baaa" class="animated slideInRight">
                <img src="<?= base_url();?>img/baa.png" width="834" height="498">
            </div>
            <div id="box">
            </div>
            <?php } else { ?>
            <div id="ba" class="animated slideOutRight">
                <img src="<?= base_url();?>img/j_ba.png" width="834" height="498">
            </div>
            <div id="baa" class="animated slideOutLeft">
                <img src="<?= base_url();?>img/j_baa.png" width="834" height="498">
            </div>
            <div id="baaa" class="animated slideInRight">
                <img src="<?= base_url();?>img/j_baaa.png" width="834" height="498">
            </div>
            <div id="box">
            </div>
            <?php } ?>

            
        </div>
    </section>
    <a href="<?= base_url();?>Load/Easy14" class="btn" class="animated bounceOutUp"> Next </a>
    <a href="<?= base_url();?>Load/Easy12" class="btn2" class="animated bounceOutUp"> Back </a>
