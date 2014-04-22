<!DOCTYPE HTML>
<?php
	session_start(); 
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	} 
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
	
	$dbhost = 'localhost';
  	$dbuser = 'root';
  	$dbpass = '';
  	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
  	mysql_select_db('jprep');
	
   	include 'home_layout.php';
	headerLayout($currentrole, $firstname);	
		#<!-- Courses tab -->
	
	$courseAssignmentSQL = 'SELECT * FROM Assignment WHERE sectionId="'.$_GET['num'].'"';
	$courseAssignmentSQLResult = mysql_query($courseAssignmentSQL, $conn);
	$courseAssignmentSQLResult1 = mysql_query($courseAssignmentSQL, $conn);
	
	$courseNameSQL = 'SELECT coursename FROM section WHERE sectionId="'.$_GET['num'].'" AND courseId="'.$_GET['courseNumber'].'"';
	$courseNameSQLResult = mysql_query($courseNameSQL, $conn);
	$courseNameResult = mysql_fetch_array($courseNameSQLResult);
	
	$courseProfessorSQL = 'SELECT faculty FROM section WHERE sectionId="'.$_GET['num'].'" AND courseId="'.$_GET['courseNumber'].'"';
	$courseProfessorSQLResult = mysql_query($courseProfessorSQL, $conn);
	$courseProfessorResult = mysql_fetch_array($courseProfessorSQLResult);
	
	if ($currentrole=="s") {
		echo'<div class="CSSTableGenerator" >
			<h3>Course: '.$courseNameResult['0'].'</h3>
			<h3 style="padding-left:150px;">Professor: '.$courseProfessorResult['0'].'</h3>
			<h3 style="padding-left:150px;">Semester: Spring 2014</h3><br>
			<p style="font-size:12px;"><u>Pending Assignments</u></p>
						<table>
							<tr>
								<td>Assignment</td>
								<td>Due Date</td>
								<td>Status</td>
								<td></td>
							</tr>';
							if ($courseAssignmentSQLResult > 0) {
							while($row=mysql_fetch_array($courseAssignmentSQLResult)) {
								if($row['dueDate']>=date("Y-m-d"))
								{
								echo'<form method="POST" action="addProblemFromPool.php">';	
								echo'<input style="z-index:-1; position:relative;" type="text" name="assignmentId" value="'.$row['assignmentId'].'">';						
								echo'<tr><td name="assignmentTitle">'.$row['assignmentTitle'].'</td>';		
								echo'<td name="dueDate">'.$row['dueDate'].'</td>';
								if($row['isComplete']==0)
								{									
									echo'<td name="status">Not Complete</td>';
									echo'<td><input type="submit" value="Complete Assignment"></td></tr>';
								}
								else
								{ 
								echo'<td name="status">Complete</td>';
								echo'<td>Assignment Completed</td></tr>';
								}
								echo'</form>';
								}
							}
						} else echo'You have no current assignments in your Private Pool';
						echo'
						</table><br>
						<p style="font-size:12px;"><u>Past Assignments</u></p>
							<table>
							<tr>
								<td>Assignment</td>
								<td>Due Date</td>
								<td>Status</td>
								<td></td>
							</tr>';
							
							if ($courseAssignmentSQLResult1 > 0) {
								while($row=mysql_fetch_array($courseAssignmentSQLResult1)) {
									if($row['dueDate']<date("Y-m-d"))
									{
									echo'<form method="POST" action="addProblemFromPool.php">';	
									echo'<input style="z-index:-1; position:relative;" type="text" name="assignmentId" value="'.$row['assignmentId'].'">';						
									echo'<tr><td name="assignmentTitle">'.$row['assignmentTitle'].'</td>';		
									echo'<td name="dueDate">'.$row['dueDate'].'</td>';
									if($row['isComplete']==0)
									{									
										echo'<td name="status">Not Complete</td>';
										echo'<td><input type="submit" value="Too Late to Complete"></td></tr>';
									}
									else
									{ 
									echo'<td name="status">Complete</td>';
									echo'<td>Assignment Completed</td></tr>';
									}
									echo'</form>';
									}
								}
							}
							echo'
							</table>
							<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
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
							</table>
							<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>';
			}
							
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
				
		#<!-- Gradebook tab -->
				
			include 'display_grades.php';
			displayGrades($currentrole);
			
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($currentrole);
	
	footerLayout();
	?>
</html>