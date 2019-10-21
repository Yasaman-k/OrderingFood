<?php include('header.php'); ?>


<?php
session_start();
//ob_start();
if(isset($_SESSION["validuser"]))
{
	include("conn.php"); 
	//Check the database table for the logged in user information
	$check_user_details = mysqli_query($conn,"  SELECT * from users where tell = '".($_SESSION["validuser"])."'  ");
	//Validate created session
//	if(mysql_num_rows($check_user_details) < 1)
//	{
//		session_unset();
//		session_destroy();
//		header("location: login.php");
//	}
	//else
	//{
	
	//Get all the logged in user information from the database users table
	$get_user_details = mysqli_fetch_array($check_user_details);
	$id = $get_user_details['userid'];
	$firstname = strip_tags($get_user_details['firstname']);
	$lastname= strip_tags($get_user_details['lastname']);
	$address = strip_tags($get_user_details['address']);
	$pass = strip_tags($get_user_details['pass']);
	$tell = strip_tags($get_user_details['tell']);

?>


<body>
<?php include('navbaruser.php'); ?>
<div class="container">
	<h1 class="page-header text-center">سفارش</h1>
	<!-- FORM -->
	<form method="POST" action="purchase.php">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll" ></th>
				<th>نوع غذا</th>
				<th>اسم غذا</th>
				<th>قیمت</th>
				<th>تعداد را وارد کنید</th>
			</thead>
			<tbody>
				<?php 
					$sql="SELECT * FROM product LEFT JOIN category on category.categoryid=product.categoryid order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					$iterate=0;
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
							<td><?php echo $row['catname']; ?></td>
							<td><?php echo $row['productname']; ?></td>
							<td class="text-right">&#65020;<?php echo number_format($row['price'], 1); ?></td>
							<td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
						</tr>
						<?php
						$iterate++;
					}
				?>
			</tbody>
		</table>		
		<div class="row">
			<div class="col-md-3">
			<!--	<input type="text" name="customer" class="form-control" placeholder="Customer Name" required>-->
			</div>
			<div class="col-md-2" style="margin-left:-20px;">
				<button type="submit" class="btn btn-primary"><span class=""></span> خرید</button>

				
			
				<br><br><br>

			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>

<br><br>
<?php require_once('footer.php'); ?>
</body>
</html>
<?php
	
}
else
{

	//Redirect user back to login page if there is no valid session created
	header("location: login.php");

}
?>