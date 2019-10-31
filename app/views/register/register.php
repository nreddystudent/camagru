<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register</title>
	<link rel="stylesheet" href="<?=PROOT?>/css/login.css">
</head>
<body>
	<div class="box">
		<h2>Register</h2>
		<div class="bg-danger">
			<?=$this->displayErrors ;?>
		</div>
		<form class="form" action="" method="POST">
			<div class="inputBox form-group">
				<input type="text" name="first_name" value="<?=$this->post['first_name']?>"  class="form-control" required="">
				<label>First Name</label>
			</div> 
			<div class="inputBox form-group">
				<input type="text" name="last_name" value="<?=$this->post['last_name']?>"  class="form-control" required="">
				<label>Last Name</label>
			</div> 
			<div class="inputBox form-group">
				<input type="email" name="email" value="<?=$this->post['email']?>"  class="form-control" required="">
				<label>Email</label>
			</div> 
			<div class="inputBox  form-group">
				 <input type="text" name="username" value="<?=$this->post['username']?>"  class="form-control" required="">
				 <label>Username</label>
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