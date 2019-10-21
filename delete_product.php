<?php
	include('conn.php');

	$id = $_GET['product'];

	$sql="DELETE from product where productid='$id'";
	$conn->query($sql);

	header('location:product.php');
?>