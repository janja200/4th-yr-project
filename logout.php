<?php
include("includes/connection.php");
$token=$_COOKIE['SNID'];
 $user="DELETE * FROM login_tokens where token='$token'";
 $run=mysqli_query($con,$user);
  header("location:index.php");

?>