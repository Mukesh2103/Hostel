<html>
<?php
	include "connection.php";
	include "student_home_header.php";
?>
<head>
	<title>Hostel Visit-Room Details</title>
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
		if(isset($_REQUEST['check']))
		{
			if($_REQUEST['check']='Y')
				echo "<script> alert('Room is changed.')</script>";
		}
	?>
	<h2 class="sub-header">Details of All Rooms</h2>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Room No.</th>
					<th>Total Student</th>
					<th>Present Student</th>
					<th>Free seats for student</th>
					<th>Students</th>
				</tr>
			</thead>
			<tbody>
				<?php
					for($i=1;$i<=100;$i++)
					{
						$query="SELECT * FROM `room`";
						$stmt=$db->query($query);
						foreach($stmt as $row)
						{
							if($i==$row['room_no'])
							{
								echo "<tr><td>".$row['room_no']."</td>";
								echo "<td>".$row['total_student']."</td>";
								echo "<td>".$row['present_student']."</td>";
								echo "<td>".($row['total_student']-$row['present_student'])."</td>";
								if($row['present_student']!=0)
									echo "<td><a href='view details student.php?room_no=".$row['room_no']."'>View Students Details</a></td></tr>";
								elseif($row['present_student']==0)
									echo "<td>No Students</td></tr>";
							}
						}
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="jumbotron" style="background-color:#b0c4de;">
				<div class="container">
				<form method="post" action="change room.php">
					<h2 align="center">Change Your Room</h2>
					<div class="form-group">
						<label for="prevRoom" class="col-md-10 col-md-offset-1"><h4>Current Room no.:</h4></label>
						<div class="col-md-10 col-md-offset-1">
							<?php
								$uid=$_SESSION['uid'];
								$query="SELECT `room_no` from `student_details` WHERE `id`=$uid";
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
</body>
<?php include "footer.php";?>
</html>