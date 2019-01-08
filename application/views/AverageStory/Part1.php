<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
    <section>
        
        <?php if($this->session->userdata('Avatar') == 'boy'){?>
        <div id="a1" class="scene">
            <div id="ab1" class="animated bounceInUp">
                <img src="<?= base_url();?>img/ab1.png" width="1000" height="520">
            </div>
            <div id="ac1" class="animated bounceInUp">
                <img src="<?= base_url();?>img/ac1.png" width="1000" height="520">
            </div>
        </div>    
        <?php } else { ?>
        <div id="j_a1" class="scene">    
            <div id="ab1" class="animated bounceInUp">
                <img src="<?= base_url();?>img/j_ab1.png" width="1000" height="520">
            </div>
            <div id="ac1" class="animated bounceInUp">
                <img src="<?= base_url();?>img/j_ac1.png" width="1000" height="520">
            </div>
        </div>    
        <?php } ?>
        
        
    </section>
    <a href="<?= base_url();?>Load/Average2" class="btn" class="animated bounceOutUp">Next</a>
