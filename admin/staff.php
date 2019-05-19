<?php

require('functions.php');

if(isset($_GET['mode']) && $_GET['mode']=='delete'){
  
    delete_staff($_GET['id']);
    header( "Location:staff.php" );
    exit;
  }
  

$staff = get_staff();
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Staff </title>


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
<a href="doctors.php" class="list-group-item list-group-item-action bg-light">Doctors</a>
<a href="staff.php" class="list-group-item list-group-item-action bg-light">Staff</a>
<a href="blog.php" class="list-group-item list-group-item-action bg-light">blog</a>

</div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

<div class="container-fluid">
<h1 class="mt-4">Staff</h1>


<div class="row mb-3">
<div class="col-4">
<a class="btn btn-success" href="add-staff.php?mode=add">Add a New Staff</a>
</div>

<div class="col-4">
<a class="btn btn-danger" href="dashboard.php">Back to dashboard</a>
</div>
</div>
<table class="table table-striped" id="">
<thead>
<tr>
<th scope="col" style="width: 100px;">Id</th>
<th scope="col">Name</th>
<th scope="col">Tele</th>
<th scope="col">address</th>
<th scope="col">day</th>
<th scope="col">Gender</th>
</tr>
</thead>
<tbody>
<?php
  if(mysqli_num_rows($staff) > 0){
      while ($s= mysqli_fetch_array($staff)) {

  ?>
  
  <tr >
    <td><?php echo $s['id']?></td>
    <td><?php echo $s['name']; ?></td>
    <td><?php echo $s['tele']; ?></td>
    <td><?php echo $s['address']; ?></td>
    <td><?php echo $s['day']; ?></td>
    <td><?php echo $s['gender']; ?></td>
    <td>
      <a class="" href="<?php echo 'staff.php?mode=delete&id='. $s['id'] ?>" onclick="return confirm('Delete This Staff?')">Delete
    </a>
    </td>
  </tr>
  
  <?php 
        }
  }
  ?>
  </tbody>
  
  </table>
  
  
  
  
  </div>
  </div>
  <!-- /#page-content-wrapper -->
  
  </div>
  <!-- /#wrapper -->
  
  
  </body>
  
  </html>
  