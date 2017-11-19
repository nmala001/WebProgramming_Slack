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
	<title>Stud-Collab</title>

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
<<<<<<< HEAD
  <style type="text/css">
    
       table.dataTable tr.odd { background-color: white;  border:1px lightgrey;}
        table.dataTable tr.even{ background-color: white; border:1px lightgrey; }

  </style>
=======
>>>>>>> 9c074763af46e20b800c3078d0a4dfdf244c5eee
  <script type="text/javascript">
    
    var uname="<?php echo $_SESSION['userName']?>";
    var uid="<?php echo $_SESSION['userId']?>";
    var selMessage = 0;
    var selChannel=0;
    var lastMsgId=0;
    var reaction;
<<<<<<< HEAD


=======
>>>>>>> 9c074763af46e20b800c3078d0a4dfdf244c5eee
function showChannel(channel_id)
{

  selChannel= channel_id;
  // fire ajax call
  // get channel messages service
  $("#channelChat").empty();

   $.ajax({
          type: 'POST',
          url: 'message.php',
          data: "channel_id="+channel_id,
          dataType:"json",
          success : function(data) {
          console.log(data);  
          var tableData=" <table id='example' class='display' cellspacing='0' width='100%''><thead><tr><th>Messages</th></tr> </thead><tbody>";
        
              $.each(data,function(i,d){
                  lastMsgId= parseInt(d.message_id);

<<<<<<< HEAD
                  //if(d.user_id==uid){
                      if(d.reply_msg_id=="0"){
                             tableData += "<tr><td><div class='media'><div class='media-left'><img src='http://w3schools.com/bootstrap/img_avatar2.png' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+d.username+"<p>"+d.created_time+"</p></h4><p>"+d.message+"</p><div id='thread-"+d.message_id+"'></div><button type='button' class='btn btn-default btn-sm'>Likes <span class='badge'>"+d.likes+"</span></button><button type='button' class='btn btn-default btn-sm'>DisLikes <span class='badge'>"+d.dislikes+"</span></button><button type='button' class='btn btn-default btn-sm reply_c' onclick='sendreplies("+d.message_id+")'><span class='glyphicon glyphicon-share-alt'></span>Reply</button></div></div></td></tr>";
                      }
              });
              tableData +="</tbody></table>";

              $("#channelChat").append(tableData);  

               $.each(data,function(i,d){
                  lastMsgId= parseInt(d.message_id);

                  //if(d.user_id==uid){
                      if(d.reply_msg_id!="0"){
                             $("#thread-"+d.reply_msg_id).append("<div class='media'><div class='media-left'><img src='http://w3schools.com/bootstrap/img_avatar2.png' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p><p>"+d.created_time+"</p><div id='thread-"+d.message_id+"'></div><button type='button' class='btn btn-default btn-sm'>Likes <span class='badge'>"+d.likes+"</span></button><button type='button' class='btn btn-default btn-sm'>DisLikes <span class='badge'>"+d.dislikes+"</span></button></div></div>");
                      }
                });

               $('#example').DataTable({ "ordering": false,
        "info": false});
=======
                  if(d.user_id==uid){
                      if(d.reply_msg_id=="0"){
                             tableData += "<tr><td><div class='media'><div class='media-left'><img src='http://w3schools.com/bootstrap/img_avatar2.png' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p><button type='button' class='btn btn-default btn-sm'>Likes <span class='badge'>"+d.likes+"</span></button><button type='button' class='btn btn-default btn-sm'>DisLikes <span class='badge'>"+d.dislikes+"</span></button></div></div></td></tr>";
                      }else{
                        console.log("add reactions value set");
                             tableData += "<tr><td><div class='media'><div class='media-body'> <h4 class='media-heading'>"+d.replied_by+"</h4><p>"+d.reply+"</p></div><div class='media-right'> <img src='http://w3schools.com/bootstrap/img_avatar1.png' class='media-object' style='width:60px'></div></div><div class='media'><div class='media-left'> <img src='http://w3schools.com/bootstrap/img_avatar3.png' class='media-object' style='width:60px'></div><div class='media-body'> <h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p></div></div><div class='reactions'><button type='button' class='btn btn-default btn-sm like' onclick='addReactionToMessage("+d.message_id+","+uid+",1)' value='1'><span class='glyphicon glyphicon-thumbs-up'></span> Like <span class='badge'>"+d.likes+"</span></button><button type='button' class='btn btn-default btn-sm dislike' onclick='addReactionToMessage("+d.message_id+","+uid+",0)' value='2'><span class='glyphicon glyphicon-thumbs-down' ></span>Dislike <span class='badge'>"+d.dislikes+"</span></button><button type='button' class='btn btn-default btn-sm reply'><span class='glyphicon glyphicon-share-alt'></span>Reply</button></div></td></tr>";
                      }
                  }else{
                      if(d.reply_msg_id=="0"){
                          tableData += "<tr><td><div class='media'><div class='media-body'> <h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p></div><div class='media-right'> <img src='http://w3schools.com/bootstrap/img_avatar1.png' class='media-object' style='width:60px'></div></div><div class='reactions'><button type='button' class='btn btn-default btn-sm' onclick='addReactionToMessage("+d.message_id+","+uid+",1)' value='1'><span class='glyphicon glyphicon-thumbs-up'></span> Like<span class='badge'>"+d.likes+"</span></button><button type='button' class='btn btn-default btn-sm' onclick='addReactionToMessage("+d.message_id+","+uid+",0)' value='2'><span class='glyphicon glyphicon-thumbs-down'></span>Dislike<span class='badge'>"+d.dislikes+"</span></button><button type='button' class='btn btn-default btn-sm reply'><span class='glyphicon glyphicon-share-alt'></span>Reply</button></div></td></tr>";
                      }else{
                             tableData += "<tr><td><div class='media'><div class='media-left'> <img src='http://w3schools.com/bootstrap/img_avatar3.png' class='media-object' style='width:60px'></div><div class='media-body'> <h4 class='media-heading'>"+d.replied_by+"</h4><p>"+d.reply+"</p></div></div><div class='media'><div class='media-body'> <h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p></div><div class='media-right'> <img src='http://w3schools.com/bootstrap/img_avatar1.png' class='media-object' style='width:60px'></div></div><div class='reactions'><button type='button' class='btn btn-default btn-sm' onclick='addReactionToMessage("+d.message_id+","+uid+",1)' value='1'><span class='glyphicon glyphicon-thumbs-up'></span> Like<span class='badge'>"+d.likes+"</span></button><button type='button' class='btn btn-default btn-sm' onclick='addReactionToMessage("+d.message_id+","+uid+",0)' value='2'><span class='glyphicon glyphicon-thumbs-down'></span>Dislike<span class='badge'>"+d.dislikes+"</span></button><button type='button' class='btn btn-default btn-sm reply'><span class='glyphicon glyphicon-share-alt'></span>Reply</button></div></td></tr>";
                      }
                       
                  }
              });
              tableData +="</tbody></table>";

              $("#channelChat").append(tableData);
               $('#example').DataTable({ "ordering": false,
        "info":     false});
>>>>>>> 9c074763af46e20b800c3078d0a4dfdf244c5eee
          
            }
        });
}
<<<<<<< HEAD



