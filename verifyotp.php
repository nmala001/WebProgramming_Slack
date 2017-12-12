<?php
session_start();
require_once './php_action/db_connect.php';

global $connect;

    $user_id = $_SESSION['userId'];
    $OTP = $_REQUEST['otp'];
	
	$sql1="SELECT * from otp o JOIN user u ON o.user_id = u.user_id where u.user_id = '$user_id' and o.otp='$OTP' ";
	//echo $sql1;
	$result = $connect->query($sql1);

	if($result->num_rows>=1){
        $row=$result->fetch_assoc();
        
        echo $row['username'];
    }else{
		//echo "Error :" .$sql1."<br>".$connect->error;
   }




?>