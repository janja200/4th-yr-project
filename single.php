<!DOCTYPE html> 
<?php

include("includes/header.php");

if(!isset($_COOKIE['SNID'])){

    header("location:index.php");
}
?>

<html>
<head>
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
#message_textarea{
    width:70%;
    height:4.5vh;
    border-radius:20px;
    text-align:center;
    
 }
 #btn-msg{
   width:20%;
   height:28px;
   border-radius:5px;
   margin:5px;
   border:none;
   color:#fff;
   float:right;
   background-color:#2ecc71;
 }
 .container{
   max-width:790px;
   width:100%;
   display:inline-block;
   bottom:7vh;
   position:fixed;
}
</style>
</head>
<style>
</style>
<body>
  <div class="row">
    <div class="col-sm-12">
       <center><h1 style="margin-top:7vh;margin-bottom:0px;">comments</h1></center>
       <?php single_post();?>
    </div>
  </div>
<?php

$post_id=$_GET['post_id'];
$user_com=isloggedin();
$get_com="select * from users where user_id='$user_com'";
$run_com=mysqli_query($con,$get_com);
$row_com=mysqli_fetch_array($run_com);
$user_com_id=$row_com['user_id'];
$user_com_name=$row_com['user_name'];
 
echo"
<div class='container'>         
<form action='' method='POST' id='comment_form'>
 <textarea class='form-control' name='comment' id='message_textarea'  placeholder='write a comment'></textarea>
 <a class='reply'><button type='submit' name='reply' id='btn-msg' >send</button></a>
</form>
</div> 
<div id='display_comment'></div>
";

?>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
      function showloading(){
          loading.classList.add('show');
         
       
        //loading.classList.remove('show');
      }
      $(document).ready(function(){
          var flag=0;
          var post_id='<?php echo$post_id;?>';
          var userid='<?php echo$user_com_id;?>';
          $.ajax({
              type:"GET",
              url:"functions/comments.php",
              data:{
                  'offset':0,
                  'limit':5,
                  'post_id':post_id,
                  'userid':userid,
              },
              success:function(data){
                  $('body').append(data);
                  flag+=5;
              }
          });
          $(window).scroll(function(){
              if($(window).scrollTop()+50>=$(document).height()-$(window).height()){
                var post_id='<?php echo$post_id;?>';
                var userid='<?php echo$user_com_id;?>';
                $.ajax({
                 type:"GET",
                 url:"functions/comments.php",
                 data:{
                     'offset':flag,
                     'limit':5,
                     'post_id':post_id,
                     'userid':userid,
                 },
                 success:function(data){
                     $('body').append(data);
                     flag+=5;
                 }
                });
              }
          });

      });
</script> 

<?php

if(isset($_POST['reply'])){
  $comment=$_POST['comment'];
  
  if ($comment =='') {
    # code...
    echo"<script>Alert('Enter your comment!')</script>";
    echo"<script>window.open('single.php?post_id=$post_id','_self')</script>";
  }else {
    $insert="insert into comments
       (post_id,user_id,comment,comment_author,date)
       values('$post_id','$user_id','$comment','$user_com_name',NOW())";

       $run=mysqli_query($con,$insert);

       echo"<script>Alert('your comment added')</script>";
       echo"<script>window.open('single.php?post_id=$post_id','_self')</script>";
  }
}
?>
</body>
</html>