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
	<link rel="stylesheet" type="text/css" href="admin/resources/bootstrap/css/bootstrap.min.css" />

    <title>LOGIN</title>
</head>
<body>
<div class ="navbar">
		<ul>
			<li><a href ="index.php">LOGO</a></li> 
			<li style="float:right"><a href ="admin/adm-login.php">Admin</a></li> 
		</ul>
	</div>

<div class="container-fluid">
<div class="col-10 form">
	<h2>Login here</h2>
	<form action="log.php" method="post" enctype="multipart/form-data">

		<div class="form-group row">
			<label for="email" class="col-sm-2 col-form-label">Email </label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="email" id="email" placeholder=""  autofocus required maxlength="255" value="<?php echo htmlspecialchars( (isset( $doctor['name'])? $doctor['name']:'') )?>" />
			</div>
		</div>

		<div class="form-group row">
			<label for="password" class="col-sm-2 col-form-label">Password </label>
			<div class="col-sm-10">
				<input class="form-control" type="password" name="pass" id="password" placeholder="" />
			</div>
		</div>

		<input type="submit" name="btnsave" value="LOG IN">
		<p  style="text-align:center;">
			<a class="color: blue;" href="signup.php">create account</a>
		</p>

	</form>
</div>
</div>

</body>
</html>