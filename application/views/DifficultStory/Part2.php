<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
<section>
    <div id="d2" class="scene">
        
        <?php if($this->session->userdata('Avatar') == 'boy'){?>
        <div id="d2a" class="animated slideInLeft">
            <img src="<?= base_url();?>img/d2a.png" width="685" height="382">
        </div>
            <p>WIT Solutions called and today is Nick’s first job interview.</p>
            <?php } else { ?>
            <div id="d2a" class="animated slideInLeft">
            <img src="<?= base_url();?>img/j_d2a.png" width="685" height="382">
        </div>
            <p>WIT Solutions called and today is Jesse’s first job interview.</p>
            <?php } ?>
        
    </div>
</section>

<a href="<?= base_url();?>Load/Difficult3" class="btn" class="animated bounceOutUp"> Next </a>
<a href="<?= base_url();?>Load/Difficult" class="btn2" class="animated bounceOutUp"> Back </a>
