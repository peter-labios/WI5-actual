
<form action="<?php echo base_url(); ?>GameController/validateAnswers/Test_Easy" method="post">
  <!-- BODY -->
  <div id="plain-bg">
    <h2 class="title">POP QUIZ 1</h2>
    <br/>
    <div class="center">
      <div id="comp-skills">
        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
        <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->

        <form action="" id="q1">

          <?php foreach ($RandomizedQuestions as $key => $QandA): ?>
            <h4><?= ($key+1). ". ". $QandA->Question?></h4>

            <input type="radio" name="Answers[<?=  $key;?>]" value="True" required> True<br>
            <input type="radio" name="Answers[<?=  $key;?>]" value="False" required> False<br>
            <br/>
          <?php endforeach ?>
        </form>
        <br/>
        <br/>

      </div>
    </div>
    <button class="btn-login" type="Submit">Submit</button>
  </div>
  <!-- BODY END -->
</form>