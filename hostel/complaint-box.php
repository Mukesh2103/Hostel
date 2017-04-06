<html>
	<?php
		include "connection.php";
		include "admin_home_header.php";
	?>
	<head>
		<title>Complaint Box</title>
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
		<h2 class="sub-header">List of All Complaints</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>SNo.</th>
						<th>Subject</th>
						<th>Student Name</th>
						<th>Room No.</th>
						<th>Date</th>
						<th>Status</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$query="SELECT `complaint_id`, `subject`, `name`, `room_no`, `date`, `complaint`.`status` as `status` FROM `complaint`, `student_details` WHERE `student_id`=`id` ORDER BY `date`";
						$stmt=$db->query($query);
						$Sno=1;
						foreach($stmt as $row)	
						{
							echo "<tr><td>".$Sno."</td>";
							echo "<td>".$row['subject']."</td>";
							echo "<td>".$row['name']."</td>";
							echo "<td>".$row['room_no']."</td>";
							echo "<td>".$row['date']."</td>";
							echo "<td>".$row['status']."</td>";
							echo "<td><a href='description.php?id=".$row['complaint_id']."'>View Description</a></td></tr>";
							$Sno++;
						}
					?>
				</tbody>
			</table>
		</div>
	</body>
	<?php include "footer.php"; ?>
</html>