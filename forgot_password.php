<!DOCTYPE html>
<?php

?>
<html>
<head>
      <title>Forgotten Password</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="test/css" 
       href="style/home_style2.css">
</head>
<style>
body{
    overflow-x:;
}
.main-content{
   max-width:500px;
   width:100%;
   height:40%;
   margin:10px auto;
   background-color:#fff;
   border:2px solid #e6e6e6;
   padding:4px 4px;
}
.header{
    border:0px solid #000;
    margin-bottom:5px;
}
.well{
    background-color:#187FAB;

}
#signup{
    width:60%;
    border:0;
    border-radius:20px;
    padding:12px;
    background-image:linear-gradient(to right,#ff1464,purple);
    margin-bottom:26px;

}
#upload_image_button{
    position:absolute;
    top:50.5%;
    right:14%;
    min-width: 100px;
    max-width: 100px;
    border-radius: 4px;
    transform:translate(-50%,-50%);

}
label{
    padding:7px;
    display:table;
    color:#fff;

}
input[type="file"]{

    display:none;
}
#content{
    width: 70px;
}
#btn-post{
    min-width: 25%;
    max-width: 25%;
}
#insert_post{
    background-color: #fff;
    border: 2px solid #e6e6e6;
    padding: 40px 50px;

}
#posts{
    border: 5px solid #e6e6e6;
    padding: 40px 50px;
}
#posts-img{
    padding-top: 5px;
    padding-right:10px ;
    min-width: 102%;
    max-width: 50%;
}
#single_posts{
    border:5px solid #e6e6e6 ;
    padding: 40px 50px;
}
.pb-cmnt-container{
    font-family: lato;
    margin-top: 100px;
}
.pb-cmnt-textarea{
    resize: none;
    padding: 20px;

    height: 110px;
    width: 100%;
    border: 1px solid #F2F2F2;
}
#find_people{
    border: 5px solid #e6e6e6;
    padding: 40px 50px;
}
#result_posts{
    border: 5px solid #e6e6e6;
    padding: 40px 50px;
}
form.search_form input[type=text]{
    padding: 10px;
    font-size: 17px;
    border-radius: 4px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1ff;
}
form.search_form button{
    float:left ;
    width: 20%;
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}
form.search_form button:hover{
    background: #0b7dda;
}
form.search_form::after{
    content: "";
    clear: both;
    display: table;
}
</style>
<body>
<div class="row">
 <div class="col-sm-12">
    <div class="well">
       <center><h1 style="color:white;"><strong>Neighbours</strong></h1></center>
    </div>
 </div>
</div>
<div class="row">
   <div class="col-sm-12">
      <div class="main-content">
        <div class="header">
          <h3 style="text-align:center;"><strong>Forgot Password</strong></h3>
        </div>
        <div class="l_pass">
           <form action="" method="post">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="email" type="email"  class="form-control" placeholder="Enter your email"
                name="email" required>
              </div><br>
              <hr>
              <pre class="text">Enter your bestfriend name down below</pre>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input id="msg" type="text" class="form-control" placeholder="Someone"
                name="recovery_account" required>
              </div><br>
              <a style="text-decoration:none;float:right;color:#187FAB;" 
              data-toggle="tooltip" title="Signin" href="login.php">Back to signin?</a><br><br>
              <center><button id="signup" class="btn btn-info btn-lg" name="submit">Submit</button>
              </center>
           </form>
        </div>
      </div>
   </div>
</div>
</body>
</html>
<?php
include("includes/connection.php");


if(isset($_POST['submit'])){
   $email=$_POST['email'];
   $recovery_account=$_POST['recovery_account'];

   $select_user="select * from users where user_email='$email' AND recovery_account='$recovery_account'";
   $query=mysqli_query($con,$select_user);
   $check_user=mysqli_num_rows($query);

   if($check_user==1){
    $user="SELECT user_id from users where user_email='$email'";
    $run_user=mysqli_query($con,$user);
    $row=mysqli_fetch_array($run_user);
    $user_id=$row['user_id'];
    $cstrong=True;
    $token=sha1(bin2hex(openssl_random_pseudo_bytes(64,$cstrong)));
    $insert="INSERT into login_tokens(token,user_id) values('$token','$user_id')";
    $run_insert=mysqli_query($con,$insert);
    setcookie("SNID",$token,time()+60*60*24*365,'/',NULL,TRUE,TRUE);
 
     echo"<script>window.open('change_password.php','_self')</script>";
   }else {
     echo"<script>alert('your email or best friend name incorrect')</script>";
   }

}
?>
  
 

