<head>
	<link rel="stylesheet" href="<?=PROOT?>css/upload_base.css">
	<link rel="stylesheet" href="<?=PROOT?>css/upload.css">
</head>
<body>
<form class="customImage" action="" method="POST" enctype="multipart/form-data">
	<input id="file" type="file" name="file" class="customImage">
	<div class="preview" id="imagePreview">
		<img src="" alt="Image Preview" class="img-preview__image">
		<canvas id="stickercanvas"></canvas>
		<span class="image-preview__default-text">Image Preview </span>
	</div>
	<div class="stickers">
		<img onclick="putSticker(this)" id="sticker1" src="<?=PROOT?>/stickers/sticker1.png" alt="">
		<img onclick="putSticker(this)" id = "sticker2"src="<?=PROOT?>/stickers/sticker2.png" alt="">
		<img onclick="putSticker(this)" src="<?=PROOT?>/stickers/sticker3.png" alt="">
		<img onclick="putSticker(this)" src="<?=PROOT?>/stickers/sticker4.png" alt="">
	</div>
	<select id="photo-filter">
				<option value="none">Normal</option>
				<option value="grayscale(100%)">Grayscale</option>
				<option value ="sepia(100%)">Sepia</option>
				<option value="invert(100%)">Invert</option>
				<option value="contrast(200%)">Contrast</option>
	</select>
	<button id="clear-button">Clear</button>
	<input id="submit-button" type='submit' value='Upload' name='submit'>
</form>
	<script src="<?=PROOT?>/js/upload.js"></script>
</body>