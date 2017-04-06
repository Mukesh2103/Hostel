<?php
	include "connection.php";
	if(isset($_REQUEST['id']))
		$id=$_REQUEST['id'];

	try
	{
		$query="SELECT `room_no` FROM `student_details` WHERE `id`=$id";
		$stmt=$db->query($query);
		foreach($stmt as $row)
			$room_no=$row['room_no'];

		$query="DELETE FROM `student_details` WHERE `id`=:id";
		$stmt=$db->prepare($query);
		$stmt->bindparam(':id',$id);
		$stmt->execute();

		$query="SELECT `present_student` FROM `room` WHERE `room_no`=$room_no";
		$stmt=$db->query($query);
		foreach ($stmt as $row)
			$present_student=$row['present_student'];
		$present_student=$present_student-1;

		$query="UPDATE `room` SET `present_student`=:present_student WHERE `room_no`=$room_no";
		$stmt=$db->prepare($query);
		$stmt->bindparam(':present_student',$present_student);
		$stmt->execute();

		header('location:view details.php?check=R');
	}
	catch(Exception $e)
	{
		echo "Error ".$e;
	}
?>