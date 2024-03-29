<?php
require_once('model/photo.php');
require_once('model/user.php');
require_once('model/pics.php');
require_once('model/likes.php');
require_once('model/comments.php');

function identification() {
	require('identification.php');
}

function log_out() {
	require('log_out.php');
}

function my_account() {
	require('my_account.php');
}

function download() {
	require('download.php');
}

function upload() {
	require('upload.php');
}

function homepage($offset) {
	if (!isset($offset) || $offset < 0)
		$offset = 0;
	require('homepage.php');
}

function pic_view($pic_id) {
	if (!isset($pic_id)) {
		$offset = 0;
		echo "<script type='text/javascript'> document.location = '/index.php'; </script>";
	}
	else
		require_once('pic_view.php');
}

function like() {
	require('like.php');
}

function filter_pic() {
	require('filter_pic.php');
}

function verify() {
	require('verify.php');
}

function picture() {
	require('picture.php');
	require_once('view/picture.php');
}

function delete_pic($id) {
	require_once('delete_pic.php');
}