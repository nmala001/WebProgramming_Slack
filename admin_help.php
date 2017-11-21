<?php
session_start();
require_once 'php_action/db_connect.php';
require_once 'queries.php';

$user = $_SESSION['userId'];
$username = $_SESSION['userName'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin-Collab</title>

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
  <script type="text/javascript">
    
    var uname="<?php echo $_SESSION['userName']?>";
    var uid="<?php echo $_SESSION['userId']?>";
    var selChannel=0;
    var lastMsgId=0;

  </script>
</head>

<body >

<!-- Message Box-->

<!--Creating a channel-->

  <div class="modal fade openchannel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Create a Channel</h4>
        </div>
        <div class="modal-body">
          <form action="queries.php" method="POST">
            <div class="form-group">
              <label for="channel_name">Channel Name</label>
              <input type="text" class="form-control" id="channel_name"  placeholder="Eg: Team-Work">
            </div>
            <div class="form-group">
            <label for="channel_type">Channel Type</label><br>
            <input type="radio" name="channel_type" id = "channel_type" value="public">Public<br>
            <input type="radio" name="channel_type" id = "channel_type" value="private">Private
            </div>
          </form>     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class=" channelbutton btn btn-primary" name= "channelbutton">Create Channel  

           <?php   if(isset($_POST['channelbutton'])) {  

            insertChannels(); 

            }

            ?> 
              
            </button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Admin-Collab</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="dashboard_admin.php">Home</a></li>
      <li><a href="admin_create_new_users.php">Create New Users</a></li>
      <li><a href="admin_add_new_users.php">Add Users</a></li>
      <li><a href="admin_archive_unarchive.php">Archive/Un-Archive</a></li>
      <li class="active"><a href="#">Help</a></li>
        <li><a href="admin_settings.php">Settings</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>  <?php

                              $welcome = "Welcome" ."       " .$username;
                               echo htmlspecialchars_decode($welcome);
                            ?></a></li>
            <li>
              <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Signout</a>
            </li>
      </ul>

    </div>
  </div>
</nav>
<div class="container-fluid">
            <h2 class ="well well-sm" align="center"><b>Help</b></h2>
</div>
<!-- <div class="container-fluid">
    <div class="col-sm-3" style="margin:0px;">
      <div class="list-group">

        //  <?php 
        //      $sql = "SELECT * FROM `channel` where channel_type='public' UNION SELECT * From `channel` where channel_type='private' and created_by=".$user." union select * from channel where channel_id in (select channel_id from user_channel where user_id=".$user.")";

            
         //         $result = $connect-> query($sql);

           //       if ($result->num_rows > 0) {
                 
            //        while($row = $result->fetch_assoc()) {
            //              echo "<a class='list-group-item' href='javascript:showChannel(".$row['channel_id'].")'> ".$row['channel_name']." </a>";
            //         }
            //      }
          //  ?>
      </div>
    </div>

    <div class="col-sm-9">
        <div id="channelChat">
          
        </div>
        <div class="form-group">
        <textarea id="textmsg"></textarea><button class="btn btn-primary" onclick="sendMessageToChannel()">Send</button>
      </div>
    </div>
</div> -->

</body>

</html>
