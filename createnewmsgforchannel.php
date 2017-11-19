<?php
/*to insert messages*/
session_start();
require_once('./php_action/db_connect.php');

     $replyid= $_POST["replymsgid"];
 //  $channel_id= mysqli_real_escape_string($connect, $_REQUEST['channel_id']);
 //  $message = mysqli_real_escape_string($connect, htmlspecialchars($_REQUEST['message']));

  $channel_id=  $_POST["channel_id"];
   $message = htmlspecialchars($_POST["message"]);


$sql = "INSERT INTO `message` (message_id,created_by,created_time,reply_msg_id, message,ch_id) VALUES (NULL,".$_SESSION['userId'].", CURRENT_TIMESTAMP,".$replyid.", '".$message."', ".$channel_id.")";

    if($connect->query($sql)===TRUE)
    {
    	$last_id= $connect->insert_id;
    	echo $last_id;/*Msg id*/
    }
    else 
    {
    		echo "Error :" .$sql. "<br>" .$connect->error;
   	}
   	
 ?>