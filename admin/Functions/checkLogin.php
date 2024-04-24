<?php
	session_start();
	require_once'connect.php';
	echo "<pre>";
	$username =$_POST['username'];
	$password =md5($_POST['password']);
	$select="SELECT * FROM users WHERE 
							username='$username'AND
							password='$password'";

	$query = $conn -> query($select);

	if($query -> num_rows >0){
		$_SESSION['login']=$username;
		header('location:../index.php');
	}else{
		header('location:../login.php');
	}