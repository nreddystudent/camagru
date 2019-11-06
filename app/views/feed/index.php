
<html>
	<?php $results = $_SESSION['posts']?>
	<div class="photo">
		<?php foreach ($results as $res): ?>
		<img src="<?=ROOT."/images/". ($res->name)?>" alt="" class="photo">
		<?php endforeach;?>
	</div>
	<body>
		<img src="/goinfre/nreddy/Desktop/MAMP/apache2/htdocs/camagru/images/Screenshot.png" alt="">
		<div class="posts">
		</div>
	</body>
		</html>