<?php
session_start();
require_once('controller/controller.php');
include_once('controller/lib.php');

// ********************** SPECIFIC AJAX PAGES **********************
if ($_GET['action'] == 'like')
	exit(like());
else if ($_GET['action'] == 'filter_pic')
	exit(filter_pic());
else if ($_GET['action'] == 'upload')
	exit(upload());

require_once('view/header.php');


// ********************** GENTLE REDIRECTION MESSAGE **********************
if (isset($_GET['msg']))
	display_warning("You need to connect or to create an account to perform this action :)");


// ********************** LOGGED ACTIONS **********************
if (isset($_GET['action']) AND $_SESSION['logged'] == 1) {
	if ($_GET['action'] == 'identification')
		identification();
	else if ($_GET['action'] == 'log_out')
		log_out();
	else if ($_GET['action'] == 'my_account')
		my_account();
	else if ($_GET['action'] == 'download')
		download();
	else if ($_GET['action'] == 'picture')
		picture();
	else if ($_GET['action'] == 'pic_view')
		pic_view($_GET['pic_id']);
	else if ($_GET['action'] == 'delete_pic')
		delete_pic($_POST['id']);
	else if ($_GET['action'] == 'verify')
		verify();
	else
		display_warning("The page you are trying to find is not here!");
}


// ********************** UNLOGGED ACTIONS **********************
else if (isset($_GET['action']) AND $_SESSION['logged'] == 0) {
	if ($_GET['action'] == 'identification')
		identification();
	else if ($_GET['action'] == 'verify')
		verify();
	else {
		display_warning("You need to connect or to create an account to access this page :)");
		identification();
	}
}
else
	homepage($_GET['offset']);

require_once('view/footer.php');