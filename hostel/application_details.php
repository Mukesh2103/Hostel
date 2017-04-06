<html>
	<?php
		include "connection.php";
		include "student_home_header.php";
	?>
	<head>
		<title>Application Details</title>
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
			  				<li role="presentation" class="dropdown">
			  					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Hostel Visit<span class="caret"></span></a>
			  					<ul class="dropdown-menu" role="menu">
				  					<li><a href="room details student.php">Room Details</a></li>
				  					<li><a href="mess details student.php">Mess Details</a></li>
			  					</ul>
			  				</li>
			  				<li role="presentation"><a href="complaint.php">Complaint Box</a></li>
			  				<li role="presentation"><a href="student notification.php">Notification</a></li>
			  				<li role="presentation" class="active"><a href="applications_student.php">Application</a></li>
			  			</ul>
			  			<ul class="nav navbar-nav navbar-right">
							<li class="presentation"><a class="" href="logout.php" role="button">Logout</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<?php
			if(isset($_REQUEST['application_id']))
				$application_id=$_REQUEST['application_id'];
			$query="SELECT `application_id`, `submition_date` , `reason` , `from_date` , `to_date` , `student_id` , `name` , `room_no` FROM `applications` , `student_details` WHERE `application_id`=:application_id  AND `id`=`student_id`";
			$stmt=$db->prepare($query);
			$stmt->bindparam(':application_id',$application_id);
			$stmt->execute();
			
			foreach($stmt as $row)
			{
				$submition_date=$row['submition_date'];
				$reason=$row['reason'];
				$from_date=$row['from_date'];
				$to_date=$row['to_date'];
				$student_id=$row['student_id'];
				$name=$row['name'];
				$room_no=$row['room_no'];

				echo "<div class='jumbotron col-md-10 col-md-offset-1'>
					<div class='container'>
						<p>
							To,<br/><br/>The Hostel Warden<br/>Boys Hostel SSIPMT<br/>Mujgahan, Raipur<br/><br/>
							Date : ".$submition_date."<br/><br/>
							Subject - An Application for leave.<br/><br/>
							Respected Sir,<br/><br/>
							Most respectfully, I beg to say that ".$reason.".<br/>
							Kindly grant me leave from ".$from_date." to ".$to_date." .<br/><br/>
							Thanking you.<br/><br/>
							Yours Obediently<br/>
							Name = ".$name."<br/>
							Room No. = ".$room_no."<br/>
						</p>
					</div>
				</div>";
			}
		?>
		<div class="col-md-10 col-md-offset-1">
			<a class='btn btn-lg btn-block btn-primary' href='applications_student.php'>Back</a>
		</div>
	</body>
	<?php include "footer.php" ?>
</html>