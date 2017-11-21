<?php
require_once 'php_action/db_connect.php';
session_start();
global $user_id;
$user_id=$_REQUEST['user_id'];

$upload=0;
class Profile{
    var $username;
    var $firstname;
    var $lastname;
    var $email;
    var $userid;
    var $channeldetails;
}
$prof=new Profile();

/*get channels for user*/
function channelownership(){
global $connect;
//$user_id = $_SESSION['userId'];
$user_id=$_REQUEST['user_id'];

$sql = "SELECT channel_name FROM `channel` where channel_type='public'";
$result1 = mysqli_query($connect, $sql);
$channels=array();
    if($result1->num_rows > 0)
    {
        echo"Public Channels:"."<br>";   
        while($row = $result1->fetch_assoc())
        {
            echo $row["channel_name"]."<br>";
            
        }
    }
    else
    {
    echo "Not a member of any channel ";
        //echo "Error :" .$sql. "<br>" .$connect->error;
    }
}
/*$prof->channeldetails=array();*/

/*get user information  */

function num_posts(){
global $connect;
//$user_id = $_SESSION['userId'];
$user_id=$_REQUEST['user_id'];
$posts = ("SELECT count(message) as number_posts FROM `message` where created_by=$user_id");
$result = mysqli_query($connect, $posts);
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        
        echo "Posted : ".$row["number_posts"]  ." " ."messages";
        echo "<br>";
    }
}
else
{

    echo "You have not posted any messages";
    echo "<br>";
}
}
//number of likes
function num_likes(){
global $connect;
$user_id=$_REQUEST['user_id'];
$like_reactions = ("SELECT count(reaction) as Likes from reactions where user_id=$user_id and reaction=1");
$result = mysqli_query($connect, $like_reactions);
 if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        
        echo " Likes:" ." ".$row["Likes"] ." " ."messages";
        echo "<br>";
    }
}
else
{
        echo " You have not liked any messages";
        echo "<br>";


}
}

//number of disliked messages

function num_dislikes(){
global $connect;
//$user_id = $_SESSION['userId'];
$user_id=$_REQUEST['user_id'];
$dislike_reactions = ("SELECT count(reaction) as Dislikes from reactions where user_id=$user_id and reaction=0");
$result = mysqli_query($connect, $dislike_reactions);
 if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        
        echo " Dislikes:"." ".$row["Dislikes"] ." "."messages";
        echo "<br>";
    }
}
else
{
        echo " You have not Disliked any messages";
        echo "<br>";


}
}

//number of private channels, user  belongs to


function num_privatechannels(){
global $connect;
//$user_id = $_SESSION['userId'];
$user_id=$_REQUEST['user_id'];
$private_channels= ("SELECT Count(c.channel_name) as private_channels FROM `channel` c JOIN user_channel u on u.channel_id=c.channel_id where u.user_id=$user_id");
$result = mysqli_query($connect, $private_channels);
 if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        
        echo "Private Channels: ".$row["private_channels"];
        echo "<br>";
    }
}
else
{
        echo " You are not Member in any private channels";
        echo "<br>";

}
}

//number of public channels to which user belongs to
function num_publicchannels(){
global $connect;
//$user_id = $_SESSION['userId'];
$user_id=$_REQUEST['user_id'];
$public_channels= ("SELECT count(channel_name) num_public FROM `channel` WHERE channel_type='public'");
$result = mysqli_query($connect, $public_channels);
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
         echo "Public Channels ".$row["num_public"] ;
         echo "<br>";
    }
}
else
{

    echo "You are not Member in any public channels";
    echo "<br>";
}
}
$sql1 = "SELECT first_name, last_name, email,username FROM user WHERE user_id =$user_id";
$result = mysqli_query($connect, $sql1);
$userdetails=array();
 if($result->num_rows > 0)
{
    // echo "User Information:<br>";
    while($row = $result->fetch_assoc())
    {
        $prof->username=$row["username"];
        $user_name=$row["username"];

        $prof->firstname=$row["first_name"];
        $firstname= $row["first_name"];
       
        $prof->lastname=$row["last_name"];
        $lastname=$prof->lastname=$row["last_name"];
       
        
        $prof->email=$row["email"];
        $email=$row["email"];
        


    }
    
}
else
{

    //echo "Error :" .$sql1. "<br>" .$connect->error;
}

//profile picture part
//Get user data from database
$result = $connect->query("SELECT * FROM profile_pic WHERE user_id = $user_id");
$row = $result->fetch_assoc();

//User profile picture
$userPicture = !empty($row['img_path'])?$row['img_path']:'default.png';
$userPictureURL = 'uploads/images/'.$userPicture;
?>

<html>
<head>
<style type="text/css">
    .container{width: 100%;}
