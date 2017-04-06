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
			  				<li role="presentation"><a href="complaint.php">Complaint Box</a></li>
			  				<li role="presentation" class="active"><a href="student notification.php">Notification</a></li>
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
					echo "<script>alert('Your participation is successfull.')</script>";
				if($_REQUEST['check']=='N')
					echo "<script>alert('You are already participated for this event.')</script>";
			}
		?>
		<div class="col-sm-offset-1 col-sm-10">
			<hr>
			<?php
				$query="SELECT * FROM `events` ORDER BY `date`";
				$stmt=$db->query($query);
				foreach($stmt as $row)
				{
					echo "<div class='jumbotron'>
						<div class='container'>
							<h2>".$row['event_name']."</h2>
							<p><h4>".$row['event_desc']."</h4></p>
							<a class='btn btn-lg btn-primary' href='participate.php?event_id=".$row['event_id']."'>Take Participate</a>
						</div>
					</div><hr>";
				}
			?>
		</div>	
	</body>
	<?php include "footer.php"; ?>
</html>