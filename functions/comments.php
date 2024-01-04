<?php

if(isset($_GET['offset']) && isset($_GET['limit'])){  
   $con=mysqli_connect("localhost","root","","neybours");
   $limit=$_GET['limit'];
   $offset=$_GET['offset'];
  
   $get_id=$_GET['post_id'];

   $get_com="select * from comments where post_id='$get_id' ORDER by 1 DESC  LIMIT $limit OFFSET $offset";

   $run_com=mysqli_query($con,$get_com);

   while ($row=mysqli_fetch_array($run_com)) {
     # code...
     $com=$row['comment'];
     $com_name=$row['comment_author'];
     $date=$row['date'];

     echo"
         <div class='row'>
            <div class='col-md-6 col-md-offset-3'>
               <div class='panel panel-info'>
                  <div class='panel-body'>
                     <div>
                       <h4><strong>$com_name</strong><i>commented</i> on $date</h4>
                       <p class='text-primary' style='margin-left:font-size:20px;'>$com</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
     
     ";
   }
}
?>