<!DOCTYPE HTML>
<?php
	session_start(); 
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	} 
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
	$email=$_SESSION['username'];
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
			$assignmentSQL = mysql_query('SELECT * FROM Assignment WHERE assignmentId="'.$_GET['id'].'"',$conn);
			$assignmentSQLArray = mysql_fetch_array($assignmentSQL);
			$studentList = mysql_query('SELECT * FROM Roster,users WHERE Roster.studentId = users.email AND Roster.sectionId="'.$_GET['num'].'" AND Roster.active=1',$conn);
			$courseName = mysql_result(mysql_query('SELECT coursename FROM Section WHERE sectionId="'.$_GET['num'].'"',$conn),0);
			echo'<div class="CSSTableGenerator" >
			<h3>'.$courseName.'</h3>
			<h3 style="padding-left:150px;">'.$assignmentSQLArray[18].'</h3>
			<h3 style="padding-left:150px;">Due Date: '.$assignmentSQLArray[3].'</h3><br>
			<p style="font-size:12px;">Click on a students name to view individual problem grades for that student</p>
			
						<table>
							<tr>
								<td>Student Name</td>
								<td>Grade</td>
								<td>Percentage</td>
								<td>Status</td>
							</tr>';
							while ($row=mysql_fetch_array($studentList)) {
								echo'<tr><td><a href="./student_problems_gradebook.php?name='.$row['email'].'&id='.$_GET['id'].'&#tab4">'.$row['first'].' '.$row['last'].'</a></td>';
								$assignmentEarnedTotal = 0;
								$assignmentPossibleTotal = 0;
								for ($i=1;$i<=10;$i++) {
									$pointsEarnedSQL = mysql_result(mysql_query('SELECT status FROM Gradebook WHERE studentId="'.$row['email'].'" AND problemId="'.$assignmentSQLArray[$i+6].'" AND assignmentId="'.$_GET['id'].'"',$conn),0);
									if ($pointsEarnedSQL==1) {
										$assignmentEarnedTotal = $assignmentEarnedTotal + $assignmentSQLArray[$i+19];
									}
								}
								
								for ($j=1;$j<=10;$j++) {
									$assignmentPossibleTotal = $assignmentPossibleTotal + $assignmentSQLArray[$j+19];
								}
								echo'<td>'.$assignmentEarnedTotal.'/'.$assignmentPossibleTotal.'</td>';
								echo'<td>'.round(($assignmentEarnedTotal/$assignmentPossibleTotal)*100).'%</td>';
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