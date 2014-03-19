<!DOCTYPE html>
<?php
session_start();
if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	}
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
	$accounttype=$_SESSION['account_type'];
	$firstname=$_SESSION['first_name'];
	include 'home_layout.php';
	headerLayout($accounttype, $firstname);
	echo'
				<div>
					<h1>Source Code Input</h1>
					<form method="post" action="./codeinput.php">
					<textarea name="source" rows="10" cols="70" style="resize:none;">public int sum(int a, int b) {
    
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
			#<!-- Manage Accounts tab -->
			include 'display_manage_accounts.php';
			displayManageAccounts();
											
		#<!-- Question Pool tab -->
			include 'display_question_pool.php';
			displayQuestionPool($accounttype);
				
		#<!-- Gradebook tab -->
				
			include 'display_grades.php';
			displayGrades($accounttype);
			
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($accounttype);
	
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