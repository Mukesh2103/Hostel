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
		$submition_date=$_POST['submition_date'];
		$submition_date=filter($submition_date);
		$reason=$_POST['reason'];
		$reason=filter($reason);
		$from_date=$_POST['from_date'];
		$from_date=filter($from_date);
		$to_date=$_POST['to_date'];
		$to_date=filter($to_date);
		$student_id=$_SESSION['uid'];
		$status='not-viewed';
		$days=$to_date-$from_date;

		$query="INSERT INTO `applications` (`submition_date`, `reason`, `from_date`, `to_date`, `student_id`, `status`) VALUES(:submition_date, :reason, :from_date, :to_date , :student_id, :status)";
		try
		{
			$stmt=$db->prepare($query);
			$stmt->bindparam(':submition_date',$submition_date);
			$stmt->bindparam(':reason',$reason);
			$stmt->bindparam(':from_date',$from_date);
			$stmt->bindparam(':to_date',$to_date);
			$stmt->bindparam(':student_id',$student_id);
			$stmt->bindparam(':status',$status);
			$stmt->execute();
			header('location:applications_student.php?check=Y');
		}
		catch(Exception $e)
		{
			echo "Insertion failed. ".$e;
		}
	}
?>