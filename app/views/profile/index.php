<head>
	<link rel="stylesheet" href="<?=PROOT?>/css/profile.css">
</head>
<body>
	<?php $posts = $_SESSION['userPosts']?>
		<div class="left-bar">
			<div class="bg-danger">
				<?=$this->displayErrors ;?>
			</div>
			<div class="profile-pic">
				<img src="<?=PROOT?>/profilePics/<?=$_SESSION['profile_pic']?>" alt="">
			</div>
			<?php if($_SESSION['is_owner'] == 1): ?>
				<button id="settings">Settings</button>
				<form class="customImage settings_dropdown" action="" method="POST" enctype="multipart/form-data">
					<input type="text" name="username" placeholder="Username" class="form-control">
					<input type="password" placeholder="password" name="password">
					<input type="email" name="email"  placeholder="email" class="form-control">
					<?php if($this->pref == 1):?>
						<div class="notificationsContainer">
							<p>Notifications</p>
							<div class="switches">
								<label>On
								<input type="radio" checked="checked" name="radio">
								<span class="checkmark"></span>
								</label>
								<label>Off
								<input type="radio" name="radio">
								<span class="checkmark"></span>
								</label>
							</div>
						</div>
					<?php else:?>
						<div class="notificationsContainer">
							<p>Notifications</p>
							<div class="switches">
								<label>On
								<input type="radio" name="radio">
								<span class="checkmark"></span>
								</label>
								<label>Off
								<input type="radio" checked="checked" name="radio">
								<span class="checkmark"></span>
								</label>
							</div>
						</div>
					<?php endif;?>
					<input id="file" type="file" name="file" class="customImage">
					<div class="preview" id="imagePreview">
						<img src="" alt="Image Preview" class="img-preview__image">
						<span class="image-preview__default-text">Image Preview </span>
					</div>
					<button name="submit" type="submit">Change Settings</button>
				</form>
			<?php endif;?>
		</div>
		<div class="gallery">
			<?php foreach($posts as $image):?>
				<img src="<?=PROOT?>/images/<?=$image->name?>" alt="">
			<?php endforeach;?>
		</div>
	<script src="<?=PROOT?>js/profile.js"></script>
</body>