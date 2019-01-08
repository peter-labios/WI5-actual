<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
    <section>
        <?php if($this->session->userdata('Avatar') == 'boy'){?>
        <div id="a4" class="scene">
            <div id="aj" class="animated slideInRight">
                <img src="<?= base_url();?>img/32.png" width="250" height="430">
            </div>
            <div id="a41" class="animated slideInLeft">
                <img src="<?= base_url();?>img/a41.png" width="980" height="582">
            </div>
            <div id="a42" class="animated slideInRight">
                <img src="<?= base_url();?>img/a42.png" width="980" height="582">
            </div>
            <div id="a43" class="animated slideInLeft">
                <img src="<?= base_url();?>img/a43.png" width="980" height="582">
            </div>
        </div>
        <?php } else { ?>
        <div id="j_a4" class="scene">
            <div id="aj" class="animated slideInRight">
                <img src="<?= base_url();?>img/j_32.png" width="200" height="430">
            </div>
            <div id="a41" class="animated slideInLeft">
                <img src="<?= base_url();?>img/j_a41.png" width="980" height="582">
            </div>
            <div id="a42" class="animated slideInRight">
                <img src="<?= base_url();?>img/j_a42.png" width="980" height="582">
            </div>
            <div id="a43" class="animated slideInLeft">
                <img src="<?= base_url();?>img/j_a43.png" width="980" height="582">
            </div>
        </div>
        <?php } ?>
    </section>
    <a href="<?= base_url();?>Load/Average5" class="btn" class="animated bounceOutUp"> Next </a>
    <a href="<?= base_url();?>Load/Average3" class="btn2" class="animated bounceOutUp"> Back</a>
