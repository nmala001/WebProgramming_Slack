<?php
require_once 'php_action/db_connect.php';
session_start();
$user_id=$_SESSION["userId"];
$uemail=$_SESSION["useremail"];
$pic_select=$_REQUEST["pic_preference"];

if($pic_select==2){
	$sql = "UPDATE profile_pic SET pic_select=2, img_path='./uploads/images/default.png'  WHERE user_id=$user_id";
	//echo $sql;
    if($connect->query($sql)===TRUE)
    {	
		echo "./uploads/images/default.png";
	}
	else {
		echo "error";
	}
}

else if ($pic_select==0){
$sql1 = "UPDATE profile_pic SET pic_select=0, img_path='./uploads/images/".$user_id.".jpeg'  WHERE user_id=$user_id";

if($connect->query($sql1)===TRUE)
    {	
		echo "./uploads/images/$user_id.jpeg";
	}
	else {
		echo "error";
	}
}
else if($pic_select=1) {

//$default = "./uploads/images/default.png";
$default ="wavatar";
$size = 40;
$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $uemail ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
$userPictureURL=$grav_url;  
$sql2 = "UPDATE profile_pic SET pic_select=1, img_path='$userPictureURL'  WHERE user_id=$user_id";

if($connect->query($sql2)===TRUE)
    {	
		echo "$userPictureURL";
	}
	else {
		echo "error";
	}


}

else{

	alert("Image upload failed");
}




?>