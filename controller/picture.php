<?php
session_start();

function post_user () {
	$pics = new pics();

	$pics->get_users();
	foreach ($pics->all as $post) {
		html_old_posts($post);
	}
}

function html_old_posts($post) {
	echo "
	<img src='" . $post['pic_path'] . "' id='pic_src_gallery" . $post['pic_id'] . "'>
	";
}