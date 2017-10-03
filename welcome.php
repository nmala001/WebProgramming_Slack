<?php     
         session_start();
         $email=$_SESSION['email'];     
         echo'welcome :'.$email.'<br>';
         echo'<a href="signout.php">Signout</a>';
?>