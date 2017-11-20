<?php
require_once './php_action/db_connect.php';
session_start();
/*$user_id=$_SESSION["user_id"];*/


	$channel_name = mysqli_real_escape_string($connect,htmlspecialchars($_REQUEST['channel_name']));
	$channel_type = mysqli_real_escape_string($connect,$_REQUEST['channel_type']);


/*for public channel,updating channel table only*/
if($channel_type=='public')
{
$sql = "INSERT INTO `channel` (channel_id, channel_name, channel_type, created_by, created_time) VALUES (NULL, '".$channel_name."', '".$channel_type."', ".$_SESSION['userId'].", CURRENT_TIMESTAMP)";
    if($connect->query($sql)===TRUE)
    {
    	$last_id= $connect->insert_id;
    	echo $last_id;

    }
    else 
    {
    		echo "error";
   	}
}
/*if private,update both channel and user_channel table*/
else if($channel_type =='private')
{
    $sql = "INSERT INTO `channel` (channel_id, channel_name, channel_type, created_by, created_time) VALUES (NULL, '".$channel_name."', '".$channel_type."', ".$_SESSION['userId'].", CURRENT_TIMESTAMP)";
    if($connect->query($sql)===TRUE)
    {

        $sql1="INSERT INTO `user_channel` (`user_id`, `channel_id`) VALUES ('".$_SESSION['userId'].",'$channel_id')"; 
        if($connect->query($sql1)===TRUE)
        {
            $last_id= $connect->insert_id;
            echo $last_id;

         }
        else 
        {
            echo "error";
        }
    }

   	//connect->close();
}
?>
