<?php session_start();
	include "connection.php";
	if($_FILES['photo']['name'])
	{
		if(!$_FILES['photo']['error'])
		{
			$name=$_FILES['photo']['name'];
			$size=$_FILES['photo']['size'];
			$type=$_FILES['photo']['type'];
			$tmp=$_FILES['photo']['tmp_name'];
			$post_by=$_SESSION['uid'];
			if($_POST['caption'])
				$caption=$_POST['caption'];
			else
				$caption='';
			date_default_timezone_set("Asia/Kolkata");
			$date_time=date("Y-m-d h:i:sa");
			$folder='image/';
			$valid_file=true;
			if(($type=="image/jpeg")||($type=="image/gif")||($type=="image/png")||($type=="image/jpg"))
			{
				if($_FILES['photo']['size'] > (4194304))
				{
					$valid_file = false;
					if($_SESSION['type']=='Admin')
						header('location:admin_home.php?photo=S');
					elseif($_SESSION['type']=='Student')
						header('location:student_home.php?photo=S');
				}
				if($valid_file)
				{
					$query="SELECT MAX(id) AS max FROM `post`";
					$stmt=$db->query($query);
					foreach ($stmt as $row) 
					{
						$id=$row['max'];
					}

					$id=$id+1;
					$extension=end(explode(".", $name));
					$name=$id.".".$extension;

					move_uploaded_file($tmp, "$folder".$name);
					$query="INSERT INTO `post` (`post_by`,`post_name`,`folder_path`,`caption`,`date_time`) VALUES(:post_by,:post_name,:folder_path,:caption,:date_time)";
					$stmt=$db->prepare($query);
					$stmt->bindparam(':post_by',$post_by);
					$stmt->bindparam(':post_name',$name);
					$stmt->bindparam(':folder_path',$folder);
					$stmt->bindparam(':caption',$caption);
					$stmt->bindparam(':date_time',$date_time);
					$stmt->execute();
					if($_SESSION['type']=='Admin')
						header('location:admin_home.php?photo=Y');
					elseif($_SESSION['type']=='Student')
						header('location:student_home.php?photo=Y');
				}
			}
			else
			{
				if($_SESSION['type']=='Admin')
					header('location:admin_home.php?photo=NOT');
				elseif($_SESSION['type']=='Student')
					header('location:student_home.php?photo=NOT');
			}
		}
	}
	else
	{
		if($_SESSION['type']=='Admin')
			header('location:admin_home.php?photo=N');
		elseif($_SESSION['type']=='Student')
			header('location:student_home.php?photo=N');
	}
?>