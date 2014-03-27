<?php
	function displayCourses($currentrole)
	{
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
		echo
		'
		<div>
			<p><b><u>Current Courses</u></b></p>
			<b><a ID="xcourse1" style="text-decoration:none;" href="javascript:Toggle(\'course1\');">[+]</a> <a ID="xcourse1" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course1\');">Course 1</a></b><br>
   			<div ID="course1" style="display:none; margin-left:2em;">
   				<a href="./create_new_problem.php">Create New Problem</a><br>
  				<a href="./create_new_assignment.php">Create New Assignment</a><br>
   				<a href="./course_page.php">Manage Assignments</a><br>
   				<a href="./course_pool.php#tab3">View Question Pool</a><br>
   				<a href="./course_assignments_gradebook.php#tab4">View Gradebook</a>
   			</div>
			<b><a ID="xcourse2" style="text-decoration:none;" href="javascript:Toggle(\'course2\');">[+]</a> <a ID="xcourse2" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course2\');">Course 2</a></b><br>
   			<div ID="course2" style="display:none; margin-left:2em;">
   				<a href="./create_new_problem.php">Create New Problem</a><br>
  				<a href="./create_new_assignment.php">Create New Assignment</a><br>
   				<a href="./course_page.php">Manage Assignments</a><br>
   				<a href="./course_pool.php#tab3">View Question Pool</a><br>
   				<a href="./course_assignments_gradebook.php#tab4">View Gradebook</a>
			</div>
			<b><a ID="xcourse3" style="text-decoration:none;" href="javascript:Toggle(\'course3\');">[+]</a> <a ID="xcourse3" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course3\');">Course 3</a></b><br>
			<div ID="course3" style="display:none; margin-left:2em;">
   				<a href="./create_new_problem.php">Create New Problem</a><br>
  				<a href="./create_new_assignment.php">Create New Assignment</a><br>
   				<a href="./course_page.php">Manage Assignments</a><br>
   				<a href="./course_pool.php#tab3">View Question Pool</a><br>
   				<a href="./course_assignments_gradebook.php#tab4">View Gradebook</a>
			</div>
			<p><b><u>Previous Courses</u></b></p>
			<b><a ID="xcourse4" style="text-decoration:none;" href="javascript:Toggle(\'course4\');">[+]</a> <a ID="xcourse4" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course4\');">Course 4</a></b><br>
   			<div ID="course4" style="display:none; margin-left:2em;">
   				<a href="./create_new_problem.php">Create New Problem</a><br>
  				<a href="./create_new_assignment.php">Create New Assignment</a><br>
   				<a href="./course_page.php">Manage Assignments</a><br>
   				<a href="./course_pool.php#tab3">View Question Pool</a><br>
   				<a href="./course_assignments_gradebook.php#tab4">View Gradebook</a>
   			</div>
			<b><a ID="xcourse5" style="text-decoration:none;" href="javascript:Toggle(\'course5\');">[+]</a> <a ID="xcourse5" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course5\');">Course 5</a></b><br>
   			<div ID="course5" style="display:none; margin-left:2em;">
   				<a href="./create_new_problem.php">Create New Problem</a><br>
  				<a href="./create_new_assignment.php">Create New Assignment</a><br>
   				<a href="./course_page.php">Manage Assignments</a><br>
   				<a href="./course_pool.php#tab3">View Question Pool</a><br>
   				<a href="./course_assignments_gradebook.php#tab4">View Gradebook</a>
			</div>
		</div>
		';
		} else if ($currentrole=="c") {
			echo'
			<div>
			<p><b><u>Current Courses</u></b></p>
			<b><a ID="xcourse1" style="text-decoration:none;" href="javascript:Toggle(\'course1\');">[+]</a> <a ID="xcourse1" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course1\');">Course 1</a></b><br>
   			<div ID="course1" style="display:none; margin-left:2em;">
   				<a href="./create_new_problem.php">Create New Problem</a><br>
   			</div>
			<b><a ID="xcourse2" style="text-decoration:none;" href="javascript:Toggle(\'course2\');">[+]</a> <a ID="xcourse2" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course2\');">Course 2</a></b><br>
   			<div ID="course2" style="display:none; margin-left:2em;">
   				<a href="./create_new_problem.php">Create New Problem</a><br>
			</div>
			<b><a ID="xcourse3" style="text-decoration:none;" href="javascript:Toggle(\'course3\');">[+]</a> <a ID="xcourse3" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course3\');">Course 3</a></b><br>
			<div ID="course3" style="display:none; margin-left:2em;">
   				<a href="./create_new_problem.php">Create New Problem</a><br>
			</div>
			<p><b><u>Previous Courses</u></b></p>
			<b><a ID="xcourse4" style="text-decoration:none;" href="javascript:Toggle(\'course4\');">[+]</a> <a ID="xcourse4" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course4\');">Course 4</a></b><br>
   			<div ID="course4" style="display:none; margin-left:2em;">
   				<a href="./create_new_problem.php">Create New Problem</a><br>
   			</div>
			<b><a ID="xcourse5" style="text-decoration:none;" href="javascript:Toggle(\'course5\');">[+]</a> <a ID="xcourse5" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course5\');">Course 5</a></b><br>
   			<div ID="course5" style="display:none; margin-left:2em;">
   				<a href="./create_new_problem.php">Create New Problem</a><br>
			</div>
		</div>';
		} else if ($currentrole=="a") {
			echo'
			<div>
			<a href="./create_course.php"><u>Add Course</u></a>
			<a href="./delete_course.php" style="padding-left:15px;"><u>Delete Course</u></a><br>
			<p><b><u>Current Courses</u></b></p>
			<b><a ID="xcourse1" style="text-decoration:none;" href="javascript:Toggle(\'course1\');">[+]</a> <a ID="xcourse1" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course1\');">Course 1</a></b><br>
   			<div ID="course1" style="display:none; margin-left:2em;">
   				<a href="">Edit Course</a><br>
   				<a href="./create_new_problem.php">Create New Problem</a><br>
   			</div>
			<b><a ID="xcourse2" style="text-decoration:none;" href="javascript:Toggle(\'course2\');">[+]</a> <a ID="xcourse2" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course2\');">Course 2</a></b><br>
   			<div ID="course2" style="display:none; margin-left:2em;">
   				<a href="">Edit Course</a><br>
   				<a href="./create_new_problem.php">Create New Problem</a><br>
			</div>
			<b><a ID="xcourse3" style="text-decoration:none;" href="javascript:Toggle(\'course3\');">[+]</a> <a ID="xcourse3" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course3\');">Course 3</a></b><br>
			<div ID="course3" style="display:none; margin-left:2em;">
   				<a href="">Edit Course</a><br>
   				<a href="./create_new_problem.php">Create New Problem</a><br>
			</div>
			<p><b><u>Previous Courses</u></b></p>
			<b><a ID="xcourse4" style="text-decoration:none;" href="javascript:Toggle(\'course4\');">[+]</a> <a ID="xcourse4" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course4\');">Course 4</a></b><br>
   			<div ID="course4" style="display:none; margin-left:2em;">
   				<a href="">Edit Course</a><br>
   				<a href="./create_new_problem.php">Create New Problem</a><br>
   			</div>
			<b><a ID="xcourse5" style="text-decoration:none;" href="javascript:Toggle(\'course5\');">[+]</a> <a ID="xcourse5" style="text-decoration:none;color:black;" href="javascript:Toggle(\'course5\');">Course 5</a></b><br>
   			<div ID="course5" style="display:none; margin-left:2em;">
   				<a href="">Edit Course</a><br>
   				<a href="./create_new_problem.php">Create New Problem</a><br>
			</div>
			</div>';
		}
	}
?>