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
							<button style="text-align: center" onClick="goBack()">Back</button>
						
					</div>
			
	<?php	
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($accounttype);
	footerLayout();
?>
</html>