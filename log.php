<?php
	session_start();
	require('functions.php');
	$email = $_POST['user'];
	$password = $_POST['password'];

	$connect = getConnection();

	$sql= "SELECT email, password FROM patient where email='$email' AND password='$password'";
	$query= mysqli_query($connect, $sql);

	if(mysqli_num_rows($query)){
        echo "<script> alert('Welcome!!')</script>";
        $row = mysqli_fetch_array($query);
        $_SESSION['username'] = $row['username'];
        if($_SESSION['logging'] == 1 )
            header('Location: home.php');
        if($_SESSION['logging'] == 0)
            header('Location: show_film.php?'.$_SESSION['link']);
    }
    else{
        echo '<script>alert("You have to sign up first!!"); </script>';
        session_destroy();
        header('Location: signup.php');
    }

?>