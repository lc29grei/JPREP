<!DOCTYPE HTML>

<head>

	<title>Welcome to JPREP</title>
	<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
	<script language="javascript" src="list.js"></script>
	<link href="./css/style_home.css" rel="stylesheet" type="text/css">
	
</head>

<body>
	
	<h1 class="header">
		<img src="./jprep_logo.jpg" width="200" height="75"/>
		You are currently logged in as a STUDENT		
		<p class="header-name">
				Welcome, John
				
				<a href="./login.php">Logout</a>
		</p>
	</h1>
	
	</div>
	<ul class="tabs">
		<li><a href="#">Courses</a></li>
		<li><a href="#">Gradebook</a></li>
		<li><a href="#">Profile</a></li>
	</ul>

	<div class="panes">
		<!-- Courses tab -->
		<div>
			<p><b><u>Current Courses</u></b></p>
			<b><a ID="xcourse1" href="javascript:Toggle('course1');">[+]</a> Course 1</b><br>
   			<div ID="course1" style="display:none; margin-left:2em;">
   				<a href="">View Assignments</a><br>
  				<a href="">View Gradebook</a>
   			</div>
			<b><a ID="xcourse2" href="javascript:Toggle('course2');">[+]</a> Course 2</b><br>
   			<div ID="course2" style="display:none; margin-left:2em;">
   				<a href="">View Assignments</a><br>
  				<a href="">View Gradebook</a>
			</div>
			<b><a ID="xcourse3" href="javascript:Toggle('course3');">[+]</a> Course 3</b><br>
			<div ID="course3" style="display:none; margin-left:2em;">
   				<a href="">View Assignments</a><br>
  				<a href="">View Gradebook</a>
			</div>
			<p><b><u>Previous Courses</u></b></p>
			<b><a ID="xcourse4" href="javascript:Toggle('course4');">[+]</a> Course 4</b><br>
   			<div ID="course4" style="display:none; margin-left:2em;">
   				<a href="">View Assignments</a><br>
  				<a href="">View Gradebook</a>
   			</div>
			<b><a ID="xcourse5" href="javascript:Toggle('course5');">[+]</a> Course 5</b><br>
   			<div ID="course5" style="display:none; margin-left:2em;">
   				<a href="">View Assignments</a><br>
  				<a href="">View Gradebook</a>
			</div>
		</div>
		<!-- Gradebook tab -->
		<div>
			<p>Select a course to view your grade</p>
				<a href="" style="padding-left:15px;"><u>Course 1</u></a><br>
				<a href="" style="padding-left:15px;"><u>Course 2</u></a><br>
				<a href="" style="padding-left:15px;"><u>Course 3</u></a><br>
				<a href="" style="padding-left:15px;"><u>Course 4</u></a><br>
				<a href="" style="padding-left:15px;"><u>Course 5</u></a><br>
		</div>
		<!-- Profile tab -->
		<div class="profile">
			<a href=""><u>Edit Profile</u></a>
			<a href="" style="padding-left:15px;"><u>Change Password</u></a><br>
				<ul>
				<li>First Name: <span id="firstname">fname</span></li>
				<li>Last Name: <span id="lastname">lname</span></li>
				<li>Email Address: <span id="email">email</span></li>
				<li>Password: <span id="password">password</span></li>
				<li>Security Question: <span id="securityq">security q</span></li>
				<li>Security Answer: <span id="securitya">security a</span></li>
				</ul>
		</div>
	</div>
	
	<script>
		$(function() {
			$("ul.tabs").tabs("div.panes > div");
		});
	</script>
	
	<div class="footer">
		<p>Created by Delta Tech</p>
		<a href="http://oraserv.cs.siena.edu/~perm_deltatech/#/home"><img src="./DeltaTech-Logo.png" width="50" height="30"/></a>
		<br/>
		<p>Copyright &copy; 2013 Delta Tech. All Rights Reserved</p>
	</div>
	
</body>

</html>