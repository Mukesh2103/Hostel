<html>
	<?php 
		include "connection.php";
		include "student_home_header.php";
	?>
	<head>
		<title>Hostel Visit-Mess Details</title>
	</head>
	<body><br/><br/>
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
		<lable>
			<div class="jumbotron">
				<div class="container">
					<div class="col-md-4">
						<table class="table">
							<thead>
								<tr>
									<th>Days</th>
									<th>Breakfast</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query="SELECT day,breakfast FROM `mess_details`";
									$stmt=$db->query($query);
									foreach($stmt as $row)
									{
										echo "<tr><th>".$row['day']."</th>";
										echo "<td>".$row['breakfast']."</td></tr>";
									}
								?>
							</tbody>
						</table>
					</div>
					<div class="col-md-3">
						<h1>Breakfast</h1>
						<p>(Time-08:00AM-09:00AM)</p>
					</div>
					<div class="col-md-5">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img src="images/4.jpg" alt="First slide">
					          </div>
					          <div class="item">
					            <img src="images/5.jpg" alt="Second slide">
					          </div>
					          <div class="item">
					            <img src="images/6.jpg" alt="Third slide">
					          </div>
					        </div>
					    </div>
					</div>
				</div>
			</div>
			<div class="jumbotron">
				<div class="container">
					<div class="col-md-5">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img src="images/7.jpg" alt="First slide">
					          </div>
					          <div class="item">
					            <img src="images/8.jpg" alt="Second slide">
					          </div>
					          <div class="item">
					            <img src="images/9.jpg" alt="Third slide">
					          </div>
					        </div>
					    </div>
					</div>
					<div class="col-md-3">
						<h1>Lunch</h1>
						<p>(Time-11:30AM-02:00PM)</p>
					</div>
					<div class="col-md-4">
						<table class="table">
							<thead>
								<tr>
									<th>Days</th>
									<th>Lunch</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query="SELECT day,lunch FROM `mess_details`";
									$stmt=$db->query($query);
									foreach($stmt as $row)
									{
										echo "<tr><th>".$row['day']."</th>";
										echo "<td>".$row['lunch']."</td></tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="jumbotron">
				<div class="container">
				<div class="col-md-4">
						<table class="table">
							<thead>
								<tr>
									<th>Days</th>
									<th>Snacks</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query="SELECT day,snacks FROM `mess_details`";
									$stmt=$db->query($query);
									foreach($stmt as $row)
									{
										echo "<tr><th>".$row['day']."</th>";
										echo "<td>".$row['snacks']."</td></tr>";
									}
								?>
							</tbody>
						</table>
					</div>
					<div class="col-md-3">
						<h1>Snacks</h1>
						<p>(Time-05:00PM-06:00PM)</p>
					</div>
					<div class="col-md-5">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img src="images/14.jpg" alt="First slide">
					          </div>
					          <div class="item">
					            <img src="images/15.jpg" alt="Second slide">
					          </div>
					          <div class="item">
					            <img src="images/6.jpg" alt="Third slide">
					          </div>
					        </div>
					    </div>
					</div>
				</div>
			</div>
			<div class="jumbotron">
				<div class="container">
				<div class="col-md-5">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					        <ol class="carousel-indicators">
					          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					        </ol>
					        <div class="carousel-inner" role="listbox">
					          <div class="item active">
					            <img src="images/10.jpg" alt="First slide">
					          </div>
					          <div class="item">
					            <img src="images/11.jpg" alt="Second slide">
					          </div>
					          <div class="item">
					            <img src="images/12.jpg" alt="Third slide">
					          </div>
					        </div>
					    </div>
					</div>
					<div class="col-md-3">
						<h1>Dinner</h1>
						<p>(Time-08:30PM-10:00PM)</p>
					</div>
					<div class="col-md-4">
						<table class="table">
							<thead>
								<tr>
									<th>Days</th>
									<th>Dinner</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query="SELECT day,dinner FROM `mess_details`";
									$stmt=$db->query($query);
									foreach($stmt as $row)
									{
										echo "<tr><th>".$row['day']."</th>";
										echo "<td>".$row['dinner']."</td></tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</lable>
	</body>
	<?php include "footer.php";?>
</html>