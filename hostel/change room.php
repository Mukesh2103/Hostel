<?php session_start();
	function filter($data)
	{
		$data=trim($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	if($_SERVER['REQUEST METHOD']='POST')
	{
		include 'connection.php';
		$new_room_no=$_POST['new_room_no'];
		$new_room_no=filter($new_room_no);

		try
		{
			$uid=$_SESSION['uid'];
			$query="SELECT `room_no` FROM `student_details` WHERE `id`=$uid";
			$stmt=$db->query($query);
			foreach($stmt as $row)
				$cur_room_no=$row['room_no'];
			
			$query="SELECT `present_student` FROM `room` WHERE `room_no`=$cur_room_no";
			$stmt=$db->query($query);
			foreach($stmt as $row)
				$present_student=$row['present_student'];
			$present_student=$present_student-1;
			$query="UPDATE `room` SET `present_student`=:present_student WHERE `room_no`=$cur_room_no";
			$stmt=$db->prepare($query);
			$stmt->bindparam(':present_student',$present_student);
			$stmt->execute();

			$query="UPDATE `student_details` SET `room_no`=:room_no WHERE `id`=$uid";
			$stmt=$db->prepare($query);
			$stmt->bindparam(':room_no',$new_room_no);
			$stmt->execute();

			$query="SELECT `present_student` FROM `room` WHERE `room_no`=$new_room_no";
			$stmt=$db->query($query);
			foreach($stmt as $row)
				$present_student=$row['present_student'];
			$present_student=$present_student+1;
			$query="UPDATE `room` SET `present_student`=:present_student WHERE `room_no`=$new_room_no";
			$stmt=$db->prepare($query);
			$stmt->bindparam(':present_student',$present_student);
			$stmt->execute();

			header('location:room details student.php?check=Y');
		}
		catch(Exception $e)
		{
			echo "Error ".$e;
		}
	}
?>