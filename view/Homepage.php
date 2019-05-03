<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turansuforumu</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">

	<style>
	#container {
		margin: 0px auto;
		width: 500px;
		height: 375px;
		border: 10px #333 solid;
	}
	#videoElement {
		width: 500px;
		height: 375px;
		background-color: #666;
	}
	</style>

  </head>
  <body>
	  <!-- nvabar ---------------------------------------------------------------------------------------->
		<nav class="navbar is-primary" role="navigation" aria-label="main navigation">
			<div class="navbar-brand">
				<a href="" class="navbar-item">
					<img src="content/ramen-logo.png" alt="Turn your world into a funky manga one">
				</a>
				<button class="button navbar-burger">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
			<div class="navbar-menu">
				<a href="controller/identification.php" class="navbar-item">Identification</a>
				<a href="" class="navbar-item">My pictures</a>
			</div>
		</nav>

		

  <!-- columns ------------------------------------------------------------------------------------->
  <div class="columns">
		<div class="column">
			<div id="container">
				<video autoplay="true" id="videoElement"></video>
			</div>
			<button id="startbutton">Prendre une photo</button>
			<canvas id="canvas"></canvas>
			<img src="http://placekitten.com/g/320/261" id="photo" alt="photo">
			<script src="public/js/webcam.js"></script>
		</div>
  </div>

  </body>
</html>