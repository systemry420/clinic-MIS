<?php

$dbhandle = mysqli_connect('localhost', 'root', '');
$selected = mysqli_select_db($dbhandle, 'login');

$a=$_POST["f1"];
$b=$_POST["f2"];
$c=$_POST["f3"];
$d=$_POST["f4"];

$query = "insert into mydoctortime values ('$a','$b','$c','$d')";
mysqli_query($dbhandle,$query) or die(mysqli_error($dbhandle));


print("firstname=$a<br>lastname=$b<br>datebirth=$c<br>email=$d");

?>