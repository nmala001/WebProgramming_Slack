
<?php
session_start();
require_once '../php_action/db_connect.php';

$user = $_SESSION['userId'];
//$username = $_SESSION['userName'];


//Archive Unarchive 
if($_SERVER["REQUEST_METHOD"]=="POST"){ 
$cid=$_REQUEST['cid'];
$arcUnarc=$_REQUEST['archUnarch'];
//echo($cid);
//echo($arcUnarc);
        if ($arcUnarc == 1){
                            $sql = "UPDATE slack.channel SET archive = 1 WHERE channel_id =".$cid;
                            if($connect->query($sql)===TRUE){
                                    echo "Archived the channel Sucessfully";
                                }else{
                                        echo "Error :" .$sql."<br>".$connect->error;
                                }
                         }else if ($arcUnarc == 0){
                            $sql = "UPDATE slack.channel SET archive = 0 WHERE channel_id = ".$cid;
                            if($connect->query($sql)===TRUE){
                                    echo "UnArchived the channel Sucessfully";
                                }else{
                                        echo "Error :" .$sql."<br>".$connect->error;
                                }
            }             
    

}

?>
