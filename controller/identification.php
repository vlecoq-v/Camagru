<?php
require_once('view/identification.php');

if ($_POST['submit-login']) {
	$user = new user();
	if ($user->connect($_POST['username'], $_POST['pwd'])) {
		echo "<script type='text/javascript'> document.location = '/index.php'; </script>";
	}
	else
		echo display_warning('Wrong credentials');
}
else if ($_POST['submit-register']) {
	$user = new user();
	if ($user->mail_exists($_POST['mail']) || $user->username_exists($_POST['username'])) {
		exit (display_warning("mail or username already exists"));
	}
	if (!mail_is_correct($_POST['$mail'])) {
		exit (display_warning("mail is incorrect</br>"));
	}
	if (!pwd_is_correct($_POST['pwd'])) {
		exit (display_warning("pwd should contain at least 1 normal case letter,
			1 upper case letter and 1 number</br>"));
	}
	if ($user->create_new($_POST['mail'], $_POST['pwd'], $_POST['username'])) {
		display_success('your account was created ! </br>
			Please click on the activation link you received via mail to finalize your subscription');
		echo "<script type='text/javascript'> document.location = '/index.php'; </script>";		
		$user->connect($_POST['username']);
	}
	else {
		display_warning("failed");
	}
}
?>