	<!-- columns ------------------------------------------------------------------------------------->
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
			<article class='media post_media'>
				<div class="column">
					<div class="media-content" id="div_video">
						<div id="videoWrapper">
							<!-- <img src="public/img/filters/afro-hair.png" alt="" id="selected_filter filter"> -->
							<video autoplay="true" id="videoElement"></video>
						</div>
						<nav class="level">
							<a href="" class="level-item">
								<button id="pic_button">Prendre une photo</button>
							</a>
						</nav>
						<nav class="level">
							<div class="scrollmenu">
								<a href=""><img src="public/img/filters/afro-hair.png" alt="agro hair" id="selected_filter"></a>
								<a href=""><img src="public/img/filters/radial.jpeg" alt="speed effect"></a>
								<!-- <a href="#contact">Contact</a> -->
								<!-- <a href="#about">About</a> -->
							</div>
						</nav>
					</div>
				</div>
			</article>
		</div>
	</section>
	<div id="overlay_back"></div>
	<div id="overlay">
		<div id="container_overlay">
			<span>
				<!-- <figure class="image is-squared"> -->
				<canvas id="canvas"></canvas>
				<!-- </figure> -->
				<form action="index.php?action=upload" method="post" enctype="multipart/form-data" id="uploadForm">
						<input type="hidden" value="mamen" name="upload" id="upload_hidden">
						<input type="submit" value="Upload Image" name="submit" id="submit">
				</form>
				<button id="another_button">Take another picture</button>
			</span>
		</div>
	</div> 
	<script src="public/js/webcam.js"></script>