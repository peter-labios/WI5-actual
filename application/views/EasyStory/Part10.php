<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
    <section>
        <div id="scene9" class="scene">
            <?php if($this->session->userdata('Avatar') == 'boy'){?>
            <p>Later that day, Nick bumped into his friend Jesse, and told her about his job application.
            </p>
            <?php } else { ?>
            <p>Later that day, Jesse bumped into his friend Nick, and told him about her job application.
            </p>
            <?php } ?>

            <div id="c1">
                <img src="<?= base_url();?>img/c1.png" width="530" height="226">
            </div>
            <div id="c2">
                <img src="<?= base_url();?>img/c2.png" width="530" height="226">
            </div>
            <div id="c3">
                <img src="<?= base_url();?>img/c3.png" width="530" height="226">
            </div>
            <div id="c4">
                <img src="<?= base_url();?>img/c4.png" width="605" height="218">
            </div>

        </div>
    </section>
    <a href="<?= base_url();?>Load/Easy11" class="btn" class="animated bounceOutUp"> Next </a>
    <a href="<?= base_url();?>Load/Easy9" class="btn2" class="animated bounceOutUp"> Back </a>
