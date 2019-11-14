<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?=PROOT?>css/upload_base.css">
	<style>
		a{
			text-decoration: none;
			margin-top: 150px;
		}
		.links{
			position: absolute;
			top: 50%;
			bottom: 50%;
			right: 50%;
			display: flex;
			justify-content: center;
			margin: auto;
			align-content: center;
			flex-direction: column;
		}
	</style>
</head>
<body>
	<div class="links">
		<button><a href="upload/snap">Snap a Pic</a></button>
		<button><a href="upload/upload">Upload</a></button>
	</div>
</body>
</html>