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
</head>
<style>
body{
    overflow-x:hidden ;
    max-width:790px;
    width:100%;
    margin:0 auto;
}

.find_people{
    max-width:790px;
    width:100%;
    margin:0 auto;
    display:flex;
}
.container-fluid{

}
.image{
    
    
}
</style>
<body>
<div class="row">
    <div class="col-sm-12">
        <center><h2 style="margin-top:7.5vh;margin-bottom:0px;">find people</h2></center>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <form class="search_form" action="">
                <center>
                    <input type="text" placeholder="search friend" style="width:70%;height:3vh;border-radius:20px;text-align:center;" name="search_user"><br>
                    <button class="btn btn-info" type="submit" style="width:25%;height:3vh;border-radius:20px;" name="search_user_btn">search</button>
                    </center>
                </form>
            </div>
  
        </div><br><br>
      
    </div>
<?php
$search_query=6;
if(isset($_GET['search_user_btn'])){
$search_query=htmlentities($_GET['search_user']);
 }
?>
<script type="text/javascript" src="jquery.js"></script>
<script>
       $(document).ready(function(){
          var flag=0;
          var search_user='<?php echo$search_query;?>';
          $.ajax({
              type:"GET",
              url:"members1.php",
              data:{
                  'offset':0,
                  'limit':10,
                  'search_user':search_user,
              },
              success:function(data){
                  $('body').append(data);
                  flag+=10;
              }
          });
          $(window).scroll(function(){
              if($(window).scrollTop()+50>=$(document).height()-$(window).height()){
                var search_user='<?php echo $search_query;?>';
                $.ajax({
                 type:"GET",
                 url:"members1.php",
                 data:{
                     'offset':flag,
                     'limit':10,
                     'search_user':search_user,
                 },
                 success:function(data){
                     $('body').append(data);
                     flag+=10;
                 }
                });
              }
          });
      });
 </script>
</div>
</body>
</html>