<?php
if ($_GET['message']) {
	if ($_GET['message'] === "validated")
		display_success("Congrats, your email was verified and you are now logged in");
}

function all_posts($offset) {
	$posts = new pics();

	$posts->get_count();
	if ($posts->count == 0) {
		echo "<h1> no post at this moment</h1>";
		return ;
	}
	// $posts->get_all();
	$posts->get_6($offset);
	foreach ($posts->all as $key => $post) {
		$pic = new pics();
		$pic->get_1($post['pic_id']);
		if ($key % 3 == 0 AND $key !== 0) {
			echo "
			</div>
			<div class='columns'>";
		}
		$likes = new likes();
		$likes->get_likes($post['pic_id']);
		$comm = new comm();
		$comm->get_comm($post['pic_id']);
		html_post($pic->new, $likes->count, $comm->count, $post['pic_id'], $likes->is_liked($post['pic_id']));
	}
	html_pagination($offset);
}

function html_post($pic, $likes, $comm, $pic_id, $liked) {
	if (!$_SESSION['logged'])
		$href = "href=index.php?action=identification&msg=login";
	else
		$href = "#";
	echo "
	<div class='column post'>
		<a href='index.php?action=pic_view&pic_id=" . $pic_id . "'>
			<article class='media post_media'>
				<div class='media-content'>	
					<figure class='image post_image'>
						<img src='" . $pic['pic_path'] . "' class='myimg'>
					</figure>
					<nav class='level is-mobile post_level'>
						<a class='level-left'>
							<a>By <strong>" . $pic['username'] . "</strong></a>
						</a>";
	if ($liked) {
		echo "
						<a class='level-item'>
							<span class='icon is-small has-text-primary' id='" . $pic_id . "_like'><i class='fas fa-heart'></i></span>
						</a>";}
	else {
		echo "
						 <a " . $href . " class='level-item'>
							<span class='icon is-small' id='" . $pic_id . "_like'><i class='fas fa-heart'></i></span>
						</a>";}
	echo "
						<a class='level-item' id='" . $pic_id . "_like_nb'>
							<span >" . $likes . "</span>
						</a>
						<a " . $href . " class='level-item'>
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

function html_pagination($offset) {
	$posts = new pics();

	$posts->get_count();
	$count = $posts->count / 6;
	$offset_minus = $offset - 1;
	$offset_plus = $offset + 1;
	$i = 0;

	echo "
	</div>
	<section class='section'>
		<nav class='pagination is-centered' role='navigation' aria-label='pagination'>
			<a href='index.php?offset=" . $offset_minus . "' class='pagination-previous'>Previous</a>
			<a href='index.php?offset=" . $offset_plus . "' class='pagination-next'>Next page</a>
			<ul class='pagination-list'>";
	while ($i < $count) {
		$current = $i + 1;
		if ($offset == $i)
			echo "<li><a href='index.php?offset=" . $i . "' class='pagination-link is-current' aria-label='Goto page 1' aria-current='page'>" . $current ."</a></li>";
		else
			echo "<li><a href='index.php?offset=" . $i . "' class='pagination-link' aria-label='Goto page 1'>" . $current ."</a></li>";
		$i++;
	}
	echo
			"</ul>
		</nav>
	</section>";
}

require_once('view/homepage.php');