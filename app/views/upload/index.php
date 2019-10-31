<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>upload.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="<?=PROOT?>js/main.js"></script>
</head>
<body>
	<div class="navbar">
		<h1>Vidsnapper</h1>
	</div>
	<div class="top-container">
		<video id="video" src="">Stream not avaliable</video>
		<button id="photo-button" class="btn btn-dark">
			Take photo
		</button>
		<select id="photo-filter">
			<option value="none">Normal</option>
			<option value="greyscale(100%)">Greyscale</option>
			<option value ="sepia(100%)">Sepia</option>
			<option value="invert(100%)">Invert</option>
			<option value="hue-rotate(90deg)">Hue</option>
			<option value="blur(10px)">Blue</option>
			<option value="contrast(200%)">Contrast</option>
		</select>
		<select>
			<button id="clear-button">Clear</button>
		</select>
		<canvas id="canvas"></canvas>
	</div>
	<div class="bottom-container">
		<div id="photos"></div>
	</div>
</body>
</html>