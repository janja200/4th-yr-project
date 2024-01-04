<!DOCTYPE html>
<?php
session_start();
include("includes/header2.php");

if(!isset($_SESSION['user_email'])){

    header("location:index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
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
    flex-direction:column;
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
.logn{
    width:100%;
    border:0;
    border-radius:40%;
    padding:12px;
    background-image:linear-gradient(to right,#ff1464,purple);
    margin-bottom:26px;

}
</style>
<body>

    <a class="login" href="edit_profile.php" ><h3>edit profile</h3></a><br>
    <a class="login" href="logout.php" ><h3>logout</h3></a>  

</body>
</html>