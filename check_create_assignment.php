<?php
  session_start();
  $currentrole=$_SESSION['currentrole'];
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  mysql_select_db('jprep');
  
  $assignmentCountQuery = "SELECT * FROM assignment";
  $assignmentCountResult = mysql_query($assignmentCountQuery);
  $assignmentId = mysql_num_rows($assignmentCountResult)+1;
  $email = $_SESSION['username'];
 
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		
		$assignmentTitle = mysql_real_escape_string($_POST['assignmentTitle']);
		$sectionId = mysql_real_escape_string($_GET['id']);
		$faculty = mysql_real_escape_string($email);
		$dueDate = mysql_real_escape_string($_POST['year']).'-'.mysql_real_escape_string($_POST['month']).'-'.mysql_real_escape_string($_POST['day']);
		$pointValue = mysql_real_escape_string($_POST['grade']);
		$otherinfo = mysql_real_escape_string($_POST['description']);
		$assignmentCategory = mysql_real_escape_string($_POST['assignmentCategory']);
		
		$problem0="";
		$problem1="";
		$problem2="";
		$problem3="";
		$problem4="";
		$problem5="";
		$problem6="";
		$problem7="";
		$problem8="";
		$problem9="";
		
		for($i=0;$i<count($_SESSION['assignmentProblemArray']);$i++)
		{
			${'problem'.$i} = $_SESSION['assignmentProblemArray'][$i];
		}
		

		$sql = "INSERT INTO assignment VALUES('".$assignmentId."','".$sectionId."','".$email."','".$dueDate."','".$pointValue."','".$otherinfo."','0','".$problem0."','".$problem1."','".$problem2."','".$problem3."','".$problem4."','".$problem5."','".$problem6."','".$problem7."','".$problem8."','".$problem9."','".$assignmentCategory."','".$assignmentTitle."')";
		$retval = mysql_query( $sql, $conn );
		if(! $retval ) {
	  		die('Could not update data: ' . mysql_error());
		}
		echo "Updated data successfully\n";
		mysql_close($conn);
		header("location: home.php");
	}
?>