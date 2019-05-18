<?php


session_start();

require('functions.php');

$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

if(!$username){
  header( "Location:adm-login.php" );
  exit;
}

if(isset($_GET['mode']) && $_GET['mode']=='delete'){
  
  delete_film($_GET['id']);
  header( "Location:films.php" );
  exit;
}

$films = get_films();
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Films </title>


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
<h1 class="mt-4">Films</h1>


<div class="row mb-3">
<div class="col-4">
<a class="btn btn-success" href="add-film.php?mode=add">Add a New Film</a>
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
<th scope="col">Type</th>
<th scope="col">Duration</th>
<th scope="col">Year</th>
<th scope="col">Poster</th>
<th scope="col">rate</th>
<th scope="col">video</th>
<th scope="col">views</th>
</tr>
</thead>
<tbody>
<?php
  if(mysqli_num_rows($films) > 0){
      while ($film= mysqli_fetch_array($films)) {

  ?>
  
  <tr >
    <td><?php echo $film['id']?></td>
    <td><?php echo $film['name']; ?></td>
    <td><?php echo $film['type']?></td>
    <td><?php echo $film['duration']?></td>
    <td><?php echo $film['year']?></td>
    <td><?php echo $film['poster']?></td>
    <td><?php echo $film['rate']?></td>
    <td><?php echo $film['video']?></td>
    <td><?php echo $film['views']?></td>
    <td>
      <a class="" href="<?php echo 'films.php?mode=delete&id='. $film['id'] ?>" onclick="return confirm('Delete This film?')">Delete
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
  