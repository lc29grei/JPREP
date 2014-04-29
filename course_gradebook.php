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
			<?php	
			$courseAssignmentSQL = 'SELECT * FROM Assignment WHERE sectionId="'.$_GET['num'].'"';
			$courseAssignmentSQLResult = mysql_query($courseAssignmentSQL, $conn);
			$courseAssignmentSQLResult1 = mysql_query($courseAssignmentSQL, $conn);
			
			$courseNameSQL = 'SELECT coursename FROM Section WHERE sectionId="'.$_GET['num'].'" AND courseId="'.$_GET['courseNumber'].'"';
			$courseNameSQLResult = mysql_query($courseNameSQL, $conn);
			$courseNameResult = mysql_fetch_array($courseNameSQLResult);
			
			$courseProfessorSQL = 'SELECT faculty FROM Section WHERE sectionId="'.$_GET['num'].'" AND courseId="'.$_GET['courseNumber'].'"';
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
								<td>Total Problems Completed</td>
							</tr>';
							if ($courseAssignmentSQLResult > 0) {
							while($row=mysql_fetch_array($courseAssignmentSQLResult)) {
							
								$assignmentId=$row['assignmentId'];
								$currentAssignmentSQL = 'SELECT * FROM Assignment WHERE assignmentId="'.$assignmentId.'"';
								$currentAssignmentSQLProblemCountResult = mysql_query($currentAssignmentSQL, $conn);
								
								$assignmentproblemSQL = 'SELECT count(*) FROM Gradebook WHERE assignmentId="'.$assignmentId.'"';
								$assignmentproblemResult = mysql_fetch_array(mysql_query($assignmentproblemSQL, $conn));
								
								$problemCount=0;
								if ($currentAssignmentSQLProblemCountResult > 0)
								{
									$rows=mysql_fetch_array($currentAssignmentSQLProblemCountResult);
									for($i=1;$i<=10;$i++)
									{
										if($rows['problem'.$i.'']!=null) $problemCount++;
									}
								}
								
								
								if($row['dueDate']>=date("Y-m-d"))
								{
																				
								echo'<tr><td name="assignmentTitle"><a href="view_Assignment.php?id='.$row['assignmentId'].'&action=grade">'.$row['assignmentTitle'].'</a></td>';		
								echo'<td name="dueDate">'.$row['dueDate'].'</td>';
								if($row['isComplete']==0)
								{
									echo'<td name="status">Not Complete</td>';
									echo'<td><p>'.$assignmentproblemResult[0].' out of '.$problemCount.' completed</p></td></tr>';
								}
								else
								{
								echo'<td name="status">Complete</td>';
								echo'<td>Assignment Completed</td></tr>';
								}
								echo'</form>';
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
								<td>Total Problems Completed</td>
							</tr>';
							
							if ($courseAssignmentSQLResult1 > 0) {
								while($row=mysql_fetch_array($courseAssignmentSQLResult1)) {
								
								
									$assignmentId=$row['assignmentId'];
									$currentAssignmentSQL = 'SELECT * FROM Assignment WHERE assignmentId="'.$assignmentId.'"';
									$currentAssignmentSQLProblemCountResult = mysql_query($currentAssignmentSQL, $conn);
									
									
									$assignmentproblemSQL = 'SELECT count(*) FROM Gradebook WHERE assignmentId="'.$assignmentId.'"';
									$assignmentproblemResult = mysql_fetch_array(mysql_query($assignmentproblemSQL, $conn));
									
									
									$problemCount=0;
									if ($currentAssignmentSQLProblemCountResult > 0)
									{
										$row=mysql_fetch_array($currentAssignmentSQLProblemCountResult);
										for($i=1;$i<=10;$i++)
										{
											if($row['problem'.$i.'']!=null) $problemCount++;
										}
									}
								
								
									if($row['dueDate']<date("Y-m-d"))
									{
															
									echo'<tr><td name="assignmentTitle"><a href="view_Assignment.php?id='.$row['assignmentId'].'&action=grade">'.$row['assignmentTitle'].'</a></td>';		
									echo'<td name="dueDate">'.$row['dueDate'].'</td>';
									if($row['isComplete']==0)
									{									
										echo'<td name="status">Not Complete</td>';
										echo'<td><p>'.$assignmentproblemResult[0].' out of '.$problemCount.' completed</p></td></tr>';
									}
									else
									{ 
									echo'<td name="status">Complete</td>';
									echo'<td>Assignment Completed</td></tr>';
									}
									
									}
								}
							}
							echo'
							</table>
							<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>';
			}
				
				
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($currentrole);
	
	footerLayout();
	?>
</html>





		
 