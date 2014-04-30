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
			
	?>	
		<!-- Gradebook tab -->
			
<?php 			
		$assignmentSQL = mysql_query('SELECT * FROM Assignment WHERE faculty="'.$email.'"',$conn);
		$courseName = mysql_result(mysql_query('SELECT coursename FROM Section WHERE sectionId="'.$_GET['id'].'"',$conn),0);

		echo'<div class="CSSTableGenerator" >
			<h3>'.$courseName.'-'.$_GET['id'].'</h3>
			<p style="font-size:12px;">Click on the assignment name to view individual student grades for that assignment</p>
						<table>
							<tr>
								<td>Assignment Name</td>
								<td>Due Date</td>
								<td>Class Average</td>
								<td>Highest Grade</td>
								<td>Lowest Grade</td>
							</tr>';
							while ($row=mysql_fetch_array($assignmentSQL)) {
								$studentList = mysql_query('SELECT * FROM Roster WHERE sectionId="'.$_GET['id'].'" AND active=1',$conn);
								$assignmentSQLArray = mysql_fetch_array(mysql_query('SELECT * FROM Assignment WHERE assignmentId="'.$row['assignmentId'].'"',$conn));
								$assignmentEarnedTotal = 0;
								$assignmentPossibleTotal = 0;
								$lowestGrade = 0;
								$highestGrade = 0;
								$lowestGradePercent = 0;
								$highestGradePercent = 0;
								while ($rows=mysql_fetch_array($studentList)) {
									$studentTotal = 0;
									for ($i=1;$i<=10;$i++) {
										$problemCompleteSQL = mysql_result(mysql_query('SELECT status FROM Gradebook WHERE studentId="'.$rows['studentId'].'" AND assignmentId="'.$row['assignmentId'].'" AND problemId="'.$assignmentSQLArray[$i+6].'"',$conn),0);
										if ($problemCompleteSQL==1) $studentTotal = $studentTotal + $assignmentSQLArray[$i+19];
									}
									if ($studentTotal < $lowestGrade) $lowestGrade = $studentTotal;
									if ($studentTotal > $highestGrade) $highestGrade = $studentTotal;
									$assignmentEarnedTotal = $assignmentEarnedTotal + $studentTotal;
								}
								
								for ($j=1;$j<=10;$j++) {
									$assignmentPossibleTotal = $assignmentPossibleTotal + $assignmentSQLArray[$j+19];
								}
								$lowestGradePercent = round(($lowestGrade/$assignmentPossibleTotal)*100);
								$highestGradePercent = round(($highestGrade/$assignmentPossibleTotal)*100);
								$assignmentPossibleTotal = $assignmentPossibleTotal * mysql_num_rows($studentList);
								echo'<tr><td><a href="./assignment_students_gradebook.php?id='.$row['assignmentId'].'&num='.$row['sectionId'].'&#tab4">'.$row['assignmentTitle'].'</a></td>
								<td>'.$row['dueDate'].'</td>
								<td>'.round(($assignmentEarnedTotal/$assignmentPossibleTotal)*100).'%</td>
								<td>'.$highestGradePercent.'%</td>
								<td>'.$lowestGradePercent.'%</td></tr>';
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