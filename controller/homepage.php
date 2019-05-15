<?php
function html_post() {

	$posts = new posts();

	$posts->get_count();
	$posts->get_all();
	foreach ($posts->all as $key => $value) {
		if ($key % 3 == 0 AND $key !== 0) {
			echo "</div>
			<div class='columns'>
			";
		}
		echo "
		<div class='column'>
			<article class='media'>
				<p class='image'></p>
				<div class='media-content'>	
					<figure class='image'>
						<img src='" . $value['pic_path'] ."' class='myimg'>
					</figure>
					<nav class='level is-mobile'>
						<a class='level-item'>
							<span class='icon is-small'><i class='fas fa-heart'></i></span>
						</a>
						<a class='level-item'>
							<span >42</span>
						</a>
						<a class='level-item'>
							<span class='icon is-small'><i class='fas fa-comment'></i></span>
						</a>
						<a class='level-item'>
							<span >42</span>
						</a>
					</nav>
				</div>
			</article>
		</div>";
	}
}

require_once('view/homepage.php');