$(document).ready(function() {


  tinymce.init({ 

    selector:'textarea',
    plugins: ['advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help'],
    menubar: "insert",
    toolbar : "imageupload",
        setup: function(editor) {
            var inp = $('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
            $(editor.getElement()).parent().append(inp);

            inp.on("change",function(){
                var input = inp.get(0);
                var file = input.files[0];
                var fr = new FileReader();
                var myFormData = new FormData();
                myFormData.append('image', file);


                fr.onload = function() {
                    var img = new Image();
                   // img.src = "myimage.png";
                    $.ajax({
                           type: 'POST',
                            url: 'upload.php',
                            processData: false, // important
                            contentType: false, // important
                            data: myFormData,
                            success : function(data) {
                                console.log(data);
                                img.src=""+data;
                                editor.insertContent('<img src="'+img.src+'"/>');
                                inp.val('');
                            },error:function(data){
                              console.log("error in image upload");
                            }
                    });
                    //upload this file to your own server and get local image url and set this url to img src
                   // img.src = fr.result;
                    
                }
                fr.readAsDataURL(file);
            });

            editor.addButton( 'imageupload', {
                text:"IMAGE",
                icon: false,
                onclick: function(e) {
                    inp.trigger('click');
                }
            });
        } 

});


  /*var channel_id=y;
  $('.msgreply').modal('show');
  var msg=tinymce.get("replymsg").getContent();
=======

>>>>>>> 9c074763af46e20b800c3078d0a4dfdf244c5eee

 }
  */

<<<<<<< HEAD
  $('.createbutton').on('click', function(event1) {

    event1.preventDefault();
    $('.openchannel').modal('show');

  });
  

  $('.channelbutton').on('click', function(event) {
   event.preventDefault();
    var channel_name = document.getElementById('channel_name').value;
    var channel_type = $("input:radio[name='channel_type']:checked").val();

    console.log(channel_name);

    $.ajax({
          type: 'POST',
          url: 'CreateChannel.php',
          data: "channel_name="+channel_name+"&channel_type="+channel_type,
          success : function(data) {
                if(data=="error"){
                  alert("Cannot create channel at this moment!");
                }
                else{
                  if(channel_type=="private"){
                      $("#channelList").append("<a class='list-group-item active' href='javascript:showChannel("+data+")'> "+channel_name+" </a>");
                  }else{
                    $("#channelList").append("<a class='list-group-item' href='javascript:showChannel("+data+")'> "+channel_name+" </a>");
                  }
                  
                    $('.openchannel').modal('hide');
                }
             }
        });
      });

=======
$(document).ready(function() {
  tinymce.init({ selector:'textarea' });

  $('.createbutton').on('click', function(e) {
    e.preventDefault();
    $('.openchannel').modal('show');

    });

  $('.reply').on('click', function(event2) {
    event2.preventDefault();
    $('.msgreply').modal('show');
    

  });

    

  

  $('.channelbutton').on('click', function(event) {
   event.preventDefault();
    var channel_name = document.getElementById('channel_name').value;
    var channel_type = $("input:radio[name='channel_type']:checked").val();

    console.log(channel_name);
>>>>>>> 9c074763af46e20b800c3078d0a4dfdf244c5eee

    $.ajax({
          type: 'POST',
          url: 'CreateChannel.php',
          data: "channel_name="+channel_name+"&channel_type="+channel_type,
          success : function(data) {
                if(data=="error"){
                  alert("Cannot create channel at this moment!");
                }
                else{
                  if(channel_type=="private"){
                      $("#channelList").append("<a class='list-group-item active' href='javascript:showChannel("+data+")'> "+channel_name+" </a>");
                  }else{
                    $("#channelList").append("<a class='list-group-item' href='javascript:showChannel("+data+")'> "+channel_name+" </a>");
                  }
                  
                    $('.openchannel').modal('hide');
                }
             }
        });
      });


//document ready function closing
});

<<<<<<< HEAD
function sendreplies(x){
  //$(document).on('click','.reply_c', function() {
    $('#send_replyid').val(x);
    $('.msgreply').modal('show');

  //});
 }
=======

>>>>>>> 9c074763af46e20b800c3078d0a4dfdf244c5eee

});




<<<<<<< HEAD
function sendMessageToChannel(){
  //ajax on success
    var msg=tinymce.get("textmsg").getContent();
    console.log(msg);

     $.ajax({
          type: 'POST',
          url: 'createnewmsgforchannel.php',
          data: "channel_id="+selChannel+"&message="+msg+"&replymsgid=0",
          dataType:"json",
          success : function(data) {
          console.log("saving message to channel --- ");  
                  //lastMsgId= parseInt(d.message_id);
                  var chatTable=$('#example').DataTable();
                
                  chatTable.row.add( [
                  "<div class='media'><div class='media-left'><img src='http://w3schools.com/bootstrap/img_avatar2.png' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+uname+"</h4><p>"+msg+"</p><div id='thread-"+data+"'></div><button type='button' class='btn btn-default btn-sm'>Likes <span class='badge'>0</span></button><button type='button' class='btn btn-default btn-sm'>DisLikes <span class='badge'>0</span></button><button type='button' class='btn btn-default btn-sm reply_c' onclick='sendreplies("+message_id+")'><span class='glyphicon glyphicon-share-alt'></span>Reply</button></div></div>"
                    ] ).draw( false );
                  
              
             },
             error:function(error_msg){
                console.log(error_msg);
             }
        });


    
}
=======


function sendMessageToChannel(){
  //ajax on success
    var msg=tinymce.get("textmsg").getContent();
    console.log(msg);

     $.ajax({
          type: 'POST',
          url: 'createnewmsgforchannel.php',
          data: "channel_id="+selChannel+"&message="+msg+"&replymsgid=0",
          dataType:"json",
          success : function(data) {
          console.log("saving message to channel --- "+data);  
              
                  //lastMsgId= parseInt(d.message_id);
                  var chatTable=$('#example').DataTable();
                
                  chatTable.row.add( [
                  "<div class='media'><div class='media-left'> <img src='http://w3schools.com/bootstrap/img_avatar2.png' class='media-object' style='width:60px'></div><div class='media-body'> <h4 class='media-heading'>"+uname+"</h4><p>"+msg+"</p></div></div>"
                    ] ).draw( false );
                  
              
             },
             error:function(error_msg){
                console.log(error_msg);
             }
        });
>>>>>>> 9c074763af46e20b800c3078d0a4dfdf244c5eee

function sendRepliesToChannel(){
  //ajax on success
    var msg=tinymce.get("replymsg").getContent(); 
    //msg contains html content
    var reply_msg_id = $("#send_replyid").val() ;

<<<<<<< HEAD
    console.log(reply_msg_id);

     $.ajax({
          type: 'POST',
          url: 'createnewmsgforchannel.php',
          data: "channel_id="+selChannel+"&replymsgid="+reply_msg_id+"&message="+msg,
          success : function(data) {
          console.log("saving message to channel --- "+data);  
              lastMsgId= parseInt(data);

               $("#thread-"+reply_msg_id).append("<div class='media'><div class='media-left'><img src='http://w3schools.com/bootstrap/img_avatar2.png' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+uname+"</h4><p>"+msg+"</p><div id='thread-"+data+"'></div><button type='button' class='btn btn-default btn-sm'>Likes <span class='badge'>0</span></button><button type='button' class='btn btn-default btn-sm'>DisLikes <span class='badge'>0</span></button></div></div>");
=======
    
}

function sendRepliesToChannel(channel_id,message,replymsgid){
  //ajax on success
    var msg=tinymce.get("replymsg").getContent();
    console.log(msg);

     $.ajax({
          type: 'POST',
          url: 'createnewmsgforchannel.php',
          data: "channel_id="+selChannel+"&message="+msg+"&replymsgid"+reply_msg_id,
          dataType:"json",
          success : function(data) {
          console.log("saving message to channel --- "+data);  
              
                  //lastMsgId= parseInt(d.message_id);
                  var chatTable=$('#example').DataTable();
                
                  chatTable.row.add( [
                  "<div class='media'><div class='media-left'> <img src='http://w3schools.com/bootstrap/img_avatar2.png' class='media-object' style='width:60px'></div><div class='media-body'> <h4 class='media-heading'>"+uname+"</h4><p>"+msg+"</p></div></div>"
                    ] ).draw( false );
                  
>>>>>>> 9c074763af46e20b800c3078d0a4dfdf244c5eee
              
             },
             error:function(error_msg){
                console.log(error_msg);
             }
        });


    
}

function addReactionToMessage(message_id, userId,reaction){
  //ajax on success

     $.ajax({
          type: 'POST',
          url: 'MessageReaction.php',
          data: "message_id="+message_id+"&user_id="+uid +"&reaction="+reaction,
<<<<<<< HEAD
          dataType:"json",                  //lastMsgId= parseInt(d.message_id);

          success : function(data) {
          console.log(data);  
              
=======
          dataType:"json",
          success : function(data) {
          console.log(data);  
              
                  //lastMsgId= parseInt(d.message_id);
>>>>>>> 9c074763af46e20b800c3078d0a4dfdf244c5eee
                  
                  
              
             }
        });

<<<<<<< HEAD

    
}

=======

    
}
>>>>>>> 9c074763af46e20b800c3078d0a4dfdf244c5eee


function getNewMessagesforChannel(){
 //get New message for this channel every 5 seconds
  //console.log("get new messages from ajax for this channel"+selChannel);
  var chatTable=$('#example').DataTable();
  
  $.ajax({
          type: 'POST',
          url: 'getnewmsgforchannel.php',
          data: "channel_id="+selChannel + "&msg_id="+lastMsgId,
          dataType:"json",
          success : function(data) {
          //console.log(data);  
              $.each(data,function(i,d){
                  lastMsgId= parseInt(d.message_id);
                  

<<<<<<< HEAD
                  if(d.reply_msg_id=="0"){

                    chatTable.row.add(["<div class='media'><div class='media-left'><img src='http://w3schools.com/bootstrap/img_avatar2.png' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p><div id='thread-"+d.message_id+"'></div><button type='button' class='btn btn-default btn-sm'>Likes <span class='badge'>"+d.likes+"</span></button><button type='button' class='btn btn-default btn-sm'>DisLikes <span class='badge'>"+d.dislikes+"</span></button><button type='button' class='btn btn-default btn-sm reply_c' onclick='sendreplies("+d.message_id+")'><span class='glyphicon glyphicon-share-alt'></span>Reply</button></div></div>"]).draw(false);
                  }else{
                      $("#thread-"+d.reply_msg_id).append("<div class='media'><div class='media-left'><img src='http://w3schools.com/bootstrap/img_avatar2.png' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p><div id='thread-"+d.message_id+"'></div><button type='button' class='btn btn-default btn-sm'>Likes <span class='badge'>"+d.likes+"</span></button><button type='button' class='btn btn-default btn-sm'>DisLikes <span class='badge'>"+d.dislikes+"</span></button></div></div>");

                  }
              });
             }
        });
}

var pooler =setInterval(getNewMessagesforChannel,5000);

  </script>
</head>

<body >

<!-- Message Box-->

<div class="modal msgreply" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reply Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <textarea id="replymsg"></textarea>
        <input type="hidden" id="send_replyid"></input>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary sendreply" onclick="sendRepliesToChannel()">Send</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Creating a channel-->

  <div class="modal fade openchannel" id="myModal" tabindex="-1" role="dialog">
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
          <button type="button" class=" channelbutton btn btn-primary" name= "channelbutton">Save 

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
      <a class="navbar-brand" href="#">Stud-Collab</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Help</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#" data-toggle="modal" data-target="myModal">Create a channel</a></li>
        <li><button class="btn btn-primary navbar-btn createbutton">Create A Channel</button></li>
        
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
    <div class="col-sm-3" style="margin:0px;">
      <div class="list-group" id="channelList">

           <?php 
              $sql = "SELECT * FROM `channel` where channel_type='public' UNION SELECT * From `channel` where channel_type='private' and created_by=".$user." union select * from channel where channel_id in (select channel_id from user_channel where user_id=".$user.")";

            
                  $result = $connect-> query($sql);

                  if ($result->num_rows > 0) {
                 
                    while($row = $result->fetch_assoc()) {
                      if($row["channel_type"]=="private"){
                           echo "<a class='list-group-item active' href='javascript:showChannel(".$row['channel_id'].")'> ".$row['channel_name']." </a>";
                      }else{
                          echo "<a class='list-group-item' href='javascript:showChannel(".$row['channel_id'].")'> ".$row['channel_name']." </a>";
                        }
                     }
                  }
            ?>
      </div>
    </div>

    <div class="col-sm-9">
        <div id="channelChat">
          
        </div>
      <div class="form-group">
        <textarea id="textmsg"></textarea><button class="btn btn-primary" onclick="sendMessageToChannel()">Send</button>
      </div>
      
    </div>
</div>

=======
function getNewMessagesforChannel(){
 //get New message for this channel every 5 seconds
  console.log("get new messages from ajax for this channel"+selChannel);
  var chatTable=$('#example').DataTable();
  
  $.ajax({
          type: 'POST',
          url: 'getnewmsgforchannel.php',
          data: "channel_id="+selChannel + "&msg_id="+lastMsgId,
          dataType:"json",
          success : function(data) {
          console.log(data);  
              $.each(data,function(i,d){
                  lastMsgId= parseInt(d.message_id);
                  

                  if(d.user_id==uid){
                      if(d.reply_msg_id=="0"){
                             chatTable.row.add( ["<div class='media'><div class='media-left'> <img src='http://w3schools.com/bootstrap/img_avatar2.png' class='media-object' style='width:60px'></div><div class='media-body'> <h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p></div></div>"]).draw( false );
                      }else{
                             chatTable.row.add( [ "<div class='media'><div class='media-body'> <h4 class='media-heading'>"+d.replied_by+"</h4><p>"+d.reply+"</p></div><div class='media-right'> <img src='http://w3schools.com/bootstrap/img_avatar1.png' class='media-object' style='width:60px'></div></div><div class='media'><div class='media-left'> <img src='http://w3schools.com/bootstrap/img_avatar3.png' class='media-object' style='width:60px'></div><div class='media-body'> <h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p>  </div></div>"]).draw( false );
                      }
                  }else{
                      if(d.reply_msg_id=="0"){
                          chatTable.row.add( ["<div class='media'><div class='media-body'> <h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p></div><div class='media-right'> <img src='http://w3schools.com/bootstrap/img_avatar1.png' class='media-object' style='width:60px'></div></div>"]).draw( false );
                      }else{
                              chatTable.row.add( ["<div class='media'><div class='media-left'> <img src='http://w3schools.com/bootstrap/img_avatar3.png' class='media-object' style='width:60px'></div><div class='media-body'> <h4 class='media-heading'>"+d.replied_by+"</h4><p>"+d.reply+"</p></div></div><div class='media'><div class='media-body'> <h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p></div><div class='media-right'> <img src='http://w3schools.com/bootstrap/img_avatar1.png' class='media-object' style='width:60px'></div></div>"]).draw( false );
                      }
                       
                  }
              });
             }
        });
}

var pooler =setInterval(getNewMessagesforChannel,5000);

  </script>
</head>

<body >

<!-- Message Box-->

<div class="modal msgreply" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reply Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Creating a channel-->

  <div class="modal fade openchannel" id="myModal" tabindex="-1" role="dialog">
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
          <button type="button" class=" channelbutton btn btn-primary" name= "channelbutton">Save 

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
      <a class="navbar-brand" href="#">Stud-Collab</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Help</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#" data-toggle="modal" data-target="myModal">Create a channel</a></li>
        <li><button class="btn btn-primary navbar-btn createbutton">Create A Channel</button></li>
        
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
    <div class="col-sm-3" style="margin:0px;">
      <div class="list-group" id="channelList">

           <?php 
              $sql = "SELECT * FROM `channel` where channel_type='public' UNION SELECT * From `channel` where channel_type='private' and created_by=".$user." union select * from channel where channel_id in (select channel_id from user_channel where user_id=".$user.")";

            
                  $result = $connect-> query($sql);

                  if ($result->num_rows > 0) {
                 
                    while($row = $result->fetch_assoc()) {
                      if($row["channel_type"]=="private"){
                           echo "<a class='list-group-item active' href='javascript:showChannel(".$row['channel_id'].")'> ".$row['channel_name']." </a>";
                      }else{
                          echo "<a class='list-group-item' href='javascript:showChannel(".$row['channel_id'].")'> ".$row['channel_name']." </a>";
                        }
                     }
                  }
            ?>
      </div>
    </div>

    <div class="col-sm-9">
        <div id="channelChat">
          
        </div>
      <div class="form-group">
        <textarea id="textmsg"></textarea><button class="btn btn-primary" onclick="sendMessageToChannel()">Send</button>
      </div>
      <div class="form-group" style="display:none; ">
        <textarea id="replymsg"></textarea><button class="btn btn-primary" onclick="sendRepliesToChannel()">Send</button>
      </div>
    </div>
</div>

>>>>>>> 9c074763af46e20b800c3078d0a4dfdf244c5eee
</body>

</html>
