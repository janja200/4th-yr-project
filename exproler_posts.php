<?php          
    if(isset($_GET['offset']) && isset($_GET['limit'])){  
         
         if(!isset($_COOKIE['SNID'])){
      
           header("location:index.php");
         }
         
          
          $user=$_SESSION['user_email'];
          $get_user="select * from users where user_email='$user'";
          $run_user=mysqli_query($con,$get_user);
          $row=mysqli_fetch_array($run_user);
          $user_name=$row['user_name'];
          $user_id=$row['user_id'];

          
          $limit=$_GET['limit'];
          $offset=$_GET['offset'];
          $user="SELECT posts.post_id,users.user_id,posts.post_content,posts.upload_image,
          posts.post_date,users.user_name,users.f_name,users.l_name,users.user_image FROM 
          posts,users, WHERE posts.user_id=users.user_id AND
          user_country LIKE '%$search%'OR user_city LIKE '%$search%'OR
          user_region LIKE '%$search%'OR user_couty LIKE '%$search%'OR
          user_country LIKE '%$search%'
          AND user_from=$user_id ORDER BY posts.likes DESC LIMIT $limit OFFSET $offset";
          $run_user=mysqli_query($con,$user);

          while($row_user=mysqli_fetch_array($run_user)){
          $post_id=$row_user['post_id'];
          $user_id=$row_user['user_id']; 
          $content=substr($row_user['post_content'],0,40);
          $upload_image=$row_user['upload_image']; 
          $post_date=$row_user['post_date'];

          $user_name=$row_user['user_name'];
          $first_name=$row_user['f_name'];
          $last_name=$row_user['l_name'];
          $user_image=$row_user['user_image'];

           if($content=='No' && strlen($upload_image)>=1){
        
            echo"
            <div class='row'>
              <div class='col-sm-3'>
              </div>
              <div id='posts' class='col-sm-6'>
              <div class='row'>
                  <div class='col-sm-2'
                  <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                  </div>
                   <div class='col-sm-6'>
                   <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;'
                    href='user_profile.php?u_id=$user_id'>$first_name $last_name</a></h3>
                   <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                   
                   </div>
                  <div class='col-sm-4'>
                  </div>
              </div>
              <div class='row'>
                 <div class='col-sm-12'>
                   <p><img id='posts-img' src='imagepost/$upload_image' style='height:400px;width=350px;'></p>
                   </div>
                   </div><br>
                   <a href='messages.php?u_id=$user_id' style='float:right;'><button
                   class='btn btn-info'>comment</button></a>
                 <a href='single.php?post_id=$post_id' style='float:right;'><button
                 class='btn btn-info'>comment</button></a><br>
              </div>
              <div class='col-sm-3'>
              </div>
            </div>
            </div><br><br>
            
            ";

          }

          else if(strlen($content)>=1 && strlen($upload_image)>=1) {
           echo"
           <div class='post'>
              <div class='posts'>
                <p><img src='users/$user_image' class='img-circle' width='60px'height='80px' style='border-radius:50%;'></p> 
                <div class='pos'>
                 <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;'
                  href='user_profile.php?u_id=$user_id'>$first_name $last_name</a></h3>
                  <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
              </div>
              </div>
              <div class='row'>
                 <p>$content</p>
                   <p><img id='posts-img' src='imagepost/$upload_image' ></p>
                   <a href='messages.php?u_id=$user_id' style='float:right;'><button
                   class='btn btn-info'>message</button></a><br>  
                   <a href='single.php?post_id=$post_id' style='float:right;'><button
                   class='btn btn-info'>comment</button></a>
              
              </div>
           </div>
            
            ";

        
                   
                   
           } 
           else{
            echo"
             <div  class='posts'>
                <div class='img'>
                <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                </div>
                <div class='col'>
                 <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;'
                  href='user_profile.php?u_id=$user_id'>$first_name $last_name</a></h3>
                 <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                 
                </div>
             </div>
             <div class='row'>
                 <div class='col-sm-12'>
                 <p><h3>$content</h3></p>
                      </div>
                   </div><br>
                 <a href='single.php?post_id=$post_id' style='float:right;'><button
                 class='btn btn-info'>comment</button></a><br>
                </div>
                <div class='col-sm-3'>
                </div>
             </div>
             </div><br><br>
            
            ";
           
          }

        }
      }
?>
