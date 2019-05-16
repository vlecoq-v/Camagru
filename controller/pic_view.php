<?php

pic_info($pic_id);

function pic_info($pic_id) {
	// echo $pic_id;
	$pic = new pics();
	if (!$pic->get_1($pic_id))
		exit(display_warning("no post at this address"));
	else {
		html_pic($pic->new);
	}
}

// require_once('view/pic_view.php');

function html_pic($pic) {
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
							<div class='content'>
								<p>
									<strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
									<br>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
								</p>
							</div>
							<div class='media-right'>
								<button class='delete'></button>
							</div>";
				if ($_SESSION['logged'] == 1) {
					echo "
							<div class='field'>
								<p class='control'>
									<textarea class='textarea' placeholder='Add a comment...'></textarea>
								</p>
								<a class='button is-info'>Submit</a>
							</div>"; }
						"</div>
					</article>
				</div>
			</div>
		</section>
	</body>";
}