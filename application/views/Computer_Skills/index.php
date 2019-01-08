

<!-- BODY -->
<form action="<?php echo base_url(); ?>AccountController/ValidateData/Computer_Skills" method="post">
        <row>
            <section id="indulge" class="container fullpage-bg">
                <div class="text-center bg-full" id="ni">
                    <h3 id="level-title">Computer Skills</h3>
                    <br/>
                    <div class="comp-skills-box">
                        <div id="comp-skills">
                          <?php foreach ($Computer_Skills as $key => $question): ?>
                            <h4 class="comp-skills-text"><?= ($key+1). ". ". $question->Question?></h4>
                            <input type="radio" name="Answers[<?=  $key;?>]" value="Yes" required> Yes
                            <br>
                            <input type="radio" name="Answers[<?=  $key;?>]" value="No" required> No
                            <br>
                            <?php endforeach ?>
                        </div>
                        <button id="btn-level-select" type="Submit" value="Submit">Submit</button>
                        <br/>
                    </div>
                </div>
            </section>
        </row>
</form>
        <!-- BODY END -->