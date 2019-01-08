
<audio autoplay hidden loop>
   <source src="<?= base_url();?>sound/BackgroundMusic.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>
<!-- BODY -->
<row>
    <section id="home">
        <div class="col-12 text-center">
            <div id="logo" class="animated bounce">
                <img src="<?= base_url();?>img/t.png" class="logo-img">
            </div>
        </div>
        <div class="col-6 text-center">
            <div id="play" class="animated bounceInUp">
                <a href="<?= base_url();?>GameController/HasAvatar"><img src="<?= base_url();?>img/play.png" class="help"></a>
            </div>
            <div id="ins" class="animated bounceInUp">
                <a href="<?= base_url();?>Load/Levels"><img src="<?= base_url();?>img/ins.png" class="help"></a>
            </div>
            <div id="hs" class="animated bounceInUp">
                <a href="<?= base_url();?>Load/HighScores"><img src="<?= base_url();?>img/hs.png" class="help" ></a>
            </div>
        </div>
        <div class="col-6">
            <div id="m1">
                <img src="<?= base_url();?>img/m1.png" class="logo-img" >
            </div>
            <div id="run">
                <img src="<?= base_url();?>img/run.png" class="logo-img" >
            </div>
        </div>
    </section>
</row>
            <!-- BODY END -->