<?php
  session_start();
  
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  mysql_select_db('jprep');
  
	if($_SERVER['REQUEST_METHOD'] == "POST") {
	if(isset($_GET['action']) && $_GET['action'] == 'edit'){
		$selectedId = $_GET['id'];
		$new_sectionNumber = $selectedId;
		$new_courseNumber = mysql_result(mysql_query('SELECT courseId FROM Section WHERE sectionId="'.$selectedId.'"'),0);
		$new_facultyName = mysql_result(mysql_query('SELECT faculty FROM Section WHERE sectionId="'.$selectedId.'"'),0);
		$new_ccName = mysql_result(mysql_query('SELECT coursecoordinator FROM Section WHERE sectionId="'.$selectedId.'"'),0);
		$new_courseName = mysql_result(mysql_query('SELECT coursename FROM Section WHERE sectionId="'.$selectedId.'"'),0);
		$new_description = mysql_result(mysql_query('SELECT description FROM Section WHERE sectionId="'.$selectedId.'"'),0);
		
		if($_POST['courseNum']!=null) {
			$new_courseNumber = mysql_real_escape_string($_POST['courseNum']);
		}
		if($_POST['sectionNum']!=null) {
			$new_sectionNumber = mysql_real_escape_string($_POST['sectionNum']);
		}
		if($_POST['courseName']!=null) {
			$new_courseName = mysql_real_escape_string($_POST['courseName']);
		}
		if($_POST['description']!=null) {
			$new_description = mysql_real_escape_string($_POST['description']);
		}
		if($_POST['ccName']!=null) {
			$new_ccName = mysql_real_escape_string($_POST['ccName']);
		}
		if($_POST['facultyName']!=null) {
			$new_facultyName = mysql_real_escape_string($_POST['facultyName']);
		}
		
		$sql = 'UPDATE Section 
				SET sectionId="'.$new_sectionNumber.'",
					faculty="'.$new_facultyName.'",
					coursecoordinator="'.$new_ccName.'",
					courseId="'.$new_courseNumber.'",
					coursename="'.$new_courseName.'",
					description="'.$new_description.'" 
					WHERE sectionId="'.$selectedId.'"';
	} else {
		$courseNumber = mysql_real_escape_string($_POST['courseNum']);
		$sectionNumber = mysql_real_escape_string($_POST['sectionNum']);
		$courseName = mysql_real_escape_string($_POST['courseName']);
		$description = mysql_real_escape_string($_POST['description']);
		$courseCoordinator = mysql_real_escape_string($_POST['ccName']);
		$faculty = mysql_real_escape_string($_POST['facultyName']);
		
		$sql = 'INSERT INTO Section VALUES ("'.$sectionNumber.'","'.$faculty.'","'.$courseCoordinator.'","'.$courseNumber.'","'.$courseName.'","'.$description.'",1)';
	}
		$retval = mysql_query($sql, $conn );
		if(! $retval ) {
	  		die('Could not update data: ' . mysql_error());
		}
		echo "Updated data successfully\n";
	
		mysql_close($conn);
		
		header("location: home.php");
	}
?>