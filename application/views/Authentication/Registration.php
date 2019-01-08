<form action="<?php echo base_url(); ?>AccountController/ValidateAccount_Info" method="post">
	<row>
		<section id="indulge" class="container fullpage-bg">
			<div class="text-center level-select" id="ni">
				<h3 id="level-title">Registration</h3><br/>
				<div class="register">
					<div id="comp-skills">
						<h4>Username</h4>
						<input type="text" class="textbox" placeholder="Username" name="username" required>
						<h4>Password: </h4>
						<input type="password" class="textbox" placeholder="Password" name="password" required>
						<button id="btn-level-select" type="submit" value="Register">Register</button>
						<br/>
					</div>
				</div>
			</div>
		</section>
	</row>
</form>