<?php
session_start();
require_once 'php_action/db_connect.php';
//require_once 'queries.php';

$user = $_SESSION['userId'];
$username = $_SESSION['userName'];
?>
<!DOCTYPE html>
<meta charset="UTF-8">
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
  <style>
    
       table.dataTable tr.odd { background-color: white;  border:1px lightgrey;}
        table.dataTable tr.even{ background-color: white; border:1px lightgrey; }

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
        pre {
        white-space: pre-wrap;       /* Since CSS 2.1 */
        white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
        white-space: -pre-wrap;      /* Opera 4-6 */
        white-space: -o-pre-wrap;    /* Opera 7 */
        word-wrap: break-word;       /* Internet Explorer 5.5+ */
      }
/*p {
  word-wrap: break-word;
}*/

  </style>
  <script">
    
    var uname="<?php echo $_SESSION['userName']?>";
    var uid="<?php echo $_SESSION['userId']?>";
    var selMessage = 0;
    var selChannel=0;
    var lastMsgId=0;
    var reaction;


function showChannel(channel_id,status)
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
          var tableData=" <table id='example' class='display' cellspacing='0' width='100%''><thead><tr><th>Id</th><th>Messages</th></tr> </thead><tbody>";
        
              $.each(data,function(i,d){
                  lastMsgId= parseInt(d.message_id);

                  //if(d.user_id==uid){
                      if(d.reply_msg_id=="0"){
                             tableData += "<tr><td>"+d.message_id+"</td><td><div class='media'><div class='media-left'><img src='./uploads/images/"+d.img_path+"' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+d.username+"<p>"+d.created_time+"</p></h4><p>"+d.message+"</p><div id='thread-"+d.message_id+"'></div><button type='button' class='btn btn-default btn-sm' onclick='addReactionToMessage(this,"+d.message_id+","+uid+",1)'>Likes <span class='badge' id='likes'>"+d.likes+"</span></button><button type='button' class='btn btn-default btn-sm' onclick='addReactionToMessage(this,"+d.message_id+","+uid+",0)' >DisLikes <span class='badge' id='dislikes'>"+d.dislikes+"</span></button><button type='button' class='btn btn-default btn-sm reply_c' onclick='sendreplies("+d.message_id+")'><span class='glyphicon glyphicon-share-alt'></span>Reply</button></div></div></td></tr>";
                      }
              });
              tableData +="</tbody></table>";

              $("#channelChat").append(tableData);  
 
               $.each(data,function(i,d){
                  lastMsgId= parseInt(d.message_id);

                  //if(d.user_id==uid){
                      if(d.reply_msg_id!="0"){
                             $("#thread-"+d.reply_msg_id).append("<div class='media'><div class='media-left'><img src='./uploads/images/"+d.img_path+"' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p><p>"+d.created_time+"</p><div id='thread-"+d.message_id+"'></div><button type='button' class='btn btn-default btn-sm' onclick='addReactionToMessage(this,"+d.message_id+","+uid+",1)'>Likes <span class='badge' id='likes'>"+d.likes+"</span></button><button type='button' class='btn btn-default btn-sm' id='dislikes' onclick='addReactionToMessage(this,"+d.message_id+","+uid+",0)'>DisLikes <span class='badge'>"+d.dislikes+"</span></button></div></div>");
                      }
                });

               var dtable=$('#example').DataTable({ "ordering": true,
                  "info": false});
                dtable.column(0).visible(false);
              $('#example').DataTable().order([0, 'desc']).draw();

              if(status==0){
                  $("#textAreaHolder").show();

              }else{
                   $("#textAreaHolder").hide();
                   $('#channelChat').find('*').attr('disabled', true);
              }

                }
        });
}



