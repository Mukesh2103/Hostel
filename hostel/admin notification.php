<html>
	<?php
		include "connection.php";
		include "admin_home_header.php";
	?>
	<head>
		<title>Notification</title>
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
			  				<li role="presentation"><a href="complaint-box.php">Complaint Box</a></li>
			  				<li role="presentation" class="active"><a href="admin notification.php">Notification</a></li>
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
			if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='Y')
					echo "<script>alert('Event is created successfully.')</script>";
			}
		?>
		<div class="col-sm-4">
			<h2 align="center">Create Event</h2><br/><br/>
			<form method="POST" action="save event.php" class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-3"><h4>Event Name</h4></div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="event_name" id="event_name" placeholder="Event Name" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3"><h4>Event Description</h4></div>
					<div class="col-sm-9">
						<textarea class="form-control" name="event_desc" id="event_desc" placeholder="Event Description" required></textarea>
					</div>
				</div>
				<div class="col-sm-offset-3 col-sm-4">
					<button class="btn btn-lg btn-success btn-block" type="submit">Save</button>
				</div>
			</form>
		</div>
		<div class="col-sm-8">
			<hr>
			<?php
				$query="SELECT * FROM `events` ORDER BY `date`";
				$stmt=$db->query($query);
				foreach($stmt as $row)
				{
					echo "<div class='jumbotron'>
						<div class='container'>
							<h3>".$row['event_name']."</h3>
							<p><h5>".$row['event_desc']."</h5></p>
							<a class='btn btn-primary' href='participants.php?event_id=".$row['event_id']."'>Participants</a>
						</div>
					</div><hr>";
				}
			?>
			
						
		</div>
	</body>
	<?php include "footer.php";?>
</html>