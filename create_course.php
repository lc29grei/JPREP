<!DOCTYPE HTML>
<?php
	session_start();  
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	}
	include 'dbInfo.php';
	
	
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
   	include 'home_layout.php';
	headerLayout($currentrole, $firstname);
		#<!-- Courses tab -->
			$query1 = "SELECT * FROM users WHERE role1='f' OR role2='f'";
			$result1 = mysql_query($query1);
			$query2 = "SELECT * FROM users WHERE role1='c' OR role2='c'";
			$result2 = mysql_query($query2);
			
		if(isset($_GET['action']) && $_GET['action'] == 'edit'){
			$secId = $_GET['id'];
			$courseNum = mysql_result(mysql_query("SELECT courseId FROM Section WHERE sectionId='$secId'"),0)."";
			$courseName = mysql_result(mysql_query("SELECT coursename FROM Section WHERE sectionId='$secId'"),0)."";
			$description = mysql_result(mysql_query("SELECT description FROM Section WHERE sectionId='$secId'"),0)."";
			$facultyName = mysql_result(mysql_query("SELECT faculty FROM Section WHERE sectionId='$secId'"),0)."";
			$ccName = mysql_result(mysql_query("SELECT coursecoordinator FROM Section WHERE sectionId='$secId'"),0)."";
			echo'
			<div>
			<p style="font-size:18px;"><u>Create New Course</u></p>
			<form method="POST" action="check_create_course.php?action=edit&id='.$secId.'">
			Course Number: CSIS-<input type="text" name="courseNum" placeholder="'.$courseNum.'"> 
			Section Number: <input type="text" name="sectionNum" placeholder="'.$secId.'">
			<br><br>Course Name: <input type="text" name="courseName" placeholder="'.$courseName.'">
			<br><br>
			Description<br><textarea name="description" rows="5" cols="150" style="resize:none;" placeholder="'.$description.'"></textarea><br><br>
			Semester: <select><option id="fall2013">Fall 2013</option>
							<option id="spring2014">Spring 2014</option>
							<option id="summer2014">Summer 2014</option>
						</select><br><br>
			Assign Faculty Member: <select name="facultyName"><option>Select Faulty</option>';
							if (mysql_num_rows($result1) > 0) {
								while($row=mysql_fetch_array($result1)) {
									if ($row['email'] == $facultyName) {
										echo'<option value="'.$row['email'].'" selected="selected">'.$row['prefix'].'. '.$row['first'].' '.$row['last'].'</option>';
									} else echo'<option value="'.$row['email'].'">'.$row['prefix'].'. '.$row['first'].' '.$row['last'].'</option>';		
								}
							}
					echo'</select><br><br>
			Assign Course Coordinator: <select name="ccName"><option>Select Course Coordinator</option>';
							if (mysql_num_rows($result2) > 0) {
								while($rows=mysql_fetch_array($result2)) {
									if ($rows['email'] == $ccName) {
										echo'<option value="'.$rows['email'].'" selected="selected">'.$rows['prefix'].'. '.$rows['first'].' '.$rows['last'].'</option>';
									} else echo'<option value="'.$rows['email'].'">'.$rows['prefix'].'. '.$rows['first'].' '.$rows['last'].'</option>';		
								}
							}
					echo'</select>
			
			<br><br><br>
			<input type="button" value="Cancel" onClick="cancelConfirm()">
			<input type="submit" value="Save Changes">
			</form>
			
			</div>';
		} else {
				echo'
			<div>
			<p style="font-size:18px;"><u>Create New Course</u></p>
			<form method="POST" action="check_create_course.php">
			Course Number: CSIS-<input type="text" name="courseNum"> 
			Section Number: <input type="text" name="sectionNum">
			<br><br>Course Name: <input type="text" name="courseName">
			<br><br>
			Description<br><textarea name="description" rows="5" cols="150" style="resize:none;"></textarea><br><br>
			Semester: <select><option id="fall2013">Fall 2013</option>
							<option id="spring2014">Spring 2014</option>
							<option id="summer2014">Summer 2014</option>
						</select><br><br>
			Assign Faculty Member: <select name="facultyName"><option>Select Faulty</option>';
							if (mysql_num_rows($result1) > 0) {
								while($row=mysql_fetch_array($result1)) {
									echo'<option value="'.$row['email'].'">'.$row['prefix'].'. '.$row['first'].' '.$row['last'].'</option>';		
								}
							}
					echo'</select><br><br>
			Assign Course Coordinator: <select name="ccName"><option>Select Course Coordinator</option>';
							if (mysql_num_rows($result2) > 0) {
								while($rows=mysql_fetch_array($result2)) {
									echo'<option value="'.$rows['email'].'">'.$rows['prefix'].'. '.$rows['first'].' '.$rows['last'].'</option>';		
								}
							}
					echo'</select>
			
			<br><br><br>
			<input type="button" value="Cancel" onClick="cancelConfirm()">
			<input type="submit" value="Create Course">
			</form>
			
			</div>';
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