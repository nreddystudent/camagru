<html>
	<head>
		<title>Forgot Password</title>
		<link rel="stylesheet" href="<?=PROOT?>/css/login.css">
	<head>
	<body>
	<div class="box">
		<h2>Forgot Password</h2>
		<div class="bg-danger">
			<?=$this->displayErrors ;?>
		</div>
		<form class="form" action="" method="POST">
			<div class="inputBox form-group">
				<input type="email" name="email" value="<?=$this->post['email']?>"  class="form-control" required="">
				<label>Email</label>
			</div>  
			<input type="submit" value="Submit">
		</form>
	</div>
	</body>
</html>