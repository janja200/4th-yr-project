<?php
include("functions/functions.php");
include("includes/connection.php");
 include("DB.php");

?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
</head>
<style>
nav{
  list-style:none;
  padding:0;
  height:1vh;
  position:sticky;
  top:0px;
  
 
  
}
.navbar-brand{
  display:flex;
  flex-direction:row;
  justify-content:space-between;
  background-color:white;
  height:7.5vh;
  border-bottom:.5vh solid black;
  margin-bottom:100px;
}
.homi{background-color:white;
  display:flex;
  flex-direction:row;
  justify-content:space-between;

}
li{
  color:white;
}
.footer{
  max-width:790px;
  width:100%;
  height:7vh;
  position:fixed;
  bottom:0;
  display:flex;
  flex-direction:row;
  justify-content:space-around;
  background-color:white;
  border-top:.5vh solid black;
}

</style>
<body>
<?php
    
    $user_id=isloggedin();
    $get_user="select * from users where user_id='$user_id'";
    $run_user=mysqli_query($con,$get_user);
    $check_user=mysqli_num_rows($run_user);
    $row=mysqli_fetch_array($run_user);
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
    <nav>
   <div class="navbar-brand">
   <a  style="font-size:2rem;color:black;">neighbours</a>
    <a href="explorer_home.php" style="color:white;margin-top:0;" class="tagi"><img src="images/direction.png" style="color:white;" height="30vh" ><br></a>
    <a href='users.php' style="color:white;"><img src="images/126516.svg" style="color:white;" height="30vh" ></a>
    <a  href="more.php" style="color:white;"><img src="images/512222.svg" style="color:white;" height="30vh" ></a>
    
   </div>
    
    
    </nav> 
    <div class='footer'>
    <a href='home.php' style="color:white;"><img src="images/25694.svg" style="color:white;" height="30vh" ></a>
    <a href='profile.php?<?php echo "u_id=$user_id";?>' style="color:white;"><img src="images/126486.svg" style="color:white;" height="30vh" ></a>
    <a href='members.php' style="color:white;"><img src="images/33308.svg" style="color:white;" height="30vh" ></a>
    <a  href="results.php" style="color:white;"><img src="images/149852.svg" style="color:white;" height="20vh" ></a>
    
    </div>
</body>