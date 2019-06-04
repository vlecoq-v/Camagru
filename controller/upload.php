<?php
session_start();

$photo = new photo;
$user = new user;

// $verifyimg = getimagesize($_POST['img']);

// if ($verifyimg['mime'] != 'image/png') {
//     echo $verifyimg['mime'];
//     echo "Only PNG images are allowed!";
//     exit;
// }

$path = $photo->decode($_POST['img'], $_POST['filter'], 0, 0);
$photo->register($_SESSION['user']['usr_id'], $path);
add_gallery();


function add_gallery() {
    $pic = new pics();

    $pic->get_users();
    // print_r($pic->new);
    // print_r($pic->all[0]);
    echo "<a id='new_pic'>" . $pic->all[0]['pic_id'] . "</a>";
    // echo "add_my_gallery(" . $pic->all[0]['pic_id'] . ")";
    // echo "<script src='public/js/webcam.js'> add_my_gallery(" . $pic->all['pic_id'] . ") </script>";
}