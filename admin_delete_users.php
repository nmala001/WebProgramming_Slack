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

<!--<link rel="stylesheet" type="text/css" href="custom/css/custom.css">-->
  <link rel="stylesheet" type="text/css" href="style_property.css">
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
    
     
function deleteFromChannel(){
  
 var channelid = $( "#channelName option:selected" ).val();
 var channelName= $( "#channelName option:selected" ).text();
 var useridSelected = $( "#usersSelected option:selected" ).val();
 var uname = $( "#usersSelected option:selected" ).text();
          if (channelid == "0" || channelid == null) 
                      {
                          alert("Please Select Channel Name");
                      } else if(useridSelected == "0" || useridSelected == null)
                      {
                        alert("Please Select User");
                      } else{
                  $.ajax({
                              type: "post",
                              url: "services/delete_existing_users.php",
                              data: "cid=" +channelid+"&uid=" +useridSelected,
                              success: function (response) {

                                if(response=="success"){
                                  alert(uname+" is deleted successfully from "+channelName);
                                }else{
                                  alert(uname+" Not in the Channel");
                                  alert(response);
                                }
                                
                              }
                          });
                      }

}
</script>
</head>

<body >
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
        <li class="active"><a href="#">Delete Users</a></li>
        <li><a href="admin_archive_unarchive.php">Archive/Un-Archive</a></li>
        <li><a href="admin_help.php">Help</a></li>
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
  <br><br>
  <!-- Add New Users code Start -->
  <div class="container" style ="width: 25%">
    <div class="panel-group" >
 
        <div class="panel panel-primary"  >
            <div class="panel-heading" style="color:white"> 
                  <h3 align="center"><b>Delete Users From A Channel</b></h3>
            </div>
                      <div class="w3-padding-small panel-body">
                      <!-- Add New UsersForm -->
                            <form class ="form-horizontal" action="" method="">
                      <div class="form-group ">
                          <label class ="control-label col-sm-5"  for="add_new_channel"> Channel Name </label>
                          <div  class ="col-sm-7">
                                 <div class="dropdown">
                                   <!-- Select channel Name -->
                                    <select id="channelName"style="background-color:#e6e6e6;color:black" name="cars">
                                    <option value="0">Select Channel</option>
                                    <?php
                                          $sql="SELECT channel_name,channel_id FROM `channel`WHERE channel_type='private' ";
                                          $records = $connect->query($sql);
                                          while($channelName= $records->fetch_assoc()) {
                                            //Below names in side [] braces are the Column names in the DB.Table-> UserData.details.colmnname 
                                            echo "<option value='".$channelName['channel_id']."'>".$channelName['channel_name']."</option>";                               
                                            }
                                          ?>                                    
                                    <!-- Select channel Name -->
                                    </select>
                                  </div>
                          </div>
                      </div>
                      
                      <div class="form-group ">
                          <label class ="control-label col-sm-5"  for="add_users_to_channel"> Users </label>
                          <div  class ="col-sm-7">
                              <div class="dropdown">
                                   <!-- Select Users -->
                                 <select id="usersSelected" style="background-color:#e6e6e6;color:black" name="cars">
                                 <option value="0">Select User</option>
                                        <?php
                                          $sql="SELECT username,user_id FROM `user` ";
                                          $records = $connect->query($sql);
                                          while($userName= $records->fetch_assoc()) {
                                            echo "<option value='".$userName['user_id']."'>".$userName['username']."</option>";                               
                                            }
                                          ?>                                    
                                    
                                    </select> <!-- Select Users -->
                              </div>
                        </div>
                      </div>
                      <div class="form-group ">
                          <label class ="control-label col-sm-4"  for="submit_button"> </label>
                          <div  class ="col-sm-6">
                              <button type="button" onclick="deleteFromChannel()" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form><!-- Add New UsersForm -->
              </div>
        </div>
      </div>  
    </div>
     <!-- Add New Users code Ends -->
</body>

</html>
