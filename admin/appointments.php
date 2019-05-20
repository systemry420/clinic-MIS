<?php


session_start();

require('functions.php');
$con = getConnection();
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

if(!$username){
  header( "Location:adm-login.php" );
  exit;
}


$apps = get_appointments();
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Appointments </title>


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
<a href="appointments.php" class="list-group-item list-group-item-action bg-light">Appointments</a>

</div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

<div class="container-fluid">
<h1 class="mt-4">appointments</h1>


<div class="row mb-3">
<div class="col-4">
</div>
<div class="col-4">
<a class="btn btn-danger" href="dashboard.php">Back to dashboard</a>
</div>
</div>
<table class="table table-striped " style="">
<thead>
<tr>
<th scope="col" style="width: 100px;">Id</th>
<th scope="col">patient</th>
<th scope="col">Doctor</th>
<th scope="col">Date</th>
</tr>
</thead>
<tbody>
<?php



  if(mysqli_num_rows($apps) > 0){
      while ($app= mysqli_fetch_array($apps)) {
  ?>
  <tr >
    <td><?php $doc_id=$app['id']; echo $doc_id ; ?></td>
    <td>
        <?php 
            $sp = "select name from patient where id='".$app['pat_id']."'";
            $qp = mysqli_query($con, $sp);
            $rp = mysqli_fetch_array($qp);
            echo $rp['name'];
        ?>
    </td>
    <td>
        <?php 
            $sd = "select * from doctor where id='".$app['doc_id']."'";
            $qd = mysqli_query($con, $sd);
            $rd = mysqli_fetch_array($qd);
            echo $rd['name'];
        ?>
    </td>
    <td><?php echo $app['date']; ?></td>
    <?php
          if(isset($_GET['mode']) && $_GET['mode']=='delete'){
            $res = delete_appointment($app['id']);
            if($res){
              $s = "UPDATE doctor SET `status`=0 WHERE id = '".$rd['id'] ."'";
              $q = mysqli_query($con, $s);
          
            }
            header( "Location:appointments.php" );
            exit;
          }
        
      ?>

    <td>
      <a class="" href="<?php echo 'appointments.php?mode=delete&id='. $app['id'] ?>" onclick="return confirm('Delete This appointment?')">Delete
    </a>
    </td>
  </tr>
  
  <?php 
        }
  }


  ?>
  </tbody>
  
  </table>
  
  
  <?php
        
    
  ?>
  
  </div>
  </div>
  <!-- /#page-content-wrapper -->
  
  </div>
  <!-- /#wrapper -->
  
  
  </body>
  
  </html>
  