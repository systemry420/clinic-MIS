<!-- dashboard to manage items & events -->

<?php


session_start();
// require('functions.php');
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

if(!$username){
  header( "Location: ../index.php" );
  exit;
}

if(isset($_POST['logout'])){
  // echo 'hell';
  session_destroy();
  header( "Location:../index.php" );
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title> CMS</title>
<link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css" />
  <!-- Custom styles for this template -->
  <link href="resources/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Admin Panel </div>
      <div class="list-group list-group-flush">
        <!-- <a href="index.php" class="list-group-item list-group-item-action bg-light">Dashboard</a> -->
        <a href="doctors.php" class="list-group-item list-group-item-action bg-light">Doctors</a>
        <a href="staff.php" class="list-group-item list-group-item-action bg-light">Staff</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <h1 class="mt-4">Dashboard</h1>
        <div class="row mb-3">
          <div class="col-4">
            <form action="?" method="POST">
            <input type='submit' name="logout" class="btn btn-danger" value="Logout">
            </form>
          </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->


</body>

</html>
