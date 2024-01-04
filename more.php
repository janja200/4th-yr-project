<!DOCTYPE html> 
<?php

include("includes/header.php");

if(!isset($_COOKIE['SNID'])){

    header("location:index.php");
}
?>

<html>
<head>
   <title></title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  </head>
<style>
body{
  max-width:790px;
  width:100%;
  margin:0 auto;
}
.container{
  
 width:100%;
 height:25vh;
 margin-top:40vh;
}
</style>
<body>
    <div class="container">
      <center>
       <a href="edit_profile.php" ><button style='background-color:green;height:40px;width:25%;border-radius:20px;'
    class='btn btn-info'>edit profile</button></a><br>
       <a href="logout.php" ><button style='margin-top:2%;background-color:green;height:40px;width:25%;border-radius:20px;'
    class='btn btn-info'>logout</button></a>
      </center>
    </div>
</body>
</html>