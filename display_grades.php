<?php
function displayGrades($accountType)
{
	if($accountType=="student")
	{
		echo 
		'
		<div>
			<p><b><u>Current Courses</u></b></p>
			<b><a ID="xcourse1grade" href="javascript:Toggle(\'course1grade\');">[+]</a> Course 1</b><br>
			<div ID="course1grade" style="display:none; margin-left:2em;">
				<a href="">View Students</a><br>
				<a href="">View Assignments</a>
			</div>
			<b><a ID="xcourse2grade" href="javascript:Toggle(\'course2grade\');">[+]</a> Course 2</b><br>
			<div ID="course2grade" style="display:none; margin-left:2em;">
				<a href="">View Students</a><br>
				<a href="">View Assignments</a>
			</div>
			<b><a ID="xcourse3grade" href="javascript:Toggle(\'course3grade\');">[+]</a> Course 3</b><br>
			<div ID="course3grade" style="display:none; margin-left:2em;">
				<a href="">View Students</a><br>
				<a href="">View Assignments</a>
			</div>	
		</div>
		';
	}
	else
	{
		echo
		'
		<div>
			<p><b><u>Current Courses</u></b></p>
			<b><a ID="xcourse1grade" href="javascript:Toggle(\'course1grade\');">[+]</a> Course 1</b><br>
			<div ID="course1grade" style="display:none; margin-left:2em;">
				<a href="">View Students</a><br>
				<a href="">View Assignments</a>
			</div>
			<b><a ID="xcourse2grade" href="javascript:Toggle(\'course2grade\');">[+]</a> Course 2</b><br>
			<div ID="course2grade" style="display:none; margin-left:2em;">
				<a href="">View Students</a><br>
				<a href="">View Assignments</a>
			</div>
			<b><a ID="xcourse3grade" href="javascript:Toggle(\'course3grade\');">[+]</a> Course 3</b><br>
			<div ID="course3grade" style="display:none; margin-left:2em;">
				<a href="">View Students</a><br>
				<a href="">View Assignments</a>
			</div>
			<p><b><u>Previous Courses</u></b></p>
			<b><a ID="xcourse4grade" href="javascript:Toggle(\'course4grade\');">[+]</a> Course 4</b><br>
			<div ID="course4grade" style="display:none; margin-left:2em;">
				<a href="">View Students</a><br>
				<a href="">View Assignments</a>
			</div>
			<b><a ID="xcourse5grade" href="javascript:Toggle(\'course5grade\');">[+]</a> Course 5</b><br>
			<div ID="course5grade" style="display:none; margin-left:2em;">
				<a href="">View Students</a><br>
				<a href="">View Assignments</a>
			</div>
		</div>
		';	
	}
}
	
	
?>