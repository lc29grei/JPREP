<?php
function displayGrades($currentrole)
{
	if($currentrole=="s")
	{
		echo 
		'
		<div>
			<p>Select a course to view your grade</p>
				<p><b><u>Current Courses</u></b></p>
				<a href="./course_gradebook.php#tab4"><u>Course 1</u></a><br>
				<a href="./course_gradebook.php#tab4"><u>Course 2</u></a><br>
				<a href="./course_gradebook.php#tab4"><u>Course 3</u></a><br>
				<p><b><u>Previous Courses</u></b></p>
				<a href="./course_gradebook.php#tab4"><u>Course 4</u></a><br>
				<a href="./course_gradebook.php#tab4"><u>Course 5</u></a><br>
		</div>
		';
	}
	else if ($currentrole=="f")
	{
		echo
		'
		<div>
			<p><b><u>Current Courses</u></b></p>
			<b><a ID="xcourse1grade" style="text-decoration:none;" href="javascript:Toggle(\'course1grade\');">[+]</a> <a ID="xcourse1grade" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course1grade\');">Course 1</a></b><br>
			<div ID="course1grade" style="display:none; margin-left:2em;">
				<a href="./all_students_gradebook.php#tab4">View Students</a><br>
				<a href="./course_assignments_gradebook.php#tab4">View Assignments</a>
			</div>
			<b><a ID="xcourse2grade" style="text-decoration:none;" href="javascript:Toggle(\'course2grade\');">[+]</a> <a ID="xcourse2grade" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course2grade\');">Course 2</a></b><br>
			<div ID="course2grade" style="display:none; margin-left:2em;">
				<a href="./all_students_gradebook.php#tab4">View Students</a><br>
				<a href="./course_assignments_gradebook.php#tab4">View Assignments</a>
			</div>
			<b><a ID="xcourse3grade" style="text-decoration:none;" href="javascript:Toggle(\'course3grade\');">[+]</a> <a ID="xcourse3grade" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course3grade\');">Course 3</a></b><br>
			<div ID="course3grade" style="display:none; margin-left:2em;">
				<a href="./all_students_gradebook.php#tab4">View Students</a><br>
				<a href="./course_assignments_gradebook.php#tab4">View Assignments</a>
			</div>
			<p><b><u>Previous Courses</u></b></p>
			<b><a ID="xcourse4grade" style="text-decoration:none;" href="javascript:Toggle(\'course4grade\');">[+]</a> <a ID="xcourse4grade" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course4grade\');">Course 4</a></b><br>
			<div ID="course4grade" style="display:none; margin-left:2em;">
				<a href="./all_students_gradebook.php#tab4">View Students</a><br>
				<a href="./course_assignments_gradebook.php#tab4">View Assignments</a>
			</div>
			<b><a ID="xcourse5grade" style="text-decoration:none;" href="javascript:Toggle(\'course5grade\');">[+]</a> <a ID="xcourse5grade" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course5grade\');">Course 5</a></b><br>
			<div ID="course5grade" style="display:none; margin-left:2em;">
				<a href="./all_students_gradebook.php#tab4">View Students</a><br>
				<a href="./course_assignments_gradebook.php#tab4">View Assignments</a>
			</div>
		</div>
		';	
	} else {
		echo'<div></div>';
	}
	}
	
?>