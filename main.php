<!DOCTYPE html>
<?php
include("includes/connection.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>main page</title>
</head>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    color:#444;

}
body{
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    width:100vw;

}
.login{
    text-align:center;
    position:relative;
    width:200px;
}
#signup{
    width:100%;
    border:0;
    border-radius:40%;
    padding:12px;
    background-image:linear-gradient(to right,#ff1464,purple);
    margin-bottom:26px;

}
</style>
<body>
<?php  

function isloggedin(){
  include("includes/connection.php");
  if(isset($_COOKIE['SNID'])){
    $token=$_COOKIE['SNID'];
    $user="SELECT user_id from login_tokens where token='$token'";
     $run_user=mysqli_query($con,$user);
     $row=mysqli_fetch_array($run_user);
     $user_id=$row['user_id'];
     $check_user=mysqli_num_rows($run_user);
    //$row=mysqli_fetch_array($run_insert);
    //$user_id=$row['user_id'];
    if($check_user){
      return $user_id;
    }
  }
  return false;
}

if(isloggedin()){
  echo"<script>navigator.geolocation.getCurrentPosition(function(pos){
    var ab=pos.coords.latitude;
    var ac=pos.coords.longitude;
  window.open('home.php?lat='+ab+'&long='+ac,'_self')});</script>";

}else{
  echo"
  <div class='login'>
     <h1>neighbours</h1>
     <form method='post' action=''>
        <button id='signup' class='btn btn-info btn-lg' name='signup'>sign up</button><br>
        ";
        
          if(isset($_POST['signup'])){
            echo"<script>window.open('signup.php','_self')</script>";
          }
       echo"
        <button id='signup' class='btn btn-info btn-lg' name='login'>login</button><br>
        ";
       
          if(isset($_POST['login'])){
            echo"<script>window.open('login.php','_self')</script>";
          }
        echo"
   
     </form>
   
</div>
  ";
}
?>

</body>
</html>