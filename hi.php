<?php
 


?>
<!DOCTYPE html> 
<html>
<head></head>
<style>

</style>
<body>
  <script>
    navigator.geolocation.getCurrentPosition(function(pos){
        document.write("latitude="+pos.coords.latitude);
        document.write("langitude="+pos.coords.longitude);
    });
  </script>
</body>
</html>