.user-box {
    width: 200px;
    border-radius: 0 0 3px 3px;
    padding: 10px;
    position: relative;
}
.user-box .name {
    word-break: break-all;
    padding: 10px 10px 10px 10px;
    background: #EEEEEE;
    text-align: center;
    font-size: 20px;
}
.user-box form{display: inline;}
.user-box .name h4{margin: 0;}
.user-box img#imagePreview{width: 100%;}

.editLink {
    position:absolute;
    top:28px;
    right:10px;
    opacity:0;
    transition: all 0.3s ease-in-out 0s;
    -mox-transition: all 0.3s ease-in-out 0s;
    -webkit-transition: all 0.3s ease-in-out 0s;
    background:rgba(255,255,255,0.2);
}
.img-relative:hover .editLink{opacity:1;}
.overlay{
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 2;
    background: rgba(255,255,255,0.7);
}
.overlay-content {
    position: absolute;
    transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    top: 50%;
    left: 0;
    right: 0;
    text-align: center;
    color: #555;
}
.uploadProcess img{
    max-width: 207px;
    border: none;
    box-shadow: none;
    -webkit-border-radius: 0;
    display: inline;
}

</style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
$(document).ready(function () {
    //If image edit link is clicked
    $(".editLink").on('click', function(e){
        e.preventDefault();
        $("#fileInput:hidden").trigger('click');
    });

    //On select file to upload
    $("#fileInput").on('change', function(){
        var image = $('#fileInput').val();
        var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        
        //validate file type
        if(!img_ex.exec(image)){
            alert('Please upload only .jpg/.jpeg/.png/.gif file.');
            $('#fileInput').val('');
            return false;
        }else{
            $('.uploadProcess').show();
          // $('#uploadForm').hide();
            $( "#picUploadForm" ).submit();
        }
    });
});

//After completion of image upload process
function completeUpload(success, fileName,message) {
    if(success == 1){
        console.log(fileName);
        console.log(message);
        location.reload(true);
        $('#imagePreview').attr("src", fileName);
        $('#fileInput').attr("value", fileName);
        $('.uploadProcess').hide();
    }else{
        $('.uploadProcess').hide();
        alert('There was an error during file upload!');
    }
    return true;
}
</script>
</head>
<body>
<div class="container">
    <div class="user-box">
        <div class="img-relative">
            <!-- Loading image -->
            <div class="overlay uploadProcess" style="display: none;">
                <div class="overlay-content"><img src="uploads/images/loading.gif"/></div>
            </div>
            <!-- Hidden upload form -->
           

            <form method="post" action="ProfilePicture.php" enctype="multipart/form-data" id="picUploadForm" target="uploadTarget">
                <input type="file" name="image" id="fileInput" style="display: none;" />
            </form>

            <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;">
                

            </iframe>
            <!-- Image update link -->
           <!-- <a class="editLink" href="javascript:void(0);"><img src="uploads/images/edit.png"/></a> -->
            <!-- Profile image -->
            
                <img src="<?php echo $userPictureURL; ?>" id="imagePreview"/>
            
        </div>
    </div>



  
   
    <div class="row" style="font-size:20px;">
    
  
        
        
        <div class="col-sm-4 col-md-4 ">
            <blockquote style="font-size:30px;">
                <p><b>Username:</b><?php echo $user_name ?></p> 
            </blockquote>
                <p><b>Fistname:</b><?php echo $firstname ?></p> 
                <p><b>Lastname:</b><?php echo $lastname ?></p> 
            <p> <b>Email address:</b><i class="glyphicon glyphicon-envelope"></i> <?php echo $email ?>
                <p class="title"><?php  $res = channelownership(); echo htmlspecialchars_decode($res); ?></p>
                <br>
                <p><b>User Metrics</b></p>
                <p class="title" style="color:blue;"><?php  $res1 = num_posts(); echo htmlspecialchars_decode($res1); ?></p>
                <p class="title" style="color:blue;"><?php  $res2 = num_likes(); echo htmlspecialchars_decode($res2); ?></p>
                <p class="title" style="color:blue;"><?php  $res3 = num_dislikes(); echo htmlspecialchars_decode($res3); ?></p>
                <p class="title" style="color:blue;"><?php  $res4 = num_privatechannels(); echo htmlspecialchars_decode($res4); ?></p>
                <p class="title" style="color:blue;"><?php  $res5 = num_publicchannels(); echo htmlspecialchars_decode($res5); ?></p>
                <button onclick="closeWin()" style ="width:40%">Cancel</button>        
        </div>    
    </div>

</div>
<script>


function closeWin() {
    window.location.assign("dashboard.php");
}
</script>
</body>>
</html>

