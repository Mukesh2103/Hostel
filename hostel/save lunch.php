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
		$lunch=$_POST['lunch'];
		$lunch=filter($lunch);
		$query="SELECT * FROM `mess_details` WHERE `day`=:day";
		$stmt=$db->prepare($query);
		$stmt->bindparam(':day',$day);
		$stmt->execute();

		if($stmt->rowCount()==0)
		{
			$query="INSERT INTO `mess_details` (`day`,`lunch`) VALUES(:day,:lunch)";
			try
			{
				$stmt=$db->prepare($query);
				$stmt->bindparam(':day',$day);
				$stmt->bindparam(':lunch',$lunch);
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
			$query="UPDATE `mess_details` SET `lunch`=:lunch where `day`=:day";
			try
			{
				$stmt=$db->prepare($query);
				$stmt->bindparam(':lunch',$lunch);
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