$(document).ready(function() {


  tinymce.init({ 

    selector:'textarea',

    //end_container_on_empty_block: true,
    //br_in_pre: true,

    plugins: ['advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help'],
    menubar: "insert",
    //forced_root_block: '',
    
    entity_encoding : "raw",
    toolbar : "imageupload media insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help",
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

 }
  */

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
                 // alert("Cannot create channel at this moment!");
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

function sendreplies(x){
  //$(document).on('click','.reply_c', function() {
    $('#send_replyid').val(x);
    $('.msgreply').modal('show');

  //});
 }

function sendMessageToChannel(){
  //ajax on success
    var msg=tinymce.get("textmsg").getContent();
    console.log(msg);

     $.ajax({
          type: 'POST',
          url: 'createnewmsgforchannel.php',
          contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
          data: {"channel_id":selChannel,"message":msg,"replymsgid":0},
          success : function(data) {
          console.log("saving message to channel --- ");  

          console.log(data);
                  //lastMsgId= parseInt(d.message_id);
                  var chatTable=$('#example').DataTable();
                
                  chatTable.row.add( [data,
                  "<div class='media'><div class='media-left'><img src='./uploads/images/"+uid+".jpeg' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+uname+"</h4><p>"+msg+"</p><div id='thread-"+data+"'></div><button type='button' class='btn btn-default btn-sm'>Likes <span class='badge'>0</span></button><button type='button' class='btn btn-default btn-sm'>DisLikes <span class='badge'>0</span></button><button type='button' class='btn btn-default btn-sm reply_c' onclick='sendreplies("+data+")'><span class='glyphicon glyphicon-share-alt'></span>Reply</button></div></div>"
                    ] ).draw( false );

                  $('#example').DataTable().order([0, 'desc']).draw();
                  //to clear the previous typed message content
                  tinymce.get("textmsg").setContent("");
                  
              
             },
             error:function(error_msg){
                console.log(error_msg);
             }
        });


    
}

function sendRepliesToChannel(){
  //ajax on success
    var msg=tinymce.get("replymsg").getContent(); 
    //msg contains html content
    var reply_msg_id = $("#send_replyid").val() ;

    console.log(reply_msg_id);

     $.ajax({
          type: 'POST',
          url: 'createnewmsgforchannel.php',
          data: "channel_id="+selChannel+"&replymsgid="+reply_msg_id+"&message="+msg,
          success : function(data) {
          console.log("saving message to channel --- "+data);  
              lastMsgId= parseInt(data);

               $("#thread-"+reply_msg_id).append("<div class='media'><div class='media-left'><img src='./uploads/images/"+uid+".jpeg' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+uname+"</h4><p>"+msg+"</p><div id='thread-"+data+"'></div><button type='button' class='btn btn-default btn-sm'>Likes <span class='badge'>0</span></button><button type='button' class='btn btn-default btn-sm'>DisLikes <span class='badge'>0</span></button></div></div>");
              
             },
             error:function(error_msg){
                console.log(error_msg);
             }
        });

      $('.msgreply').modal('hide');
    
}

function addReactionToMessage(reactionbtn,message_id, userId,reaction){
  //ajax on success

     $.ajax({
          type: 'POST',
          url: 'MessageReaction.php',
          data: "message_id="+message_id+"&user_id="+uid +"&reaction="+reaction,
          dataType:"json",
          success : function(data){
          console.log("updating reaction"+data);  
              var likes=0;
              var dislikes=0;
                  //lastMsgId= parseInt(d.message_id);
                  $.each(data,function(i,d){
                  if(d.reaction==0)
                  {
                    dislikes=d.num;
                    $(reactionbtn).html("DisLikes <span class='badge'>"+dislikes+"</span> ");
                  }
                  if(d.reaction==1)
                  {
                    likes=d.num;
                     $(reactionbtn).html("Likes <span class='badge'>"+likes+"</span>");
                  }

                  
              });
             
        },error: function(data){
          console.log(data);
        }
        });
}



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
                  

                  if(d.reply_msg_id=="0"){

                    chatTable.row.add(["<div class='media'><div class='media-left'><img src='http://w3schools.com/bootstrap/img_avatar2.png' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p><div id='thread-"+d.message_id+"'></div><button type='button' class='btn btn-default btn-sm'>Likes <span class='badge'>"+d.likes+"</span></button><button type='button' class='btn btn-default btn-sm'>DisLikes <span class='badge'>"+d.dislikes+"</span></button><button type='button' class='btn btn-default btn-sm reply_c' onclick='sendreplies("+d.message_id+")'><span class='glyphicon glyphicon-share-alt'></span>Reply</button></div></div>"]).draw(false);
                  }else{
                      $("#thread-"+d.reply_msg_id).append("<div class='media'><div class='media-left'><img src='http://w3schools.com/bootstrap/img_avatar2.png' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+d.username+"</h4><p>"+d.message+"</p><div id='thread-"+d.message_id+"'></div><button type='button' class='btn btn-default btn-sm'>Likes <span class='badge'>"+d.likes+"</span></button><button type='button' class='btn btn-default btn-sm'>DisLikes <span class='badge'>"+d.dislikes+"</span></button></div></div>");

                  }
              });
             }
        });
}

function search()
{
  console.log($("#searchUser").val());
  var key=$("#searchUser").val();
  $("#searchResults").empty();
 if(key.length>=1){
   $.ajax({
          type: 'POST',
          url: 'search.php',
          data: "key="+key,
          dataType:"json",
          success : function(data) {
            console.log(data);
                $.each(data,function(i,d){
                  $("#searchResults").append("<a href='OtherUserProfile.php?user_id="+d.user_id+"'>"+d.username+"</a>");
                });
          }
        });
 
   
  }
 
}

function takeToProfile(uid){
  console.log(uid);
  //redirect page to profile page using uid
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
        <input type="hidden" id="send_replyid">
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
        <li class="active"><a href="Help.php">Help</a></li>
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
          <li><a href="Profile.php">Profile</a></li>
          <li><a href="UserMetrics.php">Usage</a></li>
        </ul>
      </li>
              <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Signout</a>
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
                    while($row = $result->fetch_assoc()) 
                    {

                      if($row["archive"]==1){
                        echo "<a class='list-group-item list-group-item-danger' href='javascript:showChannel(".$row['channel_id'].",".$row["archive"].")'> ".$row['channel_name']." </a>";
                      }
                 
                   
                      else if($row["channel_type"]=="private"){
                           echo "<a class='list-group-item active' href='javascript:showChannel(".$row['channel_id'].",".$row["archive"].")'> ".$row['channel_name']." </a>";
                      }else{
                          echo "<a class='list-group-item' href='javascript:showChannel(".$row['channel_id'].",".$row["archive"].")'> ".$row['channel_name']." </a>";
                        }
                     }
                  }
            ?>
      </div>
    </div>

    <div class="col-sm-9">
        <div id="channelChat">
          
        </div>
      <div class="form-group" id="textAreaHolder">
        <textarea id="textmsg"></textarea><button class="btn btn-primary" onclick="sendMessageToChannel()">Send</button>
      </div>
      
    </div>
</div>

</body>

</html>
