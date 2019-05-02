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

  <!-- hero ---------------------------------------------------------------------------------------->
  <!-- <section class="hero is-primary">
		<nav class="level">
			<div class="level-item">
				<p>BURGER</p>
			</div>
			<div class="level-item">
				<div class="has-text-centered">
					<img src="content/ramen-logo.png" alt="ramen">
					<p class="subtitle">Turansuforumu</p>
					</div>
			</div>
			<div class="level-item">
				<p class="subtitle">turn your world into a funky funky manga one</p>
			</div>
		</nav>
  </section> -->

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
				<a href="http://localhost:8100/Camagru_damoi/identification" class="navbar-item">Identification</a>
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
			<script src="src/webcam.js"></script>
		</div>
  </div>
	<!-- <img src="content/ramen-logo.png" alt="Turn your world into a funky manga one" width="100%" height="50">

  </body>
</html>
<?php
?>
