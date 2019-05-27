<?php
$comm = new comm();
$like = new likes();

$pic_id = $_GET['pic_id'];
$like->get_likes($pic_id);
// echo $like->is_liked($pic_id);

if ($_POST['submit_comment']) {
	if (!$comm->new_comm($pic_id, $_SESSION['user']['usr_id'], $_POST['comment']))
		display_warning("There was an error posting your comment");		
}

$comm->get_all($pic_id);
pic_info($pic_id, $comm->all, $like->count, $like->is_liked($pic_id));

function pic_info($pic_id, $comm_all, $like_count, $is_liked) {
	$pic = new pics();
	if (!$pic->get_1($pic_id))
		exit(display_warning("no post at this address"));
	else {
		html_pic($pic->new, $_SERVER['QUERY_STRING'], $comm_all, $like_count, $is_liked, $pic_id);
	}
}

function html_comments($pic_id, $comm_all) {
	$comm = new comm();
	$string = "";
	foreach($comm_all as $key => $comment) {
		$author = $comm->get_author($comment['user_id']);
		$string .= "
		<div class='content'>
			<p>
				<hr>
				<strong>@" . $author . "</strong><small>31m</small>
				<br>
				" . $comment['comm'] . "
			</p>

		</div>";
	}
	return ($string);
}

function html_pic($pic, $query_string, $comm_all, $like_count, $is_liked, $pic_id) {
	// print_r($pic);
	echo "
	<body>
		<section class='hero'>
			<div class='hero-body'>
				<div class='container post_media'>
					<figure class='image'>
						<img src='" . $pic['pic_path'] ."' alt=''>
					</figure>
					<nav class='level is-mobile post_level'>
						<a class='level-left'>
							<a>By <strong>" . $pic['username'] . "</strong></a>
						</a>";
	if ($is_liked) {
		echo "
						<a class='level-item'>
							<span class='icon is-small has-text-primary' id='" . $pic_id . "_like'><i class='fas fa-heart'></i></span>
							<span id='" . $pic_id . "_like_nb'>" . $like_count . "</span>
						</a>";}
	else {
		echo "
						<a class='level-item'>
							<span class='icon is-small' id='" . $pic_id . "_like'><i class='fas fa-heart'></i></span>
							<span id='" . $pic_id . "_like_nb'>" . $like_count . "</span>
						</a>";}
	echo "
					</nav>
					<article class='media'>
						<div class='media-content'>
							" . html_comments($pic['pic_id'], $comm_all) ."
							<form action='index.php?" . $query_string . "' method='post'>
								<div class='field'>
									<label class='label'>Comments!</label>
									<div class='control'>
										<input class='input is-info' name='comment' type='text' placeholder='Text input'>
									</div>
								</div>
								<div class='control'>
									<button class='button is-info' name='submit_comment' value='mamen' >Submit</button>
								</div>
							</form>
						</div>
					</article>
				</div>
			</div>
		</section>
	<script src='public/js/ajax_likes.js'></script>
	</body>";
}