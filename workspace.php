<? php
require_once "php_action/db_connect.php";
global $connect;

session_start();

if(isset($_SESSION['workSpace'])){
  header('location: http://localhost/WebProgramming_Slack/index.php');
}

 if($_POST){
		$wsname = $_POST['workspace'];

		echo $wsname;
		   if(empty($wsname))
		   {
		   		if($wsname == "")
		   		{
		   		$errors[] = "Workspace name is required";
		   		}

		   }
		   else
			{
				$sql = "SELECT wname FROM workspace WHERE wname = '$wsname'";
				
					if(!$sql)
					{
							$errors[] = "Incorrect workspace";
							
					}
					else{

						$_SESSION['workSpace'] = $wsname;
	
						header('location: http://localhost/WebProgramming_Slack/index.php');
				    }
					
			}
}

?>
       
<html>


<style>
  body {
  padding-top: 80px;
  text-align: center;
  font-family: monaco, monospace;
  background: url(https://thebluestimes.files.wordpress.com/2012/12/blue-background-white-lines-texture-background-451_1.jpg?w=1200) 50%;
  background-size: 100% 100%;
}
h1, h2 {
  display: inline-block;
  background: #fff;
}
h1 {
  font-size: 30px;
}
h2 {
  font-size: 20px;
}
span {
  background: #631944;
}
</style>

<body>
<h1>Welcome to <span>U Can Count On Me</span></h1><br>
<h2>We rise by lifting others</h2>
<!--<form action="<?php echo $_SERVER['PHP_SELF']?> method="POST"> -->
	<form action="index.php" method="POST">

  <h3>Jump in to your workspace</h3><br>
    <input type="text" name="workspace"></input>
    <input type="submit" name="continue"></input>
</form>
</body>
</html>
