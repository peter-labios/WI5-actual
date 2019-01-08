
<form action="<?php echo base_url(); ?>AccountController/ValidateData/UAT" method="post">
  <!-- BODY -->
  <div id="plain-bg">
    <h2 class="title">Usability Test Questionnaire</h2>
    <br/>
    <div class="center">
      <div id="comp-skills">

        <?php foreach ($uat as $key => $question): ?>
          <?php if($key == 0){ ?>
          <h3 class="subtitle">Usability</h3>
          <?php } elseif($key == 3){ ?>
          <h3 class="subtitle">Aesthetics</h3>
          <?php } elseif($key == 6){ ?>
          <h3 class="subtitle">Content</h3>
          <?php } elseif($key == 9){ ?>
          <h3 class="subtitle">Feedback</h3>
          <?php } elseif($key == 12){ ?>
          <h3 class="subtitle">Web Behavior</h3>
          <?php }?>

          <h4 id="utq-text"><?= ($key+1). ". ". $question->Question?></h4>
            <input type="radio" name="Answers[<?=  $key;?>]" value="1" required> Strongly Disagree<br>
            <input type="radio" name="Answers[<?=  $key;?>]" value="2" required> Disagree<br>
            <input type="radio" name="Answers[<?=  $key;?>]" value="3" required> Neutral<br>
            <input type="radio" name="Answers[<?=  $key;?>]" value="4" required> Agree<br>
            <input type="radio" name="Answers[<?=  $key;?>]" value="5" required> Strongly Agree<br>
          <br/><br/>
        <?php endforeach ?>
      </div>
      <button id="btn-level-select">Submit</button>
    </div>
  </div>
</form>
        <!-- BODY END -->