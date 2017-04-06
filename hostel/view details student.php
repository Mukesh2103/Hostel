<html>
	<?php
		include "connection.php";
		include "student_home_header.php";
	?>
	<head>
		<title>Student Details</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>
	<body><br/>
		<div class="row">
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
			          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="student_home.php">Hostel Management</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li role="presentation"><a href="student_home.php">Home</a></li>
			  				<li role="presentation" class="dropdown active">
			  					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Hostel Visit<span class="caret"></span></a>
			  					<ul class="dropdown-menu" role="menu">
				  					<li><a href="room details student.php">Room Details</a></li>
				  					<li><a href="mess details student.php">Mess Details</a></li>
			  					</ul>
			  				</li>
			  				<li role="presentation"><a href="complaint.php">Complaint Box</a></li>
			  				<li role="presentation"><a href="student notification.php">Notification</a></li>
			  				<li role="presentation"><a href="applications_student.php">Application</a></li>
			  			</ul>
			  			<ul class="nav navbar-nav navbar-right">
							<li class="presentation"><a class="" href="logout.php" role="button">Logout</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<?php
			if(isset($_REQUEST['room_no']))
				$room_no=$_REQUEST['room_no'];
			$query="SELECT * FROM `student_details` WHERE `room_no`=:room_no";
			$stmt=$db->prepare($query);
			$stmt->bindparam(':room_no',$room_no);
			$stmt->execute();
			$count=$stmt->rowCount();

			$i=1;
			foreach($stmt as $row)
			{
				$name=$row['name'];
				$photo_path=$row['photo_path'];
				$photo_name=$row['photo_name'];
				$father_name=$row['father_name'];
				$mother_name=$row['mother_name'];
				$mobile_no=$row['mobile_no'];
				$parent_no=$row['parent_no'];
				$email=$row['email'];
				$address=$row['address'];
				$gender=$row['gender'];
				$blood_group=$row['blood_group'];
				$course=$row['course'];
				$year=$row['year'];
				$admission_date=$row['admission_date'];
				$room_no=$row['room_no'];

				if($i==1)
					$temp="First";
				elseif ($i==2) 
					$temp="Second";
				elseif($i==3)
					$temp="Third";
				if($count==1)
					echo "<div class='col-md-offset-3 col-md-6'>";
				elseif ($count==2)
					echo "<div class='col-md-6'>";
				elseif($count==3)
					echo "<div class='col-md-4'>";

				echo "<h2 class='col-sm-offset-1'>Details of ".$temp." Student</h2><br/><br/>
					<form class='form-horizontal'>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Student Name</h4></div>
							<div class='col-sm-6'>".$name."</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Profile photo</h4></div>
							<img src='".$photo_path.$photo_name."' class='img-rounded img-responsive' style='width: 140px; height: 140px;'>
						</div>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Fathers Name</h4></div>
							<div class='col-sm-6'>".$father_name."</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Mothers Name</h4></div>
							<div class='col-sm-6'>".$mother_name."</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Mobile no.</h4></div>
							<div class='col-sm-6'>".$mobile_no."</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Parent/Guardian no.</h4></div>
							<div class='col-sm-6'>".$parent_no."</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Email id</h4></div>
							<div class='col-sm-6'>".$email."</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Address</h4></div>
							<div class='col-sm-6'>".$address."</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Gender</h4></div>
							<div class='col-sm-6'>".$gender."</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Blood Group</h4></div>
							<div class='col-sm-6'>".$blood_group."</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Course</h4></div>
							<div class='col-sm-6'>".$course."</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Year</h4></div>
							<div class='col-sm-6'>".$year."</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Admission Date</h4></div>
							<div class='col-sm-6'>".$admission_date."</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-6'><h4>Room no</h4></div>
							<div class='col-sm-6'>".$room_no."</div>
						</div>
					</form>
				</div>";
				$i++;
			}
		?>
		<div class="col-md-offset-3 col-md-6">
			<a class="btn btn-lg btn-primary btn-block" href="room details student.php">Back</a>
		</div>
	</body>
	<?php include "footer.php";?>
</html>