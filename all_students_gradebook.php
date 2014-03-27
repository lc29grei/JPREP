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
			include 'display_question_pool.php';
			displayQuestionPool($currentrole);
			
	?>	
		<!-- Gradebook tab -->
			<div class="CSSTableGenerator" >
			<h3>All Students</h3>
			<h3 style="padding-left:150px;">Course 1</h3><br><br>
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
								<td><a href="./student_problems_gradebook.php#tab4">Assignment 1</a></td>
								<td>5/1/2014 11:59 PM</td>
								<td>90/100</td>
								<td>90%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td>Student 1</td>
								<td><a href="./student_problems_gradebook.php#tab4">Assignment 2</a></td>
								<td>5/1/2014 11:59 PM</td>
								<td>100/100</td>
								<td>100%</td>
								<td>In Progress</td>
							</tr>
							<tr>
								<td>Student 2</td>
								<td><a href="./student_problems_gradebook.php#tab4">Assignment 1</a></td>
								<td>5/2/2014 11:59 PM</td>
								<td>90/100</td>
								<td>90%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td>Student 2</td>
								<td><a href="./student_problems_gradebook.php#tab4">Assignment 2</a></td>
								<td>5/2/2014 11:59 PM</td>
								<td>100/100</td>
								<td>100%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td>Student 3</td>
								<td><a href="./student_problems_gradebook.php#tab4">Assignment 1</a></td>
								<td>5/3/2014 11:59 PM</td>
								<td>65/100</td>
								<td>65%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td>Student 3</td>
								<td><a href="./student_problems_gradebook.php#tab4">Assignment 2</a></td>
								<td>5/3/2014 11:59 PM</td>
								<td>75/100</td>
								<td>75%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td>Student 4</td>
								<td ><a href="./student_problems_gradebook.php#tab4">Assignment 1</a></td>
								<td>5/4/2014 11:59 PM</td>
								<td>74/100</td>
								<td>74%</td>
								<td>In Progress</td>
							</tr>
							<tr>
								<td>Student 4</td>
								<td ><a href="./student_problems_gradebook.php#tab4">Assignment 2</a></td>
								<td>5/4/2014 11:59 PM</td>
								<td>84/100</td>
								<td>84%</td>
								<td>Complete</td>
							</tr>
						</table>						
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
						
					</div>
			
	<?php	
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($currentrole);
	footerLayout();
?>
</html>