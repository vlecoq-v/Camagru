<?php
require_once('view/identification.php');

print_r($_POST);

if ($_POST['submit-login']) {
	include('model/user.php');
	$user = new user();
	echo '</br> attempting to connect in controller/identification.php</br>';
	// echo getcwd();
	// echo htmlspecialchars($_POST['test']), '</br>';
	if ($user->connect($_POST['mail'], $_POST['pwd'])) {
		echo 'connected, ';
		$user->get_info();
	}
}

else if ($_POST['submit-register']) {
	include('model/user.php');
	$user = new user();
	echo '</br> attempting to CREATE NEW USER in controller/identification.php</br>';
	// echo getcwd();
	// echo htmlspecialchars($_POST['test']), '</br>';
	if ($user->create_new($_POST['mail'], $_POST['pwd'], $_POST['pseudo'])) {
		echo 'created, ';
		$user->connect($_POST['mail'], $_POST['pwd']);
		$user->get_info();
	}
	else {
		echo "failed";
	}
}
?>