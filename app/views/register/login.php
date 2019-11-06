<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" href="<?=PROOT?>/css/login.css">
</head>
<body>
	<div class="box">
		<h2>Login</h2>
		<div class="bg-danger">
			<?=$this->displayErrors;?>
		</div>
		<form class="form" action="<?=PROOT?>register/login" method="POST">
			<div class="inputBox form-group">
				 <input type="text" name="username" class="form-control" required="">
				 <label>Username</label>
			</div>
			<div class="inputBox form-group">
				 <input type="password" class="form-control" name="password" required="">
				 <label>Password</label>
			</div>
			<div class="form-group">
				<label for="remember_me">Remeber Me <input type="checkbox" name="remember_me" id="remeber_me" value="on"></label>
			</div>
			<div class="form-group">
				<input type="submit" value="Login">
			</div>
			<div class="text-right">
				<a href="<?=PROOT?>register/register" class="text-primary">Register</a>
			</div>
			<div class="forgot">
				<a href="<?=PROOT?>register/forgot" class="forgot">Forgot Passwword</a>
			</div>
		</form>
	</div>
</body>
</html>
