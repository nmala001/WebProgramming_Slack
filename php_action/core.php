<?php

session_start();

require_once  'db_connect.php';

echo $_SESSION['userId'];
/*
global $connect;
	$sql="SELECT * FROM user WHERE user_id = ".$_SESSION['userId'].";
	$result = $connect->query($sql);
if($result->num_rows > 0){
	echo "empty";
}
else{
	while($row = $result->fetch_assoc()){
		$username = $row['username'] ;
		echo $username;
	}
}
*/
if(!$_SESSION['userId']){

	header('location: http://localhost/slack/index.php');
}


?>
<!--
<!DOCTYPE html>
<html>
<body>

<?php
print_r($_SESSION);
?>

</body>
</html>
-->