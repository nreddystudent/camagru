
<html>
	<head>
		<?php static $i = 0; ?>
		<link rel="stylesheet" href="<?=PROOT?>css/feed.css">
		<script src="<?=PROOT?>js/feed.js"></script>
	</head>
	<body>
	<div class="container">
		<?php $results = $_SESSION['posts']?>
		<?php $comments = $_SESSION['comments']?>
		<div class="photoscontainer">
			<div class="posts">
			<?php foreach ($results as $res): ?>
				<div class="post">
					<?php foreach ($_SESSION['profilepics'] as $user):?>
						<?php if ($user->id == $res->userid):?>
							<div class="header">
								<img class="postprofile" src="<?=PROOT?>/profilePics/<?=$user->profile_pic?>">							
								<h1 class="user"><?=$user->username?></h1>
							</div>
						<?php endif;?>
					<?php endforeach;?>
					<img src="<?=PROOT."/images/". ($res->name)?>" alt="" class="photo">
					<div class="icons">
						<?php if($this->currentUser):?>
							<button class="likebtns" id="likebtn<?php echo $i?>" onclick="likeme(this.id, '<?=$res->id?>', 'counter<?=$i?>', '<?=$res->id?>')"><svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" fill="white" clip-rule="evenodd"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402m5.726-20.583c-2.203 0-4.446 1.042-5.726 3.238-1.285-2.206-3.522-3.248-5.719-3.248-3.183 0-6.281 2.187-6.281 6.191 0 4.661 5.571 9.429 12 15.809 6.43-6.38 12-11.148 12-15.809 0-4.011-3.095-6.181-6.274-6.181"></svg></button>
						<?php endif;?>
						<p id="counter<?php echo $i++?>"><?=$res->likes?><p>
					</div>
					
					<?php foreach($comments as $comment): ?>
					<?php if($comment->posts_id == $res->id):?>
						<div class="commentcontainer">
							<div class="comment_user">
							<?php foreach ($_SESSION['profilepics'] as $user):?>
									<?php if ($comment->userid == $user->id):?>
										<img class="profilepics" src="<?=PROOT?>/profilePics/<?=$user->profile_pic?>">
										<a href="<?=PROOT?>profile/index/<?=$comment->userid?>"><?=$user->username?></a>
									<?php endif;?>
							<?php endforeach;?>
							</div>
							<p class="comments"><?=htmlspecialchars($comment->comment)?></p>
						</div>
					<?php endif;?>
					<?php endforeach;?>
					<?php if($this->currentUser):?>
						<form action="" method="POST">
							<input type="text" name="comment">
							<input type="hidden" name="post_id" value='<?=($res->id)?>'>
							<input type="hidden" name="commentData" value='<?=($res->userid)?>'>
							<button class="postbtns" type="submit" value="post"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 172 172" style=" fill:#686de0;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M157.66667,86c0,39.41667 -32.25,71.66667 -71.66667,71.66667c-39.41667,0 -71.66667,-32.25 -71.66667,-71.66667c0,-39.41667 32.25,-71.66667 71.66667,-71.66667c39.41667,0 71.66667,32.25 71.66667,71.66667z" fill="#000000"></path><path d="M115.74167,84.925l-29.74167,-29.74167l-29.74167,29.74167l-5.01667,-5.01667l34.75833,-34.75833l34.75833,34.75833z" fill="#ffffff"></path><path d="M82.41667,53.75h7.16667v68.08333h-7.16667z" fill="#ffffff"></path></g></g></svg></button>
						</form>
					<?php endif;?>
				</div>
			<?php endforeach;?>
			</div>
		</div>
	</div>
	</body>
	 </html>