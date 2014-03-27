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
			<h3>Course</h3>
			<h3 style="padding-left:150px;">Semester: Spring 2014</h3>
			<br><br>
						<table>
							<tr>
								<td>Assignment</td>
								<td>Due Date</td>
								<td>Grade</td>
								<td>Percentage</td>
								<td>Comments</td>
							</tr>
							<tr>
								<td><a href="">Assignment 1</a></td>
								<td>5/1/2014 11:59 PM</td>
								<td>90/100</td>
								<td>90%</td>
								<td>Great job!</td>
							</tr>
							<tr>
								<td><a href="">Assignment 2</a></td>
								<td>5/2/2014 11:59 PM</td>
								<td>100/100</td>
								<td>100%</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><a href="">Assignment 3</a></td>
								<td>5/3/2014 11:59 PM</td>
								<td>75/100</td>
								<td>75%</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td ><a href="">Assignment 4</a></td>
								<td>5/4/2014 11:59 PM</td>
								<td>84/100</td>
								<td>84%</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td ><a href="">Assignment 5</a></td>
								<td>5/5/2014 11:59 PM</td>
								<td>80/100</td>
								<td>80%</td>
								<td>&nbsp;</td>
							</tr>
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
							<tr>
								<td>Total</td>
								<td>&nbsp;</td>
								<td>429/500</td>
								<td>85%</td>
								<td>&nbsp;</td>
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





		
 