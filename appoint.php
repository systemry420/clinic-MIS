<!-- todo:
    - the doc can welcome 5 appoints a day
    - give appointment id for patient to use when visiting clinic
-->
<?php
    session_start();
    // echo $_SESSION['doc_id'] ;

    require('functions.php');
    $conn = getConnection();

    $sql = "SELECT *
            FROM `doctor`
            WHERE id = '".$_SESSION['doc_id']."'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
    }

    // var_dump($row) ;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Appointment</title>
    <link rel="stylesheet" href="admin/resources/bootstrap/css/bootstrap.css">
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

	<h2>Make an appointment to doctor: <?php echo '<span style="color:orange">'.$row['name'].'</span>'; ?> </h2>
	<div class="main" style="min-height:100%; flex-wrap: wrap; justify-content: center;">
		<h3>The doctor is available on:</h3>
            <div class="tile" style="margin:auto; width: 40%">
                <div class="item">
                    <form action="" method="get">
                        <h4 class="text-info">Date: <?php $tomorrow=date("Y-m-d", time() + 86400); echo $tomorrow; ?></h4>
                        <h4 class="text-info">From: <?php echo $row["from_time"]; ?></h4>
                        <h4 class="text-info">To: <?php echo $row["to_time"]; ?></h4>
                        <input class="btn btn-primary" name="confirm" type="submit" value="Confirm">
                    </form>
                </div>
            </div>
		<?php


        if(isset($_SESSION['user'])){
            if(isset($_GET['confirm'])){
                $s = "UPDATE doctor SET `status`=1 WHERE id = '".$_SESSION['doc_id'] ."'";
                $q = mysqli_query($conn, $s);
                // echo $_SESSION['user_id'];
                if($q){
                    $sql = 'INSERT INTO `appoint`(`id`, `pat_id`, `doc_id`, `date`) Values '
                    .'(Null, "'.$_SESSION['user_id'].'", "'.$_SESSION['doc_id'].'", "'.$tomorrow.'")';
    
                    $result=mysqli_query($conn, $sql);
                    if($result){
                        echo "<script>alert('Done'); </script>";
                        header("Location: home.php");
                    }
                }
            }
        }
        else{
            header('Location: login.php');
        }
    


		?>
	</div>


</body>
</html>