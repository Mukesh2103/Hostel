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
		$event_name=$_POST['event_name'];
		$event_name=filter($event_name);
		$event_desc=$_POST['event_desc'];
		$event_desc=filter($event_desc);
		$date=date("Y-m-d");

		$query="INSERT INTO `events` (`event_name`, `event_desc`, `date`) VALUES(:event_name, :event_desc, :date)";
		try
		{
			$stmt=$db->prepare($query);
			$stmt->bindparam(':event_name',$event_name);
			$stmt->bindparam(':event_desc',$event_desc);
			$stmt->bindparam(':date',$date);
			$stmt->execute();
			header('location:admin notification.php?check=Y');
		}
		catch(Exception $e)
		{
			echo "Insertion failed. ".$e;
		}
	}
?>