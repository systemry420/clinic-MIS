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


function add_doctor($data){
    // print_r($data);
    $name = $data['name'];
    $gender = $data['gender'];
    $tele = $data['tele'];
    $email = $data['email'];
    $address = $data['address'];
    $from = $data['from'];
    $to = $data['to'];
    $spec = $data['spec'];

    $conn = getConnection();
    $sql = 'INSERT INTO doctor (`id`, `gender`,`name`, `tele`, `email`, `address`, `from_time`, `to_time`, `spec_id`, `status`) VALUES '
            .'(Null, "'.$gender.'", "'.$name.'", "'.$tele.'", "'.$email.'" ,"'.$address.'","'.$from.':00:00","'.$to.':00:00","'.$spec.'", "0")' ;

    $result=mysqli_query($conn, $sql);
    return $result;
}


function delete_doctor($id){
	$conn = getConnection();
    $sql = "DELETE FROM doctor WHERE id ='$id' LIMIT 1";
    $result=mysqli_query($conn, $sql);

    return $result;
}

function delete_message($id){
	$conn = getConnection();
    $sql = "DELETE FROM contact WHERE id ='$id' LIMIT 1";
    $result=mysqli_query($conn, $sql);

    return $result;
}

?>