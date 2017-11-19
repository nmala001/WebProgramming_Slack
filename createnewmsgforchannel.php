<?php
/*to insert messages*/
session_start();
<<<<<<< HEAD
require_once('./php_action/db_connect.php');

     $replyid= $_POST["replymsgid"];
 //  $channel_id= mysqli_real_escape_string($connect, $_REQUEST['channel_id']);
 //  $message = mysqli_real_escape_string($connect, htmlspecialchars($_REQUEST['message']));

  $channel_id=  $_POST["channel_id"];
   $message = htmlspecialchars($_POST["message"]);


$sql = "INSERT INTO `message` (message_id,created_by,created_time,reply_msg_id, message,ch_id) VALUES (NULL,".$_SESSION['userId'].", CURRENT_TIMESTAMP,".$replyid.", '".$message."', ".$channel_id.")";
=======
require_once './php_action/db_connect.php';

   /*$created_by= $_SESSION['user_id'];*/
   $channel_id= mysqli_real_escape_string($connect, $_REQUEST['channel_id']);
   $message = mysqli_real_escape_string($connect, htmlspecialchars($_REQUEST['message']));
     $reply_msg_id= mysqli_real_escape_string($connect, $_REQUEST['replymsgid']);

$sql = "INSERT INTO `message` (message_id,created_by,created_time,reply_msg_id, message,ch_id) VALUES (NULL,".$_SESSION['userId'].", CURRENT_TIMESTAMP,".$reply_msg_id.",' ".$message."',".$channel_id.")";
>>>>>>> 9c074763af46e20b800c3078d0a4dfdf244c5eee

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