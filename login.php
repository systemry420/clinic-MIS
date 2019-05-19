<?php
	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="admin/resources/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="style.css">

	<title>LOGIN</title>
	<style>
		
	</style>
</head>
<body>
<div class ="navbar">
		<ul>
			<li><a href ="index.php">SEHATI</a></li> 
			<li><a href ="doctors.php">Doctors</a></li> 
			<li><a href ="staff.php">Staff</a></li> 
			<li><a href ="blog.php">Blog</a></li> 
			<li><a href ="admin/adm-login.php">Admin</a></li> 
		</ul>
	</div>


	<h1>Login here</h1>
<div class="main" style="display: flex; flex-wrap: wrap; justify-content: center;">
<div class="container-fluid">
<div class="col-6 form">
	<form action="log.php" method="post" enctype="multipart/form-data">

		<div class="form-group row">
			<label for="email" class="col-sm-4 col-form-label">Email </label>
			<div class="col-sm-8">
				<input class="form-control" type="text" name="email" id="email" placeholder=""  autofocus required maxlength="255" value="<?php echo htmlspecialchars( (isset( $doctor['name'])? $doctor['name']:'') )?>" />
			</div>
		</div>

		<div class="form-group row">
			<label for="password" class="col-sm-4 col-form-label">Password </label>
			<div class="col-sm-8">
				<input class="form-control" type="password" name="pass" id="password" placeholder="" />
			</div>
		</div>

		<input type="submit" name="btnsave" value="LOG IN">
		<p  style="text-align:center;">
			<a style="color:#111" class="btn btn-success" href="signup.php">create account</a>
		</p>

	</form>
</div>
</div>

</div>

</body>
</html>