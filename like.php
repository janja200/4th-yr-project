<?php
  include("functions/functions.php");
if(isset($_GET['liked'])){
    $post_id=$_GET['post_id'];
    
    if(!isset($_COOKIE['SNID'])){
      
     header("location:index.php");
    }
         
    include("includes/connection.php");
    $user=isloggedin();
    $get_user="select * from users where user_id='$user'";
    $run_user=mysqli_query($con,$get_user);
    $row=mysqli_fetch_array($run_user);
    $user_name=$row['user_name'];
    $user_id=$row['user_id'];
 
    $notliked="SELECT id from likes where user_id='$user_id' and post_id='$post_id'";
    $runnotliked=mysqli_query($con,$notliked);
    $check=mysqli_num_rows($runnotliked);
    if(!($check)){
   
    $like="UPDATE posts set post_likes=post_likes+1 where post_id='$post_id'";
    $likes="INSERT into likes(user_id,post_id) values ('$user_id','$post_id')";
    mysqli_query($con,$like);
    mysqli_query($con,$likes);
    }
 } 
?>