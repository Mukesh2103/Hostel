<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="css/carousel.css" rel="stylesheet">
	    <link href="css/navbar-fixed-top.css" rel="stylesheet">
	    <script src="js/ie-emulation-modes-warning.js"></script>
	</head>
	<body>
		<?php
			if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='N')
					echo"<script>alert('Wrong User Email or Password.')</script>";
			}
		?>
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
						<a class="navbar-brand" href="home.php">Hostel Management</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li role="presentation" class="active"><a href="home.php">Home</a></li>
			  				<li role="presentation" class="dropdown">
			  					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Hostel Visit<span class="caret"></span></a>
			  					<ul class="dropdown-menu" role="menu">
				  					<!--<li><a href="room.php">Room Details</a></li>-->
				  					<li><a href="mess.php">Mess Details</a></li>
				  					<li><a href="events.php">Events</a></li>
			  					</ul>
			  				</li>
			  				<!--<li role="presentation" class="dropdown">
			  					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Contact<span class="caret"></span></a>
			  					<div class="dropdown-menu jumbotron" role="menu">
			  					</div>
			  				</li>-->
			  				<li role="presentation"><a href="about_us.php">About us</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	        <ol class="carousel-indicators">
	          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	        </ol>
	        <div class="carousel-inner" role="listbox">
	          <div class="item active">
	            <img src="images/1.jpg" alt="First slide">
	          </div>
	          <div class="item">
	            <img src="images/17.jpg" alt="Second slide">
	          </div>
	          <div class="item">
	            <img src="images/16.jpg" alt="Third slide">
	          </div>
	        </div>
	        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	          <span class="sr-only">Previous</span>
	        </a>
	        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	          <span class="sr-only">Next</span>
	        </a>
	      </div>
		</lable>
		<marquee behavior="alternate"><h1 style="color:red; font:bold;">Welcome to SSIPMT Hostel</h1></marquee><hr>
		<div class="col-md-8 col-md-offset-2">
			<div class="jumbotron" style="background-color:#b0c4de;">
				<div class="container">
				<form method="post" action="LoginCheck.php">
					<h2 align="center">Sign-in</h2>
					<div class="form-group">
						<label for="inputEmail" class="col-md-10 col-md-offset-1"><h4>Email Id:</h4></label>
						<div class="col-md-10 col-md-offset-1"><input type="text" class="form-control" name="email" id="email" placeholder="Your Email Id"></div>
					</div>
					<div class="form-group">
						<label for="inputPassword" class="col-md-10 col-md-offset-1"><h4>Password:</h4></label>
						<div class="col-md-10 col-md-offset-1"><input type="password" class="form-control" name="password" id="password" placeholder="Your Password"></div>
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1"><br/><button class="btn btn-primary btn-lg btn-block" type="submit">Sign in</button></div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</body>
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</html>