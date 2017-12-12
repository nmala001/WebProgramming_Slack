<?php
session_start();

//session_start();
require_once('./php_action/db_connect.php');

 //  $channel_id= mysqli_real_escape_string($connect, $_REQUEST['channel_id']);
 //  $message = mysqli_real_escape_string($connect, htmlspecialchars($_REQUEST['message']));

  $channel_id=  $_REQUEST["channel_id"];

//echo "channel id ".$channel_id;

//echo "trying to upload";

	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];

	//echo $filesize;

	$fileError = $_FILES['file']['error'];
	$filetype = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('pdf','doc','docx','txt');

	if(in_array($fileActualExt, $allowed)){
		if($fileError===0){
			if($fileSize<30000000){
				$fileNameNew = uniqid('', true). "." .$fileActualExt;
				$fileDestination = 'files/' .$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				//header("Location: dashboard.php?uploadsuccess");

				//echo "uploading";

				//echo $fileDestination;

				$sql = "INSERT INTO `message` (message_id,created_by,created_time,reply_msg_id, message,ch_id, file_path) VALUES (NULL,".$_SESSION['userId'].", CURRENT_TIMESTAMP,0, ' ', ".$channel_id.", '" .$fileDestination."')";

				if($connect->query($sql)===TRUE)
				    {
				    	$message_id= $connect->insert_id;
				    	echo $message_id."|".$fileNameNew;/*Msg id*/
				    	
				    }
				    else 
				    {
				    		echo "Error :" .$sql. "<br>" .$connect->error;
				   	}

			}else{

				echo "File must be 3MB or less!!";
			}


		}else{

			echo "There was an error uploading your file!!";
		}


	}else{

		echo "You Cannot Upload files of this type";
	}
	

	//print_r($file);
	//$fileName = $_FILES['my-file']['name'



?>


