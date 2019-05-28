<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turansuforumu</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="public/css/style_id.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="public/css/mycss.css">
  </head>
  <body>
	  <!-- nvabar ---------------------------------------------------------------------------------------->
		<nav class="navbar is-primary is-bold" role="navigation" aria-label="main navigation">
			<div class="navbar-brand">
				<a href="index.php?offset=0" class="navbar-item">
					<img src="../public/img/filters/ramen-logo.png" alt="Turn your world into a funky manga one">
				</a> 
				<a role="button" class="navbar-burger" data-target="Mynavbar">
					<span></span>
					<span></span>
					<span></span>
				</a>
			</div>
			<div class="navbar-menu" id="Mynavbar">
				<a href="index.php?action=picture" class="navbar-item">
					<span class="icon">
						<i class="fas fa-camera"></i>
					</span>
				</a>
				<?php 
					if ($_SESSION['logged'] == 1) {
						echo "<a href='index.php?action=my_account' class='navbar-item'>
							<span class='icon'>
								<i class='fas fa-address-card'></i>
							</span>
						</a>";
						echo "<a href='index.php?action=log_out' class='navbar-item'>
							<span class='icon'>
								<i class='fas fa-sign-out-alt'></i>
							</span>
						</a>";
					}
					else {
						echo "<a href='index.php?action=identification' class='navbar-item'>
							<span class='icon'>
								<i class='fas fa-sign-in-alt'></i>
							</span>
						</a>";
					}
				?>
			</div>
		</nav>
		<script src="public/js/burger.js"></script>
	</body>
</html>