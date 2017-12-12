<?php
require_once './php_action/db_connect.php';
session_start();
//$user_id=$_SESSION["user_id"];
//$username=$_SESSION["username"];
//$channel_id=$_REQUEST["channel_id"];

$OTP = $_SESSION["OTP"];

$sql="INSERT INTO `otp` (user_id, otp) VALUES (".$_SESSION['userId'].", ".$OTP.")";

if($connect->query($sql)===TRUE){
    echo "success";
}else{
     echo "Error :" .$sql."<br>".$connect->error;
}



?>