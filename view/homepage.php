<section class="hero">
	<div class="hero-body">
		<div class="container">
	<?php
	if($_SESSION['logged']) {
		echo "<h1 class='title has-text-centered'>
				Welcome " . $_SESSION['user']['username'] . "
			</h1>";}
	?>
		</div>
		<div class="columns" id="columns">
			<?php
				all_posts($offset);
			?>
		</div>
	</div>
</section>
<script src="public/js/ajax_likes.js"></script>