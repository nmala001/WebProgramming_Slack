<style>
.msg{
  min-height: 50px;
  overflow: hidden;
  color: blue ;
  box-sizing: content-box;
  border: none;
  background-color: powderblue;
  border-radius: 18px;
  margin-bottom: 10px;
  font-family: sans-serif;
  font-size: 17px;
  width: 750px;
  padding: 20px;
}
#s1{
  color: Black;
  font-style: 
  font-family:;
  font-size:;

}
#s2{
  color: grey;

}
#s3{
  color: #373131;
}
</style>
<?php

require_once 'php_action/core.php';
require_once 'php_action/db_connect.php';
require_once 'queries.php';

if(isset($_POST['message'])){
  insertMessages();
}


function getAllChannels(){
  global $connect;
    $sql = "SELECT * FROM channel";
    $result = $connect-> query($sql);

    if ($result->num_rows > 0) {
      $channel = '';
      while($row = $result->fetch_assoc()) {
            $channel = $channel."<li><a href=dashboard.php?channel_id=".$row['channel_id']."> ".$row['channel_name']." </a></li>";
       }
       return $channel;
    }
    else{
      return 0;
    }

}

function getAllUsers(){
  global $connect;
    $sql = "SELECT * FROM user";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
      $user = '';
      while($row = $result->fetch_assoc()) {
            $user = $user."<li><a href=dashboard.php?user_id=".$row['user_id']."> ".$row['username']." </a></li>";
       }
       return $user;
    }
    else{
      return 0;
    }

}
/* inserting messages into database */
function insertMessages(){
  global $connect;

   $created_by= mysqli_real_escape_string($connect,$_POST['user_id']);
   $channel_id= mysqli_real_escape_string($connect, $_POST['channel_id']);
   $message = mysqli_real_escape_string($connect, $_POST['message']);

   $sql = "INSERT INTO `message` (message_id,created_by,created_time,message,channel_id) VALUES (NULL,'$created_by', CURRENT_TIMESTAMP ,'$message','$channel_id' )";
   $result = $connect->query($sql);
   $location = 'location: dashboard.php?channel_id='.$channel_id;
   echo $location;
   header($location);
  


}

function getMessages($channel_id){

  global $connect;

  


    $sql = "SELECT * FROM message INNER JOIN user ON user.user_id = message.created_by WHERE channel_id ='$channel_id' ";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
      $message = '';
      while($row = $result->fetch_assoc()) {


            $newmessage = htmlspecialchars($row['message']);

            echo $message.  "<div class=\"msg\"> &emsp;<span id=\"s1\"><b>".$row['username']." </b></span>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;            
            <span id=\"s2\">".$row['created_time']."</span><br><br>&emsp;<span id=\"s3\">".$newmessage."</span></div>";
       }
    
    
       return $message;
    }
    else{

      return 0;
    }

}



                


