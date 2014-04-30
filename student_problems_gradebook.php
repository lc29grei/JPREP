<!DOCTYPE HTML>
<?php
	session_start(); 
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	} 
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
   	$email=$_SESSiON['username'];
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
		$studentName = mysql_fetch_array(mysql_query('SELECT * FROM users WHERE email="'.$_GET['name'].'"',$conn));
		$assignmentSQL = mysql_query('SELECT * FROM Assignment WHERE assignmentId="'.$_GET['id'].'"',$conn);
		$assignmentSQLArray = mysql_fetch_array($assignmentSQL);
		if(isset($_GET['action']) && $_GET['action'] == 'editgradessingle'){
			echo'
			<div class="CSSTableGenerator" >
			<h3>'.$studentName[7].' '.$studentName[8].'</h3>
			<h3 style="padding-left:150px;">'.$assignmentSQLArray[18].'</h3>
			<br><br>';
			$problemCount=0;
			if (mysql_num_rows($assignmentSQL) > 0) {
				for($i=1;$i<=10;$i++) {
					if($assignmentSQLArray[$i+6]!=null) $problemCount++;
				}
			}
			echo'<table>
				<tr>
					<td>Problem Name</td>
					<td>Points Earned</td>
					<td>Possible Points</td>
					<td>Status</td>
				</tr>';
				for($j=1;$j<=$problemCount;$j++) {
					$getProblemIdSQL = 'SELECT * FROM Problem WHERE problemId="'.$assignmentSQLArray[$j+6].'"';
					$getProblemIdSQLResult = mysql_query($getProblemIdSQL, $conn);
					$row1=mysql_fetch_array($getProblemIdSQLResult);
										
					echo'<tr><td>'.$row1['title'].'</td>';
					$pointsEarnedSQL = mysql_result(mysql_query('SELECT status FROM Gradebook WHERE studentId="'.$email.'" AND problemId="'.$currentAssignmentSQLArray[$j+6].'" AND assignmentId="'.$_GET['id'].'"',$conn),0);
					if ($pointsEarnedSQL==1) echo'<td>'.$assignmentSQLArray[$j+19].'</td>';
					else echo'<td>0</td>';
					echo'<td>'.$assignmentSQLArray[$j+19].'</td>';
					if ($pointsEarnedSQL==1) echo'<td>Complete</td></tr>';
					else echo'<td>Not Complete</td></tr>';
				}
					
			echo'</table>						
				<p class="submit" style="text-align: center"><input type="submit" value="Cancel" onClick="goBack()"><input type="submit" value="Submit" onClick="goBack()"></p>
				
		</div>';
		} else {
			echo'<div class="CSSTableGenerator" >
			<h3>'.$studentName[7].' '.$studentName[8].'</h3>
			<h3 style="padding-left:150px;">'.$assignmentSQLArray[18].'</h3><br><br>';
			$problemCount=0;
			if (mysql_num_rows($assignmentSQL) > 0) {
				for($i=1;$i<=10;$i++) {
					if($assignmentSQLArray[$i+6]!=null) $problemCount++;
				}
			}
						echo'<table>
							<tr>
								<td>Problem Name</td>
								<td>Points Earned</td>
								<td>Possible Points</td>
								<td>Status</td>
							</tr>';
				for($j=1;$j<=$problemCount;$j++) {
					$getProblemIdSQL = 'SELECT * FROM Problem WHERE problemId="'.$assignmentSQLArray[$j+6].'"';
					$getProblemIdSQLResult = mysql_query($getProblemIdSQL, $conn);
					$row1=mysql_fetch_array($getProblemIdSQLResult);
										
					echo'<tr><td>'.$row1['title'].'</td>';
					$pointsEarnedSQL = mysql_result(mysql_query('SELECT status FROM Gradebook WHERE studentId="'.$_GET['name'].'" AND problemId="'.$assignmentSQLArray[$j+6].'" AND assignmentId="'.$_GET['id'].'"',$conn),0);
					if ($pointsEarnedSQL==1) echo'<td>'.$assignmentSQLArray[$j+19].'</td>';
					else echo'<td>0</td>';
					echo'<td>'.$assignmentSQLArray[$j+19].'</td>';
					if ($pointsEarnedSQL==1) echo'<td>Complete</td></tr>';
					else echo'<td>Not Complete</td></tr>';
				}
							
				echo'</table>
				<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>';
			}
			
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($currentrole);
	
	footerLayout();
	?>
</html>