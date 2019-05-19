<?php


session_start();

require('functions.php');

$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";
$_GET['mode'] = 'add';

if(!$username){
  header( "Location:login.php" );
  exit;
}

$posts = [];

if ( isset( $_POST['saveChanges'] ) ) {
  if($_GET['mode']=='add'){
    $res = add_post($_POST);
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
        <a href="staff.php" class="list-group-item list-group-item-action bg-light">staff</a>
        <a href="blog.php" class="list-group-item list-group-item-action bg-light">blog</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <div class="container-fluid">
        <h1 class="mt-4">post Details</h1>
        <div class="col-10">
          <form action="?mode=<?php echo $_GET['mode']  ;?>" method="post" enctype="multipart/form-data">
  
          <input type="hidden" name="id" value="<?php echo (isset( $post['id'])? $post['id']:'') ; ?>"/>

          <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Name </label>
            <div class="col-sm-10">
               <input class="form-control" type="text" name="title" id="name" placeholder=""  autofocus required maxlength="255" value="<?php echo htmlspecialchars( (isset( $post['name'])? $post['name']:'') )?>" />
            </div>
          </div>

<!-- content -->
        <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Post</label>
            <div class="col-sm-10">
               <textarea name="content" cols='80' rows="10"  required>
               </textarea>
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
