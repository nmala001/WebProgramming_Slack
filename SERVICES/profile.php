<?php
require_once 'php_action/core.php';
require_once 'php_action/db_connect.php';
$user = $_SESSION['userId'];

$sql = "SELECT first_name, last_name, email,username,profile_pic FROM user WHERE user_id ='$user'";
$result = mysqli_query($connect, $sql);

while($row = mysqli_fetch_array($result))
{ 
$first_name=$row['first_name'];

$last_name=$row['last_name'];

$email=$row['email'];

$user_name=$row['username'];
$profile_pic=$row['profile_pic'];



}



function channelownership(){
  global $connect;
   $user = $_SESSION['userId'];
   $sql= "SELECT channel_name FROM channel WHERE user_id='$user'";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
   echo "Channel ownership:".$row["channel_name"]."<br>";
}
}
else {
	echo "Not a member of any channel ";
}
}


?>


<html>
<head>
	<title>User-Profile</title>
	<link rel="stylesheet" type="text/css" href="custom/css/custom.css">

</head>
<style>
body {
    
    background-color:white;
}
</style>


<body>

<header>
	<h1>User Profile</h1>
</header>
	<div class="container">
             <div class="card"><?php 

       $folder = "uploads";
       echo '<img src="'. $folder. '/'. $profile_pic. '" height="200" width="400" align="left">';
      ?>
      
       <div class="profile">
        <h1><?php echo $user_name ?></h1>
        <b>Full name : <?php echo $first_name ?>&nbsp;<?php echo $last_name ?></b>
        <p class="title"><?php  $res = channelownership(); echo htmlspecialchars_decode($res); ?></p>
        <p class="title">E-mail :<?php echo $email ?></p>
        <button onclick="closeWin()" style ="width:40%">Cancel</button>

        </div>
    </div>


    


  </div> <!-- /container -->

<!-- Button -->



 



</div>
<script>


function closeWin() {
    window.location.assign("dashboard.php");
}
</script>  
</body>
</html>
