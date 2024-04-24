<?php
echo "<pre>";
$name = $_POST['name'];
$price = $_POST['price']; 
$sale = $_POST['sale']; 
$des = $_POST['description']; 
$cat = $_POST['cat_id']; 
$rate= $_POST['rate'];
print_r($_FILES['img']);
die();
$temp=$_FILES['img']['tmp_name'];

	if($_FILES['img']['error']==0){
		$extension =['jpg', 'jpeg','gif','png' ];
		$ext=strtolower( pathinfo($imageName,PATHINFO_EXTENSION));
			if(in_array($ext,$extension)){
				if($_FILES['img']['size']<30000000){
					$newName=md5(uniqid()).".".$ext;
					move_uploaded_file($temp,"../images/$newName");
				}else{
					echo"file size is too big ";
				}
			}else{
				echo"extension doesn't allowed";
			}
	}else{
	print_r($_FILES['img']['error']);
		echo"you must upload an image";
	}


require_once 'connect.php';
 $id = $_GET['id'];

$UpdatePro ="UPDATE products set 
					name='$name',
					price='$price',
					sale='$sale',
					description='$des',
					img='$newName',
					cat_id=$cat,
					rating=$rate
					WHERE id= $id";

$query=$conn->query($UpdatePro);
if($query){
	header("location:../products.php");
}else{
	echo $conn ->error;
}