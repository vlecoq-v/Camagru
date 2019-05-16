<?php
function all_posts($offset) {

	$posts = new pics();

	$posts->get_count();
	// $posts->get_all();
	$posts->get_6($offset);
	foreach ($posts->all as $key => $post) {
		if ($key % 3 == 0 AND $key !== 0) {
			echo "
			</div>
			<div class='columns'>";
		}
		$likes = new likes();
		$likes->get_likes($post['pic_id']);
		$comm = new comm();
		$comm->get_comm($post['pic_id']);
		html_post($post['pic_path'], $likes->count, $comm->count, $post['pic_id']);
	}
}

function html_post($pic_path, $likes, $comm, $pic_id) {
	echo "
	<div class='column post'>
		<a href='index.php?action=pic_view&pic_id=" . $pic_id . "'>
			<article class='media post_media'>
				<div class='media-content'>	
					<figure class='image post_image'>
						<img src='" . $pic_path ."' class='myimg'>
					</figure>
					<nav class='level is-mobile post_level'>
						<a class='level-item'>
							<span class='icon is-small'><i class='fas fa-heart'></i></span>
						</a>
						<a class='level-item'>
							<span >" . $likes . "</span>
						</a>
						<a class='level-item'>
							<span class='icon is-small'><i class='fas fa-comment'></i></span>
						</a>
						<a class='level-item'>
							<span >" . $comm . "</span>
						</a>
					</nav>
				</div>
			</article>
		</a>
	</div>";
}

require_once('view/homepage.php');