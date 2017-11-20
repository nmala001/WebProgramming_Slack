<?php

require_once './php_action/db_connect.php';
session_start();

$keyword=mysqli_real_escape_string($connect,htmlspecialchars($_REQUEST["key"]));

$sql_users="select user_id,username from user where username like '%".$keyword."%'";
$result = $connect->query($sql_users);
$users=array();
while($row=$result->fetch_assoc()){
    $users[]=$row;
  }

  echo json_encode($users);

  ?>