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
			<li><a href ="index.php">Home</a></li> 
			<li><a href ="doctors.php">Doctors</a></li> 
			<li><a href ="staff.php">Staff</a></li> 
			<li><a href ="blog.php">Blog</a></li> 
		</ul>
	</div>

	<?php
		if(isset($_GET['link'])){
            $_SESSION['link'] = $_GET['link'];
            header('Location: show_doctor.php?link='.$_SESSION['link']);
        }
    ?>
    
    
	<h1>You can view doctors after login</h1>
	<div class="main" style="display: flex; flex-wrap: wrap; justify-content: center;">

		<?php
			require('functions.php');
            $conn = getConnection();
            $sql = "SELECT `id`, `name`
                    FROM `doctor`
                    ORDER BY name ASC;";

            $result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_array($result)) {
		?>
					<div class="tile">
						<div class="item">
							<form action="" method="get">
								<a href="<?php echo '?link='.$row['id']; ?>">
									<img src="img/doc.jpg" style="width: 90%; max-height: 40%;" /><br>
									<h3 class="text-info"><?php echo $row["name"]; ?></h3>
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
		if(isset($_GET['link'])){
			$_SESSION['link'] = $_GET['link'];
			$_SESSION['logged'] = 1;
			header('Location: log.php');
		}
	?>

</body>
</html>