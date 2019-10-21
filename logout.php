<?php

session_start();
//$_SESSION['tell'] = false;

session_destroy();
header('location: index.php');




?>
