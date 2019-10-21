<?php
	include('conn.php');

	$id=$_GET['category'];

	$cname=$_POST['cname'];

	$sql="UPDATE category set catname='$cname' where categoryid='$id'";
	$conn->query($sql);

	header('location:category.php');
?>