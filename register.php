<?php 
require_once('header1.php'); 
require_once('navbar.php'); 
?>
	<div class="container">



<?php

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['password'])  && isset($_POST['address'])&&  isset($_POST['tell'])
&&!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password']) && !empty($_POST['address'] ) && !empty($_POST['tell']))
{
	session_start();
	//connect to databse
	include("conn.php");

	//s
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$pass = $_POST['password'];
	$address =  $_POST['address'];
	$tell =  $_POST['tell'];
	//$tell = mysqli_real_escape_string($conn, $_POST['tell']);
	
	
	//check for phonenumber
	$sql = mysqli_query($conn, "SELECT tell FROM users WHERE tell = '" . $tell . "'");
	if (mysqli_num_rows($sql) > 0)
	 {
		echo "این شماره تلفن همراه قبلا ثبت شده است";
	}
	else
	{
		//create user
		mysqli_query($conn, "INSERT INTO users(firstname,lastname, pass, address, tell) VALUES('$firstname', '$lastname', '$pass','$address','$tell')") or die(mysql_error());
		$_SESSION["validuser"] = $tell;
		$_SESSION["userfirstname"] = $firstname;
	
		echo "Account created.";
	}
}

else{
?>
		<form action="register.php" method="post">
	<div id="register">

	<input type="text" name="firstname" class="form-control registerr"  placeholder="نام">

	<input type="text" name="lastname" class="form-control registerr"  placeholder="نام خانوادگی">



	
	<input type="password" name="password" class="form-control registerr"  placeholder="رمز عبور">
	<input type="text" name="address" class="form-control registerr"  placeholder="آدرس">
	<input type="text" name="tell" class="form-control registerr"  placeholder="شماره تلفن همراه">
	<button type="submit" class="btn btn-primary" id="submit">ثبت</button> 


	</div>
		
		</form>
<?php } ?>
  	</div>
	  <br><br><br> <br><br><br> <br><br><br> <br>
	  
<footer>AliBAbaRestaurant</footer>