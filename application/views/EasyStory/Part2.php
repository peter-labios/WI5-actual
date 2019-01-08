<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
    <section>
        <div id="scene2" class="scene">

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
            </div>
            <p>After his graduation, he has been <u>constantly patient</u> in searching for job <u>vacancies</u> that would correspond to his <u>credentials</u>.</p>

            <?php } else { ?>
            
                <img src="<?= base_url();?>img/j_upo.png" width="151" height="277">
            </div>
            <p>After her graduation, she has been <u>constantly patient</u> in searching for job <u>vacancies</u> that would correspond to her <u>credentials</u>.</p>
            <?php } ?>
            
        </div>
    </section>
    <a href="<?= base_url();?>Load/Easy3" class="btn" class="animated bounceOutUp"> Next </a>
    <a href="<?= base_url();?>Load/Easy" class="btn2" class="animated bounceOutUp"> Back </a>