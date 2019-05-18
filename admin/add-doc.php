<?php


session_start();

require('functions.php');

$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";
$_GET['mode'] = 'add';

if(!$username){
  header( "Location:login.php" );
  exit;
}

$doctors = [];

if ( isset( $_POST['saveChanges'] ) ) {
  if($_GET['mode']=='add'){
    $res = add_doctor($_POST);
  }
  if($res){
    echo '<script> alert("Done!!"); </script>';
  }
  else{
    echo '<script> alert("err: '. $res .' "); </script>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

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
        <a href="dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="doctors.php" class="list-group-item list-group-item-action bg-light">doctors</a>
        <a href="messages.php" class="list-group-item list-group-item-action bg-light">Messages</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <div class="container-fluid">
        <h1 class="mt-4">doctors Details</h1>
        <div class="col-10">
          <form action="?mode=<?php echo $_GET['mode']  ;?>" method="post" enctype="multipart/form-data">
  
          <input type="hidden" name="id" value="<?php echo (isset( $doctor['id'])? $doctor['id']:'') ; ?>"/>

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
            <div class="col-sm-4">
                <label for="type" class="col-form-label">Male</label>
                <input type="radio" name="gender" value="male" id="male">
            </div>
            <div class="col-sm-4">
                <label for="type" class="col-form-label">Female</label>
                <input type="radio" name="gender" value="female" id="female">
            </div>
          </div>

<!-- tele -->
          <div class="form-group row">
            <label for="tele" class="col-sm-2 col-form-label">Telephone</label>
            <div class="col-sm-10">
               <input class="form-control" type="text" name="tele"  required/>
            </div>
          </div>

<!-- email -->
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
               <input class="form-control" type="email" name="email"  required/>
            </div>
          </div>

<!-- address -->
          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Location</label>
            <div class="col-sm-10">
               <input class="form-control" type="text" name="address"  required/>
            </div>
          </div>

<!-- from -->
          <div class="form-group row">
            <label for="from" class="col-sm-2 col-form-label">From</label>
            <div class="col-sm-10">
               <input class="form-control" type="number" min="0" max="23" name="from"  required/>
            </div>
          </div>

<!-- to -->
          <div class="form-group row">
            <label for="to" class="col-sm-2 col-form-label">To</label>
            <div class="col-sm-10">
               <input class="form-control" type="number" min="0" max="23" name="to"  required/>
            </div>
          </div>

<!-- spec -->
          <div class="form-group row">
            <label for="spec" class="col-sm-4 col-form-label">Specialization</label>
            <div class="col-sm-8">
              <select name="spec" id="type" class="form-control">
                <?php
                  $conn = getConnection();
                  $result = get_spec();
                  if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>

  <div class="buttons mt-3">
    <input class="btn  btn-primary"  type="submit" name="saveChanges" value="Save Changes" style="margin-rigth:10px" />
    <input class="btn  btn-default" type="submit" formnovalidate name="cancel" value="Cancel" />
  </div>

  </form>
  </div>

      


      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->


</body>

</html>
