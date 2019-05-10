<?php
require_once("view/my_account.php");
include('model/user.php');

$user = new user();
// print_r($_SESSION['user']);
if (!$user->connect($_SESSION['user']['username'])) {
	exit(display_warning("something went wrong connecting to your account"));
}

if ($_POST['submit_chg_mail']) {
	if (!mail_is_correct($_POST['mail'])) {
		exit (display_warning("mail is incorrect</br>"));
	}
	else if ($user->mail_exists($_POST['mail'])) {
		exit (display_warning("mail already exists"));
	}
	if ($user->change_mail($_POST['mail'])) {
		// echo "victoire !";
		$user->update_cookie();
		echo "<script type='text/javascript'> document.location = '/index.php?action=my_account'; </script>";		
		display_success('your account information was updated!');
	}
	// echo "Mamen";
}
else if ($_POST['submit_chg_username']) {
	if ($user->username_exists($_POST['username'])) {
		exit (display_warning("username already exists"));
	}
	if ($user->change_username($_POST['username'])) {
		// echo "victoire !";
		$user->update_cookie();
		// echo "<script type='text/javascript'> document.location = '/index.php?action=my_account'; </script>";		
		display_success('your account information was updated!');
	}
	// echo "Mamen";
}
else if ($_POST['submit_chg_pwd']) {
	if (!pwd_is_correct($_POST['pwd'])) {
		echo $_POST['pwd'];
		exit (display_warning("pwd is incorrect</br>"));
	}
	if ($user->change_pwd($_POST['pwd'])) {
		// echo "victoire !";
		$user->update_cookie();
		echo "<script type='text/javascript'> document.location = '/index.php?action=my_account'; </script>";		
		display_success('your account information was updated!');
	}
	// echo "Mamen";
}