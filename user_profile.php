<!DOCTYPE html> 
<?php
include("includes/header.php");

if(!isset($_COOKIE['SNID'])){

    header("location:index.php");
}
?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<style>
body{
    overflow-x:hidden ;
    max-width:790px;
    width:100%;
    margin:0 auto;
}

input[type="file"]{

display:none;
}
#update_profile{
position:relative;
background-color:green;
top:;
}
#button_profile{
position:relative;
background-color:green;
}
.update{
  display:flex;
  
  flex-direction:row;
  margin:0 auto;
}
.post{
    border: 5px solid #e6e6e6;
    padding: ;
    
}
.posts{
    display:flex;
    flex-direction:row;
    margin-left:4%;
    width:100%;
}
.pos{
   display:flex;
   flex-direction:column;
   margin-left:4%;
   margin-top:0px;
}
.dp{
    border-radius:50%;
}
.pos h3{
    margin-bottom:0px;
}
.pos h3{
    margin-bottom:0px;
}
.pos h4{
    margin-bottom:0px; 
}
#posts-img{
    padding-top: 5px;
    padding-right:10px ;
    width: 100%;
}
.btns{
    display:flex;
    flex-direction:row;
    justify-content:space-evenly;
    border-bottom:.5px solid grey;
}
#single_posts{
    border:5px solid #e6e6e6 ;
    padding: 40px 50px;
}
.sepa{
    display:flex;
    margin:0px auto;
    width:100%;
}
</style>
<body>
<div class="row">
    <?php
      if(isset($_GET['u_id'])){

        $u_id=$_GET['u_id'];
      }
      if($u_id <0 || $u_id==""){
          echo"<script>window.open('home.php','_self')</script>";
      }else{
          echo"";
      }
    
    
    ?>
    <div class="col-sm-12">
      <?php
         
         if (isset($_GET['u_id'])) {
             # code...
             global $con;

             $user_Id=$_GET['u_id'];

             $select="select * from users where user_id='$user_Id'";
             $run=mysqli_query($con,$select);
             $row=mysqli_fetch_array($run);

             $name=$row['user_name'];

         }
      
      ?>
      <?php
         if(isset($_GET['u_id'])){
             global $con;

             $user_Id=$_GET['u_id'];
             $select="select * from users where user_id='$user_Id'";
             $run=mysqli_query($con,$select);
             $row=mysqli_fetch_array($run);

             $id=$row['user_id'];
             $image=$row['user_image'];
             $name=$row['user_name'];
             $f_name=$row['f_name'];
             $l_name=$row['l_name'];
             $describe_user=$row['describe_user'];
             $gender=$row['user_gender'];
             $register_date=$row['user_reg_date'];
             
             echo"
             
                <div class='row'>
                   <div class='col-sm-1'>
                   </div>
                   <center>
                   <div style='background-color:#e6e6e6;' class='col-sm-3'>
                   <h2>About</h2>
                   <img class='img-circle' src='users/$image' style='border-radius:20px;' width='150' height='150'>
                   <br><br>
                  
                   <div class='list-group'>
                   <center><h2 style='border-top:0px;'><strong>About</strong></h2></center>
                   <center><h4><strong>name:$f_name $l_name</strong></h4></center>
                   <p><strong>description:</strong><i style='color:grey;'>$describe_user</i></p>
                   <p><strong>joined in::</strong>$register_date</p>
                   <p><strong>gender:</strong>$gender</p>
                   </div>
                
                   </div>
                </div>
             
             ";

             $user=$_SESSION['user_email'];
             $get_user="select * from users where user_email='$user'";
             $run_user=mysqli_query($con,$get_user);
             $row=mysqli_fetch_array($run_user);

             $userown_id=$row['user_id'];

             if($user_Id==$userown_id){
                 echo"<a href='edit_profile.php?u_id=$userown_id'
                  class='btn btn-success' style='padding:1px;border:20px solid black;border-radius:20px;backgroundcolor:grey;'>Edit profile</a>";
             }

            
         }
      
      ?>

      <div class="col-sm-8">
        <center><h1><strong><?php echo"$f_name $l_name";?></strong> posts</h1></center>
        <?php
          global $con;

          

                
         
        
        
        ?>
      </div>
    </div>

</div>
<?php 
if(isset($_GET['u_id'])){

   $u_id=$_GET['u_id'];
 }
?>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
          var flag=0;
          var u_id='<?php echo$u_id;?>';
          var userid='<?php echo$userown_id;?>';
          $.ajax({
              type:"GET",
              url:"up_posts.php",
              data:{
                  'offset':0,
                  'limit':3,
                  'u_id':u_id,
                  'userid':userid,
              },
              success:function(data){
                  $('body').append(data);
                  flag+=3;
              }
          });
          $(window).scroll(function(){
              if($(window).scrollTop()+50>=$(document).height()-$(window).height()){
                var u_id='<?php echo$u_id;?>';
                var userid='<?php echo$userown_id;?>';
                $.ajax({
                 type:"GET",
                 url:"up_posts.php",
                 data:{
                     'offset':flag,
                     'limit':3,
                     'u_id':u_id,
                     'userid':userid,
                 },
                 success:function(data){
                     $('body').append(data);
                     flag+=3;
                 }
                });
              }
          });
      });
 
</script> 
</body>
</html>