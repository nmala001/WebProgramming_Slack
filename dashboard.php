
<?php
require_once 'php_action/core.php';
require_once 'php_action/db_connect.php';
require_once 'queries.php';
$user = $_SESSION['userId'];
$channel_id ;
$username = $_SESSION['userName'];

?>




<!DOCTYPE html>
<html>
<head>
	<title>Stud-Collab</title>

	<!--custom css -->

	<link rel="stylesheet" type="text/css" href="custom/css/custom.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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



<div id= "sidebar">
<div class="navbar navbar-inverse navbar-fixed-left">
  <a class="navbar-brand" href="#">Stud-Collab</a>
  <ul class="nav navbar-nav">
    
                          
                            <button onclick="myFunction()" class="dropbtn"><?php

                              $welcome = "Welcome" ."       " .$username;
                               echo htmlspecialchars_decode($welcome);
                            ?></button>

                             <div id="myDropdown" class="dropdown-content">
                                  <b><?php echo "$username"; ?></b>
                                  <button>Set a status</button>
                                  <button onclick="openWin()">Profile and Account</button>
                                
                                </div>
                           
                          
                      
                      <li>
                          <a href="logout.php">Signout</a>
                      </li>
                      <li>
                          <a href="#">Home</a>
                      </li>
                      <li>
                          <a href="#">About</a>
                      </li>
                      <li>
                          <a href="#">Threads</a>
                      </li>
                      <li class="dropdown"><span><i class="createchannel fa fa-plus-square" aria-hidden="true"></i></span>
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-television" aria-hidden="true"></i>Channels<span class="caret"></span></a>

                      <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Channels<span class="caret"></span></a>

                      <ul class="dropdown-menu" role="menu">
                        
                        <?php  $result = getAllChannels(); echo htmlspecialchars_decode($result); ?>

                      </ul>
                  <li>
                    <a href="#">Direct Messages</a>

                    <?php  $result = getAllUsers(); echo htmlspecialchars_decode($result); ?>
                  </li> 
                </li>
     
      
  </ul>

  <div id="page-content-wrapper">
            
            
            

                
                  <div class="overflow-chat">
                      <div class="col-lg-8 col-lg-offset-2">
                          <h1>Welcome to Stud-Collab</h1>

                          <?php 
                            if(isset($_GET["channel_id"])){
                              $result = getMessages($_GET["channel_id"]); 
                            }else{
                              $result = getMessages(1); 
                            } echo htmlspecialchars_decode($result);
                          ?>
                            
                      </div>
                      

                  </div>

                  <form  action="queries.php" method="POST" >

                        <div  id= "textarea" class="input-group input-group-lg">
                          
                           <span class="input-group-addon" id="sizing-addon1">+</span>
                           <input type="text" class="form-control" placeholder="Type Your Message..." name = "message" aria-describedby="sizing-addon1">
                           <input type="hidden" name="user_id" id="user_id" value = <?php echo htmlspecialchars_decode($user) ?>>
                           <input type="hidden" name="channel_id" value=<?php if (isset($_GET["channel_id"])) {
                            echo $_GET["channel_id"];}
                            else{
                              $var = 1;
                              echo htmlspecialchars_decode($var);
                              } ?>>
                        </div>
                      </form>

                        <div id="msg-btn">
                            <input type="button" style="height: 45px; width: 90px; background-color:#58b759; color: white " value="Submit">

                        </div>

                  
    
            </div>


               
        </div>

        

</div>
<script>


        function myFunction()
         {
          document.getElementById("myDropdown").classList.toggle("show");
          }

        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) 
          {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
        for (i = 0; i < dropdowns.length; i++) 
        {
            var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) 
      {
        openDropdown.classList.remove('show');
      }
    }
  }
}


       
// <!-- <button onclick="openWin()">Open w3schools.com in a new window</button>
// <button onclick="closeWin()">Close the new window (w3schools.com)</button> -->


var myWindow;

function openWin() {
    myWindow = window.open("profile.php", "_self");
}


</script>        

</body>

<script type="text/javascript">
	

$(document).ready(function () {

  var response = '';

  $( ".createchannel" ).click(function(){

  $( ".openchannel" ).modal('show');


 

});

  $( ".channelbutton" ).click(function(){

     $( ".openchannel" ).modal('hide');

    var channel_name = $("#channel_name").val();
    var channel_type = $("#channel_type").val();
    var created_by = $("#user_id").val();
    var user_id = $("#user_id").val();
    var dataString = {'channel_name': channel_name, 'channel_type': channel_type, 'created_by': user_id, 'user_id': user_id};


         $.ajax({
          type: 'POST',
          url: 'queries.php',
          data: {'insertChannels':dataString},

          success : function(data) {  

            console.log(data);
            
          
            }
        });

    });
  

  });




</script>
</html>
