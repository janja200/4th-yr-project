<!DOCTYPE html> 
<?php

include("includes/header.php");

if(!isset($_COOKIE['SNID'])){

    header("location:index.php");
}
?>

<html>
<head>
   <title>view post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<style>
body{
    overflow-x:hidden ;
    max-width:500px;
    width:100%;
    margin:0 auto;
}

</style>
<body>
<center><h4>select someone to start a chat</h4></center>
<script type="text/javascript" src="jquery.js"></script>
<script>
       $(document).ready(function(){
          var flag=0;
          $.ajax({
              type:"GET",
              url:"meso1.php",
              data:{
                  'offset':0,
                  'limit':10,
              },
              success:function(data){
                  $('body').append(data);
                  flag+=10;
              }
          });
          $(window).scroll(function(){
              if($(window).scrollTop()>=$(document).height()-$(window).height()){
                $.ajax({
                 type:"GET",
                 url:"meso1.php",
                 data:{
                     'offset':flag,
                     'limit':10,
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
</body>
</html>