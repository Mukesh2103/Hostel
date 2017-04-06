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
		$subject=$_POST['subject'];
		$subject=filter($subject);
		$description=$_POST['description'];
		$description=filter($description);
		$date=date("Y-m-d");
		$student_id=$_SESSION['uid'];
		$status='not-viewed';

		$query="INSERT INTO `complaint` (`subject`, `description`, `date`, `student_id`, `status`) VALUES(:subject, :description, :date, :student_id, :status)";
		try
		{
			$stmt=$db->prepare($query);
			$stmt->bindparam(':subject',$subject);
			$stmt->bindparam(':description',$description);
			$stmt->bindparam(':date',$date);
			$stmt->bindparam(':student_id',$student_id);
			$stmt->bindparam(':status',$status);
			$stmt->execute();
			header('location:complaint.php?check=Y');
		}
		catch(Exception $e)
		{
			echo "Insertion failed. ".$e;
		}
	}
?>