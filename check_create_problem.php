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
  $email = $_SESSION['username'];
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		
		$title = mysql_real_escape_string($_POST['title']);
		$methodName = mysql_real_escape_string($_POST['methodName']);
		$selecctedCourse = mysql_real_escape_string($_POST['selectedCourse']);
		$description = mysql_real_escape_string($_POST['description']);
		$param1name = mysql_real_escape_string($_POST['param1name']);
		$starterCode = mysql_real_escape_string($_POST['starter']);
		
		if (!empty($_POST["param2name"])) {
			$param2name = mysql_real_escape_string($_POST['param2name']);
		} else {
			$param2name = "";
		}		
				
		if (!empty($_POST["param3name"])) {
			$param3name = mysql_real_escape_string($_POST['param3name']);
		} else {
			$param3name = "";
		}
		
		if (!empty($_POST["param4name"])) {
			$param4name = mysql_real_escape_string($_POST['param4name']);
		} else {
			$param4name = "";
		}
			
		if (!empty($_POST["param5name"])) {
			$param5name = mysql_real_escape_string($_POST['param5name']);
		} else {
			$param5name = "";
		}
			
		$param2type = $param3type = $param4type = $param5type = "";
		$param1type	= mysql_real_escape_string($_POST['param1type']);	
		
		if (!empty($_POST["param2name"])) $param2type = $_POST['param2type'];
		if (!empty($_POST["param3name"])) $param3type = $_POST['param3type'];
		if (!empty($_POST["param4name"])) $param4type = $_POST['param4type'];
		if (!empty($_POST["param5name"])) $param5type = $_POST['param5type'];
		
		$resultType= mysql_real_escape_string($_POST['resultType']);
		$solution= mysql_real_escape_string($_POST['solution']);
		
		$sql = "INSERT INTO Problem VALUES('".$problemId."','private_".$email."','',1,'".$title."','".$methodName."','".$resultType."','".$solution."','".$param1name."','".$param2name."','".$param3name."','".$param4name."','".$param5name."','".$starter."','','".$param1type."','".$param2type."','".$param3type."','".$param4type."','".$param5type."',)";
	
		$retval = mysql_query( $sql, $conn );
		if(! $retval ) {
	  		die('Could not update data: ' . mysql_error());
		}
		echo "Updated data successfully\n";
		
		$i=1;
		while ($i < 26) {
			if (isset($_POST['case'.$i.'param1'])) {
				$param1 = $param2 = $param3 = $param4 = $param5 = "";
				$param1=$_POST['case'.$i.'param1'];
				if (!empty($_POST["param2name"])) $param2=$_POST['case'.$i.'param2'];
				if (!empty($_POST["param3name"])) $param3=$_POST['case'.$i.'param3'];
				if (!empty($_POST["param4name"])) $param4=$_POST['case'.$i.'param4'];
				if (!empty($_POST["param5name"])) $param5=$_POST['case'.$i.'param5'];
				$result = $_POST['case'.$i.'result'];
				if(isset($_POST['case'.$i.'hidden'])) {
					$hidden=1;
				} else $hidden=0;
				
				$runQuery = mysql_query('INSERT INTO TestCase VALUES ('.$i.',"'.$problemId.'",'.$hidden.',"","'.$param1type.'","'.$param1.'","","'.$param2type.'","'.$param2.'","","'.$param3type.'","'.$param3.'","","'.$param4type.'","'.$param4.'","","'.$param5type.'","'.$param5.'","","")',$conn);
			}
			$i = $i+1;
		}
	
		mysql_close($conn);
		
		header("location: private_pool.php#tab3");
	}
?>