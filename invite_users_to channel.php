<?php
session_start();
require_once 'php_action/db_connect.php';
$user = $_SESSION['userId'];
$username = $_SESSION['userName'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Stud-Collab</title>

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
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
  <script type="text/javascript">
    
    var uname="<?php echo $_SESSION['userName']?>";
    var uid="<?php echo $_SESSION['userId']?>";
    
     
function insertIntoChannel(){
  
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
                              url: "services/insert_add_new_users.php",
                              data: "cid=" +channelid+"&uid=" +useridSelected,
                              success: function (response) {

                                if(response=="success"){
                                  alert(uname+" is added sucessfuly to the user_channel "+channelName);
                                }else{
                                  alert(uname+" already in channel");
                                  alert(response);
                                }
                                
                              }
                          });
                      }

}
</script>
</head>

<body >

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <!-- <li class="active"><b>Help</b></li> -->
      <ul class="nav navbar-nav navbar-right">

        <li><a href="dashboard.php"><span class="glyphicon glyphicon-log-in"></span> Cancel</a></li>


      </ul>

  </div>
 </div>
</nav>
<br>
<br>
  <!-- Add New Users code Start -->
  <div class="container" style ="width: 25%">
    <div class="panel-group" >
 
        <div class="panel panel-primary"  >
            <div class="panel-heading" style="color:white"> 
                  <h3 align="center"><b>Invite Users To a Channel</b></h3>
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
                                          $sql="SELECT channel_name,channel_id FROM `channel`WHERE channel_type='private' and created_by=$user";
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
                              <button type="button" onclick="insertIntoChannel()" class="btn btn-success">Submit</button>
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
