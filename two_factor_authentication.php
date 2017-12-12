<?php
session_start();
/* error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump"); */
$OTP= rand(10001,99999) . "\n";


$_SESSION['OTP'] = $OTP;
include 'C:\xampp\htdocs\Projects_AM\WebProgramming_Slack\php_action\db_connect.php';


/*if(isset($_SESSION['userId']) && isset($_SESSION['userName'])){
  header('location: dashboard.php');
}*/

$name = $_REQUEST['name'];
if($name == "login") {
	login($OTP);
} else if ($name == "vOTP") {
	verifyOTP($OTP);
}

$errors = array();


function login($OTP) {
	$username = $_REQUEST['uname'];
	$password = $_REQUEST['pwd'];
//echo $username;
//echo $password;
	if(empty($username)||empty($password)){
		if($username == ""){
			$errors[] = "Username is required";
		}
		if($password == ""){
			$errors[] = "Password is required";
		}
	}else{


		global $connect;

		$sql = "SELECT * FROM user WHERE username = '$username'";
		$result = $connect ->query($sql);
		if($result-> num_rows == 1){
			$password = md5($password);
			$mainSql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
			//echo $mainSql;
			$mainResult = $connect -> query($mainSql);

			if($mainResult-> num_rows == 1){

				$value = $mainResult -> fetch_assoc();
				$user_id = $value['user_id'];
				$username = $value['username'];
				$email = $value['email'];
				//print($email); die;

				//set session

				$_SESSION['userId'] = $user_id;
				$_SESSION['userName'] = $username;
				$_SESSION['email']= $email;
				sendOTP($OTP);
				//verifyOTP($OTP);
				//var_dump($user_id);
	//console.log($email);
					
			} else{
				$errors[] = "Incorrect username/password combination";
			}	
		}else{
			$errors[] = "Username does not exists";
		}
	}
}


function sendOTP() {
	$email= $_SESSION['email'];
	$username=$_SESSION['userName'];
	//var_dump($email);
	//var_dump($username);
	
	$OTP= rand(10001,99999) . "\n";

	//echo $OTP;
	
	//$_SESSION["OTP"] = $OTP; 
	//echo($_SESSION['OTP']);
	//$email;
	$subject = 'Slack One Time Password';
	$message = 'Please Enter the OTP to Login to slack Your One Time Password is' .$OTP;
	$headers = 'From: nandith.malapati@gmail.com' . "\r\n" .
		'Reply-To: nandith.malapati@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
	
	$success = mail($email, $subject, $message, $headers);
	//if($success){
	
	  //echo "success";
	  global $connect;
	  
	  $sql="INSERT INTO `otp` (user_id, otp) VALUES (".$_SESSION['userId'].", ".$OTP.")";
	  
	  if($connect->query($sql)===TRUE){
		 echo $OTP;
	  }else{
		   echo "Error :" .$sql."<br>".$connect->error;
	  }
	 // print_r(error_get_last());
	// } else {
	//   //echo "not sent";
	//   $errorMessage = error_get_last()['message'];
	//   echo $errorMessage;
	// }
}

/* function verifyOTP($OTP) {
	global $connect;

	$user_id = $_SESSION['userId'];
	
	$sql1="SELECT * from otp o JOIN user u ON o.user_id = u.user_id where u.user_id = '$user_id' and o.otp='$OTP' ";
	
	$result = $connect->query($sql1);

	if($result->num_rows>=1){
		$row=$result->fetch_assoc();
		if ($row['username'] == "Admin"){
			header('location: dashboard_admin.php');
		}else{
			header('location: dashboard.php');
		}


	}else{
		//echo "Error :" .$sql."<br>".$connect->error;
   }
	   
} */
?>
