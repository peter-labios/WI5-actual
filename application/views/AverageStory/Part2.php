<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
    <section>
        <div id="a2">
            <div id="books">
                <img src="<?= base_url();?>img/books.png" alt="">
            </div>
            <div id="lamp">
                <img src="<?= base_url();?>img/lamp.png" alt="">
            </div>
            <div class="sofa animated slideInUp">
                <img src="<?= base_url();?>img/sofa.png" alt="">
            </div>
            <div id="cp">
                <?php if($this->session->userdata('Avatar') == 'boy'){?>
                
                <img src="<?= base_url();?>img/upo.png" width="151" height="277">
                <?php } else { ?>
                <img src="<?= base_url();?>img/j_upo.png" width="151" height="277">
            </div>    
            <?php } ?>
            <div id="a2b" class="animated bounceIn">
                <img src="<?= base_url();?>img/a2b.png" width="135" height="100">
            </div>
        </div>
    </section>
    <a href="<?= base_url();?>Load/Average3" class="btn" class="animated bounceOutUp"> Next </a>
    <a href="<?= base_url();?>Load/Average" class="btn2" class="animated bounceOutUp"> Back</a>
