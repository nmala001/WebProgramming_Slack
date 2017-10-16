<?php

require_once 'php_action/db_connect.php';
require_once 'queries.php';
require_once 'dashboard.php';
global $connect;




   $user_id=$_POST['user_id'];
   $channel_id=$_POST['channel_id'];
   $message=$_POST['message'];
   echo $user_id;
   echo $channel_id;
   echo $message;

    if($message!='')
    {  


   $sql = "INSERT INTO `message` (message_id,created_by,created_time,message,channel_id) VALUES (NULL, '$user_id' , CURRENT_TIMESTAMP , '$message','$channel_id' )";

   $result = $connect->query($sql);
      
      // $insertStr = ->createChannelMessage($userid,$content,$channelid);
    }

    /*header("location: ../dashboard.php?channel_id=".$channel_id);*/
?>




