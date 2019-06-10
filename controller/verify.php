<?php
if ($_GET['username'] && $_GET['hash']) {
	$username = $_GET['username'];
	$hash = $_GET['hash'];

	$user = new user();
	if ($user->connect($username)) {
		if ($user->info['hash'] == $hash) {
			$user->set_active();
			echo "<script type='text/javascript'> document.location = '/index.php?message=validated'; </script>";
			display_success("Congrats, your email was verified and you are now logged in");
		}
	}
	else
		display_warning("the verifying link you received is not working");
}