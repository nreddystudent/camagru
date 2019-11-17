<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?=PROOT?>css/main_menu.css">
	<?php 
	$menu = Router::getMenu('menu_acl');
	$currentPage = currentPage();
	?>
	<nav class="navbar">
		<div class="toggle" onclick="makeNav()">
		<img src="https://img.icons8.com/android/24/000000/menu.png">
		</div>
		<ul id="nav">
		<?php foreach($menu as $key => $value) :
			$active= ''?>
		<?php if(is_array($value)): ?>
			<div class="dropdown">
			<button class="dropbtn"><?=$key?></button>
			<ul class="dropdown-content">
			<?php foreach($value as $k => $v) :
				$active = ($v == $currentPage) ? 'active': ''?>
				<?php if($k == 'seperator'): ?>
					<li class="seperator"></li>
				<?php else:?>
					<a class="<?=$active?>" href="<?=$v?>"><li><?=$k?></li></a>
				<?php endif; ?>
			<?php endforeach;?>
			</ul>
		</div>
		<?php else: 
			$active = ($value == $currentPage) ? 'active': ''?>
			<a class="<?=$active?>" href="<?=$value?>"><li><?=$key?></li></a>
		<?php endif; ?>
		<?php endforeach; ?>
			<?php if (currentUser()): ?>
				<a href="<?=PROOT?>profile"><li id="user">Hello <?=currentUser()->first_name?></li></a>
			<?php endif;?>
		</ul>
	</nav>
<script src="<?=PROOT?>js/main_menu.js"></script>
</head>
</html>