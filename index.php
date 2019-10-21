<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>

<style>
 .imgg{
    width: 1455px;
    height: 800px;
    object-fit:cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: 100% 100%;
	
	.yas
  {
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size:28px;
  }
  .yas1
  {
    font-family: 'Times New Roman', Times, serif;
    font-size:30px;
    font-weight: bold;
  }
   .sw{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
	font-size:80px;
  }
  h4{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  
  }

       
  }

</style>
<img src="img/fooda.jpg" class="imgg" alt="">
<br><br>
<p align="center" class="yas1" ><br>غذا چی میل دارید؟</br></p>
<p align="center" class="yas"> صبحانه، ناهار، شام یا هر چیزی که میل دارید را انتخاب کنید</p>
<br><br>  <br>



<div class="container">
	<h1 class="page-header text-center">منوی غذایی</h1>
	<ul class="nav nav-tabs">
		<?php
			$sql="SELECT * from category order by categoryid asc limit 1";
			$fquery=$conn->query($sql);
			$frow=$fquery->fetch_array();
			?>
				<li class="active"><a data-toggle="tab" href="#<?php echo $frow['catname'] ?>"><?php echo $frow['catname'] ?></a></li>
			<?php

			$sql="SELECT * from category order by categoryid asc";
			$nquery=$conn->query($sql);
			$num=$nquery->num_rows-1;

			$sql="SELECT * from category order by categoryid asc limit 1, $num";
			$query=$conn->query($sql);
			while($row=$query->fetch_array()){
				?>
				<li><a data-toggle="tab" href="#<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></a></li>
				<?php
			}
		?>
	</ul>



	<div class="tab-content">
		<?php
			$sql="SELECT * from category order by categoryid asc limit 1";
			$fquery=$conn->query($sql);
			$ftrow=$fquery->fetch_array();
			?>
				<div id="<?php echo $ftrow['catname']; ?>" class="tab-pane fade in active" style="margin-top:20px;">
					<?php

						$sql="SELECT * from product where categoryid='".$ftrow['categoryid']."'";
						$pfquery=$conn->query($sql);
						$inc=4;
						while($pfrow=$pfquery->fetch_array()){
							$inc = ($inc == 4) ? 1 : $inc+1; 
							if($inc == 1) echo "<div class='row'>"; 
							?>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading text-center">
											<b><?php echo $pfrow['productname']; ?></b>
										</div>
										<div class="panel-body">
											<img src="<?php if(empty($pfrow['photo'])){echo "upload/noimage.jpg";} else{echo $pfrow['photo'];} ?>" height="225px;" width="100%">
										</div>
										<div class="panel-footer text-center">
											&#x20A8; <?php echo number_format($pfrow['price'], 0); ?>
										</div>
									</div>
								</div>
							<?php
							if($inc == 4) echo "</div>";
						}
						if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
					?>
		    	</div>
			<?php

			$sql="SELECT * from category order by categoryid asc";
			$tquery=$conn->query($sql);
			$tnum=$tquery->num_rows-1;

			$sql="SELECT * from category order by categoryid asc limit 1, $tnum";
			$cquery=$conn->query($sql);
			while($trow=$cquery->fetch_array()){
				?>
				<div id="<?php echo $trow['catname']; ?>" class="tab-pane fade" style="margin-top:20px;">
					<?php

						$sql="SELECT * from product where categoryid='".$trow['categoryid']."'";
						$pquery=$conn->query($sql);
						$inc=4;
						while($prow=$pquery->fetch_array()){
							$inc = ($inc == 4) ? 1 : $inc+1; 
							if($inc == 1) echo "<div class='row'>"; 
							?>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading text-center">
											<b><?php echo $prow['productname']; ?></b>
										</div>
										<div class="panel-body">
											<img src="<?php if($prow['photo']==''){echo "upload/noimage.jpg";} else{echo $prow['photo'];} ?>" height="225px;" width="100%">
										</div>
										<div class="panel-footer text-center">
											&#x20A8; <?php echo number_format($prow['price'], 0); ?>
										</div>
									</div>
								</div>
							<?php
							if($inc == 4) echo "</div>";
						}
						if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
					?>
		    	</div>
				<?php
			}
		?>
	</div>
	
</div>
<br><br> <br><br>


<section class="container">
            <h1 class="sw" align="center">هزینه ارسال غذا چگونه محاسبه می‌شود؟</h1>
            <h2 align="center"> هزینه ارسال غذا منطبق با تعرفه های ارسال رستوران‌ها است. 
                چنانچه رستوران های در محدوده، هزینه ارسالشان رایگان باشد، پولی بابت پیک پرداخت نخواهید کرد؛ اما در صورتی که هزینه‌ی ارسالشان رایگان نباشد، مبلغ آن بنا بر تعرفه های رستوران
                 محاسبه می‌شود. ریحون به هیچ عنوان سهمی از هزینه ارسال، دریافت نخواهد کرد.</h4>
                   
    </section>
	<br><br> <br><br>  <br><br>   
	<br><br> <br><br>  <br><br>  
	<br><br> <br><br>  <br><br>  
	

</body>

<?php require_once('footer.php'); ?>
</html>