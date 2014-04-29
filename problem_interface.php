<!DOCTYPE html>
<?php
session_start();
// TODO: problemId needs to be passed in so when a $_GET['problemId'] is done it should work!!!!
if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
}
$emptyTestCases = "N,,N,,N,,N,,N,,N,,N,,N,,N,,N,,N,,N,,N,,N,,N,,N,,N,,N,,N,,N,,";
if (!isset($_SESSION['answer'])) $_SESSION['answer'] = $emptyTestCases;
if (!isset($_SESSION['error']) or strpos($_SESSION['error'], 'Error') !== false) $_SESSION['error'] = "";
$cmdOutput = $_SESSION['answer'];
$errorHolder = $_SESSION['error'];
if (strpos($errorHolder, 'Error') !== false or strpos($cmdOutput, 'Error') !== false) {
	$errorHolder = "Compilation Error! Please check syntax and code logic!";
	$cmdOutput = split(",", $emptyTestCases);
}
else if (strpos($cmdOutput, 'Your code') !== false) {
	$errorHolder = $cmdOutput;
	$cmdOutput = split(",", $emptyTestCases);
}
else {
	$cmdOutput = split(",", $_SESSION['answer']);
}
// Create the page template
function displayPage()
{
	global $cmdOutput, $errorHolder;

	// DB Info
	include 'dbInfo.php';
	

	// REALTIME QUERY
	$problemSQL = 'SELECT * FROM Problem WHERE problemId="'.$_GET['problemId'].'"';
	// LOCALQUERY
	//$problemSQL = 'SELECT * FROM problem WHERE problemId="1"';
	$problemSQLResult = mysql_query($problemSQL, $conn);
	$row=mysql_fetch_array($problemSQLResult);

	
	$paramString = "";
	if ($row['param1'] != null and $row['param1'] != "") {
		$paramString = $paramString . $row['param1type'] . " " . $row['param1'];
	}
	if ($row['param2'] != null and $row['param2'] != "") {
		$paramString = $paramString . ", " . $row['param2type'] . " " . $row['param2'];
	}
	if ($row['param3'] != null and $row['param3'] != "") {
		$paramString = $paramString . ", " . $row['param3type'] . " " . $row['param3'];
	}
	if ($row['param4'] != null and $row['param4'] != "") {
		$paramString = $paramString . ", " . $row['param4type'] . " " . $row['param4'];
	}
	if ($row['param5'] != null and $row['param5'] != "") {
		$paramString = $paramString . ", " . $row['param5type'] . " " . $row['param5'];
	}

	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
	include 'home_layout.php';
	headerLayout($currentrole, $firstname);
	echo'
				<div>
					<h1>' . $row['title'] . '</h1>
					<p>' . $row['starterText'] . '</p>
					<form method="post" action="./codeinput.php?problemId=' . $_GET['problemId'] . '&assignmentId='.$_GET['assignmentId'].'">
					<textarea name="source" rows="10" cols="70" style="resize:none;">public ' . $row['resulttype'] . ' ' . $row['methodname'] . '(' . $paramString . ') {
    
}</textarea></br><input type="submit" /></form>';
	// Do test case work here
	$testCaseSQL = 'SELECT * FROM TestCase WHERE problemId="'.$_GET['problemId'].'"';


	
	$problemSolvedQuery='SELECT * FROM Gradebook WHERE studentId="'.$_SESSION['username'].'" and problemId='.$_GET['problemId'].' and assignmentId='.$_GET['assignmentId'].'';
	$problemSolvedResult = mysql_query($problemSolvedQuery, $conn);
	#$finishedProb=mysql_num_rows($problemSolvedResult);
	
	$testCaseSQLResult = mysql_query($testCaseSQL, $conn);
	$rowCount=mysql_num_rows($testCaseSQLResult);
	if ($rowCount > 0) {
		$correctCounter = 0;
		
		for($i = 0; $i < count($cmdOutput); $i++) {
			if ($cmdOutput[$i] == "Y") $correctCounter++;
		}
		
		if($correctCounter == $rowCount &&  mysql_num_rows($problemSolvedResult)==0) {
			header("Location: check_gradebook.php?problemId=".$_GET['problemId']."&assignmentId=".$_GET['assignmentId']."");
		}
		
		echo'
				<table border="1" style="width:300px">
					<tr>
						<td> Input </td>
						<td> Expect </td>
						<td> Correct </td>
						<td> Output </td>
					</tr>';
		// update rows for each testcase set
		$cmdOutputCount = 0;
		while($testCaseRow=mysql_fetch_array($testCaseSQLResult)) {
			echo'<tr>';
			echo'<td>';
			if ($testCaseRow['param1value'] != null and $testCaseRow['param1value'] != "") {
				echo'' . $testCaseRow['param1value'] . '';
			}
			if ($testCaseRow['param2value'] != null and $testCaseRow['param2value'] != "") {
				echo', ' . $testCaseRow['param2value'] . '';
			}
			if ($testCaseRow['param3value'] != null and $testCaseRow['param3value'] != "") {
				echo', ' . $testCaseRow['param3value'] . '';
			}
			if ($testCaseRow['param4value'] != null and $testCaseRow['param4value'] != "") {
				echo', ' . $testCaseRow['param4value'] . '';
			}
			if ($testCaseRow['param5value'] != null and $testCaseRow['param5value'] != "") {
				echo', ' . $testCaseRow['param5value'] . '';
			}
			echo'</td>';
			echo'<td> ' . $testCaseRow['result'] . ' </td>';
			echo'<td> ' . $cmdOutput[$cmdOutputCount] . ' </td>';
			$cmdOutputCount += 1;
			echo'<td> ' . $cmdOutput[$cmdOutputCount] . ' </td>';
			$cmdOutputCount += 1;
			echo'</tr>';
		}
		echo'</table></div>';
	}

			#<!-- Manage Accounts tab -->
			include 'display_manage_accounts.php';
			if(isset($_GET['action']) && $_GET['action'] == 'manageCC'){
				manageCC();
			} else if(isset($_GET['action']) && $_GET['action'] == 'manageStudent'){
				manageStudent();
			} else if(isset($_GET['action']) && $_GET['action'] == 'manageFaculty'){
				manageFaculty();
			} else if(isset($_GET['action']) && $_GET['action'] == 'editStudentAccount'){
				editStudentAccount();
			} else if(isset($_GET['action']) && $_GET['action'] == 'editFacultyAccount'){
				editFacultyAccount();
			} else if(isset($_GET['action']) && $_GET['action'] == 'editCCAccount'){
				editCCAccount();
			} else if(isset($_GET['action']) && $_GET['action'] == 'disable'){ 
				disableUser();
			} else if(isset($_GET['action']) && $_GET['action'] == 'activate'){ 
				activateUser();
			} else {
				displayManageAccounts();
			}
											
		#<!-- Question Pool tab -->
			include 'display_question_pool.php';
			displayQuestionPool($currentrole);
				
		#<!-- Gradebook tab -->
				
			include 'display_grades.php';
			displayGrades($currentrole);
			
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($currentrole);
	
		footerLayout();
}
/*
 * To automate this with a database have a function that makes calls to a database
 * and populates an array with the necessary information needed to construct the
 * answer question page. Then pass those variables into display page for it to be
 * constructed dynamically.	
 */
displayPage();
?>
</html>