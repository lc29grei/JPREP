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
			<h3>Course</h3>
			<h3 style="padding-left:150px;">Assignment Name</h3>
			<h3 style="padding-left:150px;">Due Date: 3/10/2014 11:59 PM</h3><br>
			<p style="font-size:12px;">Click on a student's name to view individual problem grades for that student</p>
			<a href="">Edit Grades</a><br><br>
						<table>
							<tr>
								<td>Student Name</td>
								<td>Grade</td>
								<td>Percentage</td>
								<td>Status</td>
							</tr>
							<tr>
								<td><a href="./student_problems_gradebook.php#tab4">Student 1</a></td>
								<td>90/100</td>
								<td>90%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td><a href="./student_problems_gradebook.php#tab4">Student 2</a></td>
								<td>60/100</td>
								<td>60%</td>
								<td>In Progress</td>
							</tr>
							<tr>
								<td><a href="./student_problems_gradebook.php#tab4">Student 3</a></td>
								<td>75/100</td>
								<td>75%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td><a href="./student_problems_gradebook.php#tab4">Student 4</a></td>
								<td>84/100</td>
								<td>84%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td><a href="./student_problems_gradebook.php#tab4">Student 5</a></td>
								<td>80/100</td>
								<td>80%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td><a href="./student_problems_gradebook.php#tab4">Student 6</a></td>
								<td>75/100</td>
								<td>75%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td><a href="./student_problems_gradebook.php#tab4">Student 7</a></td>
								<td>100/100</td>
								<td>100%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td><a href="./student_problems_gradebook.php#tab4">Student 8</a></td>
								<td>82/100</td>
								<td>82%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td><a href="./student_problems_gradebook.php#tab4">Student 9</a></td>
								<td>94/100</td>
								<td>94%</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td><a href="./student_problems_gradebook.php#tab4">Student 10</a></td>
								<td>97/100</td>
								<td>97%</td>
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