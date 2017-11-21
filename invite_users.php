<?php
session_start();
require_once 'php_action/db_connect.php';
require_once 'queries.php';
require_once 'dashboard.php';


?>

<html>

<head>
	<title>Invite-Users</title>

	<!--custom css -->

	<link rel="stylesheet" type="text/css" href="custom/css/custom.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="./tinymce/tinymce.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style type="text/css">
    
       table.dataTable tr.odd { background-color: white;  border:1px lightgrey;}
        table.dataTable tr.even{ background-color: white; border:1px lightgrey;}

        #searchResults{
          z-index: 1000;
          width:100%;
        }
        #searchResults a{
            display: block;
            text-decoration: none;
            padding: 5px;
        }
        #searchResults a:hover{
            background: #e4f0ff;
        }

  </style>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Stud-Collab</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="invite_users.php">Invite Users</a></li>
        <li><a href="#">Help</a></li>
        <li><a href="#">Settings</a></li>
        <li><button class="btn btn-primary navbar-btn createbutton">Create A Channel</button></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><input type="text" id="searchUser" style="margin-top: 10px;color:black;" onkeyup="search()" />
          <div id="searchResults" style="display: inline;position: absolute;background: white;color: blue;"></div>
        </li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php
                  $welcome = "Welcome" ."       " .$username;
                  echo htmlspecialchars_decode($welcome);
             ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href=".\Profile.php">Profile</a></li>
          <li><a href=".\UserMetrics.php">Usage</a></li>
        </ul>
      </li>
              <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Signout</a>
      </ul>

    </div>
  </div>
</nav>

</html>
</body>