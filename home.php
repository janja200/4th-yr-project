<!DOCTYPE html>
<?php
include("includes/header.php");


?>

<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <?php
      $user_id=isloggedin();
      $get_user="select * from users where user_id='$user_id'";
      $run_user=mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);
      $user_name=$row['user_name'];

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
    border-radius:20px;
 
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
    text-align:center;
    margin-top:6vh;
    
}
#btn-post{
   
    width: 25%;
    border-radius:20px;
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
.pb-cmnt-container{
    font-family:sans-serif;
    margin-top: 100px;
}
.pb-cmnt-textarea{
    resize: none;
    padding: 20px;

    height: 110px;
    width: 100%;
    border: 1px solid #F2F2F2;
    border-radius:;
}
#find_people{
    border: 5px solid #e6e6e6;
    padding: 40px 50px;
}
#result_posts{
    border: 5px solid #e6e6e6;
    padding: 40px 50px;
}
form.search_form input[type=text]{
    padding: 10px;
    font-size: 17px;
    border-radius: 4px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1ff;
}
form.search_form button{
    float:left ;
    width: 20%;
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}
form.search_form button:hover{
    background: #0b7dda;
}
form.search_form::after{
    content: "";
    clear: both;
    display: table;
}
.loading{
    opacity:0;
    display:flex;
    position:fixed;
    bottom:0px;
    left:50%;
    transform:translateX(-50%);
    animation:1.5s ball infinite ease-in-out both;
}
.loading.show{
    opacity:1;

}
.ball{
    height:10px;
    margin:5px;
    border-radius:50%;
    width:10px;
    background-color:yellow;
   
}
@keyframes ball{
    0%,80%,100%{
        transform:scale(0);
    }
    40%{
        transform:scale(1);  
    }
}
.sepa{
    display:flex;
    margin:0px auto;
    width:100%;
}
.ulike{
    display:none;
}
</style>
<body>
<div class='scroll-post'>
<div class="insert_post">
  <center>
  <form action="home.php?id=<?php echo"$user_id;"?>" method="post" id="f" enctype="multipart/form-data">
     <textarea class="form-control" id="content" name="content" row=1.5 placeholder="post something!"></textarea>
     <div class="sepa">
     <label class="btn btn-warning" id="upload_image_button">select image<input type="file" name="upload_image"></label>
     <button id="btn-post" class="btn btn-success" name="sub" row=2>post</button>
     </div>
     </form>
     <?php
        echo insertPost();
     ?>
  </center>
</div>
     <?php
    
    if(isset($_GET['lat'])){
     echo getphplocation();
     $lat=$_GET['lat'];
     $long=$_GET['long'];
     echo get_location();
    
    }
    echo location_difference();
     
      ?>
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
              url:"getposts.php",
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
                 url:"getposts.php",
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

 $(document).ready(function(){
        $('.like').click(function(){
         var post_id=$(this).attr('id');
         $.ajax({
           url:'home.php',
           type:'post',
           async:'false',
           data:{
               'liked':1,
               'post_id':post_id
           },
         success:function(){

            }
      });
    });
  });
 
</script> 
</div> 
</body>
</html>
