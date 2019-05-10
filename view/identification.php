	<body>
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
					<input type="password" name="pwd" placeholder="password" id="pwd" required>
					<input type="submit" value="Login" id="submit-login" name="submit-login">
					<!-- <input type="text" name="test" placeholder="TEST HTML injection"> -->
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
		
	</body>
</html>