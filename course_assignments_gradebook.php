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
			<h3 style="padding-left:150px;">Semester: Spring 2014</h3>
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
								echo'<tr><td><a href="./assignment_students_gradebook.php?id='.$row['assignmentId'].'&num='.$row['sectionId'].'&#tab4">'.$row['assignmentTitle'].'</a></td>
								<td>'.$row['dueDate'].'</td>
								<td></td>
								<td></td>
								<td></td></tr>';
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