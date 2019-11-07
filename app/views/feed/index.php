
<html>
	<head>
		<link rel="stylesheet" href="<?=PROOT?>css/feed.css">
	</head>
	<body>
	<div class="container">
		<?php $results = $_SESSION['posts']?>
		<div class="photoscontainer">
			<div class="photos">
			<?php foreach ($results as $res): ?>
			<img src="<?=PROOT."/images/". ($res->name)?>" alt="" class="photo">
			<?php endforeach;?>
			</div>
		</div>
	</div>
	</body>
		</html>