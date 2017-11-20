<?php

require_once 'php_action/db_connect.php';
session_start();
$user_id=$_SESSION["userId"];

//User metrics
//Number of messages posted by user
$posts = ("SELECT count(message) as number_posts FROM `message` where created_by=$user_id");
$result = mysqli_query($connect, $posts);
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		
        echo "You have posted ".$row["number_posts"]  ." " ."messages";
        echo "<br>";
	}
}
else
{

	echo "You have not posted any messages";
    echo "<br>";
}
//number of likes
$like_reactions = ("SELECT count(reaction) as Likes from reactions where user_id=$user_id and reaction=1");
$result = mysqli_query($connect, $like_reactions);
 if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		
        echo " You have liked" ." ".$row["Likes"] ." " ."messages";
        echo "<br>";
	}
}
else
{
		echo " You have not liked any messages";
        echo "<br>";


}
//number of disliked messages
$dislike_reactions = ("SELECT count(reaction) as Dislikes from reactions where user_id=$user_id and reaction=0");
$result = mysqli_query($connect, $dislike_reactions);
 if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		
        echo " You have Disliked"." ".$row["Dislikes"] ." "."messages";
        echo "<br>";
	}
}
else
{
		echo " You have not Disliked any messages";
        echo "<br>";


}


//number of private channels, user  belongs to
$private_channels= ("SELECT Count(c.channel_name) as private_channels FROM `channel` c JOIN user_channel u on u.channel_id=c.channel_id where u.user_id=$user_id");
$result = mysqli_query($connect, $private_channels);
 if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		
        echo "Member in ".$row["private_channels"]  ." " ."private channels";
        echo "<br>";
	}
}
else
{
		echo " You are not Member in any private channels";
        echo "<br>";

}
//number of public channels to which user belongs to
$public_channels= ("SELECT count(channel_name) num_public FROM `channel` WHERE channel_type='public'");
$result = mysqli_query($connect, $public_channels);
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		 echo "Member in ".$row["num_public"]  ." " ."public channels";
         echo "<br>";
	}
}
else
{

	echo "You are not Member in any public channels";
    echo "<br>";
}

