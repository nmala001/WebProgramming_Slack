<?php
require_once 'php_action/db_connect.php';
session_start();
$user_id=$_SESSION["userId"];
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

$sql = "SELECT c.channel_name FROM `channel` c JOIN user_channel u on u.channel_id=c.channel_id where u.user_id=$user_id";
$result1 = mysqli_query($connect, $sql);
$channels=array();
 if($result1->num_rows > 0)
{
	echo "Channel Menmbership:<br>";
	while($row = $result1->fetch_assoc())
	{
		$channels[]=$row;
        echo $row["channel_name"];
        echo "<br>";
	}
}
else
{

	//echo "Error :" .$sql. "<br>" .$connect->error;
}

/*$prof->channeldetails=array();*/

/*get user information	*/


$sql1 = "SELECT first_name, last_name, email,username FROM user WHERE user_id =$user_id";


$result = mysqli_query($connect, $sql1);
$userdetails=array();
 if($result->num_rows > 0)
{
	echo "User Information:<br>";
	while($row = $result->fetch_assoc())
	{
		$prof->firstname=$row["first_name"];
		echo $row["first_name"];
		echo "<br>";
		$prof->lastname=$row["last_name"];
		echo $prof->lastname=$row["last_name"];
		echo "<br>";
		$prof->email=$row["email"];
		echo $row["email"];
		echo "<br>";
		$prof->username=$row["username"];
		echo $row["username"];
		echo "<br>";
		$userdetails[]=$row;

	}
	
}
else
{

	//echo "Error :" .$sql1. "<br>" .$connect->error;
}
//echo json_encode($prof);
//echo $prof;


//profile picture part
//Get user data from database
$result = $connect->query("SELECT * FROM profile_pic WHERE user_id = $user_id");
$row = $result->fetch_assoc();

//User profile picture
$userPicture = !empty($row['img_path'])?$row['img_path']:'no-image.png';
$userPictureURL = $userPicture;
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
function completeUpload(success, fileName) {
    if(success == 1){
        $('#imagePreview').attr("src", "");
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
            <a class="editLink" href="javascript:void(0);"><img src="uploads/images/edit.png"/></a>
            <!-- Profile image -->
            <img src="<?php echo $userPictureURL; ?>" id="imagePreview">
        </div>
        <!--
        <div class="name">
            <h3><?php/* echo $row['name']; */?></h3>
        </div>
    -->
    </div>
</div>
<div>


</div>

</body>>
</html>
