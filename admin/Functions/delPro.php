<?php
    require_once 'connect.php';
    $id = $_GET['id'];
    $delPro ="DELETE FROM products WHERE id=$id";
    $query = $conn ->query($delPro);

if($query){
	echo"<div class ='alert alert-success'> Deleted Successfully</div>";
}else{
	echo $conn ->error;
}
?>