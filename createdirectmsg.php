<?php
require_once './php_action/db_connect.php';
session_start();
$user_id=$_SESSION["userId"];
$username=$_SESSION["userName"];
$receiver_id=$_REQUEST["rid"];
$receiver_name=$_REQUEST["runame"];


$msg = mysqli_real_escape_string($connect,htmlspecialchars($_REQUEST["msgcontent"],ENT_QUOTES,'UTF-8'));



$sql = "INSERT INTO `direct_message` (dmessage_id,sender_id,receiver_id,message_desc,create_on,sender_name, receiver_name) VALUES (NULL,".$_SESSION['userId'].",".$receiver_id.", '".$msg."',CURRENT_TIMESTAMP ,'".$username."','".$receiver_name."')";


    if($connect->query($sql)===TRUE)
    {
        
        $last_id= $connect->insert_id;
        echo $last_id;
    }
    else 
    {
            echo "Error :" .$sql. "<br>" .$connect->error;
    }
    
 ?>