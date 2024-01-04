<!DOCTYPE html> 
<?php

include("includes/header.php");

if(!isset($_COOKIE['SNID'])){

    header("location:index.php");
}
?>
<html>
<head>
<style>
body{
    max-width:790px;
    width:100%;
    margin:0 auto;
    
}
#btn-msg{
   float:right;
   bottom:50px;
}
.find_people{
    max-width:790px;
    width:100%;
    margin:0 auto;
    display:flex;
    flex-direction:row;
    text-decoration:none;
}
.small{
   display:flex;
   flex-direction:row;
   justify-content:space-between;
}
.find{
   display:flex;
   flex-direction:column;
}
</style>
</head>
<body>
<div style="text-align:center;border-top:0px;"><h3>
------------------------------------</h3>
</div>

   <?php 
   $user=isloggedin();
   $get_user="select * from users where user_id='$user'";
   $run_user=mysqli_query($con,$get_user);
   $row=mysqli_fetch_array($run_user);
   $user_id=$row['user_id'];
   $di="SELECT user_to AS user_id FROM messages WHERE user_from=$user_id AND user_to !=$user_id
   UNION
   SELECT user_from FROM messages WHERE user_to=$user_id AND user_from !=$user_id";
   $run_di=mysqli_query($con,$di);
   while($row_di=mysqli_fetch_array($run_di)){
   $dii=$row_di['user_id'];
   $mdate="SELECT msg_body,date from messages where user_to='$dii' or user_from='$dii' ORDER by date DESC limit 1";
   $run_mdate=mysqli_query($con,$mdate);
   $row_mdate=mysqli_fetch_array($run_mdate);
   $msg=$row_mdate['msg_body'];
   $date=$row_mdate['date'];
   $muser="SELECT f_name,l_name,user_name,user_image,user_id FROM users WHERE user_id='$dii'";
   $run_muser=mysqli_query($con,$muser);
   while($row_muser=mysqli_fetch_array($run_muser)){
       $f_name=$row_muser['f_name'];
       $l_name=$row_muser['l_name'];
       $user_image=$row_muser['user_image'];
       $userid=$row_muser['user_id'];
       $username=$row_muser['user_name'];
       

       echo"
      
              <div class='find_people'>
                 <div class=''>
                    <a href='messages.php?u_id=$userid'>
                    <img src='users/$user_image' width='65px' height='80px'
                    title='$username' style='border-radius:50%;'/>
                    </a>
                 </div>
                 <div  class='find'>
                    <div class='small'>
                    <a href='messages.php?u_id=$userid'>
                    <h3>$f_name $l_name</h3>
                    </a>
                    <a href='messages.php?u_id=$userid'>
                    <small style='color:black;margin-left:4%;'>$date</small>
                    </a>
                    </div>
                     <a href='messages.php?u_id=$userid'>
                    <small style='color:black;margin-top:;'>$msg</small>
                    </a>
               </div>
              </div>
      ";
    
     }
    }
   ?>
   <div>
   </div>
   <div class="container">
   <a href='meso.php' ><button style='float:left;position:fixed;bottom:9vh;background-color:green;height:40px;width:;border-radius:20px;'
    class='btn btn-info'>start a chat</button></a>
              
   </div>
   <div>
   
   </div> 
</body>
</html>