<!DOCTYPE html> 
<?php

include("includes/header.php");

if(!isset($_COOKIE['SNID'])){

    header("location:index.php");
}
?>
<html>
<head>
   <title> results</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
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
.search_form{
    justify-content:center;
}
</style>
<body>
<div class="row">
    <div class="">
        <center><h2 style="margin-top:7.5vh;margin-bottom:0px;">search post</h2></center>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <form class="search_form" action="">
                <center>
                    <input type="text" placeholder="search post" style="width:70vw;height:2vh;border-radius:20%;text-align:center;margin-bottom:0px;" name="search_user"><br>
                    <button class="btn btn-info" type="submit" style="width:25vw;height:3vh;border-radius:20%;margin-bottom:0px;margin-top:0px;" name="search_user_btn">search</button>
                    </center>
                </form>
            </div>
  
        </div><br><br>
      
    </div>
<?php
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
              url:"resultspost2.php",
              data:{
                  'offset':0,
                  'limit':3,
                  'search_user':search_user,
              },
              success:function(data){
                  $('body').append(data);
                  flag+=3;
              }
          });
          $(window).scroll(function(){
              if($(window).scrollTop()+50>=$(document).height()-$(window).height()){
                var search_user='<?php echo $search_query;?>';
                $.ajax({
                 type:"GET",
                 url:"resultspost2.php",
                 data:{
                     'offset':flag,
                     'limit':3,
                     'search_user':search_user,
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