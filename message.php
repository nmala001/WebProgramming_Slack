<?php
require_once './php_action/db_connect.php';
session_start();
//$user_id=$_SESSION["user_id"];
//$username=$_SESSION["username"];
$channel_id=$_REQUEST["channel_id"];



$sql="SELECT m1.message_id, m1.created_time,u.username,u.user_id,IFNULL(p.img_path,'default.png') as img_path,m1.message,m1.reply_msg_id,m2.message as reply,u2.username as replied_by,(SELECT count(*) FROM `reactions` where message_id=m1.message_id and reaction=1) as likes,(SELECT count(*) FROM `reactions` where message_id=m1.message_id and reaction=0) as dislikes FROM `message` m1 left join message m2 on m1.reply_msg_id=m2.message_id left join user u on m1.created_by=u.user_id left join user u2 on m2.created_by=u2.user_id left join profile_pic p on u.user_id=p.user_id WHERE m1.ch_id ='$channel_id'";


$result = $connect->query($sql);
$messages=array();
//echo $sql."<br>";
if($result->num_rows> 0)
{

	/*echo "success";*/
	while($row=$result->fetch_assoc()){
		$row["message"]=htmlspecialchars_decode($row["message"]);
		$messages[]=$row;

	}
	echo json_encode($messages);

}
else
{
	echo "Error";
}
?>
