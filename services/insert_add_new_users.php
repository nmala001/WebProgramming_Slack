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
        $sql = "INSERT INTO slack.user_channel(user_id,channel_id) VALUES ('".$uid."','".$cid."')";
        if($connect->query($sql)===TRUE){
               echo "success";
        }else{
                echo "Error :" .$sql."<br>".$connect->error;
        }

}


?>