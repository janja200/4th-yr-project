<?php 
if(isset($_GET['offset']) && isset($_GET['limit'])){  
  include("includes/connection.php"); 
  include("functions/functions.php");
          if(!isset($_COOKIE['SNID'])){
       
            header("location:index.php");
          }
          
      $user=isloggedin();
      $get_user="select * from users where user_id='$user'";
      $run_user=mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);
      $user_name=$row['user_name'];
      $userid=$row['user_id'];

      $limit=$_GET['limit'];
      $offset=$_GET['offset'];
      $search_query=$_GET['search_user'];
      $b=strlen($search_query);
      
      if($_GET['search_user']!=6){
        $get_user="SELECT * from users,location  where location.user_id=users.user_id AND user_from=$userid
         and (f_name like '%$search_query%'OR l_name like '%$search_query%' OR user_name like '%$search_query%') 
         ORDER BY location.dist_diff ASC limit $limit OFFSET $offset";
      } 
      else{
        $get_user="SELECT * from users,location  where location.user_id=users.user_id AND user_from=$userid
         ORDER BY location.dist_diff ASC limit $limit OFFSET $offset";
      }
      $run_user=mysqli_query($con,$get_user);
      while($row_user=mysqli_fetch_array($run_user)){
          $user_id=$row_user['user_id'];
          $user_name=$row_user['user_name'];
          $first_name=$row_user['f_name'];
          $last_name=$row_user['l_name'];
          $user_image=$row_user['user_image'];
          echo"
          <div class='container-fluid'>
          <div class='name'>
            <a style='text-decoration:none;cursor:pointer;color:#3897F0;'
            href='user_profile.php?u_id=$user_id'>
            </div>
            <div class='image'>
            <img class='img-circle' style='border-radius:50%;' src='users/$user_image' width='25%' height='30%'
            title='$user_name'><strong> $first_name $last_name</strong>
            </div>
            </a>
          </div>
       
       ";
      }
}
?>