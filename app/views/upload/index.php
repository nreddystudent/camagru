<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?=PROOT?>css/upload.css">
</head>
<body>
	<div class="container">
		<div class="top-container">
				<video id="video" src="">Stream not avaliable</video>
				<button id="photo-button" class="btn btn-dark">
					Take photo
				</button>
				<select id="photo-filter">
					<option value="none">Normal</option>
					<option value="grayscale(100%)">Grayscale</option>
					<option value ="sepia(100%)">Sepia</option>
					<option value="invert(100%)">Invert</option>
					<option value="hue-rotate(90deg)">Hue</option>
					<option value="blur(10px)">Blur</option>
					<option value="contrast(200%)">Contrast</option>
				</select>
				<button id="clear-button">Clear</button>
				<canvas id="canvas"></canvas>
				<form class="customImage" action="" method="POST" enctype="multipart/form-data">
					<input type="file" name="file" class="customImage">
					<div class="preview" id="preview">
						<img src="" alt="Image Preview" class="img-preview__image">
						<span class="image-preview__default-text">Image Preview </span>
					</div>
					<select name="stickers" id=""> 
						<option value="sticker1">sticker1</option>
					</select>
					<input id="submit-button" type='submit' value='Upload' name='submit'>
				</form>
		</div>
			<div class="bottom-container">
				<div id="photos"></div>
			</div>
		</div>
<script src="<?=PROOT?>/js/upload.js"></script>
</body>
</html>