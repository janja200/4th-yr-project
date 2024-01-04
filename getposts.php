<?php 
include("functions/functions.php");         
    if(isset($_GET['offset']) && isset($_GET['limit'])){  
      include("includes/connection.php"); 
       
          $user_id=isloggedin();
          $get_user="select * from users where user_id='$user_id'";
          $run_user=mysqli_query($con,$get_user);
          $row=mysqli_fetch_array($run_user);
          $user_name=$row['user_name'];
          $userid=$row['user_id'];

          
          $limit=$_GET['limit'];
          $offset=$_GET['offset'];
          $user="SELECT posts.post_id,users.user_id,posts.post_content,posts.upload_image,
          posts.post_date,posts.post_likes,users.user_name,users.f_name,users.l_name,users.user_image FROM 
          posts,users,location WHERE posts.user_id=users.user_id AND 
          location.user_id=users.user_id AND user_from=$userid ORDER BY location.dist_diff ASC,posts.post_date DESC,posts.post_likes DESC LIMIT $limit OFFSET $offset";
          $run_user=mysqli_query($con,$user);

          while($row_user=mysqli_fetch_array($run_user)){
          $post_id=$row_user['post_id'];
          $user_id=$row_user['user_id']; 
          $content=substr($row_user['post_content'],0,40);
          $upload_image=$row_user['upload_image']; 
          $post_date=$row_user['post_date'];
          $lk=$row_user['post_likes'];
          $cm="SELECT com_id from comments where post_id='$post_id'";
          $rumcm=mysqli_query($con,$cm);
          $comm=mysqli_num_rows($rumcm);
          
          $user_name=$row_user['user_name'];
          $first_name=$row_user['f_name'];
          $last_name=$row_user['l_name'];
          $user_image=$row_user['user_image'];
          $notliked="SELECT id from likes where user_id='$userid' and post_id='$post_id'";
          $runnotliked=mysqli_query($con,$notliked);
          $check=mysqli_num_rows($runnotliked);
          
          if($content=='No' && strlen($upload_image)>=1){
        
            echo"
            <div class='post'>
               <div class='posts'>
                 <p><img src='users/$user_image' class='dp' width='40px' height='32px' ></p> 
                 <div class='pos'>
                  <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;font-size:16px;margin-bottom:0px;'
                   href='user_profile.php?u_id=$user_id'>$first_name $last_name</a></h3>
                   <h4><small style='color:black;margin-top:0px;'><strong>$post_date</strong></small></h4>
               </div>
               </div>
               <div class='row'>
                    <p><img id='posts-img' src='imagepost/$upload_image' ></p>
                    <div class='btns'>
                    ";
                    if(!($check)){
                    echo" <a class='ulike' id=''b'+$post_id' style='float:;'><button><img src='images/heart.png'  height='25vh'></button></a>";
                    echo"<a class='like' id='$post_id' style='float:;'><button><img src='images/like.png'  height='25vh'></button></a>";
                    }else{
                     echo" <a class='unlike' id='$post_id' style='float:;'><button><img src='images/heart.png'  height='25vh'></button></a>";
                    }
                    echo"
                    <a href='messages.php?u_id=$user_id' style='float:;'><button
                    class='btn btn-info'><img src='images/speech-bubble.png'  height='25vh'></button></a><br>  
                    <a href='single.php?post_id=$post_id' style='float:;'><button
                    class='btn btn-info'><img src='images/comment.png'  height='25vh'></button></a>
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
                   href='user_profile.php?u_id=$user_id'>$first_name $last_name</a></h3>
                   <h4><small style='color:black;'><strong>$post_date</strong></small></h4>
               </div>
               </div>
               <div class='row'>
                  <p style='margin-left:4%;'>$content</p>
                    <p><img id='posts-img' src='imagepost/$upload_image' ></p>
                    <div class='btns'>
                    ";
                    if(!($check)){
                      echo" <a class='ulike' id=''b'+$post_id' style='float:;'><button><img src='images/heart.png'  height='25vh'></button></a>";
                    echo"<a class='like' id='$post_id' style='float:;'><button><img src='images/like.png'  height='25vh'></button></a>";
                    }else{
                    echo"<a class='unlike' id='$post_id' style='float:;'><button><img src='images/heart.png'  height='25vh'></button></a>";
                    }
                    echo"
                    <a href='messages.php?u_id=$user_id' style='float:;'><button
                    class='btn btn-info'><img src='images/speech-bubble.png'  height='25vh'></button></a><br>  
                    <a href='single.php?post_id=$post_id' style='float:;'><button
                    class='btn btn-info'><img src='images/comment.png'  height='25vh'></button></a>
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
                   href='user_profile.php?u_id=$user_id'>$first_name $last_name</a></h3>
                   <h4><small style='color:black;'><strong>$post_date</strong></small></h4>
               </div>
               </div>
               <div class='row'>
               <p style='margin-left:4%;font-size:20px;'>$content</p>
                    <div class='btns'>
                    ";
                     if(!($check)){
                      echo" <a class='ulike' id=''b'+$post_id' style='float:;'><button><img src='images/heart.png'  height='25vh'></button></a>";
                       echo"<a class='like' id='$post_id' style='float:;'><button><img src='images/like.png'  height='25vh'></button></a>";
                      }else{
                        echo"<a class='unlike' id='$post_id' style='float:;'><button><img src='images/heart.png'  height='25vh'></button></a>";
                      }
                      echo"
                    <a href='messages.php?u_id=$user_id' style='float:;'><button
                    class='btn btn-info'><img src='images/speech-bubble.png'  height='25vh'></button></a><br>  
                    <a href='single.php?post_id=$post_id' style='float:;'><button
                    class='btn btn-info'><img src='images/comment.png'  height='25vh'></button></a>
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
                echo"  </div>
               </div>
            </div>
             
            ";
           
          }
          
        } 
        echo"<script>
      
          $(document).ready(function(){
            $('.like').click(function(){
             var post_id=$(this).attr('id');
             document.getElementById(post_id).style.display='none';
             document.getElementById('b'+post_id).style.display='initial';
             $.ajax({
              type:'GET',
              url:'like.php',
              data:{
                  'liked':1,
                  'post_id':post_id,
              },
              success:function(data){
                $('body').append(data);
        
              }
            });
            });
          });
         
         </script>";
        }
       
         
?>
