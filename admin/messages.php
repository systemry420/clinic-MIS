<?php

require('functions.php');

if(isset($_GET['mode']) && $_GET['mode']=='delete'){
  
    delete_message($_GET['id']);
    header( "Location:messages.php" );
    exit;
  }
  

$messages = get_messages();
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Messages </title>


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
<h1 class="mt-4">Messages</h1>


<div class="row mb-3">
<div class="col-4">
<a class="btn btn-danger" href="dashboard.php">Back to dashboard</a>
</div>
</div>
<table class="table table-striped" id="">
<thead>
<tr>
<th scope="col" style="width: 100px;">Id</th>
<th scope="col">Email</th>
<th scope="col">Message</th>
</tr>
</thead>
<tbody>
<?php
  if(mysqli_num_rows($messages) > 0){
      while ($message= mysqli_fetch_array($messages)) {

  ?>
  
  <tr >
    <td><?php echo $message['id']?></td>
    <td><?php echo $message['email']; ?></td>
    <td><?php echo $message['message']; ?></td>
    <td>
      <a class="" href="<?php echo 'messages.php?mode=delete&id='. $message['id'] ?>" onclick="return confirm('Delete This Message?')">Delete
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
  