<html>
	<?php
		include "connection.php";
		include "admin_home_header.php";
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
						<a class="navbar-brand" href="admin_home.php">Hostel Management</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
			  				<li role="presentation"><a href="admin_home.php">Home</a></li>
			  				<li role="presentation" class="dropdown active">
			  					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Hostel Visit<span class="caret"></span></a>
			  					<ul class="dropdown-menu" role="menu">
				  					<li><a href="room details.php">Room Details</a></li>
				  					<li><a href="mess details.php">Mess Details</a></li>
			  					</ul>
			  				</li>
			  				<li role="presentation"><a href="complaint-box.php">Complaint Box</a></li>
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
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="jumbotron" style="background-color:#b0c4de;">
					<div class="container">
						<form method="post" action="change_room_admin.php">
							<h2 align="center">Change Your Room</h2>
							<div class="form-group">
								<label for="prevRoom" class="col-md-10 col-md-offset-1"><h4>Current Room no.:</h4></label>
								<div class="col-md-10 col-md-offset-1">
									<?php
										if(isset($_REQUEST['id']))
											$id=$_REQUEST['id'];
										$uid=$_SESSION['uid'];
										$query="SELECT `room_no` from `student_details` WHERE `id`=$id";
										$stmt=$db->query($query);
										foreach($stmt as $row)
											$cur_room_no=$row['room_no'];
										echo "<div class='form-control'>".$cur_room_no."</div>";
									?>
								</div>
							</div>
							<div class="form-group">
								<label for="newRoom" class="col-md-10 col-md-offset-1"><h4>New Room no.:</h4></label>
								<div class="col-md-10 col-md-offset-1">
									<select name="new_room_no" id="new_room_no" class="form-control">
										<option value="0">Select Room no.</option>
										<?php
											$query="SELECT `room_no` FROM `room` WHERE `total_student`>`present_student` ORDER BY `room_no`";
											$stmt=$db->query($query);
											foreach($stmt as $row)
											{
												echo "<option value='".$row['room_no']."'>".$row['room_no']."</option>";
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-10 col-md-offset-1"><br/><button class="btn btn-primary btn-lg btn-block" type="submit">Change</button></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>