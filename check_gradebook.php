<?php
  session_start();
  
 include 'dbInfo.php';
	
 
		$problemId = $_GET['problemId'];
		$assignmentId = $_GET['assignmentId'];
		$studentId = $_SESSION['username'];
		

		
	
		
		$sql = 'INSERT INTO Gradebook VALUES("' . $studentId . '", "' . $problemId . '", "' . $assignmentId . '",1)';
	
		$retval = mysql_query($sql, $conn );
		if(! $retval ) {
	  		die('Could not update data: ' . mysql_error());
		}
		echo "Updated data successfully\n";
	
		mysql_close($conn);
		
		header("Location: problem_interface.php?problemId=" . $_GET['problemId']."&assignmentId=".$_GET['assignmentId']);
	
?>