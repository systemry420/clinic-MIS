<?php
	session_start();
	require('functions.php');
	$email = $_POST['email'];
	$password = $_POST['pass'];

	$connect = getConnection();

	$sql= "SELECT email, password FROM patient where email='$email' AND password='$password'";
	$query= mysqli_query($connect, $sql);

	if(mysqli_num_rows($query)){
        echo "<script> alert('Welcome!!')</script>";
        $row = mysqli_fetch_array($query);
        $_SESSION['user'] = $row['name'];
        
        if($_SESSION['log'] == 1)
            header('Location: show_doctor.php?'.$_SESSION['link']);
        else
            header('Location: home.php');
        
        $_SESSION['log'] = 1;
    }
    else{
        echo '<script>alert("You have to sign up first!!"); </script>';
        session_destroy();
        header('Location: signup.php');
    }

?>