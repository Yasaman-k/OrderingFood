<?php
	session_start();
	include('conn.php');
	if(isset($_POST['productid']) AND isset($_SESSION["validuser"])){
 
		$check_user_details = mysqli_query($conn,"  SELECT * from users where tell = '".($_SESSION["validuser"])."'  ");
	
	
		$get_user_details = mysqli_fetch_array($check_user_details);
		$firstname = strip_tags($get_user_details['firstname']);
		$lastname= strip_tags($get_user_details['lastname']);
		$address = strip_tags($get_user_details['address']);
		$pass = strip_tags($get_user_details['pass']);
		$tell = strip_tags($get_user_details['tell']);


//		$customer=$_POST['customer'];
		//$cusfirst=$firstname;
		//$cuslast=$lastname;
		$sql="INSERT INTO purchase (customer, date_purchase) values ('$firstname $lastname',NOW())";
		
		$conn->query($sql);
		$pid=$conn->insert_id;
 
		$total=0;
 
		foreach($_POST['productid'] as $product):
		$proinfo=explode("||",$product);
		$productid=$proinfo[0];
		$iterate=$proinfo[1];
		$sql="SELECT * from product where productid='$productid'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();
 
		if (isset($_POST['quantity_'.$iterate])){
			$subt=$row['price']*$_POST['quantity_'.$iterate];
			$total+=$subt;

			$sql="INSERT INTO purchase_detail (purchaseid, productid, quantity) values ('$pid', '$productid', '".$_POST['quantity_'.$iterate]."')";
			$conn->query($sql);
		}
		endforeach;
 		
 		$sql="UPDATE purchase set total='$total' where purchaseid='$pid'";
		 $conn->query($sql);
		 echo "خرید شما ثبت شد";
		//header('location:sales.php');		
	}
	else{
		?>
		<script>
			window.alert('چیزی انتخاب نکردید!');
		//	window.location.href='order.php';
		</script>
		<?php
	}
?>