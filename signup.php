<!DOCTYPE html> 
<html>
<head>
   <title>signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
     
</head>
<style>
  body{
      overflow-x:hidden;
  }
  .main-content{
      max-width:500px;
      width:100%;
      margin:10px auto;
      background-color:#fff;
      border:2px solid #e6e6e6;
      padding:4px 5px;
  }
  .header{
      border:0px solid #000;
      margin-bottom:5px;
  }
  .well{
      background-color:#187FAB;
  }
  #signup{
    width:60%;
    border:0;
    border-radius:20px;
    padding:12px;
    background-image:linear-gradient(to right,#ff1464,purple);
    margin-bottom:26px;

}
</style>
<body>
   <div class="row">
      <div class="col-sm-12">
         <div class="well">
            <center><h1 style="color:white;">neighbours<h1></center>
         </div>
      </div>
   </div>
   <div class="row">
     <div class="col-sm-12">
       <div class="main-content">
          <div class="header">
             <h3 style="text-align:center;"><strong>join neighbours</strong></h3><hr>
          </div>
          <div class="1-part">
             <form action="" method="post">
                <div class="input-group">
                   <span class="input-group-addon"><i class="glyphicon glyphicon-pencil "></i></span>
                   <input type="text" class="form-control" placeholder="firstname" name="f_name" required="required">
                </div><br>
                <div class="input-group">
                   <span class="input-group-addon"><i class="glyphicon glyphicon-pencil "></i></span>
                   <input type="text" class="form-control" placeholder="lastname" name="l_name" required="required">
                </div><br>
                <div class="input-group">
                   <span class="input-group-addon"><i class="glyphicon glyphicon-lock "></i></span>
                   <input id="password" type="text" class="form-control" placeholder="password" name="user_pass" required="required">
                </div><br>
                <div class="input-group">
                   <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <input id="email" type="text" class="form-control" placeholder="email" name="user_email" required="required">
                   </div><br>
                <div class="input-group">
                   <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down "></i></span>
                   <select class="form-control" name="user_gender" required="required">
                   <option>male</option>
                   <option>female</option>
                   <option>others</option>
                   </select>
                </div><br>
                   <input type="date" class="form-control input-md" placeholder="birthday" name="user_birthday" required="required"><br>
                <a style="text-decoration:none; float:right;color:#187FAB;"|data-toggle="tooltip" title="signin" href="login.php">Already have an account</a><br><br>
                <center><button id="signup" class="btn btn-info btn-lg" name="signup">signup</button></center>
                  <?php
                    include("insert_user.php");  
                  ?>
             </form>
          </div>
       </div>
     </div>
   </div>
</body>
</html>