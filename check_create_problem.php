<?php
  session_start();
  $currentrole=$_SESSION['currentrole'];
 include 'dbInfo.php';
	
  
  $problemCountQuery = "SELECT * FROM Problem";
  $problemCountResult = mysql_query($problemCountQuery);
  $problemId = mysql_num_rows($problemCountResult)+1;
  $email = $_SESSION['username'];
  
  if (isset($_GET['action']) && $_GET['action'] == 'edit'){
  	$probId = $_GET['id'];
  	$selectedCourse = mysql_result(mysql_query('SELECT poolId FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$title = mysql_result(mysql_query('SELECT title FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$methodName = mysql_result(mysql_query('SELECT methodname FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$description = mysql_result(mysql_query('SELECT description FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$resulttype = mysql_result(mysql_query('SELECT resulttype FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$solutionCode = mysql_result(mysql_query('SELECT solutionCode FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param1name = mysql_result(mysql_query('SELECT param1 FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param2name = mysql_result(mysql_query('SELECT param2 FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param3name = mysql_result(mysql_query('SELECT param3 FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param4name = mysql_result(mysql_query('SELECT param4 FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param5name = mysql_result(mysql_query('SELECT param5 FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$starterCode = mysql_result(mysql_query('SELECT starterText FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$storageLoc = mysql_result(mysql_query('SELECT storageloc FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param1type = mysql_result(mysql_query('SELECT param1type FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param2type = mysql_result(mysql_query('SELECT param2type FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param3type = mysql_result(mysql_query('SELECT param3type FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param4type = mysql_result(mysql_query('SELECT param4type FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param5type = mysql_result(mysql_query('SELECT param5type FROM Problem WHERE problemId="'.$probId.'"'),0);
  } else {
  	$selectedCourse = $title = $methodName = $description = $resulttype = $solutionCode = $starterCode = $storageLoc = "";
  	$param1name = $param2name = $param3name = $param4name = $param5name = "";
  	$param1type = $param2type = $param3type = $param4type = $param5type = "";
  }
 
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		
		if (($currentrole == "c") or ($currentrole == "a")) $selectedCourse = mysql_real_escape_string($_POST['selectedCourse']);
		if (!empty($_POST["title"])) $title = mysql_real_escape_string($_POST['title']);
		if (!empty($_POST["methodName"])) $methodName = mysql_real_escape_string($_POST['methodName']);
		if (!empty($_POST["description"])) $description = mysql_real_escape_string($_POST['description']);
		if (!empty($_POST["starter"])) $starterCode = mysql_real_escape_string($_POST['starter']);
		if (!empty($_POST["solution"])) $solutionCode= mysql_real_escape_string($_POST['solution']);
		if (!empty($_POST["resultType"])) $resultType= mysql_real_escape_string($_POST['resultType']);
		if (!empty($_POST["param1name"])) $param1name = mysql_real_escape_string($_POST['param1name']);
		$param1type	= mysql_real_escape_string($_POST['param1type']);
		
		if (isset($_POST["param2name"])) {
			if (!empty($_POST["param2name"])) {
				$param2name = mysql_real_escape_string($_POST['param2name']);
			}
			$param2type = mysql_real_escape_string($_POST['param2type']);
		} else {
			$param2name = "";
			$param2type = "";
		}
				
		if (isset($_POST["param3name"])) {
			if (!empty($_POST["param3name"])) {
				$param3name = mysql_real_escape_string($_POST['param3name']);
			}
			$param3type = mysql_real_escape_string($_POST['param3type']);
		} else {
			$param3name = "";
			$param3type = "";
		}
		
		if (isset($_POST["param4name"])) {
			if (!empty($_POST["param4name"])) {
				$param4name = mysql_real_escape_string($_POST['param4name']);
			}
			$param4type = mysql_real_escape_string($_POST['param4type']);
		} else {
			$param4name = "";
			$param4type = "";
		}
			
		if (isset($_POST["param5name"])) {
			if (!empty($_POST["param5name"])) {
				$param5name = mysql_real_escape_string($_POST['param5name']);
			}
			$param5type = mysql_real_escape_string($_POST['param5type']);
		} else {
			$param5name = "";
			$param5type = "";
		}
		
		if (isset($_GET['action']) && $_GET['action'] == 'edit'){
			if(($currentrole=='c') or ($currentrole=='a')) $sql = "UPDATE Problem 
											SET poolId='".$selectedCourse."',
												title='".$title."',
												methodname='".$methodName."',
												description='".$description."',
												resulttype='".$resultType."',
												solutionCode='".$solutionCode."',
												param1='".$param1name."',
												param2='".$param2name."',
												param3='".$param3name."',
												param4='".$param4name."',
												param5='".$param5name."',
												starterText='".$starterCode."',
												param1type='".$param1type."',
												param2type='".$param2type."',
												param3type='".$param3type."',
												param4type='".$param4type."',
												param5type='".$param5type."'
											WHERE problemId='".$probId."'";
			else $sql = "UPDATE Problem 
											SET title='".$title."',
												methodname='".$methodName."',
												description='".$description."',
												resulttype='".$resultType."',
												solutionCode='".$solutionCode."',
												param1='".$param1name."',
												param2='".$param2name."',
												param3='".$param3name."',
												param4='".$param4name."',
												param5='".$param5name."',
												starterText='".$starterCode."',
												param1type='".$param1type."',
												param2type='".$param2type."',
												param3type='".$param3type."',
												param4type='".$param4type."',
												param5type='".$param5type."'
											WHERE problemId='".$probId."'";
			$retval = mysql_query( $sql, $conn );
			if(! $retval ) {
	  			die('Could not update data: ' . mysql_error());
			}
			echo "Updated data successfully\n";
		} else {
			if(($currentrole!='c') and ($currentrole!='a')) $sql = "INSERT INTO Problem VALUES('".$problemId."','private_".$email."','',1,'".$title."','".$methodName."','".$description."','".$resultType."','".$solutionCode."','".$param1name."','".$param2name."','".$param3name."','".$param4name."','".$param5name."','".$starterCode."','','".$param1type."','".$param2type."','".$param3type."','".$param4type."','".$param5type."')";
			else $sql = "INSERT INTO Problem VALUES('".$problemId."','".$selectedCourse."','',1,'".$title."','".$methodName."','".$description."','".$resultType."','".$solutionCode."','".$param1name."','".$param2name."','".$param3name."','".$param4name."','".$param5name."','".$starterCode."','','".$param1type."','".$param2type."','".$param3type."','".$param4type."','".$param5type."')";
			$retval = mysql_query( $sql, $conn );
			if(! $retval ) {
	  			die('Could not update data: ' . mysql_error());
			}
			echo "Updated data successfully\n";
		}
		
		$i=1;
		while ($i < 26) {
			if (isset($_POST['case'.$i.'param1'])) {
				$param1 = $param2 = $param3 = $param4 = $param5 = "";
				$param1=$_POST['case'.$i.'param1'];
				if (isset($_POST["param2name"])) $param2=$_POST['case'.$i.'param2'];
				if (isset($_POST["param3name"])) $param3=$_POST['case'.$i.'param3'];
				if (isset($_POST["param4name"])) $param4=$_POST['case'.$i.'param4'];
				if (isset($_POST["param5name"])) $param5=$_POST['case'.$i.'param5'];
				$result = $_POST['case'.$i.'result'];
				if(isset($_POST['case'.$i.'hidden'])) {
					$hidden=1;
				} else $hidden=0;
				
				$runQuery = mysql_query('INSERT INTO TestCase VALUES ('.$i.',"'.$problemId.'",'.$hidden.',"'.$param1.'","'.$param2.'","'.$param3.'","'.$param4.'","'.$param5.'","'.$result.'")',$conn);
			}
			$i = $i+1;
		}
	
		mysql_close($conn);
		if(!$_SESSION["isAddToAssignment"]) 
		{
			if(($_SESSION['currentrole']!= 'c') and ($_SESSION['currentrole']!='a')) header("location: private_pool.php#tab3");
			else header("location: course_pool.php?courseNumber=".$selectedCourse."#tab3");
		}
		else
		{
			if(!isset($_SESSION['assignmentProblemArray']))
			{
				
				$_SESSION['assignmentProblemArray'] = array();
				array_push($_SESSION['assignmentProblemArray'], $problemId);
			}
			else
			{
				array_push($_SESSION['assignmentProblemArray'], $problemId);
			}
			header("location: create_new_assignment.php?id=".$_GET['id']."");
		}
	}
	
	if(isset($_GET['action']) && $_GET['action'] == 'disable'){
		$id = $_GET['id'];
		mysql_query("UPDATE Problem SET active=0 WHERE problemId='".$id."'");
		if(($_GET['role'] == "c") or ($_GET['role']=="a")) {
			header("location: course_pool.php?courseNumber=".$_GET['poolid']."&#tab3");
		} else {
			header("location: private_pool.php#tab3");
		}
		
	} else if(isset($_GET['action']) && $_GET['action'] == 'activate'){
		$id = $_GET['id'];
		mysql_query("UPDATE Problem SET active=1 WHERE problemId='".$id."'");
		if(($_GET['role'] == "c") or ($_GET['role']=="a")) {
			header("location: course_pool.php?courseNumber=".$_GET['poolid']."&#tab3");
		} else {
			header("location: private_pool.php#tab3");
		}
	}
	
?>