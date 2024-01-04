<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    color:#444;

}
body{
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    width:100vw;

}
.login{
    text-align:center;
    position:relative;
    width:200px;
}
#signin{
    width:100%;
    border:0;
    border-radius:40%;
    padding:12px;
    background-image:linear-gradient(to right,#ff1464,purple);
    margin-bottom:26px;

}
input{
    border-top:0px solid white;
    border-right:0px solid white;
    border-left:0px solid white;
    border-bottom:2px solid #444;
    padding:13px 40px 12px 20px;

}
#details{
margin-bottom:10px;
position:relative;
}
p{
    margin-bottom:6px;
}
a{
    color:blue;
}
</style>
<body>
  <div class="login">
  <form action="" method="post">
       <h2>login to neybours</h2>
       <input type="email"  id="details" name="email"  placeholder="email" required="required" class="form-control input-md"><br>
         <input type="password" id="details" name="pass" placeholder="password" required="required" 
         class="form-control input-md"><br>
         <button id="signin" class="btn btn-info btn-lg" name="login">login</button><br>
         <p><a  data-toggle="tooltip" title="reset password" href=
          "forgot_password.php">forgot password?</a><p><br>
        <p><a data-toggle="tooltip" title="signin" href="signup.php">Dont have an account?</a><p><br><br>
        <?php

         include("signin.php");

        ?> 
  </form> 
    </div> 
</body>
</html>