<?php
   include("functions/functions.php");  
if(isset($_GET['comment'])){
  $comment=$_GET['comment'];
  $post_id=$_GET['post_id'];
  $user_com=isloggedin();
  $get_com="select * from users where user_id='$user_com'";
  $run_com=mysqli_query($con,$get_com);
  $row_com=mysqli_fetch_array($run_com);
  $user_com_id=$row_com['user_id'];
  $user_com_name=$row_com['user_name'];
 

  if ($comment =='') {
    # code...
    echo"<script>Alert('Enter your comment!')</script>";
    //echo"<script>window.open('single.php?post_id=$post_id','_self')</script>";
  }else {
    $insert="insert into comments
       (post_id,user_id,comment,comment_author,date)
       values('$post_id','$user_id','$comment','$user_com_name',NOW())";

       $run=mysqli_query($con,$insert);

       echo"<script>Alert('your comment added')</script>";
       echo"<script>window.open('single.php?post_id=$post_id','_self')</script>";
  }
}

?>