<?php
include_once('lib.php');

function identification() {
	require('identification.php');
}

function log_out() {
	require('log_out.php');
	// header('Location: index.php?action=identification');
	// $_SESSION['logged'] = 0;
	// unset($_SESSION['user']);
	// require_once('view/Homepage.php');
}