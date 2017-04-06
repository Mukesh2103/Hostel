<?php session_start();
	function filter($data)
	{
		$data=trim($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		include 'connection.php';
		$day=$_POST['day'];
		$day=filter($day);
		$breakfast=$_POST['breakfast'];
		$breakfast=filter($breakfast);
		$query="SELECT * FROM `mess_details` WHERE `day`=:day";
		$stmt=$db->prepare($query);
		$stmt->bindparam(':day',$day);
		$stmt->execute();

		if($stmt->rowCount()==0)
		{
			$query="INSERT INTO `mess_details` (`day`,`breakfast`) VALUES(:day,:breakfast)";
			try
			{
				$stmt=$db->prepare($query);
				$stmt->bindparam(':day',$day);
				$stmt->bindparam(':breakfast',$breakfast);
				$stmt->execute();
				header('location:mess details.php?check=Y');
			}
			catch(Exception $e)
			{
				echo "Error:".$e;
			}
		}
		else
		{
			$query="UPDATE `mess_details` SET `breakfast`=:breakfast where `day`=:day";
			try
			{
				$stmt=$db->prepare($query);
				$stmt->bindparam(':breakfast',$breakfast);
				$stmt->bindparam(':day',$day);
				$stmt->execute();
				header('location:mess details.php?check=Y');
			}
			catch(Exception $e)
			{
				echo "Error:".$e;
			}
		}
	}
?>
