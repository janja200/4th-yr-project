<?php
include("includes/connection.php");

  if(isset($_POST['signup'])){

    $first_name=$_POST['f_name'];
    $last_name=$_POST['l_name'];
    $pass=$_POST['user_pass'];
    $email=$_POST['user_email'];
    $gender=$_POST['user_gender'];
    $birthday=$_POST['user_birthday'];
    $status="verified";
    $posts="no";
    $newgid=sprintf('%0.5d',rand(0,999999));
    $username=strtolower($first_name."_".$last_name."_".$newgid);
    if(strlen($pass) <6 ){
         echo"<script>alert('password should be minimum 6 characters')</script>";
         exit();
    }
     $checki="SELECT * from users where user_email='$email'";
     $run_checki=mysqli_query($con,$checki);
     $check=mysqli_num_rows($run_checki);
     if($check==1){
         echo"<script>alert('email already exists')</script>";
         echo"<script>window.open('signup.php')</script>";
         exit();
     }
     

    $profile_pic="images/126486.svg";


    $insert="INSERT into users(f_name,l_name,user_name,describe_user,Relationship,user_pass,
    user_email,user_gender,user_birthday,user_image,user_cover,user_reg_date,status,posts,recovery_account) values
    ('$first_name','$last_name','$username','proud of my neighbourhood','complicated','$pass','$email',
    '$gender','$birthday',$profile_pic,'...',NOW(),'$status','$posts','hey')";
    $run=mysqli_query($con,$insert);
    if($run){
    echo "<script>alert('you have successfully registered to neighbours')</script>";
    echo"<script>window.open('login.php')</script>";
    exit();
    }
    else{
      echo"<script>alert('failed to signup')</script>";
    }
    
  }

?>