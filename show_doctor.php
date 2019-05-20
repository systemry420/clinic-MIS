<?php
    session_start();
    require('functions.php');
    $conn = getConnection();
    // echo $_SESSION['link'];

    if(isset($_SESSION['user'])){
        if(isset($_SESSION['link'])){
            $id = $_SESSION['link'];
            $res = get_doctor_details($id);
            $row = mysqli_fetch_array($res);
        }
    
        if(isset($_GET['link'])){
            $id = $_GET['link'];
            $res = get_doctor_details($id);
            $row = mysqli_num_rows($res)>0? mysqli_fetch_array($res): [] ;
        }

        $_SESSION['doc_id'] = $id;
    }
    else{
        header('Location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $row['name']; ?></title>
    <link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.css" />

    <style>
        body {
            background: url('img/1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .doctor {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: auto;
            width:90%;
            padding: 2%;
        }
        .table {
            width: 60%;
        }

        .row {
            display: flex;
            width: 100%;
        }

        .poster {
            position: relative;
            left: 5%;
            top: 5%;
        }

        .poster img{
            width: 100%;
            border-radius: 50%;
        }

        table {
            width: 100%;
            background: #ddf;
        }
        table, tr, td, th {
            border: 3px solid #333;
            border-collapse: collapse;
            padding: 2%;
        }

        .related {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;

        }

        .item {
            display: inline-block;
            width: 20%;
            background: #fff;
            padding: 1em;
            margin: 10px;
            border-radius: 10px;
        }
    </style>

</head>
<body>
<div class ="navbar nav">
		<ul>
			<li><a href ="home.php">Home</a></li> 
			<li><a href ="doctors.php">Doctors</a></li> 
			<li><a href ="staff.php">Staff</a></li> 
			<li><a href ="blog.php">Blog</a></li> 
			<li><a href ="logout.php">Logout</a></li> 
		</ul>
	</div>

    <div class="name">
        <h1>
            Information about the doctor
        </h1>
    </div>
<div class="main">
<div class="doctor" style="">

        <div class="row">
            <div class="table">
                <table width="60%">
                    <tr>
                        <th>Name</th>
                        <td><?php echo $row['name']; ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo $row['gender']; ?></td>
                    </tr>
                    <tr>
                        <th>Tele</th>
                        <td><?php echo $row['tele']; ?></td>
                    </tr>
                    <tr>
                        <th>email</th>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo $row['address']; ?></td>
                    </tr>
                    <tr>
                        <th>From</th>
                        <td><?php echo $row['from_time']; ?></td>
                    </tr>
                    <tr>
                        <th>To</th>
                        <td><?php echo $row['to_time']; ?></td>
                    </tr>
                    <tr>
                        <th>Specialization</th>
                        <td>
                            <?php 
                                $sql = 'SELECT * FROM spec where id='.$row['spec_id']; 
                                $res = mysqli_query($conn, $sql);
                                $r = mysqli_fetch_array($res);
                                echo $r['name'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                    <tr>
                        <!-- if status=0 => available -->
                        <!-- show appointment form -->
                        <td colspan="2" style=" text-align:center;">
                        <?php
                            if($row['status']==0){
                            ?>
                                <form action="appoint.php" method="get">
                                    <input type="hidden" name="doc_id" value="<?php echo $row['id']?>">
                                    <input class="btn btn-primary" type="submit" value="Make appointment">
                                </form>
                                
                            <?php
                            }
                            else{
                                echo "<span style='color:red;'>doctor is unavailable</span>";
                            }

                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="poster" >
                <img src="img/doc.jpg" />
            </div>
        </div>
        
        <h3>Similar doctors</h3>
        <div class="related">
            <?php
                $sql = "SELECT * FROM `doctor` WHERE `spec_id` ='".$row['spec_id'] ."'";

                $result=mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    while ($r = mysqli_fetch_array($result)) {
            ?>
                <div class="item">
                    <form action="" method="get">
                        <a href="<?php echo '?link='.$r["id"]; ?>">
                            <img src="img/doc.jpg" style="width: 100%; max-height: 150px;" /><br>
                            <h4><?php echo $r["name"]; ?></h4>
                        </a>
                    </form>
                </div>
            <?php
                    }
                }
            ?>

        </div>
</div>

</div>    

</body>
</html>