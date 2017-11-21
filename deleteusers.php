<?php
session_start();
require_once 'php_action/db_connect.php';
$userid=$_REQUEST['userid'];
$channelid=$_REQUEST['channelid'];

//echo $uid;

    // making conn as global
    global $connect;

$sql = "delete from user_channel where user_id=$userid and channel_id=$channelid";
    
   echo $sql;
    if ($connect->query($sql))
    {
      echo "User deleted from database"; 
      
    }
    else
    {
        echo "Error";
    }



?>