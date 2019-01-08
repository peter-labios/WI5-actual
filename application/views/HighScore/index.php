
<!-- BODY END -->
<audio autoplay hidden loop>
   <source src="<?= base_url();?>sound/BackgroundMusic.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>
<section id="indulge" class="container fullpage-bg">
    <div class="text-center level-select demog-box" id="ni">
        <br/>
        <div>
            <div>
                <div id ="high-score">
                    <table id="score-table">
                        <tr>
                            <td id="score-name"><?php print_r($easy_hs[0]->Name) ?></td>
                            <td id="scores"><?php print_r($easy_hs[0]->Score) ?></td>
                        </tr>
                        <tr>
                            <td id="score-name"><?php print_r($average_hs[0]->Name) ?></td>
                            <td id="scores"><?php print_r($average_hs[0]->Score) ?></td>
                        </tr>
                        <tr>
                            <td id="score-name"><?php print_r($difficult_hs[0]->Name) ?></td>
                            <td id="scores"><?php print_r($difficult_hs[0]->Score) ?></td>
                        </tr>
                    </table>
                    <br/>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">

        <a href="<?= base_url();?>Game_Menu" class="btn2" class="animated bounceOutUp"> Back </a>
    </div>

</section>
