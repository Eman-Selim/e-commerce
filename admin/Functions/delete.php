
<?php
    require_once 'connect.php';
    $id = $_GET['id'];
    $delUser ="DELETE FROM users WHERE id='$id'";
    $query = $conn ->query($delUser);

if($query){
	echo"<div class ='alert alert-success'> Deleted Successfully</div>";
}else{
	echo $conn ->error;
}
?>