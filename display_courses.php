<?php
	
	function displayCourses($currentrole)
	{
		$dbhost = 'localhost';
  		$dbuser = 'root';
  		$dbpass = '';
  		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db("jprep");
	
		$email = $_SESSION['username'];	

		if ($currentrole=="s") {
			$studentSQL = 'SELECT * FROM Section,Roster WHERE Section.sectionId = Roster.sectionId AND Roster.active=1 AND Section.active=1 AND Roster.studentId="'.$email.'"';
			$studentSQLResult = mysql_query($studentSQL, $conn);
			
			echo'<div>
			<p><b><u>Current Courses</u></b></p>';
			if (mysql_num_rows($studentSQLResult) > 0) {
				while($row=mysql_fetch_array($studentSQLResult)) {
					echo'<b><a ID="x'.$row['sectionId'].'" style="text-decoration:none;" href="javascript:Toggle(\''.$row['sectionId'].'\');">[+]</a> <a ID="x'.$row['sectionId'].'" style="text-decoration:none;color:black;" href="javascript:Toggle(\''.$row['sectionId'].'\');">'.$row['coursename'].'-'.$row['sectionId'].'</a></b><br>
   						<div ID="'.$row['sectionId'].'" style="display:none; margin-left:2em;">
   							<a href="./course_page.php?num='.$row['sectionId'].'&id='.$email.'&courseNumber='.$row['courseId'].'">View Assignments</a><br>
  							<a href="./course_gradebook.php?num='.$row['sectionId'].'&id='.$email.'&#tab4">View Gradebook</a>
   						</div>';
				}
			} else echo'You are not currently enrolled in any courses';
			echo'<p><b><u>Previous Courses</u></b></p>
			</div>';
		}
		else if ($currentrole=="f") {
			$facultySQL = 'SELECT * FROM Section WHERE faculty="'.$email.'" AND active=1';
			$facultySQLResult = mysql_query($facultySQL, $conn);
		echo'
		<div>
			<p><b><u>Current Courses</u></b></p>';
			if (mysql_num_rows($facultySQLResult) > 0) {
			while($row=mysql_fetch_array($facultySQLResult)) {
				echo'<b><a ID="x'.$row['sectionId'].'" style="text-decoration:none;" href="javascript:Toggle(\''.$row['sectionId'].'\');">[+]</a> <a ID="x'.$row['sectionId'].'" style="text-decoration:none;color:black;" href="javascript:Toggle(\''.$row['sectionId'].'\');">'.$row['coursename'].'-'.$row['sectionId'].'</a></b><br>
   					<div ID="'.$row['sectionId'].'" style="display:none; margin-left:2em;">
   					<a href="./create_new_problem.php?id='.$row['courseId'].'">Create New Problem</a><br>
  					<a href="./create_new_assignment.php?id='.$row['sectionId'].'&courseNumber='.$row['courseId'].'">Create New Assignment</a><br>
   					<a href="./course_page.php?id='.$row['sectionId'].'">Manage Assignments</a><br>
   					<a href="./course_pool.php?id='.$row['sectionId'].'&courseNumber='.$row['courseId'].'&#tab3">View Question Pool</a><br>
   					<a href="./course_assignments_gradebook.php?id='.$row['sectionId'].'&courseNumber='.$row['courseId'].'&#tab4">View Gradebook</a>
   				</div>';
			}} else echo'No Current Courses';
			echo'
			<p><b><u>Previous Courses</u></b></p>
			
			</div>';
		} else if ($currentrole=="c") {
			$ccSQL = 'SELECT DISTINCT (courseId),coursename FROM Section WHERE coursecoordinator="'.$email.'" AND active=1';
			$ccSQLResult = mysql_query($ccSQL, $conn);
			
			echo'
			<div>
			<p><b><u>Current Courses</u></b></p>';
			if (mysql_num_rows($ccSQLResult) > 0) {
			while($row=mysql_fetch_array($ccSQLResult)) {
				echo'<b><a ID="x'.$row['courseId'].'" style="text-decoration:none;" href="javascript:Toggle(\''.$row['courseId'].'\');">[+]</a> <a ID="x'.$row['courseId'].'" style="text-decoration:none;color:black;" href="javascript:Toggle(\''.$row['courseId'].'\');">'.$row['coursename'].'</a></b><br>
   					<div ID="'.$row['courseId'].'" style="display:none; margin-left:2em;">
   					<a href="./create_new_problem.php?id='.$row['courseId'].'">Create New Problem</a><br>
   				</div>';
			}} else echo'No Current Courses';
			echo'<p><b><u>Previous Courses</u></b></p>
			
			</div>';
			
		} else if ($currentrole=="a") {
			$adminSQL = 'SELECT * FROM Section WHERE active=1';
			$adminSQLResult = mysql_query($adminSQL, $conn);
			
			echo'
			<div>
			<a href="./create_course.php"><u>Add Course</u></a>
			<a href="./delete_course.php" style="padding-left:15px;"><u>Delete Course</u></a><br>
			<p><b><u>Current Courses</u></b></p>';
			if (mysql_num_rows($adminSQLResult) > 0) {
			while($row=mysql_fetch_array($adminSQLResult)) {
				echo'<b><a ID="x'.$row['sectionId'].'" style="text-decoration:none;" href="javascript:Toggle(\''.$row['sectionId'].'\');">[+]</a> <a ID="x'.$row['sectionId'].'" style="text-decoration:none;color:black;" href="javascript:Toggle(\''.$row['sectionId'].'\');">'.$row['coursename'].'-'.$row['sectionId'].'</a></b><br>
   					<div ID="'.$row['sectionId'].'" style="display:none; margin-left:2em;">
   					<a href="./create_course.php?action=edit&id='.$row['sectionId'].'">Edit Course</a><br>
   					<a href="./create_new_problem.php?id='.$row['courseId'].'">Create New Problem</a><br>
   					</div>';
			}} else echo'No Current Courses';
			echo'<p><b><u>Previous Courses</u></b></p>
			
			</div>';
		}
	}
?>