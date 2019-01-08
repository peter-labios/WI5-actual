<meta http-equiv="refresh" content="5; url=<?= base_url();?>Game_Menu">
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
                <div id ="solo-score">
                    <table id="solo-score-table">
                        <tr>
                            <td id="solo-content"><?php print_r($myscores[0]->Score) ?>/10</td>
                        </tr>
                        <tr>
                            <td id="solo-content"><?php print_r($myscores[1]->Score) ?>/10</td>
                        </tr>
                        <tr>
                            <td id="solo-content"><?php print_r($myscores[2]->Score) ?>/10</td>
                        </tr>
                    </table>
                    <br/>
                </div>
                <div id="salute">
                    <?php if($standing === "low") { ?>
                    <img id="speech-bubble" src="<?= base_url();?>img/speechbubbleLOW.png" />
                    <?php } elseif ($standing === "high") { ?>
                    <img id="speech-bubble" src="<?= base_url();?>img/speechbubbleHIGH.png" />
                    <?php } else {?>
                    <img id="speech-bubble" src="<?= base_url();?>img/speechbubbleAVE.png" />
                    <?php }?>
                    <img id="nick-salute" src="<?= base_url();?>img/j_32.png" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">

        <a href="<?= base_url();?>Game_Menu" class="btn2" class="animated bounceOutUp"> Back </a>
    </div>

</section>
