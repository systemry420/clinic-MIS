<?php
    session_start();
    require('functions.php');
    $conn = getConnection();
    // echo $_SESSION['link'];

    if(isset($_SESSION['user'])){
        if(isset($_SESSION['blog'])){
            $id = $_SESSION['blog'];
            $res = get_blog($id);
            $row = mysqli_fetch_array($res);
        }
    }
    else{
        header('Location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $row['title']; ?></title>

    <style>
        body {
            /* background: url('img/1.jpg'); */
            background-repeat: no-repeat;
            background-size: cover;
        }

        .row {
            height: 50%;
            display: flex;
            width: 100%;
        }

        .row img{
            width: 60%;
            max-height: 300px;
            margin: 2% auto;
        }

        .content {
            margin: 1% auto;
            width: 80%;
            text-align: justify;
            color: #fff;
        }
    </style>

</head>
<body>
<div class ="navbar nav">
		<ul>
			<li><a href ="home.php">Home</a></li> 
			<li><a href ="doctors.php">Doctors</a></li> 
			<li><a href ="staff.php">Staff</a></li> 
			<li><a href ="blog.php">Blog</a></li> 
			<li><a href ="logout.php">Logout</a></li> 
		</ul>
	</div>

    
    <div class="main" style="background:rgb(10, 30, 60, 0.9); width:80%; margin: 1% auto; ">
        <div class="name">
            <h1>
               <?php echo $row['title']; ?>
            </h1>
        </div>

        <div class="row">
            <img src="<?php echo 'img/'.$row['img']; ?>" />
        </div>

        <div class="content">
            <?php echo $row['content']; ?>

        </div>
    </div>

</body>
</html>