<html>

<?php
	session_start(); 

?>
<head>
	<title>SIHATI</title>
	<link rel="stylesheet" href="style.css">
	<style>
		h1, h2 {
			background: #ccc;
		}
	</style>
</head>
<body>

	<div class ="navbar">
		<ul>
			<li><a href ="index.php">LOGO</a></li>
			<li><a href ="login.php">LOGIN</a></li>
		</ul>
	</div>

	<h1 style="text-align:center">Welcome to our website</h1>
	<h2 style="text-align:center">In order to view films you have to login first!</h2>
	<div class="main" style="display: flex; flex-wrap: wrap; justify-content: center;">
		<?php
			require('functions.php');
			$conn = getConnection();
			$result = get_doctors();

			if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_array($result)) {
		?>
					<div class="tile">
						<div class="item">
							<form action="" method="get">
								<a href="<?php echo '?link='.$row["id"]; ?>">
									<img src="img/doc.jpg" style="width: 90%; max-height: 200px;" /><br>
									<h4 class="text-info"><?php echo $row["name"]; ?></h4>
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
			$_SESSION['logging'] = 0;

			if(!isset($_SESSION['username'])){
				header('Location: login.php');
			}
		}
	?>
</body>
</html>


