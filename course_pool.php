<!DOCTYPE HTML>
<?php
	session_start();  
	$accounttype=$_SESSION['account_type'];
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
					Welcome, John
					
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
											
		
	?>	
		<!-- Question Pool tab -->
			
			<div class="CSSTableGenerator" >
			<h3>Course Pool</h3>
						<table>
							<tr>
								<td>
									Name
								</td>
								<td >
									Category
								</td>
								<td>
									Course
								</td>
								<td>
									
								</td>
								<td>
									
								</td>
							</tr>
							<tr>
								<td >
									<a href="">Problem 1</a>
								</td>
								<td>
									String
								</td>
								<td>
									CSIS-225
								</td>
								<td>
									<a href="">Add to Private Pool</a>
								</td>
								<td>
									<a href="">Edit</a>
								</td>
							</tr>
							<tr>
								<td >
									<a href="">Problem 2</a>
								</td>
								<td>
									Recursion
								</td>
								<td>
									CSIS-225
								</td>
								<td >
									<a href="">Add to Private Pool</a>
								</td>
								<td >
									<a href="">Edit</a>
								</td>
							</tr>
							<tr>
								<td >
									<a href="">Problem 3</a>
								</td>
								<td>
									Array
								</td>
								<td>
									CSIS-225
								</td>
								<td>
									<a href="">Add to Private Pool</a>
								</td>
								<td>
									<a href="">Edit</a>
								</td>
							</tr>
							<tr>
								<td >
									<a href="">Problem 4</a>
								</td>
								<td>
									Logic
								</td>
								<td>
									CSIS-225
								</td>
								<td>
									<a href="">Add to Private Pool</a>
								</td>
								<td>
									<a href="">Edit</a>
								</td>
							</tr>
						</table>
						<form method="" action="home.php">							
							<p class="submit" style="text-align: center"><input type="submit" value="Back"></p>
						</form>
					</div>
				
			
	<?php	
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





		
 