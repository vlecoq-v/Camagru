  <!-- columns ------------------------------------------------------------------------------------->
	<div class="columns" id ="columns">
		<div class="column">
			<div id="container">
				<video autoplay="true" id="videoElement"></video>
			</div>
			<button id="pic_button">Prendre une photo</button>
			<canvas id="canvas"></canvas>
			<!-- <img src="http://placekitten.com/g/320/261" id="photo" alt="photo"> -->
			<button id="download">Download</button>
			<script src="public/js/webcam.js"></script>
			<form action="upload.php" method="post" enctype="multipart/form-data" id="uploadForm">
				Select image to upload:
				<input type="text" value="mamen" name="upload">
				<!-- <input type="file" name="fileToUpload" id="fileToUpload"> -->
				<input type="submit" value="Upload Image" name="submit" id="submit">
			</form>
			<!-- <form action="index.php?action=download" method="post">Download</form> -->
			<!-- <button type="submit" onclick="window.open('canvas')">Download</button> -->
  </div>

  </body>
</html>