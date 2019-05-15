	<!-- columns ------------------------------------------------------------------------------------->
	<section class="hero">
		<div class="hero-body">
			<div class="container">
				<h1 class="title has-text-centered">
					Welcome '<'name'>'
				</h1>
			</div>
			<div class="columns is-three-quarters" id ="columns">
				<!-- <div class="containter"> -->
				<div class="column media" id="div_video">
					<!-- <div id="container"> -->
						<video autoplay="true" id="videoElement"></video>
					<!-- </div> -->
				</div>
				
				<div class="column buttons">
					<button id="pic_button">Prendre une photo</button>
				</div>
				<a href="" id="download"></a>
			</div>
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