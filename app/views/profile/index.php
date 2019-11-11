<head>
	<link rel="stylesheet" href="<?=PROOT?>/css/profile.css">
</head>
<body>
	<?php $posts = $_SESSION['userPosts']?>
	<?php var_dump($posts);?>
	<div class="container">
		<div class="left-bar">
			<img src="<?=PROOT?>/profilePics/<?=$_SESSION['profile_pic']?>" alt="" class="profile-pic">
			<button>Settings</button>
		</div>
		<div class="gallery">
			<?php foreach($posts as $image):?>
				<img src="<?=PROOT?>/images/<?=$image->name?>" alt="">
			<?php endforeach;?>
		</div>
	</div>
</body>