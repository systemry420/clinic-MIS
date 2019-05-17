<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>mydoctortime</title>
	<link rel="stylesheet" type="text/css" href="body.css">
</head>
<body >
	<center><font face="AR cena"size=15 ><I>YOUR DOCTOR </I></font></center>
	<header>

	<div class="row">  
	<ul class="main-nav">
		<li class="active"><a href="home.php">Home</a></li>
			<li><a href="doctors.html">Doctors</a></li>
			<li><a href="appointments.html">Appointments and Advice</a></li>
			<li><a href="healthy.html">Healthy</a></li>
		
	</ul>
</div>
<div class="logo">
			<img src="th.jpg">
			
		</div>

</header>
	<form method="post" action="display2.php">
	<div class="login">
		<h1>Register</h1>
		<div class="textbox">
			<input type="text" placeholder="first name" name="f1">
		</div>
		<div class="textbox">
			<input type="text" placeholder="last name" name="f2">
		</div>
		<div class="textbox">
			<input type="date" placeholder="Date Birth" name="f3">
		</div>
		<div class="textbox">
			<input type="text" placeholder="Email" name="f4">
		</div>
		<div class="textbox">
			<input type="password" placeholder="password" name="p1">
		</div>
		<div class="textbox">
			<input type="password" placeholder="confirm password" name="p2">
		</div>
		<input type="submit" name="" value="Save">
		<input type="reset" value="Clear">
	</div>
	<p class="p"> If registered , <a href="home.php">sign in</a></p>
</form>
 


</body>
</html>
