<?php include('header.php'); ?>
<body>
<?php include('navbaradmin.php'); ?>
<div class="container">
	<h1 class="page-header text-center">لیست تمام خریداران</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>تاریخ خرید</th>
			<th>خریدار</th>
			<th>قیمت کلی</th>
			<th>مشخصات</th>
		</thead>
		<tbody>
			<?php 
				$sql="SELECT * FROM purchase order by purchaseid desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
						<td><?php echo $row['customer']; ?></td>
						<td class="text-right">&#8369; <?php echo number_format($row['total'], 0); ?></td> 
						<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> دیدن جزئیات </a>
							<?php include('sales_modal.php'); ?>
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
<br><br><br> <br><br><br> <br><br><br> <br><br><br>
 
  <?php require_once('footer.php'); ?>

</body>
</html>