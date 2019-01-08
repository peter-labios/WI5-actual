
    <form action="<?php echo site_url("GameController/SelectDifficultyLevel");?>" method="post">
        <!-- BODY -->
        <row>
            <section id="indulge" class="container fullpage-bg">
                <div class="text-center level-select" id="ni"><br/>
                    <h3 id="level-title">Level Select</h3>

                    <?php if($this->session->userdata('easy') == 'finished'){ ?>
                    <button id="btn-level-select-locked" name="Answer" value="Easy">Easy</button><br/>
                    <?php } elseif($this->session->userdata('easy') == 'optional'){ ?> 
                    <button id="btn-level-select" name="Answer" value="Easy">Easy (Optional)</button><br/>
                    <?php } else { ?>
                    <button id="btn-level-select" name="Answer" value="Easy">Easy</button><br/>
                    <?php } ?>

                    <?php if($this->session->userdata('average') == 'finished'){ ?>
                    <button id="btn-level-select-locked" name="Answer" value="Average">Average</button><br/>
                    <?php } elseif($this->session->userdata('average') == "optional"){ ?> 
                    <button id="btn-level-select" name="Answer" value="Average">Average (Optional)</button><br/>
                    <?php } else { ?>
                    <button id="btn-level-select" name="Answer" value="Average">Average</button><br/>
                    <?php } ?>

                    <?php if($this->session->userdata('difficult') == 'finished'){ ?>
                    <button id="btn-level-select-locked" name="Answer" value="Difficult">Difficult</button><br/>
                    <?php } elseif($this->session->userdata('difficult') == "optional"){ ?> 
                    <button id="btn-level-select" name="Answer" value="Difficult">Difficult (Optional)</button><br/>
                    <?php } else { ?>
                    <button id="btn-level-select" name="Answer" value="Difficult">Difficult</button><br/>
                    <?php } ?>
                </div>
            </section>
        </row>
    </form>
            <!-- BODY END -->