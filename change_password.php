<!DOCTYPE html>
<?php

include("includes/connection.php");
include("functions/functions.php");
if(!isset($_COOKIE['SNID'])){

    header("location:index.php");
}
?>
<html>
<head>
      <title>Change password</title>
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
   display:flex;
   flex-direction:column;
   max-width:500px;
   width:100%;
   height:40%;
   margin:10px auto;
   background-color:#fff;
   border:2px solid #e6e6e6;
   padding:4px 5px;
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
    border-radius:30px;
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
          <h3 style="text-align:center;"><strong>Change password</strong></h3>
        </div>
        <div class="l_pass">
           <form action="" method="post">
              <div class="input-group">
                 <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                 <input id="password" type="password" name="pass" class="form-control" placeholder="New password" required>
              </div><br>
               <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" placeholder="Re-enter new password"
                name="pass1" required>
              </div><br>
              <center><button id="signup" class="btn btn-info btn-lg" name="change">Change password</button>
              </center>
           </form>
        </div>
      </div>
   </div>
</div>
</body>
</html>

<?php



if(isset($_POST['change'])){
   $user=isloggedin();
   $get_user="SELECT user_id from users where user_id='$user'";
   $run_user=mysqli_query($con,$get_user);
   $row=mysqli_fetch_array($run_user);
   $user_id=$row['user_id'];
   $pass=$_POST['pass'];
   $pass1=$_POST['pass1'];

   if($pass==$pass1){
       if(strlen($pass)>=6 && strlen($pass)<=60){
           $update="update users set user_pass='$pass' where user_id='$user_id'";
           $run=mysqli_query($con,$update);
           echo"<script>alert('Your password changed')</script>";
           echo"<script>window.open('home.php','_self')</script>";
       }
       else{
        echo"<script>alert('Your password should be greater than 6')</script>"; 
       }

    }
      else{
        echo"<script>alert('Your password did not match')</script>";
        echo"<script>window.open('change_password.php','_self')</script>";


       }
   

}
?>
  
 




