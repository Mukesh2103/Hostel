<?php session_start();
	include "connection.php";
	echo $_FILES['video']['name'];
	if($_FILES['video']['name'])
	{
		if(!$_FILES['video']['error'])
		{
			$name=$_FILES['video']['name'];
			$size=$_FILES['video']['size'];
			$type=$_FILES['video']['type'];
			$tmp=$_FILES['video']['tmp_name'];
			$post_by=$_SESSION['uid'];
			if($_POST['caption'])
				$caption=$_POST['caption'];
			else
				$caption='';
			date_default_timezone_set("Asia/Kolkata");
			$date_time=date("Y-m-d h:i:sa");
			$folder='video/';
			$valid_file=true;
			if($type=="video/mp4")
			{
				if($_FILES['video']['size'] > (20971520))
				{
					$valid_file = false;
					if($_SESSION['type']=='Admin')
						header('location:admin_home.php?video=S');
					elseif($_SESSION['type']=='Student')
						header('location:student_home.php?video=S');
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
						header('location:admin_home.php?video=Y');
					elseif($_SESSION['type']=='Student')
						header('location:student_home.php?video=Y');
				}
			}
			else
			{
				if($_SESSION['type']=='Admin')
					header('location:admin_home.php?video=NOT');
				elseif($_SESSION['type']=='Student')
					header('location:student_home.php?video=NOT');
			}
		}
	}
	else
	{
		if($_SESSION['type']=='Admin')
			header('location:admin_home.php?video=N');
		elseif($_SESSION['type']=='Student')
			header('location:student_home.php?video=N');
	}
?>