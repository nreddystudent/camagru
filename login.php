<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="box">
		<h2>Login</h2>
		<form action="login.php" method="POST">
			<div class="inputBox">
				 <input type="text" name="uname" required="">
				 <label>Username</label>
			</div>
			<div class="inputBox">
				 <input type="password" name="passw" required="">
				 <label>Password</label>
			</div> 
			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>
