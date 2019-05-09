<?php
require_once('view/identification.php');

// print_r($_POST);

if ($_POST['submit-login']) {
	include('model/user.php');
	$user = new user();
	// print_r($_POST);
	if ($user->connect($_POST['username'], $_POST['pwd'])) {
		$_SESSION['logged'] = 1;
		$_SESSION['user'] = $user->get_info();
		print_r($_SESSION);
		// header('Location: http://localhost:4200/index.php');
		// header("Refresh:0");
		// echo 'connected, ';
		// $user->get_info();
	}
	else
		echo display_warning('Wrong credentials');
}
else if ($_POST['submit-register']) {
	include('model/user.php');
	$user = new user();
	// print_r($_POST);
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
		// $user->connect($_POST['mail'], $_POST['pwd']);
		// $user->get_info();
	}
	else {
		display_warning("failed");
	}
}
?>