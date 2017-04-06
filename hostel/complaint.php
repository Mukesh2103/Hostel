<html>
	<?php
		include "connection.php";
		include "student_home_header.php";
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
			  				<li role="presentation" class="active"><a href="complaint.php">Complaint Box</a></li>
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
			if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='Y')
				{
					echo "<script>alert('Complaint is submitted successfully.')</script>";
				}
			}
		?>
		<h2 class="sub-header">List of All Complaints Submitted by You</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>SNo.</th>
						<th>Subject</th>
						<th>Date</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$id=$_SESSION['uid'];
						$query="SELECT `complaint_id`, `subject` , `date` , `description` FROM `complaint` WHERE `student_id`=:id ORDER BY `date`";
						$stmt=$db->prepare($query);
						$stmt->bindparam(':id',$id);
						$stmt->execute();
						$Sno=1;
						foreach($stmt as $row)	
						{
							echo "<tr><td>".$Sno."</td>";
							echo "<td>".$row['subject']."</td>";
							echo "<td>".$row['date']."</td>";
							echo "<td>".$row['description']."</td>";
							$Sno++;
						}
					?>
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="jumbotron" style="background-color:#b0c4de;">
					<div class="container">
					<form method="post" action="complaint save.php">
						<h2 align="center">Send Complaint</h2>
						<div class="form-group">
							<label for="inputSubject" class="col-md-10 col-md-offset-1"><h4>Subject</h4></label>
							<div class="col-md-10 col-md-offset-1"><input type="text" class="form-control" name="subject" id="subject" placeholder="Topic of Complaint" required></div>
						</div>
						<div class="form-group">
							<label for="inputDescription" class="col-md-10 col-md-offset-1"><h4>Description:</h4></label>
							<div class="col-md-10 col-md-offset-1"><textarea class="form-control" name="description" id="description" placeholder="Description of Complaint" required></textarea></div>
						</div>
						<div class="form-group">
							<div class="col-md-10 col-md-offset-1"><br/><button class="btn btn-primary btn-lg btn-block" type="submit">Send Complaint</button></div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
		<?php include "footer.php" ?>
	</body>
</html>