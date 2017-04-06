<?php session_start();
	include "connection.php";
	if(isset($_REQUEST['event_id']))
		$event_id=$_REQUEST['event_id'];
	$student_id=$_SESSION['uid'];
	$sql = "SELECT * FROM `participants` WHERE event_id=:event_id AND student_id=:student_id ";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':event_id',$event_id);
	$stmt->bindParam(':student_id', $student_id);
	$stmt->execute();

	$count=$stmt->rowCount();
	if($count>0)
	{
		echo $count;
		header('location:student notification.php?check=N');
	}
	elseif($count==0)
	{
		$query = "INSERT INTO `participants` (`event_id`,`student_id`) VALUES(:event_id,:student_id)";
		try
		{
			$stmt=$db->prepare($query);
			$stmt->bindparam(':event_id',$event_id);
			$stmt->bindparam(':student_id',$student_id);
			$stmt->execute();
			header('location:student notification.php?check=Y');
		}
		catch(Exception $e)
		{
			echo "Error:".$e;
		}
	}
?>