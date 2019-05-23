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

function get_staff(){
	$conn = getConnection();
	$sql = "SELECT * FROM staff";

    $result=mysqli_query($conn, $sql);

	return $result;
}

function get_posts(){
	$conn = getConnection();
	$sql = "SELECT * FROM posts";

    $result=mysqli_query($conn, $sql);

	return $result;
}

function get_appointments(){
	$conn = getConnection();
	$sql = "SELECT * FROM appoint";

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

function add_staff($data){
    $name = $data['name'];
    $gender = $data['gender'];
    $tele = $data['tele'];
    $email = $data['email'];
    $address = $data['address'];
    $day = $data['day'];

    $conn = getConnection();
    $sql = 'INSERT INTO `staff`(`id`, `name`, `tele`, `address`, `day`, `gender`) VALUES '
        .'(Null, "'.$name.'", "'.$tele.'", "'.$address.'", "'.$day.'", "'.$gender.'")';

    $result=mysqli_query($conn, $sql);
    return $result;
}

function add_post($data)
{
    $title = $data['title'];
    $content = $data['content'];
    // print_r($content);

    $conn = getConnection();
    $sql = 'INSERT INTO `posts`(`id`, `title`, `content`) Values '
            .'(Null, "'.$title.'", "'.$content.'")';

    $result=mysqli_query($conn, $sql);
    return $result;
        
}

function delete_doctor($id){
	$conn = getConnection();
    $sql = "DELETE FROM doctor WHERE id ='$id' LIMIT 1";
    $result=mysqli_query($conn, $sql);

    return $result;
}

function delete_staff($id){
	$conn = getConnection();
    $sql = "DELETE FROM staff WHERE id ='$id' LIMIT 1";
    $result=mysqli_query($conn, $sql);

    return $result;
}

function delete_post($id){
	$conn = getConnection();
    $sql = "DELETE FROM posts WHERE id ='$id' LIMIT 1";
    $result=mysqli_query($conn, $sql);

    return $result;
}


function delete_appointment($id){
	$conn = getConnection();
    $sql = "DELETE FROM appoint WHERE id ='$id' LIMIT 1";
    $result=mysqli_query($conn, $sql);

    return $result;
}

?>