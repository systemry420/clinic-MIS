<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class ="navbar nav">
		<ul>
			<li><a href ="index.php">SEHATI</a></li> 
			<li><a href ="doctors.php">Doctors</a></li> 
			<li><a href ="staff.php">Staff</a></li> 
			<li><a href ="blog.php">Blog</a></li> 
			<li><a href ="login.php">LOGIN</a></li> 
		</ul>
	</div>

	<h1>You can surf the blog, and get valuable information</h1>

	<div class="main" style="display: flex; flex-wrap: wrap; justify-content: center;">
		<?php
			require('functions.php');
            $conn = getConnection();
            $sql = "SELECT *
                    FROM `posts`
                    ORDER BY id Desc
					LIMIT 3;";

            $result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_array($result)) {
		?>
					<div class="tile">
						<div class="item">
							<form action="" method="get">
								<a href="<?php echo '?blog='.$row['id']; ?>">
									<img src="<?php echo 'img/'.$row["img"]; ?>" style="width: 90%; max-height: 40%;" /><br>
									<h3 class="text-info"><?php echo $row["title"]; ?></h3>
								</a>
							</form>
						</div>
					</div>
		<?php
				}
			}

		?>
	</div>


	<?php
		if(isset($_GET['blog'])){
            $_SESSION['blog'] = $_GET['blog'];
            header('Location: show_blog.php?blog='.$_SESSION['blog']);
        }
    ?>

	<?php
		if(isset($_GET['blog'])){
			$_SESSION['blog'] = $_GET['blog'];
			$_SESSION['logged'] = 2;
			// header('Location: log.php');
		}
	?>

</body>
</html>