<?php
session_start();
if(isset($_POST['submit']))
{
 mysql_connect('localhost','root','') or die(mysql_error());
 mysql_select_db('accounts') or die(mysql_error());
 $email=$_POST['email'];
 $password=$_POST['password'];
 if($email!=''&&$password!='')
 {
   $query=mysql_query("select * from users where email='".$email."' and password='".$password."'") or die(mysql_error());
   $res=mysql_fetch_row($query);
   if($res)
   {
    $_SESSION['email']=$email;
    header('location:welcome.php');
   }
   else
   {
    echo'Your entered incorrect useremail or password';
   }
 }
 else
 {
  echo'Enter both username and password';
 }
}
?>