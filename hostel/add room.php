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
		$total_student=$_POST['room_capability'];
		$total_student=filter($total_student);
		$present_student=0;

		$query="SELECT * FROM `room` WHERE room_no=:room_no";
		$stmt=$db->prepare($query);
		$stmt->bindParam(':room_no',$room_no);
		$stmt->execute();
		if($stmt->rowcount() >0)
		{
			header('location:room details.php?check=N');
		}

		$query="INSERT INTO `room` (`room_no`, `total_student`, `present_student`)VALUES (:room_no, :total_student, :present_student)";
		try
		{
			$stmt=$db->prepare($query);
			$stmt->bindparam(':room_no',$room_no);
			$stmt->bindparam(':total_student',$total_student);
			$stmt->bindparam(':present_student',$present_student);
			$stmt->execute();
			header('location:room details.php?check=Y');
		}
		catch(Exception $e)
		{
			echo "Insertion Failed.".$e;
		}
	}
?>