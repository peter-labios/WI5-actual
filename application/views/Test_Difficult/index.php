

<form action="<?php echo site_url("GameController/validateAnswers/Test_Difficult");?>" method="post">
 <!-- BODY -->
 <div id="plain-bg">
  <h2 class="title">POP QUIZ 3</h2>
  <br/>
  <div class="center">
    <div id="comp-skills">
      <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
      <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
      <form action="" id="q1">
        <?php foreach ($RandomizedQuestions as $key => $QandA): ?>
          <h4><center><?= $key+1?>. <?= $QandA->Question?></center></h4>
          <input type="text" class="diff-tb" name="Answers[]"  required/>
          <br/> <br/>
        <?php endforeach ?>
      </form>
    </div>
  </div>
  <button class="btn-login" type="Submit">Submit</button>
</div>
<!-- BODY END -->
</form>