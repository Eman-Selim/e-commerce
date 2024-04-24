<?php
$id=$_POST['messageId'];
require_once 'connect.php';
$updateMess=$conn->query("UPDATE message SET view = 'read' WHERE id =$id");

