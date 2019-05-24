<?php
// session_reset();
session_start();

require_once('view/header.php');
require_once('controller/controller.php');
include_once('controller/lib.php');

if (isset($_GET['action']) AND $_SESSION['logged'] == 1) {
	if ($_GET['action'] == 'identification')
		identification();
	else if ($_GET['action'] == 'log_out')
		log_out();
	else if ($_GET['action'] == 'my_account')
		my_account();
	else if ($_GET['action'] == 'download')
		download();
	else if ($_GET['action'] == 'upload')
		upload();
	else if ($_GET['action'] == 'picture')
		require_once('view/picture.php');
	else if ($_GET['action'] == 'pic_view')
		pic_view($_GET['pic_id']);
	else if ($_GET['action'] == 'like')
		like();
	else 
		display_warning("The page you are trying to find is not here!");
}
else if (isset($_GET['action']) AND $_SESSION['logged'] == 0) {
	if ($_GET['action'] == 'identification')
		identification();
	else if ($_GET['action'] == 'picture')
		identification();
	else if ($_GET['action'] == 'pic_view')
		identification();
}
else
	homepage($_GET['offset']);

require_once('view/footer.php');