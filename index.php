<?php

require_once 'php_action/db_connect.php';


session_start();

if(isset($_SESSION['userId']) && isset($_SESSION['userName'])){
  header('location: dashboard.php');
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
		

		if($result-> num_rows == 1){

			$password = md5($password);

			$mainSql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect -> query($mainSql);

			
			if($mainResult-> num_rows == 1){

				$value = $mainResult -> fetch_assoc();
				$user_id = $value['user_id'];
				$user_name = $value['user_name'];


				//set session

				$_SESSION['userId'] = $user_id;
				$_SESSION['userName'] = $username;


				header('location: dashboard.php');
			}




			




			else{

			$errors[] = "Incorrect username/password combination";


		}
	}else{

			$errors[] = "Username does not exists";
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
	
<style>
body {
    background-image: url(" /images/img2.jpg");
    background-size: cover;
}
</style>

</head>


<body>
        <div class="top_block">
   <h1> <img src="/images/img4.jpg" class="img-circle" alt="icon" style="float:left;width:400px;height:400px;"><font size="300">Welcome to Slack</font></h1>
        </div>
<div class= "container">
	<div class="row vertical">

		<div class="col-md-5 col-md-offset-4">

			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"> Sign In</h3>
			  </div>
			  <div class="panel-body">

			  	<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="loginForm">
				  <div class="form-group">
				    <label for="username" class="col-sm-2 control-label">Username</label>
				    <div class="col-sm-12">
				      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="password" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-12">
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
				      <button type="submit" class="btn btn-success" style="width: 30%">Submit</button>
				    </div>
				  </div>
				  <a href="signup.php">Not a member?Sign in here</a>
				</form>
			  </div>
			</div>
		</div>
	</div>

</div>



</body>

</html>
