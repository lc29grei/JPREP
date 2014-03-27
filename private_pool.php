<!DOCTYPE HTML>
<?php
	session_start();
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	}  
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
   	include 'home_layout.php';
   	headerLayout($currentrole, $firstname);	
		
		#<!-- Courses tab -->
		
			include 'display_courses.php';
			displayCourses($currentrole);
							
		#<!-- Manage Accounts tab -->
			include 'display_manage_accounts.php';
			if(isset($_GET['action']) && $_GET['action'] == 'manageCC'){
				manageCC();
			} else if(isset($_GET['action']) && $_GET['action'] == 'manageStudent'){
				manageStudent();
			} else if(isset($_GET['action']) && $_GET['action'] == 'manageFaculty'){
				manageFaculty();
			} else if(isset($_GET['action']) && $_GET['action'] == 'editStudentAccount'){
				editStudentAccount();
			} else if(isset($_GET['action']) && $_GET['action'] == 'editFacultyAccount'){
				editFacultyAccount();
			} else if(isset($_GET['action']) && $_GET['action'] == 'editCCAccount'){
				editCCAccount();
			} else if(isset($_GET['action']) && $_GET['action'] == 'disable'){ 
				disableUser();
			} else if(isset($_GET['action']) && $_GET['action'] == 'activate'){ 
				activateUser();
			} else {
				displayManageAccounts();
			}
											
		#<!-- Question Pool tab -->
			
		if(isset($_GET['action']) && $_GET['action'] == 'addAssignment'){
			echo'<div class="CSSTableGenerator" >
			<h3>Private Pool</h3>
						<table >
							<tr>
								<td>Name</td>
								<td>Category</td>
								<td>Course</td>
								<td></td>
							</tr>
							<tr>
								<td>Problem 1</td>
								<td>String</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Assignment</a></td>
							</tr>
							<tr>
								<td>Problem 2</td>
								<td>Recursion</td>
								<td>CSIS-120</td>
								<td><a href="">Add to Assignment</a></td>
							</tr>
							<tr>
								<td>Problem 3</td>
								<td>Array</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Assignment</a></td>
							</tr>
							<tr>
								<td>Problem 4</td>
								<td>Logic</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Assignment</a></td>
							</tr>
						</table>
						
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
						
					</div>';
		} else {
			echo'<div class="CSSTableGenerator" >
			<h3>Private Pool</h3>
						<table >
							<tr>
								<td>Name</td>
								<td>Category</td>
								<td>Course</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Problem 1</td>
								<td>String</td>
								<td>CSIS-225</td>
								<td><a href="">Edit</a></td>
								<td><a href="">Remove</a></td>
							</tr>
							<tr>
								<td>Problem 2</td>
								<td>Recursion</td>
								<td>CSIS-120</td>
								<td><a href="">Edit</a></td>
								<td><a href="">Remove</a></td>
							</tr>
							<tr>
								<td>Problem 3</td>
								<td>Array</td>
								<td>CSIS-225</td>
								<td><a href="">Edit</a></td>
								<td><a href="">Remove</a></td>
							</tr>
							<tr>
								<td>Problem 4</td>
								<td>Logic</td>
								<td>CSIS-225</td>
								<td><a href="">Edit</a></td>
								<td><a href="">Remove</a></td>
							</tr>
						</table>
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>';
		}
					
		#<!-- Gradebook tab -->
		
			include 'display_grades.php';
			displayGrades($currentrole);
		
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($currentrole);
	
	footerLayout();
	?>
</html>





		
 