<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turansuforumu</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
	<link rel="stylesheet" href="../public/css/mycss.css">
  </head>
	
  <body>
	  <!-- nvabar ---------------------------------------------------------------------------------------->
		<nav class="navbar is-primary" role="navigation" aria-label="main navigation">
			<div class="navbar-brand">
				<a href="index.php" class="navbar-item">
					<img src="../public/img/ramen-logo.png" alt="Turn your world into a funky manga one">
				</a>
				<button class="button navbar-burger">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
			<div class="navbar-menu">
			<?php 
				if ($_SESSION['logged'] == 1)
					echo "<a href='index.php/controller/log_out.php' class='navbar-item'>log out</a>";
				else
					echo "<a href='index.php?action=identification' class='navbar-item'>Identification</a>"
					// echo "<a href='index.php?action=identification' class='navbar-item'>Identification</a>"
			?>
				<!-- <a href="index.php?action=identification" class="navbar-item">Identification</a> -->
				<a href="" class="navbar-item">My pictures</a>
			</div>
		</nav>
	</body>
</html>