<?php
session_start();
require_once 'php_action/db_connect.php';
//require_once 'queries.php';

$user = $_SESSION['userId'];
$username = $_SESSION['userName'];
// $result_prof = $connect->query("SELECT * FROM profile_pic WHERE user_id = $user");
// $prof_row1=$result_prof->fetch_assoc();
// $_SESSION["ImgPath"] = $prof_row1['img_path'];

?>
<!DOCTYPE html>

<head>
<meta charset="UTF-8">
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
  <script>
    
    var uname="<?php echo $_SESSION['userName']?>";
    var uid="<?php echo $_SESSION['userId']?>";
    var uprofimg="<?php echo $_SESSION['uImgPath'] ?>";

    var selMessage = 0;
    var selChannel=0;
    var lastMsgId=0;
    var reaction;
var receiver_user_id=0;
var receiver_uname;

function showdirectmsgs(receiver_userid,receiver_u_name){
receiver_uname=receiver_u_name;
//alert("Inside function");
receiver_user_id=receiver_userid;

  
$.ajax({
          type: 'POST',
          url: 'showdirectmsg.php',
          data: "rid="+receiver_user_id+"&runame="+receiver_uname,
          dataType:"json",
          success : function(data) {
          console.log("data for direct msg :"+data);  
          var tableData=" <table id='example' class='display cell-border' cellspacing='0' width='100%'><thead><tr><th>message_id</th><th>Messages<hr></th></tr> </thead><tbody>";
        
              $.each(data,function(i,d){
                        tableData += "<tr><td>"+d.message_id+"</td><td><div class='media'><div class='media-left'><img src='"+d.sender_img+"' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+d.sender_name+"</h4><div style='float:right;'><p>"+d.create_on+"</p></div><p>"+d.message_desc+"</p></div></div><hr></td></tr>";
              });
              tableData +="</tbody></table>";
              $("#DirectChat").empty();
              $("#DirectChat").append(tableData);

              var dTable=$('#example').DataTable();
               dTable.column(0).visible(false);
              $('#example').DataTable().order([0, 'desc']).draw();
}
});

}

function senddirectMessage()
{
 var msg=tinymce.get("directmsg").getContent();
 //alert("Inside function");

    console.log(msg);
$.ajax({
          type: 'POST',
          url: 'createdirectmsg.php',
          data: "msgcontent="+msg+"&rid="+receiver_user_id+"&runame="+receiver_uname,
         // dataType:"json",
          success : function(data) {
console.log("saved direct message to database");  
console.log(data);
                  //lastMsgId= parseInt(d.message_id);x
		  
		  showdirectmsgs(receiver_user_id,receiver_uname);
		  
		  
//                   var chatTable=$('#example').DataTable();
//                 chatTable.row.add( [data,
//                   "<div class='media'><div class='media-left'><img src='"+uprofimg+"' class='media-object' style='width:60px'></div><div class='media-body'><h4 class='media-heading'>"+uname+"</h4><p>"+msg+"</p></div></div><hr>"] ).draw( false );

//                   $('#example').DataTable().order([0, 'desc']).draw();
//                   //to clear the previous typed message content
//                   tinymce.get("directmsg").setContent("");
                  
              
             },
             error:function(error_msg){
                console.log(error_msg);
             }

      });
}


$(document).ready(function() {

  //alert("ready func");


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
                    
                };
                fr.readAsDataURL(file);
            }); //inp close

            editor.addButton( 'imageupload', {
                text:"IMAGE",
                icon: false,
                onclick: function(e) {
                    inp.trigger('click');
                }
            }); //editor close
        }

      }); //tiny mce close

  
}); //doc ready close



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
      <a class="navbar-brand" href="#">Stud-Collab</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="dashboard.php">Home</a></li>
        <li class="active"><a href="Help.php">Help</a></li>
        <li><a href="#">Settings</a></li>
	<li class="active"><a href="invite_users_to channel.php">Invite-Users</a></li>
  <li class="active"><a href="directmsg.php">Direct Message</a></li>
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
              <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Signout</a></li>
      </ul>

    </div>
  </div>
</nav>
  
<div class="container-fluid">
    <div class="col-sm-3" style="margin:0px;">
      
        <div class="col-sm-3">
        <div class="list-group" id="userlist"> 
        <?php 
              $sql = "SELECT * FROM `user` WHERE user_id!=$user";

            
                  $result = $connect-> query($sql);

                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) 
                      {
                        $receiver_user_name = $row['username'];

                        echo "<a class='list-group-item list-group-item-action list-group-item-info' style='width:220px'  href='javascript:showdirectmsgs(".$row['user_id'].",\"".$receiver_user_name."\");'>".$receiver_user_name."</a>";
                        
                              // echo '<li class="list-group-item ">'.$user_name.'</li>';
                        
                        //echo $row["username"];
                                           }
                      }
                    ?>
             </div>
             </div>
    </div>

    <div class="col-sm-9">
        <div id="DirectChat">
          
        </div>
      <div class="form-group" id="textAreaHolder">
        <textarea id="directmsg"></textarea><button class="btn btn-primary" onclick="senddirectMessage()">Send</button>
      </div>
      
    </div>
</div>

</body>

</html>
