<?php
$user = new user();


// ********************** CHECK THE FORM RETURN AND INFORMATION **********************
if ($_POST['submit-login']) {
	if ($user->connect($_POST['username'], $_POST['pwd'])) {
		if ($user->check_active($_POST['username'])) {
			echo "<script type='text/javascript'> document.location = '/index.php'; </script>";
		}
		else {
			$_SESSION['logged'] = 0;
			unset($_SESSION['user']);
			display_warning('You must verify your email before your connect');
		}
	}
	else
		display_warning('Wrong credentials');
}
else if ($_POST['submit-register']) {
	if ($user->mail_exists($_POST['mail']))
		display_warning("mail is already taken");
	else if (str_is_script($_POST['username'])) {
		display_warning("opening and closing <> are not allowed in username");
	}
	else if ($user->username_exists($_POST['username']))
		display_warning("username is already taken");
	else if (!mail_is_correct($_POST['mail']))
		display_warning("mail is incorrect</br>");
	else if (!pwd_is_correct($_POST['pwd']))
		display_warning("pwd should contain at least 1 normal case letter,
			1 upper case letter and 1 number</br>");
	else if ($user->create_new($_POST['mail'], $_POST['pwd'], $_POST['username'])) {
		display_success('your account was created ! </br>
			Please click on the activation link you received via mail to finalize your subscription');
		send_mail();
	}
	else
		display_warning("unexpected failure");
}

if ($_POST['OK_button']) {
	$new_pwd = randomPassword();
	if ($test = $user->set_info($_POST['mail'])) {
		$user->change_pwd($new_pwd);
		mail_chg_pwd($user->info, $new_pwd);
		display_success("an email was sent to you with your new password");
	}
	else 
		display_warning('We did not find that email, please try with another email address');
}

require_once('view/identification.php');


// ********************** MAIL FUNCTIONS **********************
function mail_chg_pwd($user, $new_pwd) {
	$to = $user['mail'];
	$subject = 'Change of password'; 
	$headers = 'From:noreply@camagru.com' . "\r\n";
	$message = '
	We have changed your credentials according to your demand. Your new credentials are:
	
	
	------------------------
	Username: '.$user['username'].'
	Password: '.$new_pwd.'
	------------------------
	
	Please copy this link to activate your account:
	http://localhost:4200/index.php?action=log_out';
	$mail = mail($to, $subject, $message, $headers);
}

function send_mail() {
	$user = new user();
	$user->connect($_POST['username']);
	$hash = $user->info['hash'];
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
	http://localhost:4200/index.php?action=verify&username='. $_POST['username'] . '&hash=' . $hash;
	mail($to, $subject, $message, $headers);
}


// ********************** PASSWORD GENERATION **********************
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}