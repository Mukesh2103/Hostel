<?php session_start();
if($_SESSION['type']!='Admin')
	header('location:home.php');
?>
<html>
	<head>
		<title>Admin Home</title>
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="css/carousel.css" rel="stylesheet">
	    <link href="css/navbar-fixed-top.css" rel="stylesheet">
	    <script src="js/ie-emulation-modes-warning.js"></script>
	</head>
	<body>
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
			  				<li role="presentation" class="active"><a href="admin_home.php">Home</a></li>
			  				<li role="presentation" class="dropdown">
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
		<marquee behavior="alternate"><h1 style="color:red; font:bold;">Welcome to SSIPMT Hostel</h1></marquee><hr>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Post</h3>
				</div>
				<div class="panel-body">
					<div class="list-group">
						<div class="list-group-item">
							<h4 class="list-group-item-heading">Post a Photo</h4>
							<div class="list-group-item-text">
								<form method="post" action="photo.php" class="form-horizontal" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-md-12">
											<lable for="postPhoto">Image:</lable>
											<input type="file" class="form-control" name="photo" id="photo">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<lable for="postCaption">Caption:</lable>
											<textarea class="form-control" name="caption" id="caption"></textarea>
										</div>
									</div>
									<button type="submit" class="btn btn-default">Post</button>
								</form>
							</div>
						</div>
					</div>
					<div class="list-group">
						<div class="list-group-item">
							<h4 class="list-group-item-heading">Post a Video</h4>
							<div class="list-group-item-text">
								<form method="post" action="video.php" class="form-horizontal" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-md-12">
											<lable for="postVideo">Video:</lable>
											<input type="file" class="form-control" name="video" id="video">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<lable for="postCaption">Caption:</lable>
											<textarea class="form-control" name="caption" id="caption"></textarea>
										</div>
									</div>
									<button type="submit" class="btn btn-default">Post</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Posts</h3>
				</div>
				<div class="panel-body">
					<div class="list-group">
						<?php
							include "connection.php";
							$query="SELECT * FROM `post` ORDER BY `date_time` DESC";
							$stmt=$db->query($query);
							foreach($stmt as $row)
							{
								$post_by=$row['post_by'];
								$post_name=$row['post_name'];
								$folder_path=$row['folder_path'];
								$caption=$row['caption'];
								$date_time=$row['date_time'];
								$query="SELECT `name` FROM `student_details` WHERE `id`=$post_by";
								$stmt=$db->query($query);
								foreach($stmt as $row)
								{
									$name=$row['name'];
								}
								echo "<div class='list-group-item'>
									<h4 class='list-group-item-heading'>Posted By:".$name."</h4>
									<div class='list-group-item-text'>
										<h5>".$caption."</h5>";
								if($folder_path=="image/")
									echo "<img src='".$folder_path.$post_name."' class='img-responsive img-rounded' alt='Responsive image'>";
								else if($folder_path=="video/")
									echo "<video controls>
										<source src='".$folder_path.$post_name."' type='video/mp4' class='video-responsive'>
									</video>";
								echo "</div>
								</div><hr>";
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php 
			if(isset($_REQUEST['photo']))
			{
				if($_REQUEST['photo']=='N')
					echo "<script>alert('Please select a photo.')</script>";
				if($_REQUEST['photo']=='NOT')
					echo "<script>alert('This is not a valid type.Please select only jpeg,png and gif file.')</script>";
				if($_REQUEST['photo']=='Y')
					echo "<script>alert('Photo is posted successfully.')</script>";
				if($_REQUEST['photo']=='S')
					echo "<script>alert('Oops your photo size is too large.Photo size must be less than 4 MB.')</script>";
			}
			if(isset($_REQUEST['video']))
			{
				if($_REQUEST['video']=='N')
					echo "<script>alert('Please select a video.')</script>";
				if($_REQUEST['video']=='NOT')
					echo "<script>alert('This is not a valid type.Please select only jpeg,png and gif file.')</script>";
				if($_REQUEST['video']=='Y')
					echo "<script>alert('video is posted successfully.')</script>";
				if($_REQUEST['video']=='S')
					echo "<script>alert('Oops! Your video size is too large.Video size must be less than 20 MB.')</script>";
			}
		?>
	</body>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</html>