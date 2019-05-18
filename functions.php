<?php

function getConnection(){
    $connect=mysqli_connect('localhost','root','');
    $selected=mysqli_select_db($connect,'hospital');
    return $connect;
}

function get_doctors(){
	$conn = getConnection();
	$sql = "SELECT * FROM doctor";

    $result=mysqli_query($conn, $sql);

	return $result;
}

function get_film_details($id){
	$conn = getConnection();
	$sql = "SELECT * FROM film where id='$id'";

    $result=mysqli_query($conn, $sql);

	return $result;
}


function add_book($data){
    // print_r($data);
    $conn = getConnection();
	$sql = 'INSERT INTO books (images, name, price) VALUES ("photos/'.$data['photo_link']['name'].'","'.$data['name'].'","'.$data['price'].'")' ;
    $result=mysqli_query($conn, $sql);

    return $result;
}


function delete_book($id){
	$conn = getConnection();
    $sql = "DELETE FROM books WHERE id ='$id' LIMIT 1";
    $result=mysqli_query($conn, $sql);

    return $result;
}

function addImage($image){
    $target = '../photos/$image["name"]';

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