<?php
require_once './php_action/db_connect.php';
session_start();
//$user_id=$_SESSION["user_id"];
//$username=$_SESSION["username"];
$user_id=$_SESSION["userId"];
$receiver_id=$_REQUEST["rid"];
//echo $user_id;
//echo $receiver_id;
//$sql="SELECT * FROM direct_message WHERE (sender_id=$user_id or sender_id=$receiver_id) and (receiver_id=$user_id or receiver_id=$receiver_id)";
$sql="SELECT m.*,p1.img_path as sender_img,p2.img_path as receiver_img FROM direct_message m left join profile_pic p1 on m.sender_id=p1.user_id left join profile_pic p2 on m.receiver_id=p2.user_id WHERE (m.sender_id=$user_id or m.sender_id=$receiver_id) and (m.receiver_id=$user_id or m.receiver_id=$receiver_id)";
//echo $sql;
$result = $connect->query($sql);
$messages_direct=array();
//echo $sql."<br>";
if($result->num_rows> 0)
{

	/*echo "success";*/
	while($row=$result->fetch_assoc()){
		$row["message_desc"]=htmlspecialchars_decode($row["message_desc"]);
		$messages_direct[]=$row;

	}
	echo json_encode($messages_direct);

}
else
{
	echo json_encode($messages_direct);
}
?>