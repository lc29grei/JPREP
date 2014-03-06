<!DOCTYPE HTML>
<?php
	session_start();  
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	}
	$accounttype=$_SESSION['account_type'];
	$firstname=$_SESSION['first_name'];
   	include 'home_layout.php';
   	headerLayout($accounttype, $firstname);
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
			displayManageAccounts();
											
		#<!-- Question Pool tab -->
		
			include 'display_question_pool.php';
			displayQuestionPool($accounttype);
			
		#<!-- Gradebook tab -->
		
			include 'display_grades.php';
			displayGrades($accounttype);
		
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($accounttype);
		
		footerLayout();
?>
</html>