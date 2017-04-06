<html>
	<?php
		include "connection.php";
		include "student_home_header.php";
	?>
	<head>
		<title>Application Box</title>
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
		<h2 class="sub-header">List of All Applications Submitted by You</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>SNo.</th>
						<th>Submition date</th>
						<th>Starting Date</th>
						<th>Ending Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$id=$_SESSION['uid'];
						$query="SELECT `application_id`, `submition_date` , `from_date` , `to_date`  FROM `applications` WHERE `student_id`=:id ORDER BY `submition_date`";
						$stmt=$db->prepare($query);
						$stmt->bindparam(':id',$id);
						$stmt->execute();
						$Sno=1;
						foreach($stmt as $row)	
						{
							echo "<tr><td>".$Sno."</td>";
							echo "<td>".$row['submition_date']."</td>";
							echo "<td>".$row['from_date']."</td>";
							echo "<td>".$row['to_date']."</td>";
							echo "<td><a href=application_details.php?application_id=".$row['application_id'].">Read Application</a></td>";
							$Sno++;
						}
					?>
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="jumbotron">
					<div class="container">
					<form method="post" action="application_save.php">
						<h2 align="center"><ins>Send Application</ins></h2>
						<p class="col-md-10 col-md-offset-1">
							To,<br/><br/>The Hostel Warden<br/>Boys Hostel SSIPMT<br/>Mujgahan, Raipur<br/><br/>
							Date : 
							<?php 
								$date=date("Y-m-d");
								echo $date;
								echo "<input type='hidden' name='submition_date' id='submition_date' value='".$date."'>";
							?><br/><br/>
							Subject - An Application for leave.<br/><br/>
							Respected Sir,<br/><br/>
							Most respectfully, I beg to say that 
							<textarea class="form-control" name="reason" id="reason" rows="3" required></textarea>.<br/>
							Kindly grant me leave from <input type="date" name="from_date" id="from_date" required> to <input type="date" name="to_date" id="to_date" required> .<br/><br/>
							Thanking you.<br/><br/>
							Yours Obediently<br/>
							<?php
								$id=$_SESSION['uid'];
								$query = "SELECT `name`,`room_no` FROM `student_details` WHERE `id`=:id";
								$stmt=$db->prepare($query);
								$stmt->bindparam(':id',$id);
								$stmt->execute();
								foreach($stmt as $row)
								{
									echo "Name = ".$row['name']."<br/>";
									echo " Room No. = ".$row['room_no'],"<br/>";
								}
							?>
						</p>
						<div class="form-group">
							<div class="col-md-10 col-md-offset-1"><br/><button class="btn btn-primary btn-lg btn-block" type="submit">Submit Application</button></div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
		<?php include "footer.php" ?>
	</body>
	<?php
		if(isset($_REQUEST['check']))
		{
			if($_REQUEST['check']=='Y')
			{
				echo "<script>alert('Application is submitted successfully.')</script>";
			}
		}
	?>
</html>