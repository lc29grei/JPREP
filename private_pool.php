<!DOCTYPE HTML>
<?php
	session_start();
	
	include 'dbInfo.php';
  	
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	}  
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
	$email = $_SESSION['username'];
   	include 'home_layout.php';
   	headerLayout($currentrole, $firstname);	
		
		#<!-- Courses tab -->
		
			include 'display_courses.php';
			displayCourses($currentrole);
							
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
		
		if(isset($_GET['action']) && $_GET['action'] == 'addAssignment'){
			$privatePoolSQL = 'SELECT * FROM Problem WHERE poolid="private_'.$email.'" AND active=1';
			$privatePoolSQLResult = mysql_query($privatePoolSQL, $conn);
			echo'
			<div class="CSSTableGenerator">
				<h3>Private Pool</h3>
					<table>
						<tr>
							<td>Name</td>
							<td>Method Name</td>
							<td>Type</td>
							<td></td>
						</tr>';
						if ($privatePoolSQLResult > 0) {
							while($row=mysql_fetch_array($privatePoolSQLResult)) {
								echo'<form method="POST" action="addProblemFromPool.php?id='.$_GET['id'].'">';	
								echo'<input style="z-index:-1; position:relative;" type="text" name="problemId" value="'.$row['problemId'].'">';						
								echo'<tr><td name="privateTitle">'.$row['title'].'</td>';		
								echo'<td name="privateMethodName">'.$row['methodname'].'</td>';
								echo'<td name="privateResultType">'.$row['resulttype'].'</td>';
								//echo'<td><a href="?action=addToAssignmentFromPrivate&problemId='.$row['problemId'].'">Add to Assignment</a></td></tr>';
								echo'<td><input type="submit" value="Add To Assignment"></td></tr>';
								echo'</form>';
							}
						} else echo'You have no problems in your Private Pool';
					echo'
					</table>
					<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
			</div>';
		} else {
			$privatePoolSQL = 'SELECT * FROM Problem WHERE poolid="private_'.$email.'"';
			$privatePoolSQLResult = mysql_query($privatePoolSQL, $conn);
			echo'<div class="CSSTableGenerator" >
			<h3>Private Pool</h3>
						<table >
							<tr>
								<td>Name</td>
								<td>Method Name</td>
								<td>Type</td>
								<td></td>
								<td></td>
							</tr>';
							if ($privatePoolSQLResult > 0) {
								while($row=mysql_fetch_array($privatePoolSQLResult)) {
									echo'<tr><td>'.$row['title'].'</td>';
									echo'<td>'.$row['methodname'].'</td>';
									echo'<td>'.$row['resulttype'].'</td>';
									echo'<td><a href="edit_problem.php?id='.$row['problemId'].'">Edit</a></td>';
									if ($row['active'] == 1) echo'<td><a href="check_create_problem.php?action=disable&id='.$row['problemId'].'&role='.$currentrole.'">Remove</a></td></tr>';
									else echo'<td><a href="check_create_problem.php?action=activate&id='.$row['problemId'].'&role='.$currentrole.'">Add Back</a></td></tr>';
								}
							} else echo'You have no problems in your Private Pool';
						echo'</table>
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>';
		}		
		#<!-- Gradebook tab -->
			include 'display_grades.php';
			displayGrades($currentrole);
		#<!-- Profile tab -->
			include 'display_profile.php';
			displayProfile($currentrole);
	footerLayout();
	?>
</html>





		
 