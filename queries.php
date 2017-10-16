<style>
.msg{
  height:70px ;
  color: black ;
  box-sizing: content-box;
  border: 2px  solid #b7b3b6;
  border-radius: 18px;
  margin-bottom: 10px;

}
</style>


<?php
//require_once('custom/css/stylemsg.css');
//echo "<link rel='stylesheet' type='text/css' href='custom/css/stylemsg.css' />";
function getAllChannels(){
  global $connect;
    $sql = "SELECT * FROM channel";
    $result = $connect->query($sql);

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
   $sql = "INSERT INTO 'message' (message_id,created_by,created_time,message,channel_id) VALUES (NULL,'$created_by', CURRENT_TIMESTAMP ,'$message','$channel_id' )";
   $result = $connect->query($sql);

   if ($result->num_rows > 0) {
      $message = '';
      while($row = $result->fetch_assoc()) {

            $message = $message."<li><a href=dashboard.php?channel_id=".$row['channel_id']."> ".$row['message']." </a></li>";
           
       }
       return $message;
    }
    else{

      return 0;
    }


}

function getMessages($channel_id){

  global $connect;
  // global $channel_id;

  


    $sql = "SELECT * FROM message INNER JOIN user ON user.user_id = message.created_by WHERE channel_id ='$channel_id' ";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
      $message = '';
      while($row = $result->fetch_assoc()) {
            //$message = $message."<div class="msg"><a href=dashboard.php?channel_id=".$row['channel_id']."> ".$row['created_by']." <br>".$row['message']." ".$row['created_time']." </a></div>";
            //$message = $message."<div><a href=dashboard.php?channel_id=".$row['channel_id']."> ".$row['created_by']." <br>".$row['message']." ".$row['created_time']." </a></div>";
            //echo "<div style='color:red;'>".$message."</div>" ;//

            echo $message."<div class=\"msg\">".$row['email']." <br>".$row['message']." ".$row['created_time']."</div>";
       }
    
       return $message;
    }
    else{
      return 0;
    }




}


/*function getUser(){

  $sql = "SELECT * FROM message INNER JOIN user ON user.user_id = message.created_by";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
      $message = '';
      while($row = $result->fetch_assoc()) {
            //$message = $message."<div class="msg"><a href=dashboard.php?channel_id=".$row['channel_id']."> ".$row['created_by']." <br>".$row['message']." ".$row['created_time']." </a></div>";
            //$message = $message."<div><a href=dashboard.php?channel_id=".$row['channel_id']."> ".$row['created_by']." <br>".$row['message']." ".$row['created_time']." </a></div>";
            //echo "<div style='color:red;'>".$message."</div>" ;//

            echo $message."<div class=\"msg\">".$row['email']." <br>".$row['message']." ".$row['created_time']."</div>";
       }
    
       return $message;
    }
    else{
      return 0;
    }



}*/

?>
<!--
div {
    height: <?=$height?>;
    width: <?=$width?>;
    background-color: <?=$background_color?>;
}
*/
select * from message where created_by=