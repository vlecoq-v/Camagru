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
				<div class="media-content" id="div_video">
					<div id="videoWrapper">
						<div id="close_wrapper">
							<canvas id="canvas"></canvas>
							<video autoplay="true" id="videoElement"></video>
						</div>
					</div>
					<div class="columns is-centered" style='min-height: 500px;'>
						<div class="column">
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
							<nav class="level">
								<a href="#" class="level-item" style="display:none" id="upload_file_div">
									<form action="'index.php?action=upload'">
										<input type="file" id="upload_file" name="upload_file">
									</form>
								</a>
								<a href="#" class="level-item">
									<button id="upload_file_button" class="button is-dark">Upload a picture</button>
								</a>
							</nav>
							<nav class="level">
								<div class="scrollmenu">
									<form action="">
										<a src="#" id="radio_1"><input type="radio" name="filters" checked><img src="public/img/filters/new_afro.png" alt="afro hair" id="radio_1_img"></a>
										<a src="#" id="radio_2"><input type="radio" name="filters"><img src="public/img/filters/wanted.png" alt="speed effect" id="radio_2_img"></a>
										<a src="#" id="radio_3"><input type="radio" name="filters"><img src="public/img/filters/sayan-hair.png" alt="speed effect" id="radio_3_img"></a>
										<a src="#" id="radio_4"><input type="radio" name="filters"><img src="public/img/filters/ken.png" alt="speed effect" id="radio_4_img"></a>
										<a src="#" id="radio_5"><input type="radio" name="filters"><img src="public/img/filters/straw_hat2.png" alt="speed effect" id="radio_5_img"></a>
										<a src="#" id="radio_6"><input type="radio" name="filters">#nofilter</a>
									</form>
								</div>
							</nav>
							<nav class="level">
								<div class="scrollmenu" id="my_gallery">
									<?php post_user(); ?>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</article>
		</div>
	</section>
	<script src="public/js/webcam.js"></script>
	<script src="public/js/delete_pic.js"></script>