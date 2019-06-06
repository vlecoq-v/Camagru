	<body>
	<section class="hero">
		<div class="identification">
			<div class="login">
				<h1>Login</h1>
				<form action="index.php?action=identification" method="post">
					<label for="username_login">
						<i class="fas fa-user"></i>
					</label>
					<input type="text" name="username" placeholder="username" id="username" required>
					<label for="password">
						<i class="fas fa-lock"></i>
					</label>
					<input type="password" name="pwd" placeholder="password" id="pwd">
					<input type="submit" value="Login" id="submit-login" name="submit-login">
				</form>
			</div>
			<div class="register">
				<h1>Register</h1>
				<form action="index.php?action=identification" method="post">
					<label for="mail">
						<i class="fas fa-user"></i>
					</label>
					<input type="text" name="mail" placeholder="mail" id="mail_rgstr" required>
					<label for="mail">
						<i class="fas fa-child"></i>
					</label>
					<input type="text" name="username" placeholder="username" id="username_rgstr" required>
					<label for="password">
						<i class="fas fa-lock"></i>
					</label>
					<input type="password" name="pwd" placeholder="password" id="pwd_rgstr" required>
					<input type="submit" value="Register" id="submit-register" name="submit-register">
				</form>
			</div>
		</div>
		<div class="forgotten has-text-centered">
			<button class="button is-danger" id="btn_forgotten" onclick="forgotten_mail()">Forgotten you Password?</button>
		</div>
		<div id="overlay_back"></div>
			<div id="overlay">
				<div id="container_overlay">
					<div class="card">
						<div class="card-content">
							<div class="media">
								<form action="index.php?action=identification&message=mail_sent" method="post">
									<div class="control">
										<input class='input is-info' name='mail' type='text' placeholder='Please enter your email'>
									</div>
								</div>
								<div class="media">
									<div class="control">
										<button id="OK_button" name="cancel_button" class="button is-danger">Cancel</button>
									</div>
									<div class="control">
										<button id="cancel_button" name="OK_button" value="OK" class="button is-info">OK</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> 
	<section>
	<script src="Public/js/forgotten_mail.js"></script>
	</body>
</html>