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
    
    function createNewUser(){
   console.log("inside the create new userfunction ");
   var firstName = $("#fname").val();
   var lastName = $("#lname").val();
   var userName = $("#uname").val();
   var newpassword = $("#newpwd").val();
   var emailaddress = $("#emailaddress").val();
   var profilepic = $("#profpic").val();
   var phonenumber = $("#phonenumber").val();
   var status = $("#status").val();
   
                     if (firstName == "" || firstName == null) {
                          alert("Please Enter the First Name");
                      } else if(lastName == "" || lastName == null){
                         alert("Please Enter the Last Name");
                        } else if(userName == "" || userName == null){
                         alert("Please Enter the User Name");
                        } else if(newpassword == "" || newpassword == null){
                         alert("Please enter the Password");
                        } else if(emailaddress == "" || emailaddress == null){
                         alert("Please Enter the Email address");
                        } else if(profilepic == "" || profilepic == null){
                         alert("Please Enter the Profile Picture");
                        } else if(phonenumber == "" || phonenumber == null){
                         alert("Please Enter the Phone Number");
                        } else if(status == "" || status == null){
                         alert("Please Enter the Status");
                        } else{
                            $.ajax({
                              type: "post",
                              url: "services/insert_add_new_users.php",
                              data: "fName=" +firstName+"&lName=" +lastName+"&uName=" +userName+"&npwd=" +newpassword+"&eaddr=" +emailaddress+"&profpic=" +profilepic+"&phonenum=" +phonenumber+"&stat=" +status,
                              success: function (response) {
                                alert(response+" are added sucessfuly to the user_channel table");
                              }
                          });
                        }
       
       
       
       
       console.log(firstName+lastName + userName + newpassword + emailaddress +profilepic +phonenumber +status);
      
    } //function createNewUser closed




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
        <li class="active"><a href="#">Create New Users</a></li>
        <li><a href="admin_add_new_users.php">Add Users</a></li>
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
  <!-- Create Users code Start -->
  <div class="container" style ="width: 30%">
            <div class="panel-group" >
                <div class="panel panel-primary">
                            <div class="panel-heading" style="color:white"> 
                                <h3 align="center"><b>Create New Users</b></h3>
                            </div>
                            <div class="w3-padding-small panel-body">
                                <!-- Create New Users Form -->
                                <form class ="form-horizontal" action="" method="">
                                        <div class="form-group ">
                                            <label class ="control-label col-sm-5"  for="firstname">First Name: </label>
                                            <div  class ="col-sm-7">
                                                <div class="firstname">
                                                    <input type="text" class="form-control" id="fname">
                                                </div> 
                                            </div>
                                        </div> <!--form-group-->
                                        <div class="form-group ">
                                            <label class ="control-label col-sm-5"  for="lastname">Last Name: </label>
                                            <div  class ="col-sm-7">
                                                <div class="lastname">
                                                    <input type="text" class="form-control" id="lname">
                                                </div> 
                                            </div>
                                        </div> <!--form-group-->
                                        <div class="form-group ">
                                            <label class ="control-label col-sm-5"  for="username">User Name: </label>
                                            <div  class ="col-sm-7">
                                                <div class="username">
                                                    <input type="text" class="form-control" id="uname">
                                                </div> 
                                            </div>
                                        </div> <!--form-group-->
                                        <div class="form-group ">
                                            <label class ="control-label col-sm-5"  for="newpwd">New Password: </label>
                                            <div  class ="col-sm-7">
                                                <div class="newpwd">
                                                    <input type="text" class="form-control" id="newpwd">
                                                </div> 
                                            </div>
                                        </div> <!--form-group-->
                                        <div class="form-group ">
                                            <label class ="control-label col-sm-5"  for="emailaddress">Email: </label>
                                            <div  class ="col-sm-7">
                                                <div class="emailaddress">
                                                    <input type="text" class="form-control" id="emailaddress">
                                                </div> 
                                            </div>
                                        </div> <!--form-group-->
                                        <div class="form-group ">
                                            <label class ="control-label col-sm-5"  for="profpic">Profile Picture: </label>
                                            <div  class ="col-sm-7">
                                                <div class="profpic">
                                                    <input type="text" class="form-control" id="profpic">
                                                </div> 
                                            </div>
                                        </div> <!--form-group-->
                                        <div class="form-group ">
                                            <label class ="control-label col-sm-5"  for="phonenumber">Phone Number: </label>
                                            <div  class ="col-sm-7">
                                                <div class="phonenumber">
                                                    <input type="text" class="form-control" id="phonenumber">
                                                </div> 
                                            </div>
                                        </div> <!--form-group-->
                                        <div class="form-group ">
                                            <label class ="control-label col-sm-5"  for="Status">Status </label>
                                            <div  class ="col-sm-7">
                                                <div class="status">
                                                    <input type="text" class="form-control" id="status">
                                                </div> 
                                            </div>
                                        </div> <!--form-group-->

                                        <div class="form-group ">
                                            <label class ="control-label col-sm-4"  for="submit_button"> </label>
                                            <div  class ="col-sm-6">
                                                <button type="button" onclick="createNewUser()" class="btn btn-success">Submit</button>
                                            </div>
                                        </div><!--form-group-->
                                </form>
                            </div>
                     </div>
                </div>
            </div>
    </div>

     <!-- Create  Users code Ends -->
</body>

</html>
