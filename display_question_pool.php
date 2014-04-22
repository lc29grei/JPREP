<?php
	
	function displayQuestionPool($currentrole)
	{
		$dbhost = 'localhost';
  		$dbuser = 'root';
  		$dbpass = '';
  		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db("jprep");
	
		$email = $_SESSION['username'];
		
		if ($currentrole=="f") {
			$facultySQL = 'SELECT DISTINCT (courseId),coursename FROM Section WHERE faculty="'.$email.'"';
			$facultySQLResult = mysql_query($facultySQL, $conn);
			
			echo'<div class="qpool">
				<p>Click a link to view that question pool</p>
				<a href="./private_pool.php#tab3"><u>Private</u></a><br>
				<p><b><u>Current Courses</u></b></p>';
				if (mysql_num_rows($facultySQLResult) > 0) {
					while($row=mysql_fetch_array($facultySQLResult)) {
						echo'<a href="./course_pool.php?id='.$row['courseId'].'&#tab3"><u>'.$row['coursename'].'</u></a><br>';
					}
				}
				echo'<p><b><u>Previous Courses</u></b></p>
			</div>
			';
		} else if ($currentrole=="c"){
			$ccSQL = 'SELECT DISTINCT (courseId),coursename FROM Section WHERE coursecoordinator="'.$email.'"';
			$ccSQLResult = mysql_query($ccSQL, $conn);
			
			echo'<div class="qpool">
				<p>Click a link to view that question pool</p>
				<p><b><u>Current Courses</u></b></p>';
				if (mysql_num_rows($ccSQLResult) > 0) {
					while($row=mysql_fetch_array($ccSQLResult)) {
						echo'<a href="./course_pool.php?courseNumber='.$row['courseId'].'&#tab3"><u>'.$row['coursename'].'</u></a><br>';
					}
				}
				echo'<p><b><u>Previous Courses</u></b></p>
			</div>
			';
		} else {
			$adminSQL = 'SELECT DISTINCT (courseId),coursename FROM Section';
			$adminSQLResult = mysql_query($adminSQL, $conn);
			
			echo'<div class="qpool">
				<p>Click a link to view that question pool</p>
				<p><b><u>Current Courses</u></b></p>';
				if (mysql_num_rows($adminSQLResult) > 0) {
					while($row=mysql_fetch_array($adminSQLResult)) {
						echo'<a href="./course_pool.php?id='.$row['courseId'].'&#tab3"><u>'.$row['coursename'].'</u></a><br>';
					}
				}
				echo'<p><b><u>Previous Courses</u></b></p>
			</div>
			';
		}
	}
?>






