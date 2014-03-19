<?php
function displayGrades($accountType)
{
	if($accountType=="student")
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
	else
	{
		echo
		'
		<div>
			<p><b><u>Current Courses</u></b></p>
			<b><a ID="xcourse1grade" href="javascript:Toggle(\'course1grade\');">[+]</a> Course 1</b><br>
			<div ID="course1grade" style="display:none; margin-left:2em;">
				<a href="./all_students_gradebook.php#tab4">View Students</a><br>
				<a href="./course_assignments_gradebook.php#tab4">View Assignments</a>
			</div>
			<b><a ID="xcourse2grade" href="javascript:Toggle(\'course2grade\');">[+]</a> Course 2</b><br>
			<div ID="course2grade" style="display:none; margin-left:2em;">
				<a href="./all_students_gradebook.php#tab4">View Students</a><br>
				<a href="./course_assignments_gradebook.php#tab4">View Assignments</a>
			</div>
			<b><a ID="xcourse3grade" href="javascript:Toggle(\'course3grade\');">[+]</a> Course 3</b><br>
			<div ID="course3grade" style="display:none; margin-left:2em;">
				<a href="./all_students_gradebook.php#tab4">View Students</a><br>
				<a href="./course_assignments_gradebook.php#tab4">View Assignments</a>
			</div>
			<p><b><u>Previous Courses</u></b></p>
			<b><a ID="xcourse4grade" href="javascript:Toggle(\'course4grade\');">[+]</a> Course 4</b><br>
			<div ID="course4grade" style="display:none; margin-left:2em;">
				<a href="./all_students_gradebook.php#tab4">View Students</a><br>
				<a href="./course_assignments_gradebook.php#tab4">View Assignments</a>
			</div>
			<b><a ID="xcourse5grade" href="javascript:Toggle(\'course5grade\');">[+]</a> Course 5</b><br>
			<div ID="course5grade" style="display:none; margin-left:2em;">
				<a href="./all_students_gradebook.php#tab4">View Students</a><br>
				<a href="./course_assignments_gradebook.php#tab4">View Assignments</a>
			</div>
		</div>
		';	
	}
	}

if(isset($_GET['action']) && $_GET['action'] == 'editgradessingle'){
editGradesSingle();
}
function editGradesSingle(){
	
	echo'
		<div class="CSSTableGenerator" >
			<h3>Student</h3>
			<h3 style="padding-left:150px;">Assignment</h3><br><br>
			<a href="?action=editgradessingle">Edit Grades</a>
			<br><br>
			<table>
				<tr>
					<td>Problem Name</td>
					<td>Points Earned</td>
					<td>Possible Points</td>
					<td>Status</td>
				</tr>
				<tr>
					<td>Hello World</td>
					<td><input type="text" placeholder="45"></td>
					<td>45</td>
					<td>Complete</td>
				</tr>
				<tr>
					<td>Fun with Recursion</td>
					<td><input type="text" placeholder="30"></td>
					<td>40</td>
					<td>Complete</td>
				</tr>	
				<tr>
					<td>Strings</td>
					<td><input type="text" placeholder="15"></td>
					<td>15</td>
					<td>Complete</td>
				</tr>	
			</table>						
				<button style="text-align: center" onClick="goBack()">Back</button>
				
		</div>
	';
	
}


function editGrades(){
	
	echo'
			<div class="CSSTableGenerator" >
				<h3>Edit All Students</h3>
				<h3 style="padding-left:150px;">Course 1</h3><br><br>
				<br><br>
				<table>
					<tr>
						<td>Student Name</td>
						<td>Assignment</td>
						<td>Due Date</td>
						<td>Grade</td>
						<td>Percentage</td>
						<td>Status</td>
					</tr>
					<tr>
						<td>Student 1</td>
						<td><a >Assignment 1</td>
						<td>5/1/2014 11:59 PM</td>
						<td>100/100</td>
						<td><input type="text" placeholder="100">%</td>
						<td>Complete</td>
					</tr>
					<tr>
						<td>Student 1</td>
						<td>Assignment 2</td>
						<td>5/1/2014 11:59 PM</td>
						<td>90/100</td>
						<td><input type="text" placeholder="90">%</td>
						<td>In Progress</td>
					</tr>
					<tr>
						<td>Student 2</td>
						<td>Assignment 1</td>
						<td>5/2/2014 11:59 PM</td>
						<td>90/100</td>
						<td><input type="text" placeholder="90">%</td>
						<td>Complete</td>
					</tr>
					<tr>
						<td>Student 2</td>
						<td>Assignment 2</td>
						<td>5/2/2014 11:59 PM</td>
						<td>100/100</td>
						<td><input type="text" placeholder="100">%</td>
						<td>Complete</td>
					</tr>
					<tr>
						<td>Student 3</td>
						<td>Assignment 1</td>
						<td>5/3/2014 11:59 PM</td>
						<td>65/100</td>
						<td><input type="text" placeholder="65">%</td>
						<td>Complete</td>
					</tr>
					<tr>
						<td>Student 3</td>
						<td>Assignment 2</td>
						<td>5/3/2014 11:59 PM</td>
						<td>75/100</td>
						<td><input type="text" placeholder="75">%</td>
						<td>Complete</td>
					</tr>
					<tr>
						<td>Student 4</td>
						<td >Assignment 1</td>
						<td>5/4/2014 11:59 PM</td>
						<td>74/100</td>
						<td><input type="text" placeholder="74">%</td>
						<td>In Progress</td>
					</tr>
					<tr>
						<td>Student 4</td>
						<td >Assignment 2</td>
						<td>5/4/2014 11:59 PM</td>
						<td>84/100</td>
						<td><input type="text" placeholder="84">%</td>
						<td>Complete</td>
					</tr>
				</table>						
					<button style="text-align: center" onClick="goBack()">Submit</button>
				
			</div>		
		';
	
}
	
?>