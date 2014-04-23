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
	
	$assignmentTitle=$_POST['assignmentTitle'];
	$assignmentId=$_POST['assignmentId'];
	$assignmentDueDate=$_POST['dueDate'];
	$assignmentSectionId=$_GET['id'];
	
	$currentAssignmentSQL = 'SELECT * FROM Assignment WHERE assignmentId="'.$assignmentId.'"';
	$currentAssignmentSQLResult = mysql_query($currentAssignmentSQL, $conn);
	$currentAssignmentSQLProblemCountResult = mysql_query($currentAssignmentSQL, $conn);
	
	
	$problemCount=0;
	if ($currentAssignmentSQLProblemCountResult > 0) {
		$row=mysql_fetch_array($currentAssignmentSQLProblemCountResult);
			for($i=1;$i<=10;$i++)
			{
				if($row['problem'.$i.'']!=null) $problemCount++;
			}
		
	}

	
   	include 'home_layout.php';
	headerLayout($currentrole, $firstname);
		#<!-- Courses tab -->
		echo'<div class="CSSTableGenerator" >
			<h3>Assignment: '.$assignmentTitle.'</h3>
			<h3 style="padding-left:150px;">Due Date: '.$assignmentDueDate.'</h3>
			<h3 style="padding-left:150px;"></h3><br>
						<table>
							<tr>
								<td>Problem</td>
								<td>Points</td>
								<td>Status</td>
							</tr>';
							if ($currentAssignmentSQLResult > 0) {
								$row=mysql_fetch_array($currentAssignmentSQLResult);
									for($i=1;$i<=$problemCount;$i++)
									{
										$getProblemIdSQL = 'SELECT * FROM Problem WHERE problemId="'.$row['problem'.$i.''].'"';
										$getProblemIdSQLResult = mysql_query($getProblemIdSQL, $conn);
										$row1=mysql_fetch_array($getProblemIdSQLResult);
										//$problemIdFromResult=$row1[''.$row['problem'.$i.''].''];
										//$row['problem'.$i.'']
										echo'<tr><form>';
											echo'<td>'.$row1['title'].'</td>';
											echo'<td>'.$row['problem'.$i.'Value'].'</td>';
											echo'<td><a href="problem_interface.php?problemId='.$row['problem'.$i.''].'">Complete</a></td>';
										echo'</form></tr>';
									}
								
							}
						echo'</table>
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>';
			
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