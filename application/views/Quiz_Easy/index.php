<script type="text/javascript" src="<?= base_url();?>js/hint.js"></script>
<form action="<?php echo site_url("GameController/validateAnswer");?>" method="post">
    <!--
    <audio autoplay hidden loop>
        <source src="<?= base_url();?>sound/BackgroundMusic.mp3" type="audio/mpeg"> Your browser does not support the audio element.
    </audio>
    -->
    <script type="text/javascript" src="<?= base_url();?>js/hint.js"></script>
    <script type="text/javascript">timer()</script>
    <input type="hidden" name="timer" id="ans-time">
    <input type="hidden" name="hinttimer" id="hint-time">
    <input type="hidden" name="hintcount" id="hint-click-count">
    <input type="hidden" name="answerstreak" id="answer-streak" value="<?php echo $this->session->userdata('Streak')?>">
    <input type="hidden" id="actual-question" value="<?=$RandomizedQuestions[$Number[0]]->Question;?>">
    <input type="hidden" id="base-url" value="<?= base_url();?>">
    <input type="hidden" id="checkAgent" value="<?php echo $this->session->userdata('Agent')?>">

    <section>
        <div id="ni">
            <div>
                <div class="life">
                    <h4 id="life-text">
                        Life:
                    </h4>
                    <div id="life-heart">
                        <?php if ($this->session->has_userdata('Infected 4')) { ?>
                            <img src="<?= base_url();?>img/heart-infected.png" height="25">
                        <?php } else { ?>
                            <img src="<?= base_url();?>img/heart.png" height="25">
                        <?php } ?>

                        <?php if ($this->session->has_userdata('Infected 3')) { ?>
                            <img src="<?= base_url();?>img/heart-infected.png" height="25">
                        <?php } else { ?>
                            <img src="<?= base_url();?>img/heart.png" height="25">
                        <?php } ?>

                        <?php if ($this->session->has_userdata('Infected 2')) { ?>
                            <img src="<?= base_url();?>img/heart-infected.png" height="25">
                        <?php } else { ?>
                            <img src="<?= base_url();?>img/heart.png" height="25">
                        <?php } ?>

                        <?php if ($this->session->has_userdata('Infected 1')) { ?>
                            <img src="<?= base_url();?>img/heart-infected.png" height="25">
                        <?php } else { ?>
                            <img src="<?= base_url();?>img/heart.png" height="25">
                        <?php } ?>

                        <?php if($this->session->has_userdata('Infected 0')){?>
                            <img src="<?= base_url();?>img/heart-infected.png" height="25">
                        <?php } else { ?>
                            <img src="<?= base_url();?>img/heart.png" height="25">
                        <?php } ?>

                    </div>
                </div>
                <div id="score">
                    <h4 id="score-text">
                        Score: <?php print_r($Score[0] * 200); ?>
                    </h4>
                </div>
                <h2 id="question-num">Question <?php print_r($Number[0] + 1); ?></h2>
                <div id="question">

                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h4 id="hint-text"><?php print_r($RandomizedQuestions[$Number[0]]->Word_Description);?></h4>
                        </div>
                    </div>

                    <h3 class="question">
                        <?php print_r($RandomizedQuestions[$Number[0]]->Question);?>
                        <br><br>
                        <button class="choice" name="Answer" type="Submit" value="True">True</button>
                        <button class="choice" name="Answer" type="Submit" value="False">False</button>
                    </h3>
                </div>
            </div>

            <!-- For Nick -->
            <?php if($this->session->userdata('Avatar') == 'boy'){?>
                <?php if ($this->session->has_userdata('Infected 3')) { ?>
                    <div id="i1" class="animated slideInUp">
                        <img src="<?= base_url();?>img/i5.png" width="397" height="883">
                    </div>

                <?php } elseif ($this->session->has_userdata('Infected 2')) { ?>
                    <div id="i1" class="animated slideInUp">
                        <img src="<?= base_url();?>img/i4.png" width="397" height="883">
                    </div>

                <?php } elseif ($this->session->has_userdata('Infected 1')) { ?>
                    <div id="i1" class="animated slideInUp">
                        <img src="<?= base_url();?>img/i3.png" width="397" height="883">
                    </div>

                <?php } elseif($this->session->has_userdata('Infected 0')){?>
                    <div id="i1" class="animated slideInUp">
                        <img src="<?= base_url();?>img/i2.png" width="397" height="883">
                    </div>

                <?php } else { ?>
                    <div id="i1" class="animated slideInUp">
                        <img src="<?= base_url();?>img/i1.png" width="397" height="883">
                    </div>
                <?php } ?>
                <div id="n" class="animated slideInUp">
                    <img src="<?= base_url();?>img/bb.png">
                </div>

                <!-- For jesse -->
            <?php } else { ?>
                <?php if ($this->session->has_userdata('Infected 3')) { ?>
                    <div id="i1" class="animated slideInUp">
                        <img src="<?= base_url();?>img/j_i5.png" width="397" height="883">
                    </div>

                <?php } elseif ($this->session->has_userdata('Infected 2')) { ?>
                    <div id="i1" class="animated slideInUp">
                        <img src="<?= base_url();?>img/j_i4.png" width="397" height="883">
                    </div>

                <?php } elseif ($this->session->has_userdata('Infected 1')) { ?>
                    <div id="i1" class="animated slideInUp">
                        <img src="<?= base_url();?>img/j_i3.png" width="397" height="883">
                    </div>

                <?php } elseif($this->session->has_userdata('Infected 0')){?>
                    <div id="i1" class="animated slideInUp">
                        <img src="<?= base_url();?>img/j_i2.png" width="397" height="883">
                    </div>

                <?php } else { ?>
                    <div id="i1" class="animated slideInUp">
                        <img src="<?= base_url();?>img/j_i1.png" width="397" height="883">
                    </div>
                <?php } ?>
                <div id="j_n" class="animated slideInUp">
                    <img src="<?= base_url();?>img/j_bb.png" width="398">
                </div>
            <?php } ?>

            <!-- Hint Button -->                
            <?php if ($this->session->userdata('Agent') == 'yes') {?>
                <div id="agent">
                    <a class="hint" class="animated bounceOutUp">
                        <?php if ($this->session->userdata('Current Agent Avatar') == 'none' && $this->session->userdata('Streak') == 0){ ?>
                            <img src="<?= base_url();?>img/agent/Neutral (frame 1).png" class="agent animated pulse" id="hint-button">
                        <?php } elseif ($this->session->userdata('Streak') > 0 && $this->session->userdata('Streak') < 5){ ?>
                            <img src="<?= base_url();?>img/agent/Positive (frame 1).png" class="agent animated pulse" id="hint-button">
                        <?php } elseif ($this->session->userdata('Streak') >= 5){ ?>
                            <img src="<?= base_url();?>img/agent/Fired-up Face (frame 1).png" class="agent animated pulse" id="hint-button">
                        <?php } else { ?>
                            <img src="<?php echo $this->session->userdata('Current Agent Avatar')?>" class="agent animated pulse" id="hint-button">
                        <?php } ?>
                    </a>
                </div>
            <?php } else {?>
                <div id="briefcase">
                    <a class="hint" class="animated bounceOutUp">
                        <img src="<?= base_url();?>img/case.png" class="briefcase" id="hint-button">
                    </a>
                </div>
            <?php }?> 
        </div>
    </section>
</form>
<script type="text/javascript" src="<?= base_url();?>js/hint.js"></script>