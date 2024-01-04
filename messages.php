<!DOCTYPE html> 
<?php

include("includes/header3.php");

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
   max-width:790px;
   width:100%;
   margin:0 auto;
   overflow-x:hidden;
}
 #scroll_messages{
   max-height:70vh;
   overflow-y:scroll;

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
   position:;
 }
 #green{
   background-color:#2ecc71;
   border-color:#27ae60;
   width:60%;
   padding:2.5%;
   font-size:16px;
   float:left;
   margin-bottom:5px;
 }
 #message_textarea{
    width:70%;
    height:4.5vh;
    border-radius:20px;
    text-align:center;
    position:;
    
 }
 #blue{
   background-color:#3498db;
   border-color:#2980b9;
   width:60%;
   padding:2.5px;
   font-size:16px;
   float:right;
   overflow-x:hidden;
   margin-bottom:5px;
}
.container{
   max-width:790px;
   width:100%;
   display:inline-block;
   bottom:7.5vh;
   position:absolute;
}
#loaded_msg{

}
</style>
<body>

<?php
   if(isset($_GET['u_id'])){
      global $con;
      $get_id=$_GET['u_id'];
      $get_id="select * from users where user_id='$get_id'";

      $run_user=mysqli_query($con,$get_id);
      $row_user=mysqli_fetch_array($run_user);
      $user_to_msg=$row_user['user_id'];
      $user_to_name=$row_user['user_name']; 
      $user_id=$row_user['user_id'];
      $user_image=$row_user['user_image'];
      $user_name=$row_user['user_name'];
      $f_name=$row_user['f_name'];
      $l_name=$row_user['l_name'];
      $describe_user=$row_user['describe_user'];
      $gender=$row_user['user_gender'];
      $register_date=$row_user['user_reg_date'];
              

   }

   $user=isloggedin();
   $get_user="select * from users where user_id='$user'";
   $run_user=mysqli_query($con,$get_user);
   $row=mysqli_fetch_array($run_user);
   $user_from_msg=$row['user_id'];
   $user_from_name=$row['user_name'];
?>
<nav>
   <div class="navbar-brand">
   <div>
    <a  href='message.php' style="font-size:2rem;"><img src="images/271218.png" style="color:white;" height="26vh" ></a>
    <a   class="tagi"><img src="users/<?php echo $user_image;?>"  height="35vh" style="border-radius:50%;top:;"><br></a>
    </div>
    <div>
    <a  style="font-size:20px;color:blue;"><?php echo $user_name;?></a>
     </div> 
   </div>
    
     
</nav>
<div style="text-align:center;border-top:0px;"><h3>
------------------------------------</h3>
</div>
         <div class="load_image" id="scroll_messages">
            <?php
              $sel_msg="select * from messages where (user_to='$user_to_msg' AND
               user_from='$user_from_msg') OR (user_from='$user_to_msg' AND 
               user_to='$user_from_msg') ORDER by 1 ASC";
               $run_msg=mysqli_query($con,$sel_msg);

               while($row_msg=mysqli_fetch_array($run_msg)){

                $user_to=$row_msg['user_to'];
                $user_from=$row_msg['user_from'];
                $msg_body=$row_msg['msg_body'];
                $msg_date=$row_msg['date'];
                ?>
                   <div id="loaded_msg">
                      <?php if ($user_to==$user_to_msg && $user_from==$user_from_msg){
                          echo"<div class='message' id='blue' data-toggle='tooltip'
                          title='$msg_date'><p>$msg_body</p></div>"; 
                          }
                          else if($user_from==$user_to_msg && $user_to==$user_from_msg){
                             
                              echo"<div class='message' id='green'
                              data-toggle='tooltip' title='$msg_date'><p>$msg_body</p></div>";
                              }?>
                      
                   </div>
                <?php
               }
            ?>
   </div>

   <div class="container">         
   <form action='' method='POST'>
   <textarea class='form-control' name='msg_box' id='message_textarea'  placeholder='write a message'></textarea>
   <input type='submit' name='send_msg' id='btn-msg' value='send'>
   </form>
   </div>              
         <?php

           if(isset($_POST['send_msg'])) {
              $msg=$_POST['msg_box'];

              if(strlen($msg)<1){
                 echo"<script>alert('write something')</script>";
              }
              else if(strlen($msg)>150){
                 echo"<h4 style='color:red;text-align:center;'>message too long</h4>";
              }
              else{
                 $insert="INSERT into messages(user_to,user_from,msg_body,date,msg_seen)
                 values('$user_to_msg','$user_from_msg','$msg',NOW(),'no')";

                 $run_insert=mysqli_query($con,$insert);
                 //echo"<script>location.reload()</script>";
              }
           }
         ?>

<script>
    var div=document.getElementById("scroll_messages");
    div.scrollTop=div.scrollHeight;
</script>
</body>
</html>
