<?php
	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="admin/resources/bootstrap/css/bootstrap.min.css" />

    <title>LOGIN</title>
</head>
<body>
<div class ="navbar nav">
		<ul>
			<li><a href ="index.php">LOGO</a></li> 
			<li style="float:right"><a href ="login.php">Log in</a></li>  
			<li style="float:right"><a href ="admin/adm-login.php">Admin</a></li> 
		</ul>
	</div>

    <div id="page-content-wrapper">

      <div class="container-fluid">
        <div class="col-10 form">
          <h1 class="mt-4">Signup here</h1>
          <form action="?" method="post" enctype="multipart/form-data">

          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name </label>
            <div class="col-sm-10">
               <input class="form-control" type="text" name="name" id="name" placeholder=""  autofocus required maxlength="255" value="<?php echo htmlspecialchars( (isset( $doctor['name'])? $doctor['name']:'') )?>" />
            </div>
          </div>

<!-- gender -->
<div class="form-group row">
  <div class="col-sm-4">
      <label for="type" class="col-form-label">Gender</label>
  </div>
  <div class="col-sm-2">
    <label for="type" class="">Male</label>
  </div>
  <div class="col-sm-2">
      <input type="radio" name="gender" value="male" id="male">
  </div>
  <div class="col-sm-2">
    <label for="type" class="">Female</label>
  </div>
  <div class="col-sm-2">
      <input type="radio" name="gender" value="female" id="female">
  </div>
</div>

<!-- tele -->
          <div class="form-group row">
            <label for="duration" class="col-sm-2 col-form-label">Telephone</label>
            <div class="col-sm-10">
               <input class="form-control" type="text" name="tele"  required/>
            </div>
          </div>

<!-- address -->
          <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label">Location</label>
            <div class="col-sm-10">
               <input class="form-control" type="text" name="address"  required/>
            </div>
          </div>

<!-- emailx -->
          <div class="form-group row">
            <label for="rate" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
               <input class="form-control" type="email" name="email"  required/>
            </div>
          </div>

<!-- pass -->
          <div class="form-group row">
            <label for="video" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
               <input class="form-control" type="password" name="password"  required/>
            </div>
          </div>


  <div class="buttons mt-3">
    <input class="btn  btn-primary" type="submit" name="register" value="Register" style="margin-rigth:10px" />
    <input class="btn  btn-default" type="reset" name="cancel" value="Cancel" />
  </div>

  </form>
  </div>

  <?php
require('functions.php');
if(isset($_POST['register'])){
	$connect = getConnection();
	
	$name = !empty($_POST['name'])? $_POST['name'] : '' ;
	$tele = !empty($_POST['tele'])? $_POST['tele'] : '' ;
	$gender = !empty($_POST['gender'])? $_POST['gender'] : '' ;
	$address = !empty($_POST['address'])? $_POST['address'] : '' ;
	$email = !empty($_POST['email'])? $_POST['email'] : '' ;
	$password = !empty($_POST['password'])? $_POST['password'] : '' ;

	$sql= "SELECT email, password FROM patient where email='$email' AND password='$password'";
	$query= mysqli_query($connect, $sql);
	var_dump(mysqli_num_rows($query));
	
	if($query){
		// insert
		$sql="INSERT INTO `patient`(`id`, `name`, `tele`, `gender`, `address`, `email`, `password`)"
		." VALUES (Null, '".$name."', '".$tele."', '".$gender."', '".$address."', '".$email."', '".$password."' )";
		$result=mysqli_query($connect, $sql);

		print_r('<br>result: '.$result);
		if($result){
			echo '<script>alert("your registration is accepted!!"); </script>';
			header('Location: login.php');
		}
	}
	else{
		echo '<script>alert("Invalid Email or password!!"); </script>';
		// exit();
	}	
}

?>

</body>
</html>