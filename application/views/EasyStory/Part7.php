<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
<section>
    <div id="scene6" class="scene">

        <div id="books">
            <img src="<?= base_url();?>img/books.png" alt="">
        </div>
        <div id="lamp">
            <img src="<?= base_url();?>img/lamp.png" alt="">
        </div>
        <div class="sofa animated slideInUp">
            <img src="<?= base_url();?>img/sofa.png" alt="">
        </div>
        <?php if($this->session->userdata('Avatar') == 'boy'){?>
            <div id="cp">
                <img src="<?= base_url();?>img/upo.png" width="151" height="277">
            </div>
            <?php } else { ?>
            <div id="cp">
                <img src="<?= base_url();?>img/j_upo.png" width="151" height="277">
            </div>
            <?php } ?>
        <div id="oh" class="animated bounceIn">
            <img src="<?= base_url();?>img/oh.png" width="135" height="100">
        </div>
        <div id="in" class="animated bounceIn">
            <img src="<?= base_url();?>img/in.png" width="135" height="100">
        </div>
    </div>
</section>
<a href="<?= base_url();?>Load/Easy8" class="btn" class="animated bounceOutUp"> Next </a>
<a href="<?= base_url();?>Load/Easy6" class="btn2" class="animated bounceOutUp"> Back </a>
