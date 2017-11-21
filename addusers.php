<?php
session_start();
require_once 'php_action/db_connect.php';


//$username = $_SESSION['userName'];


//Adding users to a channel private user
 
$userid=$_REQUEST['userid'];
$channelid=$_REQUEST['channelid'];
        global $connect;
        $sql = "INSERT INTO slack.user_channel(user_id,channel_id) VALUES (".$userid.",".$channelid.")";
        if($connect->query($sql)===TRUE){
               echo "success";
        }else{
                echo "Error :" .$sql."<br>".$connect->error;
        }




?>