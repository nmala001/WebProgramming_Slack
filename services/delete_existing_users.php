<?php
session_start();
require_once '../php_action/db_connect.php';

$user = $_SESSION['userId'];
//$username = $_SESSION['userName'];


//Adding users to a channel private user
if($_SERVER["REQUEST_METHOD"]=="POST"){ 
$cid=$_REQUEST['cid'];
$uid=$_REQUEST['uid'];
        global $connect;
        $sql = "DELETE FROM slack.user_channel WHERE user_id = '$uid' AND channel_id = '$cid' ";
        if($connect->query($sql)===TRUE){
               echo "success";
        }else{
                echo "Error :" .$sql."<br>".$connect->error;
        }

}


?>