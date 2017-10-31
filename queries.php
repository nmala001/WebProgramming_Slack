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
  padding:20px;
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
require_once 'dashboard.php';

if(isset($_POST['message'])){
  insertMessages();
}

if (isset($_POST['message_content'])){
  insertThreadMessages();
}


//require_once('custom/css/stylemsg.css');
//echo "<link rel='stylesheet' type='text/css' href='custom/css/stylemsg.css' />";
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
   //header($location);
   // if ($result->num_rows > 0) {
   //    $message = '';
   //    while($row = $result->fetch_assoc()) {

   //          $message = $message."<li> <a href=dashboard.php?channel_id= ".$row['channel_id'].">  ".$row['message']." </a></li>";
           
   //     }
   //     return $message;
   //  }
   //  else{

   //    return 0;
   //  }


}

function getMessages($channel_id){

  global $connect;
  // global $channel_id;

  //echo "$channel_id";

  


    $sql = "SELECT * FROM message INNER JOIN user ON user.user_id = message.created_by WHERE channel_id ='$channel_id' ";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
      $message = '';
      while($row = $result->fetch_assoc()) {

        //$sql = "SELECT * FROM threaded_message INNER JOIN message ON message.message_id = threaded_message.to_message_id WHERE channel_id ='$channel_id'  AND message.message_id =".$row['message_id']." ";

        $threadresult = $connect->query($sql);

        if ($threadresult->num_rows > 0) {
              $threadmessage = '';
              while($row = $threadresult->fetch_assoc()) {
                //$newmessage = htmlspecialchars($row['threadmessage']);
                $to_message_id = htmlspecialchars($row['message_id']);


            //$message = $message."<div class="msg"><a href=dashboard.php?channel_id=".$row['channel_id']."> ".$row['created_by']." <br>".$row['message']." ".$row['created_time']." </a></div>";
            //$message = $message."<div><a href=dashboard.php?channel_id=".$row['channel_id']."> ".$row['created_by']." <br>".$row['message']." ".$row['created_time']." </a></div>";

            //echo "<div style='color:red;'>".$message."</div>" ;//

            //echo $message."<a href=dashboard.php> <div class=\"msg\">".$row['email']." <br>".$row['message']." ".$row['created_time']."</div> </a>";
            $newmessage = htmlspecialchars($row['message']);
            $message_id = htmlspecialchars($row['message_id']);
            $form = htmlspecialchars($row['message_id']);
            $channel_id = htmlspecialchars($row['channel_id']);
            $folder = "uploads";

              $message =  "<div class=\"msg\"> &emsp;<span id=\"s0\"> <img src=\"uploads\User_Avatar.png\" style='width:30px; height:30px'></span>&emsp;&emsp;<span id=\"s1\"><b>".$row['username']." </b></span>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;            
            <span id=\"s2\">".$row['created_time']."</span><br><br>&emsp; <span id=\"s3\">".$newmessage." 



                          <div class= 'divbutton'>

                          

                              <span class=\"like\" ><i class='fa fa-thumbs-o-up' aria-hidden='true'></i></span>
                              <span class=\"dislike\"><i class='fa fa-thumbs-o-down' aria-hidden='true'></i></span>
                              <span id= ".$message_id." class=\"reply\"><i class='fa fa-reply' aria-hidden='true'></i></span>

                           

                          </div>";

                        $threadMsgReply =  getThreadMessages($row['message_id']);

                      $message .= $threadMsgReply;

                   // $message .= "God sAve me ";
                    $message .=  "<div  id= 'messagereply_".$message_id."' class='thread input-group input-group-lg' style='display:none;'>

                          <form id ='threadForm".$message_id."' method='POST'>
                          
                           
                           <input type='text' class='form-control' placeholder='Type Your Message...' name = 'message_content' id='message_content' aria-describedby='sizing-addon1'>
                           <input type='hidden' name='created_by' id='created_by' value = ".$row['created_by'].">
                           <input type='hidden' name='to_message_id' id='to_message_id' value = ".$message_id.">
                           <input type='hidden' name='channel_id' id='channel_id' value = ".$channel_id.">
                            <button type = 'button' id= 'button_".$message_id."' class= 'threadbutton btn btn-primary' name= 'threadbutton'>Submit

                            </button>
                          </form>
                      </div>



                          </div>";




               echo $message;

       }
    
       return $message;
    }
    else{

      return 0;
    }
  }


}
}


function getThreadMessages($parentMsgId ){

  global $connect;
  // global $channel_id;

  //echo "$channel_id";

  


    $sql = "SELECT * FROM threaded_message INNER JOIN message ON message.message_id = threaded_message.to_message_id JOIN user ON user.user_id = message.created_by AND message.message_id =".$parentMsgId." ";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
      $threadmessage = '';
      while($row = $result->fetch_assoc()) {
            //$message = $message."<div class="msg"><a href=dashboard.php?channel_id=".$row['channel_id']."> ".$row['created_by']." <br>".$row['message']." ".$row['created_time']." </a></div>";
            //$message = $message."<div><a href=dashboard.php?channel_id=".$row['channel_id']."> ".$row['created_by']." <br>".$row['message']." ".$row['created_time']." </a></div>";

            //echo "<div style='color:red;'>".$message."</div>" ;//

            //echo $message."<a href=dashboard.php> <div class=\"msg\">".$row['email']." <br>".$row['message']." ".$row['created_time']."</div> </a>";


            $newmessage = htmlspecialchars($row['msg_content']);
            $to_message_id = htmlspecialchars($row['message_id']);
            $profilepic = $row['profile_pic'];

            $threadmessage.= "<div style= 'margin-left: 100px' class='msg'> &emsp;<span id=\"s0\"> <img src=\"uploads\User_Avatar.png\" style='width:30px; height:30px'></span>&emsp;&emsp;<span id=\"s1\"><b>".$row['username']." </b></span>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;            
            <span id=\"s2\">".$row['created_time']."</span><br><br>&emsp; <span id=\"s3\">".$newmessage."

            </div>";


           // echo $threadmessage;


       }
    
       return $threadmessage;
    }
    else{

      return 0;
    }

}

