<?php
	include "admin_home_header.php";
?>
<html>
	<head>
		<title>Student Registration</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>
	<body>
	<br/><br/>
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
			  				<li role="presentation"><a href="admin notification.php">Notification</a></li>
			  				<li role="presentation"><a href="application-box.php">Application Box</a></li>
			  				<li role="presentation" class="active"><a href="student_register.php">Student Registration</a></li>
			  			</ul>
						<ul class="nav nav-navbar navbar-right">
							<li class="presentation"><a class="" href="logout.php" role="button">Logout</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<?php
			if(isset($_REQUEST['photo']))
			{
				if($_REQUEST['photo']=='N')
					echo "<script>alert('Please select a photo.')</script>";
				if($_REQUEST['photo']=='NOT')
					echo "<script>alert('This is not a valid type.Please select only jpeg,png and gif file.')</script>";
				if($_REQUEST['photo']=='S')
					echo "<script>alert('Photo size must be less than 160Kb.')</script>";
			}
			if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='Y')
					echo "<script> alert('Register is Succesful.')</script>";
				if($_REQUEST['check']=='N')
					echo "<script> alert('Please give another email id.This email id is already present.')</script>";
			}
		?>
		<div class="col-sm-offset-1 col-sm-10">
			<h2 align="center">Please fill up the form</h2><br/><br/>
			<form method="POST" action="student_save.php" class="form-horizontal" onsubmit="return validating()"  enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-sm-3"><h4>Student Name</h4></div>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required><br/>
						<input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name"><br/>
						<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
					</div>
					<div class="col-sm-3">
						<h4>Upload Profile Photo</h4><br/>
						<input type="file" class="form-control" name="photo" id="photo" required>
					</div>
					<div class="col-sm-2">

					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3"><h4>Fathers Name</h4></div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="father_name" id="father_name" placeholder="Father's Name" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3"><h4>Mothers Name</h4></div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Mother's Name" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3"><h4>Mobile no.</h4></div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="mobile_no" id="mobile_no" minlength="10" maxlength="10" placeholder="Mobile no." required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3"><h4>Parent/Guardian no.</h4></div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="parent_no" id="parent_no" minlength="10" maxlength="10" placeholder="Parent/Guardian no." required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3"><h4>Email id</h4></div>
					<div class="col-sm-9">
						<input type="email" class="form-control" name="email" id="email" placeholder="Email id" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3"><h4>Password</h4></div>
					<div class="col-sm-9">
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3"><h4>Address</h4></div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3"><h4>Gender</h4></div>
					<div class="col-sm-4">
						<h4><input type="radio" name="gender" id="gender" value="Male">:Male</h4>
					</div>
					<div class="col-sm-4">
						<h4><input type="radio" name="gender" id="gender" value="Female">:Female</h4>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3"><h4>Blood Group</h4></div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="blood_group" id="blood_group" placeholder="Blood Group">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3"><h4>Course</h4></div>
					<div class="col-sm-3">
						<h4><input type="radio" name="course" id="course" value="BE">:BE</h4>
					</div>
					<div class="col-sm-3">
						<h4><input type="radio" name="course" id="course" value="Nursing">:Nursing</h4>
					</div>
					<div class="col-sm-3">
						<h4><input type="radio" name="course" id="course" value="MBA">:MBA</h4>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3"><h4>Year</h4></div>
					<div class="col-sm-9">
						<select name="year" id="year" class="form-control">
							<option value="0">Select Year</option>
							<option value="1">1st Year</option>
							<option value="2">2nd Year</option>
							<option value="3">3rd Year</option>
							<option value="4">4th Year</option>
						</select>
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-3"><h4>Admission Date</h4></div>
					<div class="col-sm-9">
						<input type="date" class="form-control" name="admission_date" id="admission_date" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3"><h4> Available Rooms</h4></div>
					<div class="col-sm-9">
						<select name="room_no" id="room_no" class="form-control">
							<option value="0">Select Available Room no.</option>
							<?php
								include "connection.php";
								$query="SELECT MAX(room_no) AS highest_room_no FROM `room`";
								$stmt=$db->query($query);
								foreach($stmt as $row)
								{
									$n=$row['highest_room_no'];
								}
								for($i=1;$i<=$n;$i++)
								{
									$query="SELECT * FROM `room`";
									$stmt=$db->query($query);
									foreach($stmt as $row)
									{
										if($i==$row['room_no'])
										{
											if($row['present_student']<$row['total_student'])
												echo "<option value='".$row['room_no']."'>".$row['room_no']."</option>";
										}
									}
								}
							?>
						</select>
					</div>
				</div>
				<div class="col-sm-offset-3 col-sm-4">
					<button class="btn btn-lg btn-success btn-block" type="submit">Save</button>
				</div>
				<div class="col-sm-offset-1 col-sm-4">
					<a class="btn btn-lg btn-primary btn-block" href="admin_home.php">Back</a>
				</div><br/><br/>
			</form>
		</div>
	</body>
	<script>
		function validating()
	    {
	    	if(first_name_match(document.getElementById('first_name')))
	    	{
	    		if(middle_name_match(document.getElementById('middle_name')))
	    		{
	    			if(last_name_match(document.getElementById('last_name')))
	    			{
	     				if(father_name_match(document.getElementById('father_name')))
	     				{     
	      					if(mother_name_match(document.getElementById('mother_name')))
	      					{
	       						if(mobile_no_match(document.getElementById('mobile_no')))
	       						{
	    	   						if(parent_no_match(document.getElementById('parent_no')))
	    	   						{
	    		   						if(email_match(document.getElementById('email')))
	    		   						{
	    		   							if(password_match(document.getElementById('password')))
	    		   							{
	    		   								if(blood_group_match(document.getElementById('blood_group')))
	    		   								{
	    		   									if(room_no_match(document.getElementById('room_no')))
	    		   										return true;
	    		   								}
	    		   							}
	    			   					}
	    	   						}
	       						}
	      					}
	     				}
	     			}
	     		}
	     		return false; 
	    	}
	    	else
	     		return false;
	   	} 
	   	function first_name_match(obj_first_name)
	   	{
	    	var first_name_format=/^[A-Za-z ]+$/;
	    	var first_name=obj_first_name.value;
	    	if(first_name.match(first_name_format))
	     		return true;
	    	else
	    	{
	     		alert("Enter character only in field");
	     		obj_first_name.focus();
	     		return false;
	    	}
	   	}
	   	function middle_name_match(obj_middle_name)
	   	{
	    	var middle_name_format1=/^[A-Za-z ]+$/;
	    	//var middle_name_format2=/^[]+$/;
	    	var middle_name=obj_middle_name.value;
	    	if(middle_name.match(middle_name_format1) || middle_name=="")
	     		return true;
	    	else
	    	{
	     		alert("Enter character only in field");
	     		obj_middle_name.focus();
	     		return false;
	    	}
	   	}
	   	function last_name_match(obj_last_name)
	   	{
	    	var last_name_format=/^[A-Za-z ]+$/;
	    	var last_name=obj_last_name.value;
	    	if(last_name.match(last_name_format))
	     		return true;
	    	else
	    	{
	     		alert("Enter character only in field");
	     		obj_last_name.focus();
	     		return false;
	    	}
	   	}
	   	function father_name_match(obj_father_name)
	   	{
	    	var father_name_format=/^[A-Za-z]+$/;
	    	var father_name=obj_father_name.value;
	    	if(father_name.match(father_name_format))
	     		return true;
	    	else
	    	{
	     		alert("Enter character only in field");
	     		obj_father_name.focus();
	     		return false;
	    	}
	   	}
	   	function mother_name_match(obj_mother_name)
	   	{
	    	var mother_name_format=/^[A-Za-z ]+$/;
	    	var mother_name=obj_mother_name.value;
	    	if(mother_name.match(mother_name_format))
	     		return true;
	    	else
	    	{
	     		alert("Enter character only in field");
	     		obj_mother_name.focus();
	     		return false;
	    	}
	   	}
	   	function mobile_no_match(obj_mobile)
	   	{
	    	var mobile_format=/^\d{10}$/;
	    	var mobile=obj_mobile.value;
	    	if(mobile.match(mobile_format))
	    		return true;
	    	else
	    	{
	     		alert("Enter 10 digit number only");
	     		obj_mobile.focus();
	     		return false;
	    	}
	   	}
	   	function parent_no_match(obj_mobile)
	   	{
	    	var mobile_format=/^\d{10}$/;
	    	var mobile=obj_mobile.value;
	    	if(mobile.match(mobile_format))
	    		return true;
	    	else
	    	{
	     		alert("Enter 10 digit number only");
	     		obj_mobile.focus();
	     		return false;
	    	}
	   	}
	   	function email_match(obj_email)
	   	{
	    	var email_format=/^[A-Za-z0-9._-]+@[A-Za-z0-9._-]+$/;
	    	var email=obj_email.value;
	    	if(email.match(email_format))
	     		return true;
	    	else
	    	{
	     		alert("Enter email only in email field");
	     		obj_email.focus();
	     		return false;
	    	}
	   	}
	   	function password_match(obj_password)
	   	{
	 		var password_format=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,15})/;
	 		var password=obj_password.value;
	    	if(password.match(password_format))
	    		return true;
	    	else
	    	{
	     		alert("Enter valid password.Password contain Minimum 8 and Maximum 15 characters at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character.");
	     		obj_password.focus();
	     		return false;
	    	}
	   	}
	   	function blood_group_match(obj_blood_group)
	   	{
	    	var blood_group_format=/^[A-Za-z][+-]+$/;
	    	var blood_group=obj_blood_group.value;
	    	if(blood_group.match(blood_group_format))
	     		return true;
	    	else
	    	{
	     		alert("Enter valid blood group.");
	     		obj_blood_group.focus();
	     		return false;
	    	}
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
	</script>
	<?php include "footer.php";?>
</html>