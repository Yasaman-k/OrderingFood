
<?php include('header.php'); ?>
<?php include('navbaruser.php'); ?>

<?php
	session_start();
	include('conn.php');
	if(isset($_SESSION["validuser"])){
 
		$check_user_details = mysqli_query($conn,"  SELECT * from users where tell = '".($_SESSION["validuser"])."'  ");
	
	
		$get_user_details = mysqli_fetch_array($check_user_details);
		$firstname = strip_tags($get_user_details['firstname']);
		$lastname= strip_tags($get_user_details['lastname']);
		$address = strip_tags($get_user_details['address']);
		$pass = strip_tags($get_user_details['pass']);
		$tell = strip_tags($get_user_details['tell']);

    }
    ?>
<body>
<div class="container">
	<h1 class="page-header text-center">لیست غذاهای سفارش داده شده</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>تاریخ خرید</th>
		<!--	<th>نام خریدار </th> -->
			<th>مبلغ غذا</th>
			<th>مشاهده جزئیات</th>
		</thead>
		<tbody>
			<?php 
				$sql="SELECT * FROM purchase where customer LIKE '$firstname $lastname'  order by purchaseid desc ";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
					<!--	<td><#?php echo $row['customer']; ?></td> -->
						<td class="text-right">&#8369; <?php echo number_format($row['total'], 0); ?></td>
<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm">
<span class="glyphicon glyphicon-search"></span> دیدن جزئیات خرید </a>
							<?php include('sales_modal.php'); ?>
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>


