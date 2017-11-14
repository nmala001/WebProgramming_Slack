<?php
require_once './php_action/db_connect.php';
session_start();
$user_id=$_SESSION["userId"];
//$username=$_SESSION["username"];
$channel_id=$_REQUEST["channel_id"];
$last_msg_id=$_REQUEST["msg_id"];


$sql="SELECT m1.message_id,u.username,u.user_id,m1.message,m1.reply_msg_id,m2.message as reply,u2.username as replied_by FROM `message` m1 left join message m2 on m1.reply_msg_id=m2.message_id left join user u on m1.created_by=u.user_id left join user u2 on m2.created_by=u2.user_id WHERE m1.ch_id = $channel_id  and m1.message_id > $last_msg_id and m1.created_by <> $user_id";
//echo $sql;
$result = $connect->query($sql);
$messages=array();
//echo $sql."<br>";
  /*echo "success";*/
  while($row=$result->fetch_assoc()){
    $messages[]=$row;

  }
  echo json_encode($messages);
?>