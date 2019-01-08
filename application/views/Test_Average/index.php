
<form action="<?php echo site_url("GameController/validateAnswers/Test_Average");?>" method="post">
  <!-- BODY -->
  <div id="plain-bg">
    <h2 class="title">POP QUIZ 2</h2>
    <br/>
    <div class="center">
      <div id="comp-skills">
        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
        <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->

        <?php foreach ($RandomizedQuestions as $key => $QandA): ?>
          <h4><?= ($key+1). ". ". $QandA->Question?></h4>
              <input type="radio" name="Answers[<?=  $key;?>]" value="<?php echo $QandA->Trick1; ?>" required> <?php echo $QandA->Trick1; ?><br>
                <input type="radio" name="Answers[<?=  $key;?>]" value="<?php echo $QandA->Trick2; ?>" required> <?php echo $QandA->Trick2; ?><br>
                  <input type="radio" name="Answers[<?=  $key;?>]" value="<?php echo $QandA->Trick3; ?>" required> <?php echo $QandA->Trick3; ?><br>
                    <input type="radio" name="Answers[<?=  $key;?>]" value="<?php echo $QandA->Answer; ?>" required> <?php echo $QandA->Answer; ?><br>

                    <br/> <br/>
                  <?php endforeach ?>
              </div>
            </div>
            <button class="btn-login" type="Submit">Submit</button>
          </div>
          <!-- BODY END -->
        </form>