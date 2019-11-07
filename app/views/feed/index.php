
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
					<h1 class="user"><?=$res->username?></h1>
					<img src="<?=PROOT."/images/". ($res->name)?>" alt="" class="photo">
					<button class="likebtns" id="likebtn<?=$i?>"" onclick="likeme(this.id)"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" fill="white" clip-rule="evenodd"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402m5.726-20.583c-2.203 0-4.446 1.042-5.726 3.238-1.285-2.206-3.522-3.248-5.719-3.248-3.183 0-6.281 2.187-6.281 6.191 0 4.661 5.571 9.429 12 15.809 6.43-6.38 12-11.148 12-15.809 0-4.011-3.095-6.181-6.274-6.181"/></svg></button>
					<button class="commentbtns" id="commentbtn<?=$i++?>"><img src="https://img.icons8.com/ios/50/000000/comments.png"></button>
					<form action="" method="POST">
						<input type="text" name="comment">
						<input type="hidden" name="post_id" value='<?=($res->id)?>'>
						<input type="submit" value="post">
					</form>
					<?php foreach($comments as $comment): ?>
					<?php if($comment->posts_id == $res->id):?>
							<p class="comments"><?=$comment->comment?></p>
					<?php endif;?>
					<?php endforeach;?>
				</div>
			<?php endforeach;?>
			</div>
		</div>
	</div>
	</body>
	 </html>