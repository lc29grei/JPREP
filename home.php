<!DOCTYPE HTML>
<?php
	session_start(); 
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	}
	$_SESSION['assignmentProblemArray']=array();
	
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
   	
   	include 'home_layout.php';
   	headerLayout($currentrole,$firstname);
		
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
		
			include 'display_grades.php';
			displayGrades($currentrole);
		
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($currentrole);
		
		footerLayout();
		?>	

</html>
