<!DOCTYPE html> 
<?php

include("includes/header.php");

if(!isset($_COOKIE['SNID'])){

    header("location:index.php");
}
?>

<html>
<head>
   <title>edit posts</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  </head>
  <style>
  body{
     max-width:790px;
     width:100%;
     margin:0 auto;

  }
  </style>
<body>
<div class="col-sm-3">
</div>
   <div class="col-sm-6">
      <?php
         if(isset($_GET['post_id'])){
             $get_id=$_GET['post_id'];
             $get_post="select * from posts where post_id=$get_id";
             $run_post=mysqli_query($con,$get_post);
             $row=mysqli_fetch_array($run_post);
             $post_con=$row['post_content'];
         }

      
      
      ?>
      <form action="" method="post" id="f">
         <center><h2>Edit post</h2></center>
         <center>
         <textarea class="form-control" cols="83" rows="4" style="text-align:center;width:70%;border-radius:20px;" name="content"><?php echo $post_con; ?></textarea><br>
         <input type="submit" name="update" style="background-color:white;height:4vh;border-radius:20px;" value="Update Post" class="btn btn-info"/>
         </center>
      </form>
      <?php 
      
       if(isset($_POST['update'])){
           $content=$_POST['content'];
           $update_post="update posts set post_content='$content' where post_id='$get_id'";
           $run_update=mysqli_query($con,$update_post);

           if($run_update){
               echo"<script>window.open('home.php','_self')</script>";
           }
       }  
      
      ?>
   </div>
   <div class="col-sm-3">
   </div>
</body>
</html>