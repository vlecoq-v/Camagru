<?php
require_once('view/header.php');
require_once('controller/controller.php');

if (isset($_GET['action'])) {
	if (isset($_GET['action']) == 'identification') {
		login();
	}
}
else {
	require_once('view/Homepage.php');
}
require_once('view/footer.php');