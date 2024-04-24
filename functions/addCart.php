<?php
session_start();
$id=$_POST['id'];
require_once '../admin/Functions/connect.php';
	$create = $conn ->query("CREATE TABLE cart (
    id int,
    name varchar(255),
    price varchar(255),
    description varchar(255),
    img varchar(255)
	)");
	 
    $Cart = $conn ->query("SELECT id, name, price, description, img FROM products WHERE id='$id'");
	$Pro = $Cart -> fetch_assoc();
	$sId=$Pro['id'];
	$sName=$Pro['name'];
	$sPrice=$Pro['price'];
	$sDescription=$Pro['description'];
	$sImg=$Pro['img'];
	$conn ->query("INSERT INTO cart (id, name, price, description,img) 
							VALUES ('$sId',
									'$sName',
									'$sPrice',
									'$sDescription',
									'$sImg')"
				);
if($Cart){
									
	echo"
	<li class='header-cart-item '>							
	<div class='header-cart-item-img '>
			<img src='admin/images/".$Pro['img']."' alt='IMG'>
		</div>

		<div class='header-cart-item-txt'>
			<a href='product-detail.php?id=". $Pro['id']."' class='header-cart-item-name'>
				".$Pro['name']."
			</a>

			<span class='header-cart-item-info'>
				".$Pro['price']."L.E
			</span>
		</div>
		</li>
	";

}else{

}