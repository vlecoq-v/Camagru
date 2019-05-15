<?php
session_start();

$photo = new photo;
$user = new user;

if (!$user->connect($_SESSION['user']['username'])) {
	display_warning("we could not connect to your account");
}
// echo $_POST['upload'];


$path = $photo->decode($_POST['upload']);
// echo "in upload . php :" . "<img src='" . $_POST['upload'] . "'>";

// echo $path . "</br>";
// echo $_POST['upload'];

if (!$photo->register($_SESSION['user']['usr_id'], $path)) {
	display_warning("There was a problem uploading your picture");
}
echo "<img src='" . $path . "'>";