<?php
include("dashboard.php");
require_once 'php_action/db_connect.php';

/*if(isset($_POST['submit'])){


//$submit = $mymysqli -> real_escape_string($_POST['search']);

//Query the database

//$resultset = $mysqli -> query("SELECT * FROM ")


	$message = $_POST['message'];
	$username = $_POST['username'];
	$channel = $_POST['channel'];

	$sql = "INSERT into message values('$message')";
	$query = mysql_query($sql);

	if(!$query)

		echo mysql_error();

	else

		echo "succesfully inserted";

}*/


?>


<!DOCTYPE html>
<html>
<head>
	<title>Channel</title>
</head>
<style>

#channel1{

	margin-left:600px;
}

#textarea{

	margin-top: 630px;
	

}
</style>
<body>

<div id= "channel1">

<h1>Channel 1</h1>

<div id="textarea">

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

<textarea  rows="2" cols="100" name="message"  placeholder="Type your message here..."></textarea>


 <input type="submit" value="submit">
 </form>

</div>
	

</div>
</body>
</html>