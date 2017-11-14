<?php
require_once './php_action/db_connect.php';
session_start();
$user_reaction=$_REQUEST['reaction'];
$messageid=$_REQUEST['message_id'];
$userid=$_REQUEST['user_id'];

$sql="SELECT reaction FROM reactions WHERE message_id=$messageid AND user_id=$userid";
$result = $connect->query($sql);
$row = mysqli_fetch_row($result);
$reaction=$row[0];
/*echo $reaction;*/
if($result->num_rows == 0)
{
	
	/*creating record in reaction table*/ 
	if($user_reaction==1 || $user_reaction==0)
	{
		/*$reaction=$_REQUEST['reaction'];*/
		$insert="INSERT INTO reactions (`reaction_id`, `user_id`, `message_id`, `reaction`) VALUES (NULL,$userid,$messageid,$user_reaction)";
		
		if($connect->query($insert)==TRUE) 
		{
			echo "Success";
		}
		/*else
		{
			echo "Error :" .$insert. "<br>" .$connect->error;

		}*/

	}

}

else if($result->num_rows> 0)
{
		/*update reaction record*/
				if($user_reaction==$reaction)
				{
					echo "Already reacted";
				}
				else if($reaction!=$user_reaction)
				{
					$reactupdate="UPDATE `reactions` SET `reaction`=$user_reaction WHERE user_id=userid AND message_id=messageid";
					
					if($connect->query($reactupdate)==TRUE)
					{
						echo "User reaction updated";
					}
					else
					{
						echo "Error :" .$reactupdate. "<br>" .$connect->error;
					}

				}
}

?>


