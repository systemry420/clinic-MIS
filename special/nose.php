<!DOCTYPE html>
<html>
<head>
	<title>Nose</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<div class ="navbar nav">
		<ul>
			<li><a href ="../home.php">Home</a></li> 
			<li><a href ="../doctors.php">Doctors</a></li> 
			<li><a href ="../staff.php">Staff</a></li> 
			<li><a href ="../blog.php">Blog</a></li> 
			<li><a href ="../logout.php">Logout</a></li> 
		</ul>
	</div>

	<h1>Nose Doctors</h1>

	<div class="main" style="display: flex; flex-wrap: wrap; justify-content: center;">
		<?php
			require('../functions.php');
			$conn = getConnection();
			$sql = 'SELECT doctor.id, doctor.name
					FROM doctor, spec
					WHERE doctor.spec_id= spec.id
					AND spec.name="nose"
					';

			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_array($result)) {
		?>
					<div class="tile tile-doctor">
						<div class="item">
							<form action="" method="get">
								<a href="<?php echo '?link='.$row["id"]; ?>">
									<img src="../img/doc.jpg" style="width: 90%; max-height: 200px;" /><br>
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
</body>
</html>