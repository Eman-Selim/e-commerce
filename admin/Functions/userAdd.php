<?php
echo "<pre>";
$username = $_POST['username'];
$password = md5($_POST['password']); 
$address = $_POST['address']; 
$phone = $_POST['phone']; 
$email = $_POST['email']; 
$gender = $_POST['gender']; 
$priv = $_POST['priv']; 
require_once 'connect.php';

$insertUser ="INSERT INTO users(username, password, email, address, phone, priv, gender) VALUES('$username','$password','$email','$address','$phone','$priv', '$gender')";

$query=$conn->query($insertUser);
if($query){
	echo'<div class ="alert alert-success">you signed up successfully</div>';

}else{

}