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
		$studentSQL = 'SELECT * FROM Section,Roster WHERE Section.sectionId = Roster.sectionId AND Roster.active=1 AND Section.active=1 AND Roster.studentId="'.$email.'"';
		$studentSQLResult = mysql_query($studentSQL, $conn);
		
		echo '<div>
			<p>Select a course to view your grade</p>
				<p><b><u>Current Courses</u></b></p>';
				if (mysql_num_rows($studentSQLResult) > 0) {
					while($row=mysql_fetch_array($studentSQLResult)) {
						echo'<a href="./course_gradebook.php?num='.$row['sectionId'].'&id='.$email.'&#tab4"><u>'.$row['coursename'].'-'.$row['sectionId'].'</u></a><br>';
					}
				}
				echo'<p><b><u>Previous Courses</u></b></p>
		</div>';
	}
	else if ($currentrole=="f")
	{
		$facultySQL = 'SELECT * FROM Section WHERE faculty="'.$email.'" AND active=1';
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