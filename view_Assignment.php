<!DOCTYPE HTML>
<?php
	session_start();  
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	}
	include 'dbInfo.php';
	
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
	$email=$_SESSION['username'];
	
	$currentAssignmentSQLResult = mysql_query('SELECT * FROM Assignment WHERE assignmentId="'.$_GET['id'].'"', $conn);
	$currentAssignmentSQLArray = mysql_fetch_array($currentAssignmentSQLResult);
	
	$assignmentTitle = $currentAssignmentSQLArray['assignmentTitle'];
	$assignmentDueDate = $currentAssignmentSQLArray['dueDate'];
	$assignmentSectionId = $currentAssignmentSQLArray['sectionId'];
	
	$problemCount=0;
	if (mysql_num_rows($currentAssignmentSQLResult) > 0)
	{
			for($i=1;$i<=10;$i++)
			{
				if($currentAssignmentSQLArray[$i+6]!=null) $problemCount++;
			}
	}

	
   	include 'home_layout.php';
	headerLayout($currentrole, $firstname);
		#<!-- Courses tab -->
		echo'<div class="CSSTableGenerator" >
			<h3>Assignment: '.$assignmentTitle.'</h3>
			<h3 style="padding-left:150px;">Due Date: '.$assignmentDueDate.'</h3>
			<h3 style="padding-left:150px;"></h3><br>';
			if(isset($_GET['action']) && $_GET['action'] == 'grade'){
				echo'<table>
							<tr>
								<td>Problem</td>
								<td>Points Earned</td>
								<td>Possible Points</td>
							</tr>';
									for($j=1;$j<=$problemCount;$j++)
									{
										$getProblemIdSQL = 'SELECT * FROM Problem WHERE problemId="'.$currentAssignmentSQLArray[$j+6].'"';
										$getProblemIdSQLResult = mysql_query($getProblemIdSQL, $conn);
										$row1=mysql_fetch_array($getProblemIdSQLResult);
										
										echo'<tr><td>'.$row1['title'].'</td>';
										$pointsEarnedSQL = mysql_result(mysql_query('SELECT status FROM Gradebook WHERE studentId="'.$email.'" AND problemId="'.$currentAssignmentSQLArray[$j+6].'" AND assignmentId="'.$_GET['id'].'"',$conn),0);
										if ($pointsEarnedSQL==1) echo'<td>'.$currentAssignmentSQLArray[$j+19].'</td>';
										else echo'<td>0</td>';
										echo'<td>'.$currentAssignmentSQLArray[$j+19].'</td></tr>';
									}
						echo'</table>';
			} else {
				echo'<table>
							<tr>
								<td>Problem</td>
								<td>Points Earned</td>
								<td>Possible Points</td>
								<td>Status</td>
							</tr>';
								$row=mysql_fetch_array($currentAssignmentSQLResult);
									for($j=1;$j<=$problemCount;$j++)
									{
										$getProblemIdSQL = 'SELECT * FROM Problem WHERE problemId="'.$currentAssignmentSQLArray[$j+6].'"';
										$getProblemIdSQLResult = mysql_query($getProblemIdSQL, $conn);
										$row1=mysql_fetch_array($getProblemIdSQLResult);

										echo'<tr><td>'.$row1['title'].'</td>';
										$pointsEarnedSQL = mysql_result(mysql_query('SELECT status FROM Gradebook WHERE studentId="'.$email.'" AND problemId="'.$currentAssignmentSQLArray[$j+6].'" AND assignmentId="'.$_GET['id'].'"',$conn),0);
										if ($pointsEarnedSQL==1) echo'<td>'.$currentAssignmentSQLArray[$j+19].'</td>';
										else echo'<td>0</td>';
										echo'<td>'.$currentAssignmentSQLArray[$j+19].'</td>';
										if ($pointsEarnedSQL==1) echo'<td>Completed</td></tr>';
										else echo'<td><a href="problem_interface.php?problemId='.$currentAssignmentSQLArray[$j+6].'&assignmentId='.$_GET['id'].'">Complete</a></td></tr>';
									}
						echo'</table>';
			}
						echo'<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
			</div>';
			
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