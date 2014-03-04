<!DOCTYPE HTML>
<?php
	session_start(); 
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	} 
	$accounttype=$_SESSION['account_type'];
	$firstname=$_SESSION['first_name'];
   	echo'
	<head>
		<title>Welcome to JPREP</title>
		<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
		<script language="javascript" src="list.js"></script>
		<link href="./css/style_home.css" rel="stylesheet" type="text/css">	
	</head>
	<body>		
		<h1 class="header">
			<img src="./jprep_logo.png" width="200" height="75"/>
			<p class="header-name">
					Welcome, '.$firstname.'
					
					<a href="./logout.php">Logout</a>
			</p>
			</br>';
			if($accounttype=="faculty") {
				echo '<span>You are currently logged in as a FACULTY
					  <select onChange="changeRole()">
						  <option value="faculty">Faculty</option>
						  <option value="coursecoordinator">Course Coordinator</option>
					  </select>';}
			else if($accounttype=="coursecoordinator") {
				echo '<span>You are currently logged in as a COURSE COORDINATOR
					  <select onChange="changeRole()">
						  <option value="coursecoordinator">Course Coordinator</option>
						  <option value="faculty">Faculty</option>
					  </select>';}
			else if($accounttype=="student"){
				echo'<span>You are currently logged in as a STUDENT';}
			else 
				echo'<span>You are currently logged in as a ADMIN';
				
			echo'			
			</span>			
		</h1>		
		</div>
		<ul class="tabs">
			<li><a id="courses" href="#tab1">Courses</a></li> ';	
			
			if($accounttype=="admin"){ echo '<li><a id="manageAccounts" href="#tab2">Manage Accounts</a></li>';}
			else echo '<li style="visibility: hidden; display:none;"><a href="#">Manage Accounts</a></li> ';
						
			if($accounttype=="student"){ echo '<li style="visibility: hidden; display:none;"><a href="#">Question Pool</a></li> ';}
			else echo '<li><a id="questionPool" href="#tab3">Question Pool</a></li>';

			if($accounttype=="admin" or $accounttype=="coursecoordinator"){ echo '<li style="visibility: hidden; display:none;"><a href="#">Gradebook</a></li> ';}
			else echo '<li><a id="gradebook" href="#tab4">Gradebook</a></li>';
	?>
		<li><a id="profile" href="#tab5">Profile</a></li>
	</ul>
	
	<div class="panes">	
		
		<!-- Courses tab -->
<?php		
	if ($accounttype=="student") {
		echo'<div class="CSSTableGenerator" >
			<h3>Course</h3>
			<h3 style="padding-left:150px;">Professor: Dr. John Smith</h3>
			<h3 style="padding-left:150px;">Semester: Spring 2014</h3><br>
			<p style="font-size:12px;"><u>Pending Assignments</u></p>
						<table>
							<tr>
								<td>Assignment</td>
								<td>Due Date</td>
								<td>Status</td>
								<td></td>
							</tr>
							<tr>
								<td>Assignment 1</td>
								<td>3/10/14	11:59 PM</td>
								<td>Not Completed</td>
								<td><a href="">Complete Now</a></td>
							</tr>
							<tr>
								<td>Assignment 2</td>
								<td>3/11/14	11:59 PM</td>
								<td>Completed</td>
								<td><a href="">View Grade</a></td>
							</tr>
							<tr>
								<td>Assignment 3</td>
								<td>3/12/14	11:59 PM</td>
								<td>Not Completed</td>
								<td><a href="">Complete Now</a></td>
							</tr>
						</table><br>
						<p style="font-size:12px;"><u>Past Assignments</u></p>
							<table>
							<tr>
								<td>Assignment</td>
								<td>Due Date</td>
								<td>Status</td>
								<td></td>
							</tr>
							<tr>
								<td>Assignment 4</td>
								<td>1/10/14	11:59 PM</td>
								<td>Completed</td>
								<td><a href="">View Grade</a></td>
							</tr>
							<tr>
								<td>Assignment 5</td>
								<td>1/11/14	11:59 PM</td>
								<td>Completed</td>
								<td><a href="">View Grade</a></td>
							</tr>
							<tr>
								<td>Assignment 6</td>
								<td>1/12/14	11:59 PM</td>
								<td>Completed</td>
								<td><a href="">View Grade</a></td>
							</tr>
					</div>';
			} else {
				echo'<div class="CSSTableGenerator" >
				<h3><a href="./create_new_assignment.php">Create New Assignment</a></h3>
				<h3 style="padding-left:150px;">Course</h3>
				<h3 style="padding-left:150px;">Semester: Spring 2014</h3><br>
				<p style="font-size:12px;"><u>Pending Assignments</u></p>
						<table>
							<tr>
								<td>Assignment</td>
								<td>Due Date</td>
								<td></td>
							</tr>
							<tr>
								<td>Assignment 1</td>
								<td>3/10/14	11:59 PM</td>
								<td><a href="">Edit</a></td>
							</tr>
							<tr>
								<td>Assignment 2</td>
								<td>3/11/14	11:59 PM</td>
								<td><a href="">Edit</a></td>
							</tr>
							<tr>
								<td>Assignment 3</td>
								<td>3/12/14	11:59 PM</td>
								<td><a href="">Edit</a></td>
							</tr>
						</table><br>
						<p style="font-size:12px;"><u>Past Assignments</u></p>
							<table>
							<tr>
								<td>Assignment</td>
								<td>Due Date</td>
								<td></td>
							</tr>
							<tr>
								<td>Assignment 4</td>
								<td>1/10/14	11:59 PM</td>
								<td><a href="">Edit</a></td>
							</tr>
							<tr>
								<td>Assignment 5</td>
								<td>1/11/14	11:59 PM</td>
								<td><a href="">Edit</a></td>
							</tr>
							<tr>
								<td>Assignment 6</td>
								<td>1/12/14	11:59 PM</td>
								<td><a href="">Edit</a></td>
							</tr>
					</div>';
			}
							
		#<!-- Manage Accounts tab -->
			include 'display_manage_accounts.php';
			displayManageAccounts();
											
		#<!-- Question Pool tab -->
			include 'display_question_pool.php';
			displayQuestionPool($accounttype);
				
		#<!-- Gradebook tab -->
				
			include 'display_grades.php';
			displayGrades($accounttype);
			
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($accounttype);
	?>
	</div>
	
	
	<script>
		$(function() {
			$("ul.tabs").tabs("div.panes > div", { history: true });
		});
	</script>
	
	<div class="footer">
		<p>Created by Delta Tech</p>
		<a href="http://oraserv.cs.siena.edu/~perm_deltatech/#/home"><img src="./DeltaTech-Logo.png" width="50" height="30"/></a>
		<br/>
		<p>Copyright &copy; 2013 Delta Tech. All Rights Reserved</p>
	</div>

</html>