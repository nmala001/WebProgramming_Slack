<?php
/*to insert messages*/
session_start();
header('Content-Type: text/html; charset=iso-8859-1');
require_once('./php_action/db_connect.php');

     $replyid= $_POST["replymsgid"];
 //  $channel_id= mysqli_real_escape_string($connect, $_REQUEST['channel_id']);
 //  $message = mysqli_real_escape_string($connect, htmlspecialchars($_REQUEST['message']));

  $channel_id=  $_POST["channel_id"];
   $message = mysqli_real_escape_string($connect,htmlspecialchars($_POST["message"],ENT_QUOTES,'UTF-8'));

echo $_POST["message"]."<br>";
//echo htmlspecialchars($_POST["message"]);

$sql = "INSERT INTO `message` (message_id,created_by,created_time,reply_msg_id, message,ch_id) VALUES (NULL,".$_SESSION['userId'].", CURRENT_TIMESTAMP,".$replyid.", '".$message."', ".$channel_id.")";

//echo $sql;

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
