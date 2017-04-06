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
		$room_no=$_POST['room_no'];
		$room_no=filter($room_no);
		
		$query="DELETE FROM `room` WHERE room_no=:room_no";
		try
		{
			$stmt=$db->prepare($query);
			$stmt->bindparam(':room_no',$room_no);
			$stmt->execute();
			header('location:room details.php?check=R');
		}
		catch(Exception $e)
		{
			echo "Room Remove process is failed.".$e;
		}
	}
?>