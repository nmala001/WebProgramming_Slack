<?php
session_start();
require_once 'php_action/db_connect.php';

echo "In pre_dash page";
$client_id = "4121dae809fdd1bbec46";
$redirect_url = "http://nmala001.cs518.cs.odu.edu/dashboard.php";
$client_secret ="b8194c65ca1393fcb1d9325ac22a222886316041"; 

$url = 'https://github.com/login/oauth/access_token';

$fields = array(
		'client_id' => urlencode("4121dae809fdd1bbec46"),
		'client_secret' => urlencode("b8194c65ca1393fcb1d9325ac22a222886316041"),
		'code' => urlencode($_GET['code'])
);

foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

$result = json_decode(curl_exec($ch),TRUE);
echo "access token is after 1st step:".$result["access_token"]."<br>";

curl_close($ch);

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://api.github.com/user?access_token=".$result["access_token"]);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'http://developer.github.com/v3/#user-agent-required');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
$output=json_decode(curl_exec($ch),TRUE);
//var_dump($output);
curl_close($ch);

$username=$output["login"];
$_SESSION["userName"]=$output["login"];
$email=$output["email"];
$_SESSION["payload"]=$output;

            
            $sql = "SELECT * FROM user WHERE username = '$username'";
		     $result = $connect ->query($sql);
            if($result-> num_rows == 1){
				$value = $result -> fetch_assoc();
                $_SESSION['userId'] = $value["user_id"];
            }else{
             $stmt="INSERT INTO `user`(`username`, `email` ,`password`) VALUES ('".$username."','".$email."','')";
		 mysqli_query($connect,$stmt);
		$_SESSION['userId'] = $connect->insert_id;
            //insert query to put username ;
            }
            

header("location: dashboard.php?uname=".$username);

?> 
