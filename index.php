<?php
// session_reset();
session_start();

require_once('view/header.php');
require_once('controller/controller.php');

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'identification') {
		identification();
	}
}
else {
	require_once('view/Homepage.php');
}
require_once('view/footer.php');