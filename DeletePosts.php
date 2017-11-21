<?php
session_start();
require_once './php_action/db_connect.php';

//$user = $_SESSION['userId'];
//$username = $_SESSION['userName'];


//Adding users to a channel private user
if($_SERVER["REQUEST_METHOD"]=="POST"){ 

$message_id= $_REQUEST['message_id'];
$replyid=$_REQUEST['replymsgid'];


        global $connect;
        $sql = "DELETE FROM slack.message WHERE message_id = '$message_id' OR message_id = '$replyid' ";
        if($connect->query($sql)===TRUE){
               echo "success";
        }else{
                echo "Error :" .$sql."<br>".$connect->error;
        }

}


?>