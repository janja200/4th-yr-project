<?php
include("functions/functions.php");  
include("includes/connection.php");       
if(isset($_GET['offset']) && isset($_GET['limit'])){  
     
    
     if(!isset($_COOKIE['SNID'])){
  
       header("location:index.php");
     }
     
     
      $user=isloggedin();
      $get_user="select * from users where user_id='$user'";
      $run_user=mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);
      $user_name=$row['user_name'];
      $u_id=$row['user_id'];
      $limit=$_GET['limit'];
      $offset=$_GET['offset'];
$get_posts="SELECT * from posts where user_id='$u_id' ORDER by posts.post_date DESC LIMIT $limit OFFSET $offset ";
$run_posts=mysqli_query($con,$get_posts);
while ($row_posts=mysqli_fetch_array($run_posts)) {
  # code...
  $post_id=$row_posts['post_id'];
  $user_id=$row_posts['user_id'];
  $content=$row_posts['post_content'];
  $upload_image=$row_posts['upload_image'];
  $post_date=$row_posts['post_date'];
  $lk=$row_posts['post_likes'];
  $cm="SELECT com_id from comments where post_id='$post_id'";
  $rumcm=mysqli_query($con,$cm);
  $comm=mysqli_num_rows($rumcm);
          
  $user="select * from users where user_id='$user_id' AND posts='yes'";
  $run_user=mysqli_query($con,$user);
  $row_user=mysqli_fetch_array($run_user);

  $user_name=$row_user['user_name'];
  $user_image=$row_user['user_image'];

  global $con;

                if(isset($_GET['u_id'])){
                  $u_id=$_GET['u_id'];
                }
                $get_posts="select user_email from users where user_id='$u_id'";
                $run_user=mysqli_query($con,$get_posts);
                $row=mysqli_fetch_array($run_user);

                $user_email=$row['user_email'];

                $user=isloggedin();
                $get_user="select * from users where user_id='$user'";
                $run_user=mysqli_query($con,$get_user);
                $row=mysqli_fetch_array($run_user);
                $user_id=$row['user_id'];
                $u_email=$row['user_email'];
                if($content=='No' && strlen($upload_image)>=1){
        
                    echo"
                    <div class='post'>
                       <div class='posts'>
                         <p><img src='users/$user_image' class='dp' width='40px' height='32px' ></p> 
                         <div class='pos'>
                          <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;font-size:16px;margin-bottom:0px;'
                           href='user_profile.php?u_id=$user_id'> $user_name</a></h3>
                           <h4><small style='color:black;margin-top:0px;'><strong>$post_date</strong></small></h4>
                       </div>
                       </div>
                       <div class='row'>
                            <p><img id='posts-img' src='imagepost/$upload_image' ></p>
                            <div class='btns'>
                            <a href='single.php?post_id=$post_id' style='float:right;'><button
                            class='btn btn-success'>view</button></a>
                            <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'>
                            <button class='btn btn-danger'>Delete</button></a>
                      </div>
                      <div class='btns'>
                      ";
                      if($lk==1){
                        echo"<span>$lk like</span>";
                      }else{
                      echo"<span>$lk likes</span>";
                    }
                    if($comm==1){
                      echo"<span>$comm comment</span>";
                    }else{
                    echo"<span>$comm comments</span>";
                  }
                  echo"
                      </div>
                       </div>
                    </div>
                     ";
                   }
                 
                else if(strlen($content)>=1 && strlen($upload_image)>=1) {
                    echo"
                    <div class='post'>
                       <div class='posts'>
                         <p><img src='users/$user_image' class='dp' width='40px' height='32px' ></p> 
                         <div class='pos'>
                          <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;font-size:16px;margin-bottom:0px;'
                           href='user_profile.php?u_id=$user_id'> $user_name</a></h3>
                           <h4><small style='color:black;'><strong>$post_date</strong></small></h4>
                       </div>
                       </div>
                       <div class='row'>
                          <p style='margin-left:4%;'>$content</p>
                            <p><img id='posts-img' src='imagepost/$upload_image' ></p>
                            <div class='btns'>
                            <a href='single.php?post_id=$post_id' style='float:right;'><button
                            class='btn btn-success'>view</button></a>
                            <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'>
                            <button class='btn btn-danger'>Delete</button></a>
             
                            </div>
                            <div class='btns'>
                      ";
                      if($lk==1){
                        echo"<span>$lk like</span>";
                      }else{
                      echo"<span>$lk likes</span>";
                    }
                    if($comm==1){
                      echo"<span>$comm comment</span>";
                    }else{
                    echo"<span>$comm comments</span>";
                  }
                  echo"
                      </div>
                       </div>
                    </div>
                     
                     ";
                           
                       
                   } 
                   else{
                    echo"
                    <div class='post'>
                       <div class='posts'>
                         <p><img src='users/$user_image' class='dp' width='40px' height='32px'></p> 
                         <div class='pos'>
                          <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;font-size:16px;margin-bottom:0px;'
                           href='user_profile.php?u_id=$user_id'> $user_name</a></h3>
                           <h4><small style='color:black;'><strong>$post_date</strong></small></h4>
                       </div>
                       </div>
                       <div class='row'>
                       <p style='margin-left:4%;font-size:20px;'>$content</p>
                            <div class='btns'>
                            <a href='single.php?post_id=$post_id' style='float:right;'><button
                             class='btn btn-success'>view</button></a>
                            <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'>
                            <button class='btn btn-danger'>Delete</button></a>
                            <a href='edit_post.php?post_id=$post_id' style='float:right;'><button
                            class='btn btn-info'>edit</button></a>
                
                             </div>
                             <div class='btns'>
                      ";
                      if($lk==1){
                        echo"<span>$lk like</span>";
                      }else{
                      echo"<span>$lk likes</span>";
                    }
                    if($comm==1){
                      echo"<span>$comm comment</span>";
                    }else{
                    echo"<span>$comm comments</span>";
                  }
                  echo"
                      </div>
                       </div>
                    </div>
                     
                    ";     
               
              include("functions/delete_post.php");
}
}
}
?>