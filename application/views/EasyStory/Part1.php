<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
    <section>
        <div id="scene1">
            <?php if($this->session->userdata('Avatar') == 'boy'){?>
            <div class="wave animated slideInLeft">
                <img src="<?= base_url();?>img/w1.png" />
            </div>
            <p>Nick is a
                <u>passionate</u> and
                <u>driven</u> fresh graduate who aspires to
                <u>work</u> for a
                <u>firm</u> where proper
                <u>ethics</u> and
                <u>etiquette</u> is practiced. He is very
                <u>enthusiastic</u>
                <br> and
                <u>motivated</u> in getting a job offers good
                <u>benefits</u> as well as
                <u>compensation</u>.</p>

                <?php } else { ?>
                <div class="wave animated slideInLeft">
                    <img src="<?= base_url();?>img/j_w1.png" />
                </div>
                <p>Jesse is a
                    <u>passionate</u> and
                    <u>driven</u> fresh graduate who aspires to
                    <u>work</u> for a
                    <u>firm</u> where proper
                    <u>ethics</u> and
                    <u>etiquette</u> is practiced. She is very
                    <u>enthusiastic</u>
                    <br> and
                    <u>motivated</u> in getting a job offers good
                    <u>benefits</u> as well as
                    <u>compensation</u>.</p>
                    <?php } ?>

                    
                </div>

            </section>
            <a href="<?= base_url();?>Load/Easy2" class="btn" class="animated bounceOutUp"> Next </a>