<?php

require_once 'php_action/db_connect.php';


session_start();

if(isset($_SESSION['userId']) && isset($_SESSION['userName'])){
  header('location: dashboard.php');
}

$errors = array();
$error=false;

if($_POST){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(isset($_POST['g-recaptcha-response']))
          $captcha=$_POST['g-recaptcha-response'];

    if(!$captcha){
      $errors[] = "Captcha is not checked";
      $error=true;
          echo '<script language="javascript">';
          echo 'alert("Please check the the captcha form.")';
          echo '</script>';
          //echo "Please check the the captcha form.";
      }
      $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Ld4aDsUAAAAAEt7IOzvYQ1etEXCNvfuOPod6bsu&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
       if($response['success'] == false)
        {
        	$error=true;
        	echo '<script language="javascript">';
          echo 'alert("Please check the the captcha form.")';
        	echo '</script>';
          //echo '<h2>Please check the the captcha  form!</h2>';
        }

		   if(empty($username)||empty($password)){

		   	if($username == ""){
		   		$error=true;
		   		$errors[] = "Username is required";
		   	}
		   	if($password == ""){
		   		$error=true;
		   		echo '<script language="javascript">';
          echo 'alert("Password is required")';
        	echo '</script>';
		   		$errors[] = "Password is required";

		   }

	}elseif($error==false){

		$sql = "SELECT * FROM user WHERE username = '$username'";
		$result = $connect ->query($sql);

		if($result-> num_rows == 1){

			$password = md5($password);

			$mainSql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect -> query($mainSql);

			if($mainResult-> num_rows == 1){

				$value = $mainResult -> fetch_assoc();
				$user_id = $value['user_id'];
				$username = $value['username'];
				// print($username); die;

				//set session

				$_SESSION['userId'] = $user_id;
				$_SESSION['userName'] = $username;

					if ($username == "Admin"){
						header('location: dashboard_admin.php');
						
					}else{
						header('location: dashboard.php');
					}
			}else{

			$errors[] = "Incorrect username/password combination";


		}
	}else{

			$errors[] = "Username does not exists";
		}
	}
}




?>

<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="utf-8">	
	<title>Stud-Collab</title>

	<!--custom css -->

	<link rel="stylesheet" type="text/css" href="custom/css/custom.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	
<style>
body {
    background-image: url(" /images/img2.jpg");
    background-size: cover;
}
</style>

</head>


<body>
        <div class="top_block row" style="background: linear-gradient(to bottom, #ff8c60 10%, rgba(255, 89, 10, 0.16) 90%); margin-top: 5px;">
							<div class ="col-sm-2">
								<img class="img-responsive rounded" src="images/img4.jpg" alt="icon" style="border-radius: 25px; border: 3px solid #71d051;">
							</div>
						<div class ="col-sm-10 ">
						<h1 style="text-align:center"><b style="font-size:100">Welcome to Slack!!!</b></h1>
						</div>
							
        </div>
		<br><br>
				<div  class= "container">
									<div class="row vertical">

												<div class="col-md-5 col-md-offset-4">

																<div class="panel panel-default">
																				<div class="panel-heading">
																					<h3 style="text-align:center" class="panel-title"> <b>Sign In</b></h3>
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
																													<div class="g-recaptcha" data-sitekey="6Ld4aDsUAAAAACcz3qALipBOLjhjl9UwFieJK9tm"></div>
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
