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
		if($_FILES['photo']['name'])
		{
			if(!$_FILES['photo']['error'])
			{
				$photo_name=$_FILES['photo']['name'];
				$size=$_FILES['photo']['size'];
				$type=$_FILES['photo']['type'];
				$tmp=$_FILES['photo']['tmp_name'];
				$folder='photo/';
				$valid_file=true;
				if(($type=="image/jpeg")||($type=="image/gif")||($type=="image/png")||($type=="image/jpg"))
				{
					if($_FILES['photo']['size'] > (160000))
					{
						$valid_file = false;
						$message = 'Oops! Your file size is to large.';
						header('location:student_register.php?photo=S');
					}
					$first_name=$_POST['first_name'];
					$first_name=filter($first_name);
					$middle_name=$_POST['middle_name'];
					$middle_name=filter($middle_name);
					$last_name=$_POST['last_name'];
					$last_name=filter($last_name);
					$name="$first_name $middle_name $last_name";
					//$photo=file_get_contents($tmp);
					$father_name=$_POST['father_name'];
					$father_name=filter($father_name);
					$mother_name=$_POST['mother_name'];
					$mother_name=filter($mother_name);
					$mobile_no=$_POST['mobile_no'];
					$mobile_no=filter($mobile_no);
					$parent_no=$_POST['parent_no'];
					$parent_no=filter($parent_no);
					$email=$_POST['email'];
					$email=filter($email);
					$password=$_POST['password'];
					$password=filter($password);
					$address=$_POST['address'];
					$address=filter($address);
					$gender=$_POST['gender'];
					$gender=filter($gender);
					$blood_group=$_POST['blood_group'];
					$blood_group=filter($blood_group);
					$course=$_POST['course'];
					$course=filter($course);
					$year=$_POST['year'];
					$year=filter($year);
					$admission_date=$_POST['admission_date'];
					$admission_date=filter($admission_date);
					$room_no=$_POST['room_no'];
					$room_no=filter($room_no);
					$type='Student';
					$status='Active';

					$query="SELECT * FROM `student_details` WHERE email=:email";
					$stmt=$db->prepare($query);
					$stmt->bindParam(':email',$email);
					$stmt->execute();
					if($stmt->rowcount() >0)
					{
						header('location:student_register.php?check=N');
					}

					$query="SELECT MAX(id) AS max FROM `student_details`";
					$stmt=$db->query($query);
					foreach ($stmt as $row) 
					{
						$id=$row['max'];
					}

					$id=$id+1;
					$extension=end(explode(".", $photo_name));
					$photo_name=$id.".".$extension;
					move_uploaded_file($tmp, "$folder".$photo_name);

					$query="INSERT INTO `student_details` (`name`,`photo_path`,`photo_name`,`father_name`,`mother_name`,`mobile_no`,`parent_no`,`email`,`password`,`address`,`gender`,`blood_group`,`course`,`year`,`admission_date`,`room_no`,`type`,`status`) 
						VALUES (:name,:photo_path,:photo_name,:father_name,:mother_name,:mobile_no,:parent_no,:email,:password,:address,:gender,:blood_group,:course,:year,:admission_date,:room_no,:type,:status)";
					try
					{
						$stmt=$db->prepare($query);
						$stmt->bindparam(':name',$name);
						$stmt->bindparam(':photo_path',$folder);
						$stmt->bindparam(':photo_name',$photo_name);
						$stmt->bindparam(':father_name',$father_name);
						$stmt->bindparam(':mother_name',$mother_name);
						$stmt->bindparam(':mobile_no',$mobile_no);
						$stmt->bindparam(':parent_no',$parent_no);
						$stmt->bindparam(':email',$email);
						$stmt->bindparam(':password',$password);
						$stmt->bindparam(':address',$address);
						$stmt->bindparam(':gender',$gender);
						$stmt->bindparam(':blood_group',$blood_group);
						$stmt->bindparam(':course',$course);
						$stmt->bindparam(':year',$year);
						$stmt->bindparam(':admission_date',$admission_date);
						$stmt->bindparam(':room_no',$room_no);
						$stmt->bindparam(':type',$type);
						$stmt->bindparam(':status',$status);
						$stmt->execute();
					}
					catch(Exception $e)
					{
						echo "Insertion failed.".$e;
					}

					$query="SELECT present_student FROM `room` WHERE room_no=$room_no";
					$stmt=$db->query($query);
					foreach($stmt as $row)
					{
						$present_student=$row['present_student'];
					}
					$present_student=$present_student+1;

					$query="UPDATE `room` SET `present_student`=:present_student WHERE room_no=$room_no";
					try
					{
						$stmt=$db->prepare($query);
						$stmt->bindparam(':present_student',$present_student);
						$stmt->execute();
						header('location:student_register.php?check=Y');
					}
					catch(Exception $e)
					{
						echo $e;
					}

				}
				else
				{
					header('location:student_register.php?photo=NOT');
				}
			}
		}
		else
		{
			header('location:student_register.php?photo=N');
		}			
	}
?>