<?php
// session_reset();
session_start();

require_once('view/header.php');
// require_once('controller/controller.php');

echo $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'identification') {
		identification();
	}
	else if ($_GET['action'] == 'log_out') {
		// header('Location: http://localhost:4200/index.php?action=identification');
		// log_out();
		// $_SESSION['logged'] = 0;
		// header('Location:http://localhost:4200/index.php');
	}
}
else {
	require_once('view/Homepage.php');
}
require_once('view/footer.php');