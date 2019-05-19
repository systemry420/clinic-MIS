<?php


session_start();

require('functions.php');
$con = getConnection();
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

if(!$username){
  header( "Location:adm-login.php" );
  exit;
}

if(isset($_GET['mode']) && $_GET['mode']=='delete'){
  
  delete_post($_GET['id']);
  header( "Location:blog.php" );
  exit;
}

$posts = get_posts();
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>posts </title>


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
<h1 class="mt-4">posts</h1>


<div class="row mb-3">
<div class="col-4">
<a class="btn btn-success" href="add-post.php?mode=add">Add a New post</a>
</div>
<div class="col-4">
<a class="btn btn-danger" href="dashboard.php">Back to dashboard</a>
</div>
</div>
<table class="table table-striped " style="">
<thead>
<tr>
<th scope="col" style="width: 100px;">Id</th>
<th scope="col">Title</th>
<th scope="col">Content</th>
</tr>
</thead>
<tbody>
<?php
  if(mysqli_num_rows($posts) > 0){
      while ($post= mysqli_fetch_array($posts)) {

  ?>
  
  <tr >
    <td><?php echo $post['id']?></td>
    <td><?php echo $post['title']; ?></td>
    <td><?php echo substr($post['content'], 0, 100 ); ?></td>
    <td>
      <a class="" href="<?php echo 'blog.php?mode=delete&id='. $post['id'] ?>" onclick="return confirm('Delete This post?')">Delete
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
  