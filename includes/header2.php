<?php
 include("includes/connection.php");
 include("functions/functions.php");


?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
</head>
<style>

  
</style>
<body>
<?php
    $user_id=isloggedin();
    $get_user="select * from users where user_id='$user_id'";
    $run_user=mysqli_query($con,$get_user);
    $row=mysqli_fetch_array($run_user);
    $user_id=$row['user_id'];
    $user_name=$row['user_name'];
    $firstname=$row['f_name'];
    $lastname=$row['l_name'];
    $describe_user=$row['describe_user'];
    $Relationship_status=$row['Relationship'];
    $user_pass=$row['user_pass'];
    $user_email=$row['user_email'];
    $user_gender=$row['user_gender'];
    $user_birthday=$row['user_birthday'];
    $user_image=$row['user_image'];
    $user_cover=$row['user_cover'];
    $recovery_account=$row['recovery_account'];
    $register_date=$row['user_reg_date'];
    
    ?>
   <div class="login">
    <a  href='more.php' style="font-size:2rem;"><img src="images/271218.png" style="color:white;" height="36vh" ></a>
   <div>  
</body>