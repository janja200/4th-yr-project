<?php
   include("../functions/functions.php");
   include("../includes/connection.php");
    $user_id = isloggedin();
    $sql = "SELECT * FROM users WHERE NOT user_id = '$user_id' ORDER BY user_id DESC";
    $query = mysqli_query($con, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>