function Reaction($message_id ){

  global $connect;
  // global $channel_id;

  //echo "$channel_id";

  


    $sql = "SELECT COUNT(*)FROM user_reaction INNER JOIN message ON message.message_id = user_reaction.message_id AND user_reaction.reaction = 1";

    $sql = "SELECT COUNT(*)FROM user_reaction INNER JOIN message ON message.message_id = user_reaction.message_id AND user_reaction.reaction = 2";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
      $reaction = '';
      while($row = $result->fetch_assoc()) {
            


            //$newmessage = htmlspecialchars($row['msg_content']);
            //$to_message_id = htmlspecialchars($row['message_id']);

            $threadmessage.= "<div style= 'margin-left: 100px' class=\"msg\"> &emsp;<span id=\"s1\"><b>".$row['created_by']." </b></span>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;            
            <span id=\"s2\">".$row['created_time']."</span><br><br>&emsp; <span id=\"s3\">".$newmessage."

                         
                            <form id ='threadForm".$message_id."' method='POST'>
                              <button class=\"like\" id='like'><i class='fa fa-thumbs-o-up' aria-hidden='true'></i></span>
                              <button class=\"dislike\" id='dislike'><i class='fa fa-thumbs-o-down' aria-hidden='true'></i></span>
                              <input type='hidden' name='to_message_id' id='to_message_id' value = ".$message_id.">
                              <input type='hidden' name='channel_id' id='channel_id' value = ".$channel_id.">
                            </form>

            </div>";


           // echo $threadmessage;


       }
    
       return $threadmessage;
    }
    else{

      return 0;
    }

}

function insertThreadMessages(){
  global $connect;

   $created_by= mysqli_real_escape_string($connect,$_POST['created_by']);
   $to_message_id= mysqli_real_escape_string($connect, $_POST['to_message_id']);
   $message_content = mysqli_real_escape_string($connect, $_POST['message_content']);
   $channel_id= mysqli_real_escape_string($connect, $_POST['channel_id']);

   echo $to_message_id;
  

   $sql = "INSERT INTO `threaded_message` (t_id,to_message_id,msg_content,created_by,created_at) VALUES (NULL, $to_message_id, '$message_content',$created_by, CURRENT_TIMESTAMP)";
   echo $sql;
   $result = $connect->query($sql);
   $location = 'location: dashboard.php?channel_id='.$channel_id;
   echo $location;
   header($location);

   // echo "Result". $result ;
   // $location = 'location: dashboard.php?channel_id='.$channel_id;
   // echo $location;
   // header($location);
   // if ($result->num_rows > 0) {
   //    $message = '';
   //    while($row = $result->fetch_assoc()) {

   //          $message = $message."<li> <a href=dashboard.php?channel_id= ".$row['channel_id'].">  ".$row['message']." </a></li>";
           
   //     }
   //     return $message;
   //  }
   //  else{

   //    return 0;
   //  }


}


if(isset($_POST['insertChannels'])){

  global $connect;

$insertChannels = $_POST['insertChannels'];
$channel_name = $insertChannels['channel_name'];
$channel_type = $insertChannels['channel_type'];
$created_by = $insertChannels['user_id'];
$user_id = $insertChannels['user_id'];


    $sql = "INSERT INTO `channel` (channel_id, channel_name, channel_type, created_by, created_time, user_id) VALUES (NULL, '$channel_name', '$channel_type', '$user_id', CURRENT_TIMESTAMP, '$user_id')";
   $result = $connect->query($sql);
   $location = 'location: dashboard.php';
   echo $location;
   header($location);

}


if(isset($_POST['insertThreads'])){

  global $connect;

$insertThreads = $_POST['insertThreads'];
$to_message_id = $insertThreads['to_message_id'];
$message_content = $insertThreads['message_content'];
$created_by = $insertThreads['user_id'];

//echo $to_message_id;
//echo $message_content;
//echo $created_by;




  $sql = "INSERT INTO `threaded_message` (t_id,to_message_id,msg_content,created_by,created_at) VALUES (NULL, $to_message_id, '$message_content',$created_by, CURRENT_TIMESTAMP)";

   echo $sql;
   $result = $connect->query($sql);
   $location = 'location: dashboard.php?channel_id?to_message_id='.$channel_id .$to_message_id;
   echo $location;
   header($location);

}

   /*$created_by= mysqli_real_escape_string($connect,$_POST['user_id']);
   $channel_name= mysqli_real_escape_string($connect, $_POST['channel_name']);
   $channel_type = mysqli_real_escape_string($connect, $_POST['channel_type']);
   $user_id= mysqli_real_escape_string($connect, $_POST['user_id']);*/


?>
