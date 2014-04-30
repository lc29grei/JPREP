<!DOCTYPE HTML>
<?php
	session_start(); 
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	} 
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
	$email = $_SESSION['username'];
	include 'dbInfo.php';
	
	
   	include 'home_layout.php';
	headerLayout($currentrole, $firstname);	
		#<!-- Courses tab -->
	
	$courseAssignmentSQL = 'SELECT * FROM Assignment WHERE sectionId="'.$_GET['num'].'"';
	$courseAssignmentSQLResult = mysql_query($courseAssignmentSQL, $conn);
	$courseAssignmentSQLResult1 = mysql_query($courseAssignmentSQL, $conn);
	
	$courseNameSQL = 'SELECT coursename FROM Section WHERE sectionId="'.$_GET['num'].'"';
	$courseNameSQLResult = mysql_query($courseNameSQL, $conn);
	$courseNameResult = mysql_fetch_array($courseNameSQLResult);
	
	$courseProfessorSQL = 'SELECT prefix,first,last FROM Section,users WHERE users.email=Section.faculty AND Section.sectionId="'.$_GET['num'].'" AND Section.courseId="'.$_GET['courseNumber'].'"';
	$courseProfessorSQLResult = mysql_query($courseProfessorSQL, $conn);
	$courseProfessorResult = mysql_fetch_array($courseProfessorSQLResult);
	
	if ($currentrole=="s") {
		echo'<div class="CSSTableGenerator" >
			<h3>Course: '.$courseNameResult['0'].'</h3>
			<h3 style="padding-left:150px;">Professor: '.$courseProfessorResult['0'].' '.$courseProfessorResult['1'].' '.$courseProfessorResult['2'].'</h3>
			<br>
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
								echo'<tr><td name="assignmentTitle">'.$row['assignmentTitle'].'</td>';		
								echo'<td name="dueDate">'.$row['dueDate'].'</td>';
								$complete = true;
								for ($i=1;$i<=10;$i++) {
									$problemsList = mysql_result(mysql_query('SELECT status FROM Gradebook WHERE studentId="'.$email.'" AND assignmentId="'.$row['assignmentId'].'" AND problemId="'.$row[$i+6].'"',$conn),0);
									if (($problemsList!=1) and ($row[$i+6]!=null)) $complete=false;
								}
								
								if($complete==false)
								{									
									echo'<td name="status">Not Complete</td>';
									echo'<td><a href="view_Assignment.php?id='.$row['assignmentId'].'">Complete Assignment</a></td></tr>';
								}
								else
								{ 
								echo'<td name="status">Complete</td>';
								echo'<td><a href="view_Assignment.php?id='.$row['assignmentId'].'&action=grade">View Grade</a></td></tr>';
								}
								
								}
							}
						} else echo'You have no current assignments';
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
									
									echo'<input style="z-index:-1; position:relative;" type="text" name="assignmentId" value="'.$row['assignmentId'].'">';						
									echo'<tr><td name="assignmentTitle">'.$row['assignmentTitle'].'</td>';		
									echo'<td name="dueDate">'.$row['dueDate'].'</td>';
									if($row['isComplete']==0)
									{									
										echo'<td name="status">Not Complete</td>';
										echo'<td>Too Late To Complete</td></tr>';
									}
									else
									{ 
									echo'<td name="status">Complete</td>';
									echo'<td><a href="view_Assignment.php?id='.$row['assignmentId'].'&action=grade">View Grade</a></td></tr>';
									}
									
									}
								}
							}
							echo'
							</table>
							<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>';
			} else {
				echo'<div class="CSSTableGenerator" >
				<h3><a href="./create_new_assignment.php?id='.$_GET['num'].'&courseNumber='.$_GET['courseNumber'].'">Create New Assignment</a></h3>
				<h3 style="padding-left:150px;">Course: '.$courseNameResult['0'].'-'.$_GET['num'].'</h3>
				<br>
				<p style="font-size:12px;"><u>Pending Assignments</u></p>
						<table>
							<tr>
								<td>Assignment</td>
								<td>Due Date</td>
								<td></td>
							</tr>';
							if ($courseAssignmentSQLResult > 0) {
							while($row=mysql_fetch_array($courseAssignmentSQLResult)) {
								if($row['dueDate']>=date("Y-m-d")) {
									echo'<input style="z-index:-1; position:relative;" type="text" name="assignmentId" value="'.$row['assignmentId'].'">';						
									echo'<tr><td name="assignmentTitle">'.$row['assignmentTitle'].'</td>';		
									echo'<td name="dueDate">'.$row['dueDate'].'</td>';
									echo'<td><a href="">Edit</a></td></tr>';
								}
							}
							} else echo'You have no current assignments';
						echo'</table><br>
						<p style="font-size:12px;"><u>Past Assignments</u></p>
							<table>
							<tr>
								<td>Assignment</td>
								<td>Due Date</td>
								<td></td>
							</tr>';
							if ($courseAssignmentSQLResult1 > 0) {
								while($row=mysql_fetch_array($courseAssignmentSQLResult1)) {
									if($row['dueDate']<date("Y-m-d"))
									{
									
									echo'<input style="z-index:-1; position:relative;" type="text" name="assignmentId" value="'.$row['assignmentId'].'">';						
									echo'<tr><td name="assignmentTitle">'.$row['assignmentTitle'].'</td>';		
									echo'<td name="dueDate">'.$row['dueDate'].'</td>';
									echo'<td><a href="">Edit</a></td></tr>';
									}
								}
							} else echo'You have no past assignments';
							echo'</table>
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