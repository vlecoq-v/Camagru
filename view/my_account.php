<!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
		<link href="public/css/style_id.css" rel="stylesheet" type="text/css">
	</head> -->
	<body>
		<section class="hero">
			<div class="identification">
				<div class="chg_info">
					<h1>Your credentials</h1>
					<form action="index.php?action=my_account" method="post">
						<label for="mail">
							<i class="fas fa-user"></i>
						</label>
						<input type="text" name="mail" placeholder="<?php echo $_SESSION['user']['mail']?>" id="mail_rgstr" required>
						<input type="submit" value="update my mail" id="submit_chg_mail" name="submit_chg_mail">
					</form>
					<form action="index.php?action=my_account" method="post">
						<label for="username">
							<i class="fas fa-child"></i>
						</label>
						<input type="text" name="username" placeholder="<?php echo $_SESSION['user']['username']?>" id="username_rgstr" required>
						<input type="submit" value="update my username" id="submit_chg_username" name="submit_chg_username">
						<!-- <button type="button" value="update my username" id="submit_chg_username"></button> -->
					</form>
						<!-- <button id="submit_chg_username"></button> -->
					<form action="index.php?action=my_account" method="post">
						<label for="password">
							<i class="fas fa-lock"></i>
						</label>
						<input type="password" name="pwd" placeholder="password" id="pwd_rgstr" required>
						<input type="submit" value="update my password" id="submit_chg_pwd" name="submit_chg_pwd">
					</form>
				</div>
			</div>
			<div class="forgotten has-text-centered">
				<form action="index.php?action=my_account" method="post">
				<?php 
					if($_SESSION['user']['email_notif'] == 1)
						echo "<button class='button is-danger' id='btn_forgotten' name='button_notif' value='deactivate'>Deactivate email notifications</button>";
					else 
						echo "<button class='button is-primary' id='btn_forgotten' name='button_notif' value='activate'>Activate email notifications</button>";
				?>
				</form>
			</div>
			<div class="forgotten has-text-centered">
			</div>
		</section>
	</body>
</html>