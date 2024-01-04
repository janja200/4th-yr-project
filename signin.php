<?php


include("includes/connection.php");
include("functions/functions.php");

if(isset($_POST['login'])){
   $email=$_POST['email'];
   $password=$_POST['pass'];

   $select_user="select * from users where user_email='$email' AND user_pass='$password' AND status='verified'";
   $query=mysqli_query($con,$select_user);
   $check_user=mysqli_num_rows($query);

    if($check_user){
    
     $user="SELECT user_id from users where user_email='$email'";
     $run_user=mysqli_query($con,$user);
     $row=mysqli_fetch_array($run_user);
     $user_id=$row['user_id'];
     $cstrong=True;
     $token=sha1(bin2hex(openssl_random_pseudo_bytes(64,$cstrong)));
     $insert="INSERT into login_tokens(token,user_id) values('$token','$user_id')";
     $run_insert=mysqli_query($con,$insert);
     setcookie("SNID",$token,time()+60*60*24*365,'/',NULL,TRUE,TRUE);
     //get_location();
      echo"<script>navigator.geolocation.getCurrentPosition(function(pos){
        var ab=pos.coords.latitude;
        var ac=pos.coords.longitude;
       window.open('home.php?lat='+ab+'&long='+ac,'_self')});</script>";
    }else {
      echo"<script>alert('your details are incorrect')</script>";
     }
 
}
?>
  
 

