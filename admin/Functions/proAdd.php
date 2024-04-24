<?php
echo "<pre>";
$name = $_POST['name'];
$price = $_POST['price']; 
$sale = $_POST['sale']; 
$category = $_POST['cat']; 
$rate=$_POST['rate']; 
$des=$_POST['description'];
/*$imageName = $_FILES['img']['name'];

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
 */




if(isset($_FILES['file']['name'])){

   /* Getting file name */
   $filename = $_FILES['file']['name'];

   /* Location */
   $location = "../images/$filename";
   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   $imageFileType = strtolower($imageFileType);

   /* Valid extensions */
   $valid_extensions = array("jpg","jpeg","png");

   $response = 0;
   /* Check file extension */
   if(in_array(strtolower($imageFileType), $valid_extensions)) {
      /* Upload file */
      if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
         $response = $location;
      }
   }

   echo $response;
}
require_once 'connect.php';

$insertPro ="INSERT INTO products(name, price, sale,description, cat_id, img, rating) VALUES('$name','$price','$sale','$des','$category','$newName','$rate')";

$query=$conn->query($insertPro);
if($query){
	echo'<div class ="alert alert-success">you added the product successfully</div>';

}else{

}
echo 0;