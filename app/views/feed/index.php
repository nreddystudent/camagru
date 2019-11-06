<html>
	<body>
		<div class="posts">
			<?=$test?>
			</div>
		</body>
		</html>

		<?php foreach ($result as $key => $value): ?>
			<img src="images/<?$key?>" alt="">
		<?php endforeach; ?>