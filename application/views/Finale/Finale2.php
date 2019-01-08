<section>
    <div id="j_e2">
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
            <?php } ?>
        </div>
        <div id="yes" class="animated bounceIn">
            <img src="<?= base_url();?>img/yes.png" idth="135" height="100">
        </div>
        <?php if($this->session->userdata('Avatar') == 'boy'){?>
            <p>Nick got a call from WIT Solutions about his job application</p>
            <?php } else { ?>
            <p>Jesse got a call from WIT Solutions about her job application</p>
            <?php } ?>
        
    </div>
</section>

<a href="<?= base_url();?>Load/Finale3" class="btn" class="animated bounceOutUp"> Next </a>
