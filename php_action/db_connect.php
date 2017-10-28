<?php  

$localhost = "localhost";
$username = "admin";
$password =  "M0n@rch$";
$dbname  = "slack";


$connect = new mysqli($localhost,$username,$password,$dbname);


if($connect-> connect_error){


	die("Connection Failed:" .$connect->connect_error);
}else

{

	//echo "Successfully connected";
}



?>
