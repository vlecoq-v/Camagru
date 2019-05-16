<?php
$comm = new comm();

if ($_POST['submit_comment']) {
	if ($comm->new_comm($_GET['pic_id'], $_SESSION['user']['usr_id'], $_POST['comment'])) {
		// echo "SUCESS";
		// echo "<script type='text/javascript'> document.location = '/index.php?"
		// 	. $_SERVER['QUERY_STRING'] ."'; </script>";
	}
	else
		display_warning("There was an error posting your comment");
}

$comm->get_all($_GET['pic_id']);
// print_r($comm->all);
// print_r()

pic_info($pic_id, $comm->all);

function pic_info($pic_id, $comm_all) {
	// echo $pic_id;
	$pic = new pics();
	if (!$pic->get_1($pic_id))
		exit(display_warning("no post at this address"));
	else {
		html_pic($pic->new, $_SERVER['QUERY_STRING'], $comm_all);
	}
	// print_r($_SERVER['QUERY_STRING']);
}

function html_comments($pic_id, $comm_all) {
	$comm = new comm();
	$string = "";
	// print_r($comm_all);
	foreach($comm_all as $key => $comment) {
		// print_r($comment);
		$author = $comm->get_author($comment['user_id']);
		// echo "<h1>ICI</h1>";
		// echo $author;
		$string .= "
		<div class='content'>
			<p>
				<hr>
				<strong>" . $author . "</strong> <small>@johnsmith</small> <small>31m</small>
				<br>
				" . $comment['comm'] . "
			</p>

		</div>";
	}
	return ($string);
}

function html_pic($pic, $query_string, $comm_all) {
	// echo "ici";
	// print_r($comm_all);
	echo "
	<body>
		<section class='hero'>
			<div class='hero-body'>
				<div class='container post_media'>
					<figure class='image'>
						<img src='" . $pic['pic_path'] ."' alt=''>
					</figure>
					<nav class='level is-mobile post_level'>
						<a class='level-item'>
							<span class='icon is-small'><i class='fas fa-heart'></i></span>
						</a>
					</nav>
					<article class='media'>
						<div class='media-content'>
							" . html_comments($pic['pic_id'], $comm_all) ."
							<div class='media-right'>
								<button class='delete'></button>
							</div>";
				if ($_SESSION['logged'] == 1) {
					echo "
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
							</form>";
				}
						"</div>
					</article>
				</div>
			</div>
		</section>
	</body>";
}