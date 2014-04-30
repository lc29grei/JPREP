<!DOCTYPE HTML>
<?php
	session_start(); 
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	} 
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
	include 'dbInfo.php';
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
			
		
		#<!-- Gradebook tab -->
			$courseName = mysql_result(mysql_query('SELECT coursename FROM Section WHERE sectionId="'.$_GET['id'].'"',$conn),0);
			#$studentList = mysql_query('SELECT * FROM Roster WHERE sectionId="'.$_GET['id'].'"',$conn);
			#$assignmentList = mysql_query('SELECT * FROM Assignment WHERE sectiondId="'.$_GET['id'].'"',$conn);
			echo'<div class="CSSTableGenerator" >
			<h3>All Students</h3>
			<h3 style="padding-left:150px;">'.$courseName.'-'.$_GET['id'].'</h3><br><br>
						<table>
							<tr>
								<td>Student Name</td>
								<td>Assignment</td>
								<td>Due Date</td>
								<td>Grade</td>
								<td>Percentage</td>
								<td>Status</td>
							</tr>';
							$studentAssignmentList = mysql_query('SELECT * FROM Assignment,Roster WHERE Assignment.sectionId = Roster.sectionId AND Roster.sectionId="'.$_GET['id'].'"',$conn);
							while ($row=mysql_fetch_array($studentAssignmentList)) {
									$studentInfo = mysql_fetch_array(mysql_query('SELECT first,last FROM users WHERE email="'.$row['studentId'].'"',$conn));
									$assignmentEarnedTotal = 0;
									$assignmentPossibleTotal = 0;
									$assignmentSQLArray = mysql_fetch_array(mysql_query('SELECT * FROM Assignment WHERE assignmentId="'.$row['assignmentId'].'"',$conn));
									for ($i=1;$i<=10;$i++) {
										$pointsEarnedSQL = mysql_result(mysql_query('SELECT status FROM Gradebook WHERE studentId="'.$row['studentId'].'" AND problemId="'.$assignmentSQLArray[$i+6].'" AND assignmentId="'.$row['assignmentId'].'"',$conn),0);
										if ($pointsEarnedSQL==1) {
											$assignmentEarnedTotal = $assignmentEarnedTotal + $assignmentSQLArray[$i+19];
										}
									}
								
									for ($j=1;$j<=10;$j++) {
										$assignmentPossibleTotal = $assignmentPossibleTotal + $assignmentSQLArray[$j+19];
									}
									echo'<tr><td>'.$studentInfo[0].' '.$studentInfo[1].'</td>
										<td><a href="./student_problems_gradebook.php?name='.$row['studentId'].'&id='.$row['assignmentId'].'&#tab4">'.$row['assignmentTitle'].'</a></td>
										<td>'.$row['dueDate'].'</td>
										<td>'.$assignmentEarnedTotal.'/'.$assignmentPossibleTotal.'</td>
										<td>'.round(($assignmentEarnedTotal/$assignmentPossibleTotal)*100).'%</td>';
										if ($assignmentEarnedTotal==$assignmentPossibleTotal) echo'<td>Complete</td></tr>';
										else echo'<td>Not Complete</td></tr>';
							}
						echo'</table>						
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
						
					</div>';
				
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($currentrole);
	footerLayout();
?>
</html>