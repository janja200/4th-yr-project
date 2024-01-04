<!DOCTYPE html>
<?php
include("includes/header2.php");
?>

<html>
<head>
      <title>Edit your account</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <script src="jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="test/css" 
       href="style/home_style2.css">
      
</head>
<style>
body{
 max-width:790px;
 margin:0px auto;
 width:100%;
}
#upload_image_button{
    position:absolute;
    top:50.5%;
    right:14%;
    min-width: 100px;
    max-width: 100px;
    border-radius: 4px;
    transform:translate(-50%,-50%);

}
label{
    padding:7px;
    display:table;
    color:#fff;

}
input[type="file"]{

    display:none;
}
#content{
    width: 70px;
}
#btn-post{
    min-width: 25%;
    max-width: 25%;
}
#insert_post{
    background-color: #fff;
    border: 2px solid #e6e6e6;
    padding: 40px 50px;

}
#posts{
    border: 5px solid #e6e6e6;
    padding: 40px 50px;
}
#posts-img{
    padding-top: 5px;
    padding-right:10px ;
    min-width: 102%;
    max-width: 50%;
}
#single_posts{
    border:5px solid #e6e6e6 ;
    padding: 40px 50px;
}
.pb-cmnt-container{
    font-family: lato;
    margin-top: 100px;
}
.pb-cmnt-textarea{
    resize: none;
    padding: 20px;

    height: 110px;
    width: 100%;
    border: 1px solid #F2F2F2;
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
</style>
<body>
<div class="row">
   
   <div class="col-sm-8">
      <form action="" method="post" enctype="multipart/form-data">
         <table class="table table-bordered table-hover">
            <tr align="center">
               <td colspan="6" class="active"><h2>Edit your profile</h2></td>
            </tr>
            <tr>
               <td style="font-weight:bold;">Change your firstname</td>
               <td>
                  <input class="form-control" type="text" name="f_name" 
                  required value="<?php echo"$firstname";?>">
               </td>
            </tr>
            <tr>
               <td style="font-weight:bold;">Change your lastname</td>
               <td>
                  <input class="form-control" type="text" name="l_name" 
                  required value="<?php echo"$lastname";?>">
               </td>
            </tr>
            <tr>
               <td style="font-weight:bold;">Change your username</td>
               <td>
                  <input class="form-control" type="text" name="u_name" 
                  required value="<?php echo"$user_name";?>">
               </td>
            </tr>
            <tr>
               <td style="font-weight:bold;">desciption</td>
               <td>
                  <input class="form-control" type="text" name="describe_user" 
                  required value="<?php echo"$describe_user";?>">
               </td>
            </tr>
            <tr>
               <td style="font-weight:bold;">relationship status</td>
               <td>
                  <select class="form-control" name="Relationship">
                     <option><?php echo $Relationship_status ?></option>
                     <option>Engaged</option>
                     <option>married</option>
                     <option>single</option>
                     <option>in a relationship</option>
                     <option>complicated</option>
                     <option>separated</option>
                     <option>divorced</option>
                     <option>widowed</option>
                  </select>
               </td>
            </tr>
            
            <tr>
               <td style="font-weight:bold;">password</td>
               <td>
                  <input class="form-control" type="password" id="mypass" name="u_pass" 
                  required value="<?php echo"$user_pass";?>">
                  <input type="checkbox" onclick="show_password()"><strong>show password</strong>
               </td>
            </tr>
            <tr>
               <td style="font-weight:bold;">Email</td>
               <td>
                  <input class="form-control" type="email" name="u_email" 
                  required value="<?php echo"$user_email";?>">
               </td>
            </tr>
            <tr>
               <td style="font-weight:bold;">Gender</td>
               <td>
                  <select class="form-control" name="u_gender">
                     <option>Male</option>
                     <option>Female</option>
                     <option>Other</option>
                     
                  </select>
               </td>
            </tr>
  
            <tr>
               <td style="font-weight:bold;">Birhtday</td>
               <td>
                  <input class="form-control" type="date" name="u_birthday" 
                    required value="<?php echo"$user_birthday";?>">
               </td>
            </tr>
            <tr>
               <td style="font-weight:bold;">Forgotten password</td>
               <td>
                  <button type="button" class="btn btn-default" data-toggle="modal"
                  data-target="#myModal">ON</button>

                  <div id="myModal" class="modal fade" role="dialog">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header"> 
                              <button type="button" class="close"
                              data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Modal Header</h4>
                           </div>
                           <div class="modal-body">
                              <form action="recovery.php?id=<?php echo $user_id;?>" method="post"
                              id="f">
                                 <strong>What is your school best friend name?</strong>
                                 <textarea class="form-control" cols="83" rows="3" name="content"
                                 placeholder="someone"  required>
                                 </textarea>
                                 <input class="btn btn-default" type="submit" name="sub"
                                  value="submit" style="width:100px;background-color:blue;"><br><br>
                                  <pre>Answer the above question we will ask this question if you forgot 
                                  your <br>password. </pre>
                                  <br><br>
                              </form>
                              <?php
                                if(isset($_POST['sub'])){
                                   $bnf=htmlentities($_POST['content']);

                                   if($bnf==''){
                                      echo"<script>alert('please enter something')</script>";
                                      echo"<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
                                      exit();
                                   }
                                   else{
                                      $update="UPDATE users set recovery_account='$bnf' where user_id='$user_id'";
                                      $run=mysqli_query($con,$update);
                                      if($run){
                                       echo"<script>alert('updated your bestfriend name')</script>";
                                       echo"<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
                                       exit();
                                   
                                      }
                                      else{
                                       echo"<script>alert('an error occured')</script>";
                                       echo"<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
                                       exit();
                                   
                                      }
                                   }
                                }
                              ?>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">close
                              </button>
                           </div>

                        </div>
                     </div>
                  </div>
               </td>
            </tr>
            <tr align="center">
               <td colspan="6">
                  <input type="submit" class="btn btn-info" name="update" style="width:250px;" value="update">
               </td>
            </tr>
        
        
        
        
         </table>
      </form>
      <?php
      
        if(isset($_POST['sub'])){
            $bf=$_POST['content'];
            if($bf == ""){
                echo "<script>alert('please enter something')</script>";
                echo"<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";

                exit();
            }
            else{
                $update="update users set recovery_account='$bf' where user_id='$user_id'";
                $run=mysqli_query($con,$update);

                if ($run) {
                    # code...
                    echo"<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
                }
                else{
                   # code...
                   echo"<script>alert('error occured')</script>";
                   echo"<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
                
                }
            }
        }
      
      ?>
   </div>
   <div class="col-sm-2">
   </div>
</div>
</body>
</html>
<?php

  if(isset($_POST['update'])){
      $f_name=$_POST['f_name'];
      $l_name=$_POST['l_name'];
      $u_name=$_POST['u_name'];
      $describe_user=$_POST['describe_user'];
      $Relationship_status=$_POST['Relationship'];
      $u_pass=$_POST['u_pass'];
      $u_email=$_POST['u_email'];
      $u_gender=$_POST['u_gender'];
      $u_birthday=$_POST['u_birthday'];

      $update="UPDATE users set f_name='$f_name',l_name='$l_name',user_name='$u_name',
      describe_user='$describe_user',Relationship='$Relationship_status',
      user_pass='$u_pass',user_email='$u_email',user_gender='$u_gender',user_birthday='$u_birthday'
      where user_id='$user_id'";

      $run=mysqli_query($con,$update);

      if ($run) {
         echo"<script>alert('Your profile updated')</script>";         
         echo"<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
        }
  }
?>
