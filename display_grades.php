<?php
	
function displayGrades($currentrole)
{
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db("jprep");

	$email = $_SESSION['username'];

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
		$facultySQL = 'SELECT * FROM Section WHERE faculty="'.$email.'"';
		$facultySQLResult = mysql_query($facultySQL, $conn);
		echo'<div>
			<p><b><u>Current Courses</u></b></p>';
			if (mysql_num_rows($facultySQLResult) > 0) {
				while($row=mysql_fetch_array($facultySQLResult)) {
					echo'<b><a ID="x'.$row['sectionId'].'grade" style="text-decoration:none;" href="javascript:Toggle(\''.$row['sectionId'].'grade\');">[+]</a> <a ID="x'.$row['sectionId'].'grade" style="text-decoration:none;color:black;" href="javascript:Toggle(\''.$row['sectionId'].'grade\');">'.$row['coursename'].'-'.$row['sectionId'].'</a></b><br>
					<div ID="'.$row['sectionId'].'grade" style="display:none; margin-left:2em;">
						<a href="./all_students_gradebook.php?id='.$row['sectionId'].'&#tab4">View Students</a><br>
						<a href="./course_assignments_gradebook.php?id='.$row['sectionId'].'&#tab4">View Assignments</a>
					</div>';
				}
			}
			echo'<p><b><u>Previous Courses</u></b></p>
		</div>
		';	
	} else {
		echo'<div></div>';
	}
	}
	
?>