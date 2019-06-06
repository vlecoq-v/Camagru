<?php
session_start();

$photo = new photo;
$user = new user;

// ********************** DECODE PICTURE AND FILTER INFORMATION AND MERGE **********************
$path = $photo->decode($_POST['img'], $_POST['filter'], $_POST['filterX'], $_POST['filterY']
    , $_POST['preview_width'], $_POST['preview_height']);

$photo->register($_SESSION['user']['usr_id'], $path);

// ********************** AJAX ADD TO GALLERY **********************
add_gallery();

function add_gallery() {
    $pic = new pics();

    $pic->get_users();
    echo $pic->all[0]['pic_id'] . ";";
    echo $pic->all[0]['pic_path'] . ";";
}