<html>
	<head>
		<title>Change Password</title>
		<link rel="stylesheet" href="<?=PROOT?>/css/login.css">
	<head>
	<body>
	<div class="box">
		<h2>Change Password</h2>
		<div class="bg-danger">
			<?=$this->displayErrors ;?>
		</div>
		<form class="form" action="" method="POST">
			<div class="inputBox form-group">
				<input type="email" name="email" value="<?=$this->post['email']?>"  class="form-control" required="">
				<label>Email</label>
			</div> 
			<div class="inputBox form-group">
				 <input type="password" name="password" value="<?=$this->post['password']?>"  class="form-control" required="">
				 <label>Password</label>
			</div> 
			<div class="inputBox form-group">
				 <input type="password" name="passwc" value="<?=$this->post['passwc']?>" class="form-control" required="">
				 <label>Confirm Password</label>
			</div> 
			<input type="submit" value="Submit">
		</form>
	</div>
	</body>
</html>