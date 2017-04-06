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
		$snacks=$_POST['snacks'];
		$snacks=filter($snacks);
		$query="SELECT * FROM `mess_details` WHERE `day`=:day";
		$stmt=$db->prepare($query);
		$stmt->bindparam(':day',$day);
		$stmt->execute();

		if($stmt->rowCount()==0)
		{
			$query="INSERT INTO `mess_details` (`day`,`snacks`) VALUES(:day,:snacks)";
			try
			{
				$stmt=$db->prepare($query);
				$stmt->bindparam(':day',$day);
				$stmt->bindparam(':snacks',$snacks);
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
			$query="UPDATE `mess_details` SET `snacks`=:snacks where `day`=:day";
			try
			{
				$stmt=$db->prepare($query);
				$stmt->bindparam(':snacks',$snacks);
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
