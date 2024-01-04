<!DOCTYPE html>
<?php

include("includes/header1.php");

if(!isset($_COOKIE['SNID'])){

    header("location:index.php");
}
?>

<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <?php
      $user=isloggedin();
      $get_user="select * from users where user_id='$user'";
      $run_user=mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);
      $user_name=$row['user_name'];
      $user_id=$row['user_id'];

      ?>
      <title><?php echo "$user_name";?></title>
      </head>
<style>
body{
    overflow-x:hidden;
    
    max-width:790px;
    width:100%;
    margin:0 auto;
}
{
    overflow-y:scroll;
}
#upload_image_button{
    position:relative;
    width: 40%;
    border-radius:4px;
    color:black;
    border:3px solid black;
    background-color:gray;
    margin-right:2.5%;
    margin-left:15%;
    text-align:center;
}
label{
    padding:7px;
    display:table;
    color:#fff;

}
input[type="file"]{

    display:none;
}
#content{
    width:70%;
    border-radius:20px;
    margin-top:6vh;
    height:3vh;
    text-align:center;

}
#btn-post{
    border-radius:20px;
    width: 25%;
}
.insert_post{
    background-color: #fff;
    border: 2px solid #e6e6e6;
    padding: 10px 0px 0px 0px;

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
  <div class="insert_post">
    <center>
     <form action="explorer_home.php?id=<?php echo"$user_id;"?>" method="post" 
     id="f" enctype="multipart/form-data">
     <textarea class="form-control" id="content" name="content" placeholder="Enter a place to explore"
      ></textarea><br>
      <button id="btn-post" class="btn btn-success" name="sub">search</button>
      </form>
      <?php
       echo insert_search();
       echo getphplocation();
       //echo get_location();
      ?>
    </center>
  </div>
</div>
<div class="loading">   
      <div class="ball"></div>
      <div class="ball"></div>
      <div class="ball"></div>
</div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
      function showloading(){
          loading.classList.add('show');
         
       
        //loading.classList.remove('show');
      }
      $(document).ready(function(){
          var flag=0;
          $.ajax({
              type:"GET",
              url:"explorer_posts.php",
              data:{
                  'offset':0,
                  'limit':3,
              },
              success:function(data){
                  $('body').append(data);
                  flag+=3;
              }
          });
          $(window).scroll(function(){
              if($(window).scrollTop()+50>=$(document).height()-$(window).height()){
                $.ajax({
                 type:"GET",
                 url:"explorer_posts.php",
                 data:{
                     'offset':flag,
                     'limit':3,
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
