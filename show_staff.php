<?php
    session_start();
    require('functions.php');
    $conn = getConnection();
    // echo "show doc";

        if(isset($_SESSION['link'])){
            $id = $_SESSION['link'];
            $res = get_staff_details($id);
            $row = mysqli_fetch_array($res);
        }
    
        if(isset($_GET['link'])){
            $id = $_GET['link'];
            $res = get_staff_details($id);
            $row = mysqli_fetch_array($res);
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

    <style>
        .staff {
            border: 3px solid rgb(150,150,255);
            background: rgb(200, 200, 200, 0.9);
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
            width: 80%;
            height: 70%;
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
<div class ="navbar">
<div class ="navbar nav">
		<ul>
			<li><a href ="home.php">Home</a></li> 
			<li><a href ="doctors.php">Doctors</a></li> 
			<li><a href ="staff.php">Staff</a></li> 
			<li><a href ="blog.php">Blog</a></li> 
			<li><a href ="logout.php">Logout</a></li> 
		</ul>
	</div>

    </div>
    
    <div class="staff" style="">
        <div class="name">
            <h1>
                Information about the employee
            </h1>
        </div>

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
                        <th>Address</th>
                        <td><?php echo $row['address']; ?></td>
                    </tr>
                    <tr>
                        <th>Day</th>
                        <td><?php echo $row['day']; ?></td>
                    </tr>

                </table>
            </div>
            <div class="poster" >
                <img src="img/emp.png" />
            </div>
        </div>
        
</div>

</body>
</html>