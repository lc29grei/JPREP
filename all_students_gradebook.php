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
			<li><a href="#">Courses</a></li> ';	
			
			if($accounttype=="admin"){ echo '<li><a href="#">Manage Accounts</a></li>';}
			else echo '<li style="visibility: hidden; display:none;"><a href="#">Manage Accounts</a></li> ';
						
			if($accounttype=="student"){ echo '<li style="visibility: hidden; display:none;"><a href="#">Question Pool</a></li> ';}
			else echo '<li><a href="#">Question Pool</a></li>';

			if($accounttype=="admin" or $accounttype=="coursecoordinator"){ echo '<li style="visibility: hidden; display:none;"><a href="#">Gradebook</a></li> ';}
			else echo '<li><a href="#">Gradebook</a></li>';
?>
<li><a href="#">Profile</a></li>
	</ul>
	
	<div class="panes">
	
	<?php	
		
		#<!-- Courses tab -->
		
			include 'display_courses.php';
			displayCourses($accounttype);
							
		#<!-- Manage Accounts tab -->
			include 'display_manage_accounts.php';
			displayManageAccounts();
											
		
		
		#<!-- Question Pool tab -->
			include 'display_question_pool.php';
			displayQuestionPool($accounttype);
			
	?>	
		<!-- Gradebook tab -->
			
			<div class="CSSTableGenerator" >
			<h3>All Students</h3>
			<h3 style="padding-left:150px;">Course 1</h3><br><br>
			<a href="?action=editgrades">Edit Grades</a>
			<br><br>
						<table>
							<tr>
								<td>Student Name</td>
								<td>Assignment</td>
								<td>Due Date</td>
								<td>Grade</td>
								<td>Percentage</td>
								<td>Status</td>
							</tr>
							<tr>
								<td>Student 1</td>
								<td><a href="">Assignment 1</a></td>
								<td>5/1/2014 11:59 PM</td>
								<td>100/100</td>
								<td>100%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td>Student 1</td>
								<td><a href="">Assignment 2</a></td>
								<td>5/1/2014 11:59 PM</td>
								<td>90/100</td>
								<td>90%</td>
								<td>In Progress</td>
							</tr>
							<tr>
								<td>Student 2</td>
								<td><a href="">Assignment 1</a></td>
								<td>5/2/2014 11:59 PM</td>
								<td>90/100</td>
								<td>90%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td>Student 2</td>
								<td><a href="">Assignment 2</a></td>
								<td>5/2/2014 11:59 PM</td>
								<td>100/100</td>
								<td>100%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td>Student 3</td>
								<td><a href="">Assignment 1</a></td>
								<td>5/3/2014 11:59 PM</td>
								<td>65/100</td>
								<td>65%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td>Student 3</td>
								<td><a href="">Assignment 2</a></td>
								<td>5/3/2014 11:59 PM</td>
								<td>75/100</td>
								<td>75%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td>Student 4</td>
								<td ><a href="">Assignment 1</a></td>
								<td>5/4/2014 11:59 PM</td>
								<td>74/100</td>
								<td>74%</td>
								<td>In Progress</td>
							</tr>
							<tr>
								<td>Student 4</td>
								<td ><a href="">Assignment 2</a></td>
								<td>5/4/2014 11:59 PM</td>
								<td>84/100</td>
								<td>84%</td>
								<td>Complete</td>
							</tr>
						</table>
						<form method="" action="home.php">							
							<p class="submit" style="text-align: center"><input type="submit" value="Back"></p>
						</form>
					</div>
				
			
	<?php	
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($accounttype);
	?>
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

</html>