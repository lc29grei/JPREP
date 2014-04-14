<?php
  session_start();
  
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  mysql_select_db('jprep');
  
  $problemCountQuery = "SELECT * FROM problem";
  $problemCountResult = mysql_query($problemCountQuery);
  $problemId = mysql_num_rows($problemCountResult)+1;
	
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		
		$title = mysql_real_escape_string($_POST['title']);
		$methodName = mysql_real_escape_string($_POST['methodName']);
		$category = mysql_real_escape_string($_POST['category']);
		$selecctedCourse = mysql_real_escape_string($_POST['selectedCourse']);
		$description = mysql_real_escape_string($_POST['description']);
		$param1name = mysql_real_escape_string($_POST['param1name']);
		$param1type	="WE NEED TO ADD THIS TO THE DATABASE";	
		if (isset($_POST["param2name"]) && !empty($_POST["param2name"])) {
			$param2name = mysql_real_escape_string($_POST['param2name']);
		} else {
			$param2name = " ";
		}		
		$param2type	="WE NEED TO ADD THIS TO THE DATABASE";				
		if (isset($_POST["param3name"]) && !empty($_POST["param3name"])) {
			$param3name = mysql_real_escape_string($_POST['param3name']);
		} else {
			$param3name = " ";
		}
		$param3type	="WE NEED TO ADD THIS TO THE DATABASE";	
		if (isset($_POST["param4name"]) && !empty($_POST["param4name"])) {
			$param4name = mysql_real_escape_string($_POST['param4name']);
		} else {
			$param4name = " ";
		}
		$param4type	="WE NEED TO ADD THIS TO THE DATABASE";		
		if (isset($_POST["param5name"]) && !empty($_POST["param5name"])) {
			$param5name = mysql_real_escape_string($_POST['param5name']);
		} else {
			$param5name = " ";
		}
		$param5type="WE NEED TO ADD THIS TO THE DATABASE";	
		$resultType= mysql_real_escape_string($_POST['resultType']);
		$solution= mysql_real_escape_string($_POST['solution']);
		
		
		$sql = "INSERT INTO problem VALUES('".$problemId."','a','a','".$title."','".$methodName."','".$category."','".$resultType."','".$solution."','".$param1name."','".$param2name."','".$param3name."','".$param4name."','".$param5name."')";
	
		$retval = mysql_query( $sql, $conn );
		if(! $retval ) {
	  		die('Could not update data: ' . mysql_error());
		}
		echo "Updated data successfully\n";
	
		mysql_close($conn);
		
		header("location: home.php");
	}
?>