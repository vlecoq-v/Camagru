<?php
// session_reset();
session_start();

require_once('view/header.php');
require_once('controller/controller.php');
include_once('controller/lib.php');
// echo $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

// echo $user->get_info();

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'identification') {
		identification();
	}
	else if ($_GET['action'] == 'log_out') {
		log_out();
	}
	else if ($_GET['action'] == 'my_account') {
		my_account();
	}
	else if ($_GET['action'] == 'download') {
		download();
	}
	else 
		display_warning("An Error has occured");
}
else {
	require_once('view/Homepage.php');
}
require_once('view/footer.php');