<?php

require_once 'php_action/db_connect.php';

session_start();

if(isset($_SESSION['userId'])){
  header('location: http://localhost/WebProgramming_Slack/dashboard.php');
}

$errors = array();

if($_POST){
		$username = $_POST['username'];
		$password = $_POST['password'];

		   if(empty($username)||empty($password)){

		   	if($username == ""){

		   		$errors[] = "Username is required";
		   	}
		   	if($password == ""){

		   		$errors[] = "Password is required";
		   }

	}else{

		$sql = "SELECT * FROM user WHERE username = '$username'";
		$result = $connect ->query($sql);

		if($result-> num_rows > 0){

			$password = md5($password);

			$mainSql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect -> query($mainSql);

			if($mainResult-> num_rows >0){

				$value = $mainResult -> fetch_assoc();
				$user_id = $value['user_id'];


				//set session

				$_SESSION['userId'] = $user_id;

				header('location: http://localhost/WebProgramming_Slack/dashboard.php');
			}else{

			$errors[] = "Incorrect username/password combination";


		}
	}else{

			$errors[] = "Username doesnot exists";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Stud-Collab</title>

	<!--custom css -->

	<link rel="stylesheet" type="text/css" href="custom/css/custom.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	




</head>

<style>

body {
    position: relative;
    overflow-x: hidden;

}
body,
html { height: 100%;}

</style>


<body>

<div class= "container">
	<div class="row vertical">

		<div class="col-md-5 col-md-offset-4">

			<div class="panel panel-info">
			  <div class="panel-heading">
			    <h3 class="panel-title">Please Sign In</h3>
			  </div>
			  <div class="panel-body">

			  	<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="loginForm">
				  <div class="form-group">
				    <label for="username" class="col-sm-2 control-label">Username</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="password" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <div class="checkbox">
				        <label>
				          <input type="checkbox"> Remember me
				        </label>
				      </div>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Sign in</button>
				    </div>
				  </div>
				</form>
			  </div>
			</div>
		</div>
	</div>

</div>
</body>
</html>
