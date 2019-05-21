<html>

<?php
	session_start(); 

?>
<head>
	<title>SIHATI</title>
	<link rel="stylesheet" href="admin/resources/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="style.css">
	<style>
		.carousel-inner {
			height: 60%;
			width: 60%;
			margin: auto;
		}

		/* Since positioning the image, we need to help out the caption */
		.carousel-caption {
			z-index: 10;
		}
		/* Declare heights because of positioning of img element */
		.carousel .item {
			width: 80%;
			height: 80%;
			background-color: #fff;
		}
		.carousel-inner > .item > img {
			position: absolute;
			top: 0;
			left: 0;
			max-height: 80%;
		}

		@media (min-width: 768px) {
			.carousel-caption p {
				margin-bottom: 20px;
				font-size: 21px;
				line-height: 1.4;
			}
		}


	</style>
</head>
<body>

	<div class ="navbar">
		<ul>
			<li><a href ="index.php">SEHATI</a></li>
			<li><a href ="doctors.php">Doctors</a></li> 
			<li><a href ="staff.php">Staff</a></li> 
			<li><a href ="blog.php">Blog</a></li> 
			<li><a href ="login.php">LOGIN</a></li>
		</ul>
	</div>

	<h1>Welcome to our website</h1>
	<div class="main" style="">
		<div class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
			<img class="d-block w-100" src="img/1.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
			<img class="d-block w-100" src="img/2.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
			<img class="d-block w-100" src="img/3.jpg" alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		</div>
	</div>

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="admin/resources/bootstrap/js/bootstrap.min.js"></script>
	<script>
		$('#carousel').carousel();
	</script>

</body>
</html>


