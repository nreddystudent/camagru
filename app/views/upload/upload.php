<head>
	<link rel="stylesheet" href="<?=PROOT?>css/upload_base.css">
	<link rel="stylesheet" href="<?=PROOT?>css/upload.css">
</head>
<body>
<form class="customImage" action="" method="POST" enctype="multipart/form-data">
	<input id="file" type="file" name="file" class="customImage">
	<div class="preview" id="imagePreview">
		<img src="" alt="Image Preview" class="img-preview__image">
		<span class="image-preview__default-text">Image Preview </span>
	</div>
	<input id="submit-button" type='submit' value='Upload' name='submit'>
</form>
	<script src="<?=PROOT?>/js/upload.js"></script>
</body>