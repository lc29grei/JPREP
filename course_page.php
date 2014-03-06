<!DOCTYPE HTML>
<?php
	session_start(); 
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	} 
	$accounttype=$_SESSION['account_type'];
	$firstname=$_SESSION['first_name'];
   	include 'home_layout.php';
	headerLayout($accounttype, $firstname);	
		#<!-- Courses tab -->
	
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
	
	footerLayout();
	?>
</html>