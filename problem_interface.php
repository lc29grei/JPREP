<!DOCTYPE html>
<?php
session_start();

/*if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	}*/
if (!isset($_SESSION['answer'])) $_SESSION['answer'] = "N,,N,,N,,";
$cmdOutput = $_SESSION['answer'];
if (strpos($cmdOutput, 'Error') !== false) {
	$cmdOutput = "N,,N,,N,,Compilation Error";
	$cmdOutput = split(",", $cmdOutput);
}
else {
	$cmdOutput = split(",", $_SESSION['answer']);
}
// Create the page template
function displayPage()
{
	global $cmdOutput;

	// DB Info
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db('jprep');

	// REALTIME QUERY
	//$coursePoolSQL = 'SELECT * FROM problem WHERE problemId="'.$_GET['problemId'].'"';
	// LOCALQUERY
	$coursePoolSQL = 'SELECT * FROM problem WHERE problemId="1"';
	$coursePoolSQLResult = mysql_query($coursePoolSQL, $conn);
	$row=mysql_fetch_array($coursePoolSQLResult);
	
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
	/*
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
	include 'home_layout.php';
	headerLayout($currentrole, $firstname);*/
	echo'
				<div>
					<h1>' . $row['title'] . '</h1>
					<p>' . $row['starterText'] . '</p>
					<form method="post" action="./codeinput.php">
					<textarea name="source" rows="10" cols="70" style="resize:none;">public ' . $row['resulttype'] . ' ' . $row['methodname'] . '(' . $paramString . ') {
    
}</textarea>
				</br>
				<input type="submit" />
				</form>
				' . $cmdOutput[6] . '
				<table border="1" style="width:300px">
					<tr>
						<td> Input </td>
						<td> Output </td>
						<td> Expect </td>
						<td> Correct </td>
					</tr>
					<tr>
						<td> 5 + 4 </td>
						<td> ' . $cmdOutput[1] . '</td>
						<td> 9 </td>
						<td> ' . $cmdOutput[0] . '</td>
					</tr>
					<tr>
						<td> 1 + 1 </td>
						<td> ' . $cmdOutput[3] . '</td>
						<td> 2 </td>
						<td> ' . $cmdOutput[2] . '</td>
					</tr>
					<tr>
						<td> 2 + 8 </td>
						<td> ' . $cmdOutput[5] . '</td>
						<td> 10 </td>
						<td> ' . $cmdOutput[4] . '</td>
					</tr>
				</table>
				</div>';
				/*
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
	
		footerLayout();*/
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