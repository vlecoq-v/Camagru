<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
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
  <section class="hero is-primary">
	<div class="hero-body">
	<p><img src="content/ramen-logo.png" alt="ramen"><h1 class="title is-1">Manga world</h1></p>
		
		<h2 class="sub-title">Turn your world into a funky funky manga one!</h2>
	</div>
  </section>

  <!-- columns ------------------------------------------------------------------------------------->
  <div class="columns">
	<div class="column">
		<div id="container">
			<video autoplay="true" id="videoElement">

			</video>
		</div>
		<button id="startbutton">Prendre une photo</button>
		<canvas id="canvas"></canvas>
		<img src="http://placekitten.com/g/320/261" id="photo" alt="photo">
		<script src="src/webcam.js"></script>
	</div>
  </div>

  </body>
</html>
<?php
?>
