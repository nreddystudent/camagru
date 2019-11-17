<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?=$this->siteTitle();?></title>
	<?php include "main_menu.php"  ?>
	<?= $this->content('head');?>
</head>
<body>
	<?= $this->content('body');?>
	<?php include "footer.php";?>
</body>
</html>