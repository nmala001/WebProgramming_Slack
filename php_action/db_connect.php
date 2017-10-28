<?php  

$localhost = "127.0.0.1";
$username = "root";
$password =  "1234";
$dbname  = "slack";


$connect = new mysqli($localhost,$username,$password,$dbname);


if($connect-> connect_error){


	die("Connection Failed:" .$connect->connect_error);
}else

{

	//echo "Successfully connected";
}



?>
