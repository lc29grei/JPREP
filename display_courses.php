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
			echo'
			<div>
			<p><b><u>Current Courses</u></b></p>
			<b><a ID="xcourse1" style="text-decoration:none;" href="javascript:Toggle(\'course1\');">[+]</a> <a ID="xcourse1" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course1\');">Course 1</a></b><br>
   			<div ID="course1" style="display:none; margin-left:2em;">
   				<a href="./course_page.php">View Assignments</a><br>
  				<a href="./course_gradebook.php#tab4">View Gradebook</a>
   			</div>
			<b><a ID="xcourse2" style="text-decoration:none;" href="javascript:Toggle(\'course2\');">[+]</a> <a ID="xcourse2" style="text-decoration:none;color:black;" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course2\');">Course 2</a></b><br>
   			<div ID="course2" style="display:none; margin-left:2em;">
   				<a href="./course_page.php">View Assignments</a><br>
  				<a href="./course_gradebook.php#tab4">View Gradebook</a>
			</div>
			<b><a ID="xcourse3" style="text-decoration:none;" href="javascript:Toggle(\'course3\');">[+]</a> <a ID="xcourse3" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course3\');">Course 3</a></b><br>
			<div ID="course3" style="display:none; margin-left:2em;">
   				<a href="./course_page.php">View Assignments</a><br>
  				<a href="./course_gradebook.php#tab4">View Gradebook</a>
			</div>
			<p><b><u>Previous Courses</u></b></p>
			<b><a ID="xcourse4" style="text-decoration:none;" href="javascript:Toggle(\'course4\');">[+]</a> <a ID="xcourse4" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course4\');">Course 4</a></b><br>
   			<div ID="course4" style="display:none; margin-left:2em;">
   				<a href="./course_page.php">View Assignments</a><br>
  				<a href="./course_gradebook.php#tab4">View Gradebook</a>
   			</div>
			<b><a ID="xcourse5" style="text-decoration:none;" href="javascript:Toggle(\'course5\');">[+]</a> <a ID="xcourse5" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course5\');">Course 5</a></b><br>
   			<div ID="course5" style="display:none; margin-left:2em;">
   				<a href="./course_page.php">View Assignments</a><br>
  				<a href="./course_gradebook.php#tab4">View Gradebook</a>
			</div>
			</div>';
		}
		else if ($currentrole=="f") {
			$facultySQL = 'SELECT * FROM Section WHERE faculty="'.$email.'"';
			$facultySQLResult = mysql_query($facultySQL, $conn);
		echo'
		<div>
			<p><b><u>Current Courses</u></b></p>';
			if (mysql_num_rows($facultySQLResult) > 0) {
			while($row=mysql_fetch_array($facultySQLResult)) {
				echo'<b><a ID="x'.$row['sectionId'].'" style="text-decoration:none;" href="javascript:Toggle(\''.$row['sectionId'].'\');">[+]</a> <a ID="x'.$row['sectionId'].'" style="text-decoration:none;color:black;" href="javascript:Toggle(\''.$row['sectionId'].'\');">'.$row['coursename'].'-'.$row['sectionId'].'</a></b><br>
   					<div ID="'.$row['sectionId'].'" style="display:none; margin-left:2em;">
   					<a href="./create_new_problem.php?id='.$row['courseId'].'">Create New Problem</a><br>
  					<a href="./create_new_assignment.php?id='.$row['sectionId'].'">Create New Assignment</a><br>
   					<a href="./course_page.php?id='.$row['sectionId'].'">Manage Assignments</a><br>
   					<a href="./course_pool.php?id='.$row['sectionId'].'&#tab3">View Question Pool</a><br>
   					<a href="./course_assignments_gradebook.php?id='.$row['sectionId'].'&#tab4">View Gradebook</a>
   				</div>';
			}} else echo'No Current Courses';
			echo'
			<p><b><u>Previous Courses</u></b></p>
			
			</div>';
		} else if ($currentrole=="c") {
			$ccSQL = 'SELECT DISTINCT (courseId),coursename FROM Section WHERE coursecoordinator="'.$email.'"';
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
			$adminSQL = 'SELECT * FROM Section';
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