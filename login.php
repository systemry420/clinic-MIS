<?php
	session_start();
	if(!isset($_SESSION['logging'] )){
		$_SESSION['logging'] = 1;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>LOGIN</title>
</head>
<body>
<div class ="navbar">
		<ul>
			<li><a href ="index.php">LOGO</a></li> 
			<li style="float:right"><a href ="admin/adm-login.php">Admin</a></li> 
		</ul>
	</div>

<div class="form">
		<img src="img/user.jpg" class="user">
		<h3>Login here</h3>
		<form method="post" action="log.php">
			Email
			<input type="text" name="user" placeholder="Enter email">
			Password
			<input type="text" name="password" placeholder ="enter password">
			<input type="submit" name="btnsave" value="LOG IN">
			<a href="signup.php">create account</a>

		</form>
	</div>
</body>
</html>