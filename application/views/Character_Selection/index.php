<form action="<?php echo base_url(); ?>AccountController/ValidateSkills" method="post">
<audio autoplay hidden loop>
     <source src="sound/BackgroundMusic.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
    </audio>
<row>
    <section id="indulge" class="container fullpage-bg">
	<div class="col-12  text-center ">
    <div id="cc" class="animated  bounceInUp">
    <img src="<?= base_url();?>img/cc.png" class="logo-img">
    </div>
    </div>
    
    <div class="col-6  text-center">
     <div id="g2" class="animated slideInLeft">   
            <img src="<?= base_url();?>img/g2.png" class="center-block responsive-img" >
            </div>
	    <div id="g1" class="animated slideInLeft">
          <a href="<?= base_url();?>Load/girl">
            <img src="<?= base_url();?>img/g.png" class="center-block responsive-img" >
            </a>
            </div>
    </div>

      <div class="col-6 text-center">
        <div id="b2" class="animated slideInRight">
            <img src="<?= base_url();?>img/b2.png" class="center-block responsive-img" >
            </div>
	    <div id="b1" class="animated slideInRight">
             <a href="<?= base_url();?>Load/boy">
            <img src="<?= base_url();?>img/b.png" class="center-block responsive-img" >
			</a>
            </div>
      </div>
        

    </section>
</row>
</form>