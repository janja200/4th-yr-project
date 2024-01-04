<?php 
if(isset($_GET['offset']) && isset($_GET['limit'])){  
         
         session_start();
          if(!isset($_SESSION['user_email'])){
       
            header("location:index.php");
          }
          
      $con=mysqli_connect("localhost","root","","neybours");
      $user=$_SESSION['user_email'];
      $user="SELECT * from users,location  where location.user_id=users.user_id AND user_from=$userid
      ORDER BY location.dist_diff ASC limit $limit OFFSET $offset";
      $run_user=mysqli_query($con,$user);
      while($row_user=mysqli_fetch_array($run_user)){
          $user_id=$row_user['user_id'];
          $user_name=$row_user['user_name'];
          $first_name=$row_user['f_name'];
          $last_name=$row_user['l_name'];
          $user_image=$row_user['user_image'];
          echo"
          <div class='container-fluid'>
            <a style='text-decoration:none;cursor:pointer;color:#3897F0;'
            href='messages.php?u_id=$user_id'>
            <img class='img-circle' style='border-radius:50%;' src='users/$user_image' width='40px' height='40px'
            title='$user_name'><strong> $first_name $last_name</strong><br><br>
            </a>
          </div>
       
       ";
      }
}
?>