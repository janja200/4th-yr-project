<!DOCTYPE html>
<?php

include("includes/header.php");

if(!isset($_COOKIE['SNID'])){

    header("location:index.php");
}

?>

<html>
<head>
    <?php
      $user=isloggedin();
      $get_user="select * from users where user_id='$user'";
      $run_user=mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);
      $user_name=$row['user_name'];
     
    ?>
  
</head>
<style>
body{
    overflow-x:hidden ;
    max-width:790px;
    width:100%;
    margin:0 auto;
}

input[type="file"]{

display:none;
}
#update_profile{
position:relative;
background-color:grey;
padding:5px;
border-radius:15px;
top:;
}
#button_profile{
position:relative;
background-color:grey;
padding:5px;
border-radius:15px;
}
.update{
  display:flex;
  
  flex-direction:row;
  margin:0 auto;
}
.post{
    border: 5px solid #e6e6e6;
    padding: ;
    
}
.posts{
    display:flex;
    flex-direction:row;
    margin-left:4%;
    width:100%;
}
.pos{
   display:flex;
   flex-direction:column;
   margin-left:4%;
   margin-top:0px;
}
.dp{
    border-radius:50%;
}
.pos h3{
    margin-bottom:0px;
}
.pos h3{
    margin-bottom:0px;
}
.pos h4{
    margin-bottom:0px; 
}
#posts-img{
    padding-top: 5px;
    padding-right:10px ;
    width: 100%;
}
.btns{
    display:flex;
    flex-direction:row;
    justify-content:space-evenly;
    border-bottom:.5px solid grey;
}
#single_posts{
    border:5px solid #e6e6e6 ;
    padding: 40px 50px;
}
.sepa{
    display:flex;
    margin:0px auto;
    width:100%;
}

</style>
<body>
<div style="text-align:center;border-top:0px;"><h3>
------------------------------------</h3>
</div>
<div class="row">
   <div class="col-sm-2">
   </div>
   <div class="col-sm-8">
     <?php
       echo"
         <div class='container' >
         <div id='profile-img'>
         <center>
            <img src='users/$user_image' alt='Profile' 
            width='40%' style='border-radius:20px;'>
            <form action='profile.php?u_id='$user_id'' method='post' enctype='multipart/form-data'>
            <div class='update'>
            <label id='update_profile'>select profile
            <input type='file' name='u_image' size='60'/>
            </label><br><br>
            <button id='button_profile' name='update' class='btn btn-info'>update profile</button>
            </div>
            </form>
            </center>
         <div>
         </div><br>
       
       ";
     
     ?>
     <?php
        
      if(isset($_POST['submit'])){
        $u_cover=$_FILES['u_cover']['name'];
        $image_tmp=$_FILES['u_cover']['tmp_name'];
        $random_number= rand(1,100);
        if($u_cover==''){
          echo"<script>alert('please select cover image')</script>";
          echo"<script>window.open('profile.php?u_id=$user_id','_self')</script>";
          exit();
        }else {
          move_uploaded_file($image_tmp,"cover/$u_cover.$random_number");
          $update="update users set user_cover='$u_cover.$random_number' where user_id='$user_id'";
          $run=mysqli_query($con,$update);

          if($run){
            echo"<script>window.open('profile.php?u_id=$user_id','_self')</script>";
          }
        }

      }
     ?>
   </div>
     <?php
       if(isset($_POST['update'])){
        $u_image=$_FILES['u_image']['name'];
        $image_tmp=$_FILES['u_image']['tmp_name'];
        $random_number= rand(1,100);
        if($u_image==''){
          echo"<script>alert('please select profile image')</script>";
          echo"<script>window.open('profile.php?u_id=$user_id','_self')</script>";
          exit();
        }else {
          move_uploaded_file($image_tmp,"users/$u_image.$random_number");
          $update="update users set user_image='$u_image.$random_number' where user_id='$user_id'";
          $run=mysqli_query($con,$update);

          if($run){
            echo"<script>window.open('profile.php?u_id=$user_id','_self')</script>";
          }
        }

      }
        
   
     
     ?>
     <div class="col-sm-2">
    </div>
</div>
<div class="row">
   <div class="class-sm-2" style="background-color:#e6e6e6;text-align:center;left:0.8%;border-radius:5px;">
     <?php
        echo"
          <center><h2><strong>About</strong></h2></center>
          <center><h4><strong>name:$firstname $lastname</strong></h4></center>
          <p><strong><i style='color:;'>description:$describe_user</i></p></br>
          <p><strong>Relatioship status:</strong>$Relationship_status</p><br>
          <p><strong>joined in::</strong>$register_date</p><br>
          <p><strong>Gender:</strong>$user_gender</p><br>
          <p><strong>date of birth :</strong>$user_birthday</p><br>


        
        ";
     ?>
   </div>
</div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
      function showloading(){
          loading.classList.add('show');
         
       
        //loading.classList.remove('show');
      }
      $(document).ready(function(){
          var flag=0;
          $.ajax({
              type:"GET",
              url:"profilepost.php",
              data:{
                  'offset':0,
                  'limit':3,
              },
              success:function(data){
                  $('body').append(data);
                  flag+=3;
              }
          });
          $(window).scroll(function(){
              if($(window).scrollTop()+50>=$(document).height()-$(window).height()){
                $.ajax({
                 type:"GET",
                 url:"profilepost.php",
                 data:{
                     'offset':flag,
                     'limit':3,
                 },
                 success:function(data){
                     $('body').append(data);
                     flag+=3;
                 }
                });
              }
          });
      });
</script> 

</body>
</html>