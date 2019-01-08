<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
    <section>
        <?php if($this->session->userdata('Avatar') == 'boy'){?>
        <div id="a5" class="scene">
            <div id="aj">
                <img src="<?= base_url();?>img/32.png" width="250" height="430">
            </div>
            <div id="a51" class="animated slideOutRight">
                <img src="<?= base_url();?>img/a41.png" width="980" height="582">
            </div>
            <div id="a52" class="animated slideOutLeft">
                <img src="<?= base_url();?>img/a42.png" width="980" height="582">
            </div>
            <div id="a53" class="animated slideOutRight">
                <img src="<?= base_url();?>img/a43.png" width="980" height="582">
            </div>
            <div id="aa" class="animated slideInLeft">
                <img src="<?= base_url();?>img/a51.png" width="980" height="582">
            </div>

            <div id="ab" class="animated slideInRight">
                <img src="<?= base_url();?>img/a52.png" width="980" height="582">
            </div>

            <div id="ac" class="animated slideInLeft">
                <img src="<?= base_url();?>img/a53.png" width="980" height="582">
            </div>

            <div id="ad" class="animated slideInRight">
                <img src="<?= base_url();?>img/a54.png" width="980" height="582">
            </div>
        </div>
        <?php } else { ?>
        <div id="j_a5" class="scene">
            <div id="aj">
                <img src="<?= base_url();?>img/j_32.png" width="200" height="430">
            </div>
            <div id="a51" class="animated slideOutRight">
                <img src="<?= base_url();?>img/j_a41.png" width="980" height="582">
            </div>
            <div id="a52" class="animated slideOutLeft">
                <img src="<?= base_url();?>img/j_a42.png" width="980" height="582">
            </div>
            <div id="a53" class="animated slideOutRight">
                <img src="<?= base_url();?>img/j_a43.png" width="980" height="582">
            </div>
            <div id="aa" class="animated slideInLeft">
                <img src="<?= base_url();?>img/j_a51.png" width="980" height="582">
            </div>

            <div id="ab" class="animated slideInRight">
                <img src="<?= base_url();?>img/j_a52.png" width="980" height="582">
            </div>

            <div id="ac" class="animated slideInLeft">
                <img src="<?= base_url();?>img/j_a53.png" width="980" height="582">
            </div>

            <div id="ad" class="animated slideInRight">
                <img src="<?= base_url();?>img/j_a54.png" width="980" height="582">
            </div>
        </div>
        <?php } ?>




    </section>
    <a href="<?= base_url();?>Load/Average6" class="btn" class="animated bounceOutUp"> Next </a>
    <a href="<?= base_url();?>Load/Average4" class="btn2" class="animated bounceOutUp"> Back</a>
