<?php
require_once './php_action/db_connect.php';
session_start();
$user_reaction=$_REQUEST['reaction'];
$messageid=$_REQUEST['message_id'];
$userid=$_REQUEST['user_id'];

$sql="SELECT reaction FROM reactions WHERE message_id=$messageid AND user_id=$userid";
//echo $sql;
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
		//echo $insert;
		if($connect->query($insert)===TRUE) 
		{
			//echo "Success";
			$sql="SELECT count(*)as num,reaction FROM `reactions` where message_id=$messageid GROUP BY reaction"; 
						$result = $connect->query($sql);
						$messages=array();
						while($row=$result->fetch_assoc()){
						$reactions[]=$row;
							}
						echo json_encode($reactions);
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
					//echo "Already reacted";
				}
				else if($reaction!=$user_reaction)
				{
					
					
					$reactupdate="UPDATE `reactions` SET `reaction`=$user_reaction WHERE user_id=$userid AND message_id=$messageid";
					//echo $reactupdate;
					if($connect->query($reactupdate)==TRUE)
					{
						//echo "User reaction updated";


						$sql="SELECT count(*)as num,reaction FROM `reactions` where message_id=$messageid GROUP BY reaction"; 
						$result = $connect->query($sql);
						$messages=array();
						while($row=$result->fetch_assoc()){
						$reactions[]=$row;
							}
						echo json_encode($reactions);
					}
					else
					{
						//echo "Error :" .$reactupdate. "<br>" .$connect->error;
					}

				}
}

?>








