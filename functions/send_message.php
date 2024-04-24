<?php
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$message=$_POST['message'];
require_once '../admin/Functions/connect.php';
$queryMess=$conn->query("INSERT INTO message(name,phone,email,message) 
VALUES ('$name','$phone','$email','$message')");
if($queryMess){
	echo'<div class ="alert alert-success">Message Sent successfully</div>';

}else{

}