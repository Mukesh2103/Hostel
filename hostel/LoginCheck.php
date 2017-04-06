<?php session_start();
	function filter($data)
	{
		$data=trim($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		include'connection.php';
		$email=$_POST['email'];
		$email=filter($email);
		$password=$_POST['password'];
		$password=filter($password);
		$status='Active';

		$sql = "SELECT * FROM `student_details` WHERE `email`=:email AND `password`=:password AND `status`=:status";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':status', $status);
		$stmt->execute();

		$count=$stmt->rowCount();
		if($count==0)
		{
			header('location:home.php?check=N');
		}
		else
		{
			foreach($stmt as $row)
			{
				$_SESSION['uid']=$row['id'];
				$_SESSION['type']=$row['type'];
				if($row['type']=='Admin')
					header('location:admin_home.php');
				elseif($row['type']=='Student')
					header('location:student_home.php');
			}
		}
	}
	else
	{
		header('location:home.php');
	}
?>