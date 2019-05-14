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
				<div class="column media">
					<!-- <div id="container"> -->
						<video autoplay="true" id="videoElement"></video>
					<!-- </div> -->
				</div>
				
				<div class="column buttons">
					<button id="pic_button">Prendre une photo</button>
				</div>
				<a href="" id="download"></a>
			</div>
	
			<div class="columns" id="dowload">
				<div class="column">
			<!-- <canvas id="canvas"></canvas> -->
					<!-- </div> -->
				</div>
			</div>
		</div>
	</section>
	<div id="overlay_back"></div>
		<div id="overlay">
			<div id="container_overlay">
				<span>
					<canvas id="canvas"></canvas>
					<form action="index.php?action=upload" method="post" enctype="multipart/form-data" id="uploadForm">
							<input type="hidden" value="mamen" name="upload" id="upload_hidden">
							<input type="submit" value="Upload Image" name="submit">
					</form>
				</span>
			</div>
	</div> 
	<script src="public/js/webcam.js"></script>

