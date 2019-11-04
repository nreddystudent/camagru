<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?=PROOT?>css/main_menu.css">
</head>
<body>
	<nav class="navbar">
		<div class="toggle" onclick="makeNav()">
		<img src="https://img.icons8.com/android/24/000000/menu.png">
		</div>
		<ul id="nav">
			<li><a href="<?=PROOT?>home/index">Home</a></li>
			<li><a href="<?=PROOT?>feed/index">Feed</a></li>
			<li><a href="<?=PROOT?>register/login">Login</a></li>
			<li><a href="<?=PROOT?>register/logout">Logout</a></li>
		</ul>
	</nav>
<script src="<?=PROOT?>js/main_menu.js"></script>
</body>
</html>