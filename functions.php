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


function get_spec(){
	$conn = getConnection();
	$sql = "SELECT * FROM spec";

    $result=mysqli_query($conn, $sql);

	return $result;
}



function get_doctor_details($id){
	$conn = getConnection();
	$sql = "SELECT * FROM doctor where id='$id'";

    $result=mysqli_query($conn, $sql);

	return $result;
}



function get_staff_details($id){
	$conn = getConnection();
	$sql = "SELECT * FROM staff where id='$id'";

    $result=mysqli_query($conn, $sql);

	return $result;
}


?>