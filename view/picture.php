	<!-- columns ------------------------------------------------------------------------------------->
	<section class="hero">
		<div class="hero-body">
			<div class="container">
				<?php
		if($_SESSION['logged']) {
			echo "
			<section class='section'>
			<div class='title has-text-centered'>
					Welcome " . $_SESSION['user']['username'] . "
				</div>
				</section>";}
				?>
			</div>
			<article class='media post_media'>
				<div class="column">
					<div class="media-content" id="div_video">
						<div id="videoWrapper">
							<video autoplay="true" id="videoElement"></video>
							<!-- <canvas id="canvas" style="position: absolute"></canvas> -->
						</div>
						<div class="columns is-centered">
							<div class="column is-half">
								<nav class="level">
									<a href="#" class="level-item">
										<button id="pic_button" class="button is-dark">Take a picture</button>
									</a>
									<a ref="#" class="level-item" id="erase_button_div" style="display: none">
										<button id="erase_button" class="button is-dark">Erase preview</button>
									</a>
									<a href="#" class="level-item" style="display:none" id="upload_button_div">
										<button id="upload_button" class="button is-dark">Upload picture</button>
									</a>
								</nav>
								<!-- <nav class="level">
									<a href="#" class="level-item">
										<form action="upload.php" method="post" enctype="multipart/form-data">
											<input type="file" name="fileToUpload" id="fileToUpload" class="button is-light">
											<input type="submit" value="Upload Image" name="submit" class="button is-light">
										</form>
									</a>
								</nav> -->
								<nav class="level">
									<div class="scrollmenu">
									<form action="">
										<a src="#" id="radio_1"><input type="radio" name="filters" checked><img src="public/img/filters/new_afro.png" alt="afro hair" id="selected_filter"></a>
										<a src="#" id="radio_2"><input type="radio" name="filters"><img src="public/img/filters/wanted.png" alt="speed effect"></a>
										<!-- <a href="#contact">Contact</a> -->
										<!-- <a href="#about">About</a> -->
									</form>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</section>
	<!-- <div id="overlay_back"></div>
	<div id="overlay">
		<div id="container_overlay">
			<span>
				<form action="index.php?action=upload" method="post" enctype="multipart/form-data" id="uploadForm">
						<input type="hidden" value="filter" name="filter" id=upload_filter>
						<input type="hidden" value="mamen" name="upload" id="upload_hidden">
						<input type="submit" value="Upload Image" name="submit" id="submit">
				</form>
				<button id="another_button">Take another picture</button>
			</span>
		</div>
	</div>  -->
	<script src="public/js/webcam.js"></script>