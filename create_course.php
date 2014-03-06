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
			<p style="font-size:18px;"><u>Create New Course</u></p>
			
			Course Number: CSIS-<input type="text" name="courseNum"> 
			Section Number: <input type="text" name="sectionNum">
			<br><br>Course Name: <input type="text" name="courseName">
			<br><br>
			Description<br><input type="text" name="description" style="height: 75px; width: 100%;"><br><br>
			Semester: <select><option id="fall2013">Fall 2013</option>
							<option id="spring2014">Spring 2014</option>
							<option id="summer2014">Summer 2014</option>
						</select><br><br>
			Assign Faculty Member: <select><option>Select Faulty</option>
							<option>Dr. Pat White</option>
							<option>Mr. Luke Greiner</option>
							<option>Mrs. Denis Kalic</option>
					</select><br><br>
			Assign Course Coordinator: <select><option>Select Course Coordinator</option>
							<option>Dr. Pat White</option>
							<option>Mr. Luke Greiner</option>
							<option>Mrs. Denis Kalic</option>
					</select>
			
			<br><br><br>
			<input type="button" value="Cancel" onClick="cancelConfirm()">
			<input type="button" value="Create Course">
			
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