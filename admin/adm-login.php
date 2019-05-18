<?php

session_start();
// $username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";
// if($username){
// 	header( "Location: dashboard.php" );
//   	exit;
// }
 $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if($_POST['username'] == 'admin' && $_POST['password'] == 'admin'){
        $_SESSION['username'] = 'admin';
        header( "Location: dashboard.php" );
        exit;
    }else{
      	$error = "Login failed ! Wrong Credentials.";
    }
}


?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />

  <title> CMS</title>
    <link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css" />
  <script type="text/javascript" src="resources/js/jQuery.min.js"></script>
  <script type="text/javascript" src="resources/bootstrap/js/bootstrap.min.js"></script>


  <!-- Custom styles for this template -->
  <link href="resources/css/login.css" rel="stylesheet">
</head>

<body class="text-center">
  <div class="login-form-wrapper" >
  <?php if ( $error != '' ) { ?>
          <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
  <?php } ?>

  <form class="form-signin" action="" method="post">
  
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Login" />

    <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
  </form>
</div>
</body>
</html>
