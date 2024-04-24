<?php
echo "<pre>";
$username = $_POST['username'];
$address = $_POST['address']; 
$phone = $_POST['phone']; 
$email = $_POST['email']; 
$gender = $_POST['gender']; 
$priv = $_POST['priv']; 
require_once 'connect.php';
 $id = $_GET['id'];

 if(!empty($_POST['password'])){
	$pass = md5($_POST['password']);
	$updatePass = "UPDATE users SET password = '$pass' WHERE id = $id";
	$queryPass = $conn -> query($updatePass);
}

$UpdateUser ="UPDATE users set 
					username='$username',	
					phone='$phone',
					email='$email', 
					gender='$gender', 
					priv='$priv' 
					WHERE id= $id";

$query=$conn->query($UpdateUser);
if($query){
	header("location:../users.php");
}else{
	echo $conn ->error;
}