<?php


session_start();

require('functions.php');

$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";
$_GET['mode'] = 'add';

if(!$username){
  header( "Location:login.php" );
  exit;
}

$films = [];

if ( isset( $_POST['saveChanges'] ) ) {
  if($_GET['mode']=='add'){

    $_POST['photo_link'] = $_FILES['photo'];
    $res = add_film($_POST);
  }
  if($res){
    echo '<script> alert("Done!!"); </script>';
  }
  else{
    echo '<script> alert(" '. $res .' "); </script>';
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
        <a href="films.php" class="list-group-item list-group-item-action bg-light">Films</a>
        <a href="messages.php" class="list-group-item list-group-item-action bg-light">Messages</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <div class="container-fluid">
        <h1 class="mt-4">Films Details</h1>
        <div class="col-10">
          <form action="?mode=<?php echo $_GET['mode']  ;?>" method="post" enctype="multipart/form-data">
  
          <input type="hidden" name="id" value="<?php echo (isset( $film['id'])? $film['id']:'') ; ?>"/>

          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name </label>
            <div class="col-sm-10">
               <input class="form-control" type="text" name="name" id="name" placeholder=""  autofocus required maxlength="255" value="<?php echo htmlspecialchars( (isset( $film['name'])? $film['name']:'') )?>" />
            </div>
          </div>

          <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">
              <select name="type" id="type" class="form-control">
                <option value="action">Action</option>
                <option value="comedy">Comedy</option>
                <option value="romance">Romance</option>
                <option value="cartoon">Cartoon</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="duration" class="col-sm-2 col-form-label">Duration</label>
            <div class="col-sm-10">
               <input class="form-control" type="text" name="duration" id="duration" required/>
            </div>
          </div>

          <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label">Year</label>
            <div class="col-sm-10">
               <input class="form-control" type="number" name="year" id="year" required/>
            </div>
          </div>

          
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Photo </label>
            <div class="col-sm-10">
               <input type="file" name="photo" id="photo" placeholder=""  autofocus maxlength="255"  required/>
                <input type="hidden" name="photo_link" value="<?php echo (isset( $film['photo_link'])? $film['photo_link']:'') ; ?>"/>

                <?php if($_GET['mode'] == 'edit'): ?>

                  <a href="../img/<?php echo $film['photo_link']; ?>" target="_blank">
                    <img src="../img/<?php echo $film['photo_link']; ?>" style="width: 200px;">
                  </a>
                  
                <?php endif; ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="rate" class="col-sm-2 col-form-label">Rate</label>
            <div class="col-sm-10">
               <input class="form-control" type="number" name="rate" id="rate" required/>
            </div>
          </div>

          <div class="form-group row">
            <label for="video" class="col-sm-2 col-form-label">Video</label>
            <div class="col-sm-10">
               <input class="form-control" type="text" name="video" id="video" required/>
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
