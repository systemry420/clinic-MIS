<?php
	session_start();
	require('functions.php');
	$email = isset($_POST['email'])? $_POST['email']: '';
	$password = isset($_POST['pass'])? $_POST['pass']: '';

	$connect = getConnection();

	$sql= "SELECT id, email, password FROM patient where email='$email' AND password='$password'";
	$query= mysqli_query($connect, $sql);

	if(mysqli_num_rows($query)){
        // echo "<script> alert('Welcome!!')</script>";
        $row = mysqli_fetch_array($query);
        
        
        echo  $_SESSION['doc_id'];

        if(($_SESSION['doc_id'])>0)
            header('Location: appoint.php?link='.$_SESSION['doc_id']);
        else if($_SESSION['logged'] == 2)
            header('Location: show_blog.php?'.$_SESSION['blog']);
        else
            header('Location: home.php');
        
        $_SESSION['user'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        
    }
    else{
        echo '<script>alert("You have to sign up first!!"); </script>';
        session_destroy();
        header('Location: signup.php');
    }

?>