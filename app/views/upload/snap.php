<head>
	<link rel="stylesheet" href="<?=PROOT?>css/upload_base.css">
	<link rel="stylesheet" href="<?=PROOT?>css/snap.css">
</head>
<body>
	<div class="container">
		<div class="top-container">
			<div class="display">
				<video id="video" src="">Stream not avaliable</video>
				<canvas id="stickercanvas"></canvas>
			</div>
			<div class="stickers">
				<img onclick="putSticker(this)" id="sticker1" src="<?=PROOT?>/stickers/sticker1.png" alt="">
				<img onclick="putSticker(this)" id = "sticker2"src="<?=PROOT?>/stickers/sticker2.png" alt="">
				<img onclick="putSticker(this)" src="<?=PROOT?>/stickers/sticker3.png" alt="">
				<img onclick="putSticker(this)" src="<?=PROOT?>/stickers/sticker4.png" alt="">
			</div>
			<button id="photo-button" class="btn btn-dark">
				Take photo
			</button>
			<select id="photo-filter">
				<option value="none">Normal</option>
				<option value="grayscale(100%)">Grayscale</option>
				<option value ="sepia(100%)">Sepia</option>
				<option value="invert(100%)">Invert</option>
				<option value="contrast(200%)">Contrast</option>
			</select>
			<button id="clear-button">Clear</button>
			<canvas id="canvas"></canvas>
		</div>
			<div class="bottom-container">
			<div id="photos"></div>
		</div>
	</div>
	<script src="<?=PROOT?>/js/snap.js?ver=<?php echo time();?>"></script>
</body>