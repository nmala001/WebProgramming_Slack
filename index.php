<?php
session_start();
//require_once 'php_action/db_connect.php';
// $random_number = int rand(	);

//include 'two_factor_authentication.php';

//$OTP = $_SESSION['OTP'];
//var_dump($OTP);
?>
$error=false;

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

	<!--custom css -->
		   		$error=true;
	<link rel="stylesheet" type="text/css" href="custom/css/custom.css">
		   		$error=true;
		   		echo '<script language="javascript">';
          echo 'alert("Password is required")';
        	echo '</script>';
		   		$errors[] = "Password is required";

		   }
	}elseif($error==false){

		$result = $connect ->query($sql);
					
					
			

      /* if(messageotp==rand){

        if(username == "Admin"){

			window.location.href = "dashboard_admin.php";
			
		}else{
			window.location.href = "dashboard_admin.php";

			//window.location.href = "dashboard.php";
					
			}
		
	  }else{

		alert("The OTP that you entered is incorrect!!");

	  } */


	

	/* function insertOTP(){
				var otp = document.getElementById('OTP').value
				
				$.ajax({
							type: 'post',
							url: 'two_factor_authentication.php',
							data:"otp="+otp, 
							success: function(response){
								

								},
								error: function(response){
								//var messageotp =response;	
      							console.log("error");}
							});
	}


								$('#verifyOTP').on('click', function() {
								 // event1.preventDefault();
								  var otp = document.getElementById('OTP').value
								  

								  if(rand == otp){

									header('location: dashboard.php');
								  }
    							  


	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<script>
var messageotp=0;
	var rand = 0;
	var username="";

	 function verOTP(){
		rand = document.getElementById('otpnew').value;
			if(parseInt(rand)==parseInt(messageotp)){
				$.ajax({
							type: 'post',
							url: 'verifyotp.php',
							data:"otp="+messageotp, 
							success: function(response){
								  if(response == "Admin"){
									window.location.href = "dashboard_admin.php";
									}else if(response != "Admin"){
									window.location.href = "dashboard.php";
									}else{
									alert("Username or Password is incorrect");
										}
								},
							error: function(response){
								
								  console.log("error");
							}
						});
			}else{
				alert("OTP is incorrect");
			}				
	}

function showDiv(){
		document.getElementById('welcomeDiv').style.display = "block";
				console.log("show div func");
				var username=document.getElementById('username').value;
				var password=document.getElementById('password').value;
				 
				 
				
				$.ajax({
							type: 'post',
							url: 'two_factor_authentication.php',
							data:"uname="+username+"&pwd="+password+"&name=login", 
							success: function(response){
								messageotp = response;
								//alert(messageotp);
								
								  console.log("OTP has been sent");
								  //header('location: dashboard.php');
								
								},
								error: function(response){
								//var messageotp =response;	
      							console.log("error");}
							});
	}

	</script>
<style>
body {
    /* background-image: url(" /images/img2.jpg"); */
    background-size: cover;
}
</style>

</head>


<body>
        <div class="top_block row" style="background: linear-gradient(to bottom, #33b7b7 10%, #f5f5f5 90%); margin-top: 5px;">
							<div class ="col-sm-2">
								<img class="img-responsive rounded" src="images/img4.jpg" alt="icon" style="border-radius: 50px;margin: 15px; border: 3px solid #ffffff;">
							</div>
						<div class ="col-sm-10 " style= "padding-top:50px">
						<hr >	
						<div><strong><h4 style = "color:#000000;" align="center"><font size="100">SLACK </font></h4></div>
						<div style = "color:#ff0080;"><marquee >On a mission to make your work life simpler pleasant and more productive </marquee></div>
						</strong>
						<hr >
						</div>
						
		</div>
		<br><br>
				<div  class= "container">
					<div class="row vertical">
							<div class="col-md-5 col-md-offset-4">
													<div class="well"  class="panel panel-default">
										<div class="panel-heading">
											<h3 align="center" class="panel-title"> <b>Sign In</b></h3>
										</div>
										<div class="panel-body">

												<div class="col-md-5 col-md-offset-4">

																<div class="well" class="panel panel-default">
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
														<button id = "submit_login" onclick ="showDiv()" type="button" class="btn btn-success" style="width: 30%">Submit</button>
													</div>
												</div>
												<div id="welcomeDiv" align="center"  style="display:none;margin-top: 5px;border-radius: 25px; border: 3px solid #ffffff; " class="answer_list" >
													<b> Enter OTP Below</b>
													<input type="number" class="form-control otpnew" id="otpnew" name="otpnew" placeholder="OTP"></input>
													<button id = "verifyOTP" type="button" onclick = "verOTP()" class="btn btn-default" style="width: 30%"> Verify OTP</button>
													
													</div>
													<div style = "margin-top:25px;">
												<a class= "col-sm-offset-2" href="signup.php">Not a member? Sign in here</a>
												</div>
											</form>
										</div>
										</div>
									</div>
									</div>

							</div>



</body>

</html>
