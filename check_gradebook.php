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
		
		$currentAssignmentSQL = 'SELECT * FROM Assignment WHERE assignmentId="'.$assignmentId.'"';
		$currentAssignmentSQLProblemCountResult = mysql_query($currentAssignmentSQL, $conn);
		
		
		$assignmentproblemSQL = 'SELECT count(*) FROM Gradebook WHERE assignmentId="'.$assignmentId.'"';
		$assignmentproblemResult = mysql_fetch_array(mysql_query($assignmentproblemSQL, $conn));
		$problemCount=0;
		if ($currentAssignmentSQLProblemCountResult > 0)
		{
			$row=mysql_fetch_array($currentAssignmentSQLProblemCountResult);
			for($i=1;$i<=10;$i++)
			{
				if($row['problem'.$i.'']!=null) $problemCount++;
			}
		}
		if($problemCount==$assignmentproblemResult[0])
		{
			$sql1 = "UPDATE Assignment SET isComplete=1 WHERE assignmentId='".$assignmentId."'";
			$retval1 = mysql_query($sql1, $conn );
			if(! $retval1 ) {
	  		die('Could not update data: ' . mysql_error());
			}	
		}
		
		
		echo "Updated data successfully\n";
	
		mysql_close($conn);
		
		header("Location: problem_interface.php?problemId=" . $_GET['problemId']."&assignmentId=".$_GET['assignmentId']);
	
?>