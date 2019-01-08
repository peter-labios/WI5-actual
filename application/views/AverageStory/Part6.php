<audio autoplay hidden>
    <source src="<?= base_url();?>sound/BGMusic.wav" type="audio/wav"> Your browser does not support the audio element.
    </audio>
    <section>
        <div id="a6" class="scene">
            <div id="as1">
                <img src="<?= base_url();?>img/as1.png" width="102" height="142">
            </div>
            <div id="ass">
                <img src="<?= base_url();?>img/as2.png" width="70" height="100">
            </div>
            <div id="as3">
                <img src="<?= base_url();?>img/as3.png" width="70" height="100">
            </div>
            <div id="as4">
                <img src="<?= base_url();?>img/as4.png" width="70" height="100">
            </div>
            <?php if($this->session->userdata('Avatar') == 'boy'){?>
            <p>After a long day of travelling and job applications, Nick was already feeling <u>inauspicious</u>. But picturing his future made him optimistic <br> and even pushed himself further by saying “I am a <u>high flyer</u>, I can do this”, and seized another day with hope in his eyes.
            </p>
            <?php } else { ?>
            <p>After a long day of travelling and job applications, Jesse was already feeling <u>inauspicious</u>. But picturing her future
              made her optimistic
              <br> and even pushed herself further by saying “I am a <u>high flyer</u>, I can do this”, and seized another day with hope
              in her eyes.
            </p>
      </div>    
      <?php } ?>

  </div>
</section>
<!-- change a6.html sa link for average job application-->
<a href="<?= base_url();?>Game/Quiz_Average" class="btn" class="animated bounceOutUp"> Next </a>
<a href="<?= base_url();?>Load/Average5" class="btn2" class="animated bounceOutUp"> Back</a>
