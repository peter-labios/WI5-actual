<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
    <section>
        <div id="scene4" class="scene">
            <?php if($this->session->userdata('Avatar') == 'boy'){?>
            <div id="cellp">
                <img src="<?= base_url();?>img/cp.png" width="365" height="577">
            </div>
            <?php } else { ?>
            <div id="cellp">
                <img src="<?= base_url();?>img/j_cp.png" width="365" height="577">
            </div>
            <?php } ?>
            
            <div id="wit">
                <img src="<?= base_url();?>img/WIT.png" width="218" height="78">
            </div>
            <div id="wit2">
                <img src="<?= base_url();?>img/WIT2.png" width="227" height="396">
            </div>
            <div id="wit3">
                <img src="<?= base_url();?>img/wit3.png" width="227" height="396">
            </div>
            <div id="rh">
                <img src="<?= base_url();?>img/RH.png" width="428" height="547">
            </div>
        </div>
    </section>
    <a href="<?= base_url();?>Load/Easy6" class="btn" class="animated bounceOutUp"> Next </a>
    <a href="<?= base_url();?>Load/Easy4" class="btn2" class="animated bounceOutUp"> Back </a>
