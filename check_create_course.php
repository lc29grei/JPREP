<?php
  session_start();
  
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  mysql_select_db('jprep');
  
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$courseNumber = mysql_real_escape_string($_POST['courseNum']);
		$sectionNumber = mysql_real_escape_string($_POST['sectionNum']);
		$courseName = mysql_real_escape_string($_POST['courseName']);
		$description = mysql_real_escape_string($_POST['description']);
		$courseCoordinator = mysql_real_escape_string($_POST['ccName']);
		$faculty = mysql_real_escape_string($_POST['facultyName']);
		
		$sql = 'INSERT INTO Section VALUES ("'.$sectionNumber.'","'.$faculty.'","'.$courseCoordinator.'","'.$courseNumber.'","'.$courseName.'","'.$description.'")';
	
		$retval = mysql_query( $sql, $conn );
		if(! $retval ) {
	  		die('Could not update data: ' . mysql_error());
		}
		echo "Updated data successfully\n";
	
		mysql_close($conn);
		
		header("location: home.php");
	}
?>