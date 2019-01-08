

        <!-- BODY -->
<form action="<?php echo base_url(); ?>AccountController/ValidateAccount" method="post">
        <div class="bg-body login-full">
            <h2 class="title">Login to Word Infection</h2>
            <br/>
            <div class="center">
                <div>
                    <input type="text" class="textbox" placeholder="Username" name="txt_Username" required>
                    <br/>
                    <br/>
                </div>
                <div>
                    <input type="password" class="textbox" placeholder="Password" name="txt_Password" required>
                </div>
                <br/>
                <button class="btn-login" type="submit" value="Login">Login</button>
            </div>
        </div>
        </form>
        <!-- BODY END -->