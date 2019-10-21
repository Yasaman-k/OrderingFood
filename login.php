<?php 

require_once('header1.php'); 
require_once('navbar.php'); 
?>

	<div class="container">

<?php
session_start();
//ob_start();
if(isset($_POST['tell']) && isset($_POST['password']))
{ 
  

      //connect db
      include("conn.php"); 
    

      $tell = $_POST['tell'];
      $pass = $_POST['password'];

      //sanitize username
     // $tell = mysqli_real_escape_string($conn, $tell); 
     // $pass = mysqli_real_escape_string($conn, $pass);
     

      //check for user
      $result = mysqli_query($conn, "SELECT * FROM users WHERE tell = '".$tell."' AND pass = '".$pass."' LIMIT 1" );

      if ($tell=='admin' and $pass=='admin'){
        header('location: sales.php'); 
        exit();
      }
     /*
      if($row=mysqli_fetch_array($result))
      {
      //  echo '<script type="text/javascript">alert("you are login as ' .$row['firstname'].'")</script>';
      echo '<script type="text/javascript">alert("خوش امدید")</script>';
      // header('location: order.php');
      }
*/
      else{
        $rows = mysqli_num_rows($result); 
    
        if ($rows<=0 ){ 
          echo "رمزعبور یا شماره تلفن همراه وارد شده اشتباه است"; 
        }
      else { 
         
          // username and password is correct
          $get_user_information = mysqli_fetch_array($result);
          $_SESSION["validuser"] = $tell;
         $_SESSION["userfirstname"] = strip_tags($get_user_information["firstname"]);
         
         // $_SESSION['tell'] = true;
          header('location: order.php');
       
          
        
        }  
      }
   
}

?>

    <form action="login.php" method="post" >
      <!--
      <p class="form-element">شماره موبایل: <input name="tell" type="text" /></p>
      <p class="form-element">رمز عبور: <input type="password" name="password" /></p>
      <p class="form-element"><input type="submit" value="ورود" /></p>
<
-->
<div id="register">
<input type="text" name="tell" class="form-control registerr"  placeholder="شماره تلفن همراه">
      <input type="password" name="password" class="form-control registerr"  placeholder="رمز عبور">						
      <button type="submit" class="btn btn-primary" id="submit">ورود</button> 


</div>
 
  


    </form>

 
  </div>
  <br><br><br> <br><br><br> <br><br><br> <br><br><br>
  <br><br><br> <br> <br>
  <?php require_once('footer.php'); ?>