<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background:url('650x350_pediatrician_or_family_practitioner_ref_guide.jpg');
			backround-repeat: no-repeat;
			background-size: cover;
			height: 100%;
">

<div class ="navbar nav">
		<ul>
			<li><a href ="home.php">Home</a></li> 
			<li><a href ="doctors.php">Doctors</a></li> 
			<li><a href ="staff.php">Staff</a></li> 
			<li><a href ="blog.php">Blog</a></li> 
			<li><a href ="logout.php">Logout</a></li> 
		</ul>
	</div>

	<div class="main" style="display: flex; flex-wrap: wrap; justify-content: center;">
		<?php
			require('functions.php');
			$conn = getConnection();
			$result = get_spec();

			if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_array($result)) {
		?>
					<div class="tile">
						<div class="item">
							<form action="?" method="get">
								<a href="<?php echo 'special/'.$row["name"].'.php'; ?>">
									<img src="<?php echo 'img/'.$row['img']; ?>" style="width: 90%; max-height: 40%;" /><br>
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