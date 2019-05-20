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
			<li><a href ="logout.php">Logout</a></li> 
		</ul>
	</div>

	<h1>Make an appointment to doctor: </h1>
	<div class="main" style="display: flex; flex-wrap: wrap; justify-content: center;">
		<?php
			require('functions.php');
            $conn = getConnection();

            // doctor x is available on time
            $sql = "SELECT `id`, `from_time`, `to_time`
                    FROM `doctor`
                    WHERE id =";

            $result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_array($result)) {
		?>
					<div class="tile">
						<div class="item">
							<form action="" method="get">
								<a href="<?php echo '?link='.$row['id']; ?>">
									<!-- <img src="img/emp.png" style="width: 90%; max-height: 40%;" /><br> -->
									<h3 class="text-info"><?php echo $row["from_time"]; ?></h3>
                                </a>
                                <input name="confirm" type="submit" value="Confirm">
							</form>
						</div>
					</div>
		<?php
				}
			}

            if(isset($_GET['confirm'])){
                echo "<script>alert('Done'); </script>";
            }
		?>
	</div>


</body>
</html>