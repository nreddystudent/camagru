<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?=PROOT?>css/upload.css">
</head>
<body>
	<section></section>
	<div class="container">
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
					<option value="blur(10px)">Blur</option>
					<option value="contrast(200%)">Contrast</option>
				</select>
				<button id="clear-button">Clear</button>
				<canvas id="canvas"></canvas>
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="file" name="file" class="customImage">
					<input type='submit' value='Upload' name='submit'>
				</form>
		</div>
			<div class="bottom-container">
				<div id="photos"></div>
			</div>
		</div>
<script src="<?=PROOT?>/js/upload.js"></script>
</body>
</html>