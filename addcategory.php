<?php
	include('conn.php');

	$cname=$_POST['cname'];

	$sql="INSERT into category (catname) values ('$cname')";
	$conn->query($sql);

	header('location:category.php');

?>