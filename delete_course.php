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
			echo'
			<div>
			<p style="font-size:12px;">Select the course(s) to be deleted</p>
			<p style="font-size:16px;"><u>Current Courses</u></p>
			<table><tr><td>Course 1</td><td></td><td><input type="checkbox"></td></tr>
					<tr><td>Course 2</td><td></td><td><input type="checkbox"></td></tr>
					<tr><td>Course 3</td><td></td><td><input type="checkbox"></td></tr></table>
			<p style="font-size:16px;"><u>Previous Courses</u></p>
			<table><tr><td>Course 4</td><td></td><td><input type="checkbox"></td></tr>
					<tr><td>Course 5</td><td></td><td><input type="checkbox"></td></tr></table>
					
			<br>
			<input type="button" onClick="goBack()" value="Cancel">
			<input type="button" value="Delete Course(s)">
			
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