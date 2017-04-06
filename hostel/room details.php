<html>
	<?php
	 	include "connection.php";
	 	include "admin_home_header.php";
	?>
	<head>
		<title>Hostel Visit-Room Details</title>
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
		<?php
			if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='Y')
					echo "<script> alert('Room is added Successfully.')</script>";
				if($_REQUEST['check']=='N')
					echo "<script> alert('Please give another Room No.This Room No is already present.')</script>";
				if($_REQUEST['check']=='R')
					echo "<script> alert('Room is removed Successfully.')</script>";
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
										echo "<td><a href='view details.php?room_no=".$row['room_no']."'>View Students Details</a></td></tr>";
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
					<form method="post" action="add room.php">
						<h2 align="center">Add new Rooms</h2>
						<div class="form-group">
							<label for="inputRoom" class="col-md-10 col-md-offset-1"><h4>Room no.:</h4></label>
							<div class="col-md-10 col-md-offset-1"><input type="text" class="form-control" name="room_no" id="room_no" placeholder="New Room no." required></div>
						</div>
						<div class="form-group">
							<label for="inputCapability" class="col-md-10 col-md-offset-1"><h4>Room Capability:</h4></label>
							<div class="col-md-10 col-md-offset-1"><input type="number" class="form-control" name="room_capability" id="room_capability" min="1" max="3" placeholder="Room Capability" required></div>
						</div>
						<div class="form-group">
							<div class="col-md-10 col-md-offset-1"><br/><button class="btn btn-primary btn-lg btn-block" type="submit">Add</button></div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="jumbotron" style="background-color:#b0c4de;">
					<div class="container">
					<form method="post" action="remove room.php">
						<h2 align="center">Remove Rooms</h2>
						<div class="form-group">
							<label for="inputRoom" class="col-md-10 col-md-offset-1"><h4>Room no.:</h4></label>
							<div class="col-md-10 col-md-offset-1">
								<select name="room_no" id="room_no" class="form-control">
									<option value="0">Select Room no.</option>
									<?php
										$query="SELECT `room_no` FROM `room` WHERE `present_student`=0";
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
							<div class="col-md-10 col-md-offset-1"><br/><button class="btn btn-primary btn-lg btn-block" type="submit">Remove</button></div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script>
		function validating()
	    {
	    	if(room_no_match(document.getElementById('room_no')))
	    	{
	    		if(room_capability_match(document.getElementById('room_capability')))
	    		{
	    			return true;
	    		}
	    		return false;
	    	}
	    	else
	    		return false;
	    }

	    function room_no_match(obj_room_no)
	   	{
	    	var room_no_format=/^\d{1,3}$/;
	    	var room_no=obj_room_no.value;
	    	if(room_no.match(room_no_format))
	    		return true;
	    	else
	    	{
	     		alert("Enter valid room no only");
	     		obj_room_no.focus();
	     		return false;
	    	}
	   	}
	   	function room_capability_match(obj_room_capability)
	   	{
	    	var room_capability_format=/^\d{1}$/;
	    	var room_capability=obj_room_capability.value;
	    	if(room_capability.match(room_capability_format))
	    		return true;
	    	else
	    	{
	     		alert("Enter valid capability of room. Capability of room must be between 1-5.");
	     		obj_room_capability.focus();
	     		return false;
	    	}
	   	}
	</script>
	<?php include "footer.php";?>
</html>