<!DOCTYPE HTML>
<?php
	session_start();  
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	}
	include 'dbInfo.php';
	
	
	$sectionCountQuery = "SELECT * FROM Section";
	$sectionCountResult = mysql_query($sectionCountQuery);
	$sectionCountResultRows = mysql_num_rows($sectionCountResult);
	
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
   	include 'home_layout.php';
   	headerLayout($currentrole, $firstname);
		#<!-- Courses tab -->
			echo'
			<div>
			<p style="font-size:12px;">Select the course(s) to be disabled</p>
			<p style="font-size:16px;"><u>Current Courses</u></p>
			<form action="" method="post">
			<table>';
			
			if ($sectionCountResultRows > 0) {
				while($row=mysql_fetch_array($sectionCountResult)) {
			
					echo'<tr><td>CSIS-'.$row['courseId'].'-'.$row['sectionId'].' '.$row['coursename'].'
					</td><td></td><td>';
					if($row['active'] == 0) echo'<input name="'.$row['courseId'].$row['sectionId'].'" type="checkbox" checked></td></tr>';
					else echo'<input name="'.$row['courseId'].$row['sectionId'].'" type="checkbox"></td></tr>';
				}
			}	
			echo'
			</table>
			<p style="font-size:16px;"><u>Previous Courses</u></p>
			<table></table>
					
			<br>
			<input type="button" onClick="goBack()" value="Cancel">
			<input type="submit" name="deleteCoursePost" value="Delete Course(s)">
			</form>
			
			</div>';
			if($sectionCountResultRows>0) mysql_data_seek( $sectionCountResult, 0 );
			if(isset($_POST['deleteCoursePost'])){
				if ($sectionCountResultRows > 0) {
					while($row=mysql_fetch_array($sectionCountResult)) {
						if (isset($_POST["".$row['courseId'].$row['sectionId'].""])) {
							$deleteCourseQuery = "UPDATE Section SET active=0 WHERE courseId='".$row["courseId"]."' and sectionId='".$row["sectionId"]."'";			
							
							// Perform Query
							$result = mysql_query($deleteCourseQuery);

							// Check result
							// This shows the actual query sent to MySQL, and the error. Useful for debugging.
							if (!$result) {
								$message  = 'Invalid query: ' . mysql_error() . "\n";
								$message .= 'Whole query: ' . $deleteCourseQuery;
								die($message);								
							}
							header("Location: home.php");
						} else {
							$enableCourseQuery = "UPDATE Section SET active=1 WHERE courseId='".$row["courseId"]."' and sectionId='".$row["sectionId"]."'";			
							
							// Perform Query
							$result = mysql_query($enableCourseQuery);

							// Check result
							// This shows the actual query sent to MySQL, and the error. Useful for debugging.
							if (!$result) {
								$message  = 'Invalid query: ' . mysql_error() . "\n";
								$message .= 'Whole query: ' . $enableCourseQuery;
								die($message);								
							}
							header("Location: home.php");
						}
					}
					
				}		
				
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