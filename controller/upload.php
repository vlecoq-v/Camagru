<?php
session_start();

$photo = new photo;
$user = new user;

$verifyimg = getimagesize($_POST['img']);

if ($verifyimg['mime'] != 'image/png') {
    echo "Only PNG images are allowed!";
    exit;
}

$path = $photo->decode($_POST['img'], $_POST['filter'], 0, 0);
$photo->register($_SESSION['user']['usr_id'], $path);