<?php

function getConnection(){
    $connect=mysqli_connect('localhost','root','');
    $selected=mysqli_select_db($connect,'project');
    return $connect;
}

function get_films(){
	$conn = getConnection();
	$sql = "SELECT * FROM film";

    $result=mysqli_query($conn, $sql);

	return $result;
}

function get_messages(){
	$conn = getConnection();
	$sql = "SELECT * FROM contact";

    $result=mysqli_query($conn, $sql);

	return $result;
}

function add_film($data){
    // print_r($data);
    $name = $data['name'];
    $type = $data['type'];
    $dur = $data['duration'];
    $yr = $data['year'];
    $photo = $data['photo_link']['name'];
    $rate = $data['rate'];
    $vid = $data['video'];

    $conn = getConnection();
    $sql = 'INSERT INTO film (`name`, `type`, `duration`, `year`, `poster`, `rate`, `video`, `views`) VALUES '
            .'("'.$name.'", "'.$type.'","'.$dur.'","'.$yr.'","'.$photo.'","'.$rate.'","'.mysql_real_escape_string($vid).'", "0")' ;

    $result=mysqli_query($conn, $sql);
    return $result;
}


function delete_film($id){
	$conn = getConnection();
    $sql = "DELETE FROM film WHERE id ='$id' LIMIT 1";
    $result=mysqli_query($conn, $sql);

    return $result;
}

function delete_message($id){
	$conn = getConnection();
    $sql = "DELETE FROM contact WHERE id ='$id' LIMIT 1";
    $result=mysqli_query($conn, $sql);

    return $result;
}

function addImage($image){
    $target = '../img/$image["name"]';

    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" &&  $imageFileType != "png") {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        if (move_uploaded_file($image["tmp_name"], $target)) {
            // echo $target;
            return $target;
        }
    }
}


function get_new_salt(){
    return base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
}

?>