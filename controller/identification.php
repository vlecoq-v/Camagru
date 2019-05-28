<?php
if ($_POST['submit-login']) {
	$user = new user();
	if ($user->check_active($_POST['username'])) {
		if ($user->connect($_POST['username'], $_POST['pwd'])) {
			echo "<script type='text/javascript'> document.location = '/index.php'; </script>";
		}
		else
			display_warning('Wrong credentials');
	}
	else 
		display_warning('You must verify your email before your connect');
}
else if ($_POST['submit-register']) {
	$user = new user();
	if ($user->mail_exists($_POST['mail']) || $user->username_exists($_POST['username'])) {
		exit (display_warning("mail or username already exists"));
	}
	else if (!mail_is_correct($_POST['mail'])) {
		display_warning("mail is incorrect</br>");
	}
	else if (!pwd_is_correct($_POST['pwd'])) {
		exit (display_warning("pwd should contain at least 1 normal case letter,
			1 upper case letter and 1 number</br>"));
	}
	else if ($user->create_new($_POST['mail'], $_POST['pwd'], $_POST['username'])) {
		display_success('your account was created ! </br>
			Please click on the activation link you received via mail to finalize your subscription');
		// echo "<script type='text/javascript'> document.location = '/index.php'; </script>";
		send_mail();
		// $user->connect($_POST['username']);
	}
	else {
		display_warning("unexpected failure");
	}
}

require_once('view/identification.php');

function send_mail() {
	$to = $_POST['mail'];
	$subject = 'Signup | Verification'; 
	$headers = 'From:noreply@camagru.com' . "\r\n";
	$message = '
	
	Thanks for signing up!
	Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
	
	------------------------
	Username: '.$_POST['username'].'
	------------------------
	
	Please copy this link to activate your account:
	localhost:4200/index.php?action=verify&username='.$_POST['username'].'&hash='.hash('whirlpool', $_POST['pwd']).'';
	mail($to, $subject, $message, $headers);
}