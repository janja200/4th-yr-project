<?php
  
  
  function like(){
    
    
    global $con;
    global $user_id;
    global $post_id;

    $notliked="SELECT id from likes where user_id='$user_id' and post_id='$post_id'";
    $runnotliked=mysqli_query($con,$notliked);
    if(!$runnotliked){
      echo"<script>alert('hello')</script>"; 
    $likes="UPDATE posts set post_likes=post_likes+1 where post_id=$post_id";
    $likes="insert into likes(user_id,post_id) values ('$user_id','$post_id')";
    mysqli_query($con,$likes);
    }
    //echo"<script>window.open('home.php','_self')</script>";
    
  }
  function isloggedin(){
    global $con;
    if(isset($_COOKIE['SNID'])){
      $token=$_COOKIE['SNID'];
      $user="SELECT user_id from login_tokens where token='$token'";
       $run_user=mysqli_query($con,$user);
       $row=mysqli_fetch_array($run_user);
       $user_id=$row['user_id'];
       $check_user=mysqli_num_rows($run_user);
      //$row=mysqli_fetch_array($run_insert);
      //$user_id=$row['user_id'];
      if($check_user){
        return $user_id;
      }
    }
    return false;
  }
  function getphplocation(){
    global $con;
    global $user_id;

    $ip=$_SERVER['REMOTE_ADDR'];
    $location='http://www.geoplugin.net/php.gp?ip='.$ip;
    $loc=unserialize(file_get_contents($location));
    $city=$loc['geoplugin_city'];
    $country=$loc['geoplugin_countryName'];
    $region=$loc['geoplugin_regionName'];
    if(strlen($city)>0 && strlen($country)>0 && strlen($region)>0){
    $insert="UPDATE users set user_country='$country', user_region='$region', user_city='$city' WHERE user_id='$user_id'";
    mysqli_query($con,$insert);
    echo"$user_id+$country+$city+$region";
    }
  }
  function stringtofloat($val){
    preg_match("#^([\+\-]|)([0-9]*)(\.([0-9]*?)|)(0*)$#",trim($val),$o);
    return
    $o[1].sprintf('%d',$o[2]).($o[3]!='.'?$o[3]:'');
  }
  function get_location(){
    global $con;
    global $user_id; 
    global $lat;
    global $long;
    //if(($lat!='NAN') && ($long!='NAN')) {     
    $insert="UPDATE users SET user_latitude='$lat', user_longitude='$long' WHERE user_id='$user_id'";
    mysqli_query($con,$insert);  
    //}     
  }
  function location_difference(){
    global $con;
    global $user_id;
    
    $rn="DELETE FROM LOCATION WHERE user_from=$user_id";
    mysqli_query($con,$rn);
    $meuser="select * from users where user_id='$user_id'";
    $me_user=mysqli_query($con,$meuser);
    $rowme=mysqli_fetch_array($me_user);

    $mylatitude=$rowme['user_latitude'];
    $mylongitude=$rowme['user_longitude'];
    $region=$rowme['user_country'];
    //AND user_region LIKE '%$region%'
      $user="SELECT * from users where user_id !='$user_id' and user_country='$region'";
      $run_user=mysqli_query($con,$user);
      while($row=mysqli_fetch_array($run_user)){

      $latitude=$row['user_latitude'];
      $longitude=$row['user_longitude'];
      $id=$row['user_id'];
      
      if((($latitude=="") &&($longitude==""))||(($latitude==0) && ($longitude==0))){
        continue;
      
      }
       $theta=$mylongitude-$longitude;
       $dist=sin(deg2rad($mylatitude))*sin(deg2rad($latitude))+cos(deg2rad($mylatitude))*cos(deg2rad($latitude))*cos(deg2rad($theta));
       $dist=acos($dist);
       $dist=rad2deg($dist);
       $miles=$dist*60*1.1515;
       $distance=$miles*1.609344;
       $run="insert into location(user_id,user_from,dist_diff)values('$id','$user_id','$distance')";
       mysqli_query($con,$run);

    }
    

   
  }
  function meso(){
      global $con;
      global $user_id;
      $user="select * from users where user_id !=$user_id";
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
  function insert_search(){
    if(isset($_POST['sub'])){
      global $con;
      global $user_id;

      $content=($_POST['content']);
      if(strlen($content)>25 || $content==null){
        echo"<script>alert('Please use 25 or less than 25 words!')</script>";
        echo "<script>window.open('explorer_home.php','_self')</script>";
    
      }else{
       $insert="update users set user_search='$content' where user_id='$user_id'";
       $run=mysqli_query($con,$insert);
       echo"<script>window.open('explorer_home.php','_self')</script>";
    }
    }
  }
  function insertPost(){

    if(isset($_POST['sub'])){
        global $con;
        global $user_id;

        $content=($_POST['content']);
        $upload_image=$_FILES['upload_image']['name'];
        $image_tmp=$_FILES['upload_image']['tmp_name'];
        $random_number=rand(1,100);

        if(strlen($content)>255){
            echo"<script>alert('Please use 250 or less than 250 words!')</script>";
            echo "<script>window.open('home.php','_self')</script>";
        
        }else{
            if(strlen($upload_image)>=1 && strlen($content)>=1){

                move_uploaded_file($image_tmp,"imagepost/$upload_image.$random_number");
                $insert="insert into posts (user_id,post_content,upload_image,post_date)
                values('$user_id','$content','$upload_image.$random_number',NOW())";
                $run=mysqli_query($con,$insert);
      
                         
                if($run){

                    echo"<script>window.open('home.php','_self')</script>";
                    echo"<script>alert('home.php')</script>";
                    $update="update users set posts='yes' where user_id='$user_id'";
                    $run_update=mysqli_query($con,$update);
                }
                 exit();

        }else {
            if($content=="" && $upload_image==""){
             echo"<script>alert('insert details!')</script>";
             echo "<script>window.open('home.php','_self')</script>";
        

            }else {
                if ($content=='') {
                  move_uploaded_file($image_tmp,"imagepost/$upload_image.$random_number");
                  $insert="insert into posts (user_id,post_content,upload_image,post_date)
                  values('$user_id','No','$upload_image.$random_number',NOW())";
                  $run=mysqli_query($con,$insert);
  
                  if($run){
                    echo "<script>window.open('home.php','_self')</script>";
                    $update="update users set posts='yes' where user_id='$user_id'";
                    $run_update=mysqli_query($con,$update);
                

                  }
                   exit();
                } else{
                    $insert="insert into posts (user_id,post_content,post_date)
                    values('$user_id','$content',NOW())";
                    $run=mysqli_query($con,$insert);
    
                    if($run){
    
                        echo"<script>window.open('home.php','_self')</script>";
    
                        $update="update users set posts='yes' where user_id='$user_id'";
                        $run_update=mysqli_query($con,$update);
                    }  
                }                                
                 


        

                 
            }
        }
    }
  }
  }
  function get_posts(){
          global $con;
          global $user_id;

          $user=DB::query("SELECT posts.post_id,users.user_id,posts.post_content,posts.upload_image,
          posts.post_date,users.user_name,users.f_name,users.l_name,users.user_image FROM 
          posts,users,location WHERE posts.user_id=users.user_id AND 
          location.user_id=users.user_id AND user_from=$user_id ORDER BY posts DESC LIMIT 1");
          //$run_user=mysqli_query($con,$user);
          //$row_user=mysqli_fetch_array($run_user);
          foreach($user as $row_user){
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
                   </div>
                   <a href='single.php?post_id=$post_id' style='float:;'><button
                   class='btn btn-info'>comment</button></a><br>
                   <a href='messages.php?u_id=$user_id' style='float:;'><button
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
                <p><img src='users/$user_image' class='img-circle' width='75px' ></p> 
                <div class='pos'>
                 <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;'
                  href='user_profile.php?u_id=$user_id'>$first_name $last_name</a></h3>
                  <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
              </div>
              </div>
              <div class='row'>
                 <p>$content</p>
                   <p><img id='posts-img' src='imagepost/$upload_image' ></p>
                   <div class='btns'>
                   <a href='like.php?post_id=$post_id' style='float:;'><button
                   class='btn btn-info'>like</button></a><br>
                   <a href='messages.php?u_id=$user_id' style='float:;'><button
                   class='btn btn-info'>message</button></a><br>  
                   <a href='single.php?post_id=$post_id' style='float:;'><button
                   class='btn btn-info'>comment</button></a>
                   </div>
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
  function single_post(){
    if(isset($_GET['post_id'])){
      global $con;
      $get_id=$_GET['post_id'];
      $get_posts="select * from posts where post_id='$get_id'";
      $run_posts=mysqli_query($con,$get_posts);
      $row_posts=mysqli_fetch_array($run_posts);
      $post_id=$row_posts['post_id'];
      $user_id=$row_posts['user_id'];
      $content=$row_posts['post_content'];
      $upload_image=$row_posts['upload_image'];
      $post_date=$row_posts['post_date'];
      $user="select * from users where user_id='$user_id' AND posts='yes'";

      $run_user=mysqli_query($con,$user);
      $row_user=mysqli_fetch_array($run_user);

      $user_name=$row_user['user_name'];
      $last_name=$row_user['l_name'];
      $first_name=$row_user['f_name'];
      $user_image=$row_user['user_image'];

      $user_com=isloggedin();
      $get_com="select * from users where user_id='$user_com'";
      $run_com=mysqli_query($con,$get_com);
      $row_com=mysqli_fetch_array($run_com);
      $user_com_id=$row_com['user_id'];
      $user_com_name=$row_com['user_name'];

      if(isset($_GET['post_id'])){
        $post_id=$_GET['post_id'];
      }
      $get_posts="select post_id from users where posts_id='$post_id'";
      $run_user=mysqli_query($con,$get_posts);

      $post_id=$_GET['post_id'];
      $post=$_GET['post_id'];

      $get_user="select * from posts where post_id='$post'";
      $run_user=mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);
      
      $p_id=$row['post_id'];

      if($p_id != $post_id){
        echo"<script>window.open('home.php','_self')</script>";
      }else{

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
                    
               </div>
            </div>
             
            ";
           
          }
         
       
    }


                   
                   
        
         
      
      include("comments.php");

      
    }         
      
    }
    
  
  function search_user(){

    global $con;
    if(isset($_GET['search_user_btn'])){
      $search_query=htmlentities($_GET['search_user']);
      $get_user="select * from users where f_name like '%$search_query%'
      OR l_name like '%$search_query%' OR user_name like '%$search_query%'";
    }
    else{
      $get_user="select * from users";
    }
    $run_user=mysqli_query($con,$get_user);

    while ($row_user=mysqli_fetch_array($run_user)) {
      # code...
      
      $user_id=$row_user['user_id'];
      $f_name=$row_user['f_name'];
      $l_name=$row_user['l_name'];
      $username=$row_user['user_name'];
      $user_image=$row_user['user_image'];

      echo"
      
              <div class='find_people'>
                 <div class='col-sm-4'>
                    <a href='user_profile.php?u_id=$user_id'>
                    <img src='users/$user_image' width=''150px' height='140px'
                    title='$username' style='float:; margin=1px;'/>
                    </a>
                 </div>
                 <div class='col-sm-6'>
                    <a style='text-decoration:none;cursor:pointer;color:#3897f0;'
                    href='user_profile.php?u_id=$user_id'>
                    <strong><h2>$f_name $l_name</h2></strong>
                    </a>
                 </div>
              </div>
      ";
    }
  }
  function results(){
    global $con;

    if(isset($_GET['search'])){
      $search_query=htmlentities($_GET['user_query']);
    
    $get_posts="SELECT * from posts where post_content like '%$search_query%'
    OR upload_image like '%$search_query%'";

    $run_posts=mysqli_query($con,$get_posts);

    while ($row_posts=mysqli_fetch_array($run_posts)) {
      # code...
      $post_id=$row_posts['post_id'];
      $user_id=$row_posts['user_id'];
      $content=$row_posts['post_content'];
      $upload_image=$row_posts['upload_image'];
      $post_date=$row_posts['post_date'];

      $user="select * from users where user_id='$user_id' AND posts='yes'";

      $run_user=mysqli_query($con,$user);
      $row_user=mysqli_fetch_array($run_user);

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
                 <p>$content</p>
                   <p><img id='posts-img' src='imagepost/$upload_image' style='height:400px;width=350px;'></p>
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
        else{
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
  
}

?>