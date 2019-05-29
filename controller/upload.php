<?php
session_start();

$photo = new photo;
$user = new user;

// print_r($_POST);
// echo "<img src ='" . $_POST['img'] . "'>";
// var_dump($_POST);
// die();
// if (!$user->connect($_SESSION['user']['username'])) {
// 	display_warning("we could not connect to your account");
// }
// echo $_POST['upload'];

$path = $photo->decode($_POST['img'], $_POST['filter']);
// echo $_SESSION['user']['usr_id'];
// $photo->register($_SESSION['user']['usr_id'], $path);
// echo $path;
// echo "<img src='" . $path . "'>";

// echo "in upload . php :" . "<img src='" . $_POST['data'] . "'>";

// // echo $path . "</br>";
// // echo $_POST['upload'];

// if (!$photo->register($_SESSION['user']['usr_id'], $path)) {
// 	display_warning("There was a problem uploading your picture");
// }