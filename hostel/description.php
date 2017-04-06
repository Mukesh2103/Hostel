<html>
	<?php
		include "admin_home_header.php";
		include "connection.php";
	?>
	<head>
		<title>Complaint Description</title>
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
						<a class="navbar-brand" href="admin_home.php">Hostel Management</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
			  				<li role="presentation"><a href="admin_home.php">Home</a></li>
			  				<li role="presentation" class="dropdown">
			  					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Hostel Visit<span class="caret"></span></a>
			  					<ul class="dropdown-menu" role="menu">
				  					<li><a href="room details.php">Room Details</a></li>
				  					<li><a href="mess details.php">Mess Details</a></li>
			  					</ul>
			  				</li>
			  				<li role="presentation" class="active"><a href="complaint-box.php">Complaint Box</a></li>
			  				<li role="presentation"><a href="admin notification.php">Notification</a></li>
			  				<li role="presentation"><a href="application-box.php">Application Box</a></li>
			  				<li role="presentation"><a href="student_register.php">Student Registration</a></li>
			  			</ul>
						<ul class="nav nav-navbar navbar-right">
							<li class="presentation"><a class="" href="logout.php" role="button">Logout</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<?php
			if(isset($_REQUEST['id']))
				$complaint_id=$_REQUEST['id'];
			$query="SELECT `subject`, `description`, `name`, `room_no`, `date`, `complaint`.`status` FROM `complaint`, `student_details` WHERE `student_id`=`id` AND `complaint_id`=$complaint_id ORDER BY `date`";
			$stmt=$db->query($query);
			foreach ($stmt as $row) 
			{
				$subject=$row['subject'];
				$description=$row['description'];
				$name=$row['name'];
				$room_no=$row['room_no'];
				$date=$row['date'];
			}
			echo "<div class='col-sm-offset-3 col-sm-6'>
				<h2>Description of Complaint</h2><br/><br/>
				<form class='form-horizontal'>
					<div class='form-group'>
						<div class='col-sm-6'><h4>Student Name</h4></div>
						<div class='col-sm-6'>".$name."</div>
					</div>
					<div class='form-group'>
						<div class='col-sm-6'><h4>Room No.</h4></div>
						<div class='col-sm-6'>".$room_no."</div>
					</div>
					<div class='form-group'>
						<div class='col-sm-6'><h4>Date</h4></div>
						<div class='col-sm-6'>".$date."</div>
					</div>
					<div class='form-group'>
						<div class='col-sm-6'><h4>Subject</h4></div>
						<div class='col-sm-6'>".$subject."</div>
					</div>
					<div class='form-group'>
						<div class='col-sm-6'><h4>Description</h4></div>
						<div class='col-sm-6'>".$description."</div>
					</div>
					<div class='form-group'>
						<a class='btn btn-lg btn-block btn-primary' href='complaint-box.php'>Back</a>
					</div>
				</form>
			</div>";
			$status='viewed';
			$query="UPDATE `complaint` SET `status`=:status WHERE `complaint_id`=:complaint_id ";
			$stmt=$db->prepare($query);
			$stmt->bindparam(':status',$status);
			$stmt->bindparam(':complaint_id',$complaint_id);
			$stmt->execute();	
		?>
	</body>
	<?php include "footer.php";?>
</html>