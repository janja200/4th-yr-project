<?php
<!doctype html>  
<html>
<head>
</head>
<body>
<div class="">
    <script>
      if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(function(success){
          document.write("latitude:"+success.coords.latitude);
          document.write("longitudede:"+success.coords.longitude);
        });
      }
    </script>
</div>
</body>
</html> 
    

   //global $con;
   
//include("includes/connection.php");
     //if(${pos.coords.latitude}>=1 &&${pos.coords.longitude}>=1){
     //$update="update users set user_latitude='${pos.coords.latitude}' AND user_longitude='${pos.coords.longitude}' where user_id='$user_id'";
     //$run_update=mysqli_query($con,$update);

?>