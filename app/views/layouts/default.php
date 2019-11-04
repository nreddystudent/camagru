<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?=$this->siteTitle();?></title>
	<?= $this->content('head');?>
</head>
<body>
	<?php include "main_menu.php"  ?>
	<?= $this->content('body');?>
</body>
</html>