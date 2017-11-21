<?php
session_start();
require_once 'php_action/db_connect.php';

$channel_name = $_REQUEST['cname'];
//$username = $_SESSION['userName'];
global $connect ;
//echo $channel_name;
//Adding users to a channel private user
$sql="SELECT distinct(u.username),u.user_id,c.channel_id from user AS u,channel AS c where u.username NOT IN(SELECT distinct user.username from user,channel,user_channel where channel.channel_name='$channel_name' and channel.channel_id=user_channel.channel_id and user_channel.user_id=user.user_id) and c.channel_name='$channel_name' and u.username!='Admin'";
         //echo $sql;
         $result = $connect->query($sql);

$matchedusers=array();
//echo $sql;
//var_dump($result);
if ($result->num_rows > 0) {
	//echo "in the result";
    // output data of each row
    while($row = $result->fetch_assoc()) {
  		 $matchedusers[]=$row;
    }

    echo json_encode($matchedusers);
}
    else
    {
        echo "Error";
    }




?>