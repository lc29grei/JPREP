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
	
		$coursePool = 'SELECT * FROM Problem WHERE poolid="'.$_GET['courseNumber'].'"';
		$coursePoolResult = mysql_query($coursePool, $conn);
		if (mysql_num_rows($coursePoolResult) > 0) {
		if(isset($_GET['action']) && $_GET['action'] == 'addAssignment'){
			$coursePoolSQL = 'SELECT * FROM Problem WHERE poolid="'.$_GET['courseNumber'].'" AND active=1';
			$coursePoolSQLResult = mysql_query($coursePoolSQL, $conn);
			echo'
			<div class="CSSTableGenerator">
				<h3>Course Pool</h3>
					<table>
						<tr>
							<td>Name</td>
							<td>Method Name</td>
							<td>Type</td>
							<td></td>
						</tr>';
							while($row=mysql_fetch_array($coursePoolSQLResult)) {
								echo'<form method="POST" action="addProblemFromPool.php?id='.$_GET['id'].'">';	
								echo'<input style="z-index:-1; position:relative;" type="text" name="problemId" value="'.$row['problemId'].'">';						
								echo'<tr><td name="privateTitle">'.$row['title'].'</td>';		
								echo'<td name="privateMethodName">'.$row['methodname'].'</td>';
								echo'<td name="privateResultType">'.$row['resulttype'].'</td>';
								//echo'<td><a href="?action=addToAssignmentFromPrivate&problemId='.$row['problemId'].'">Add to Assignment</a></td></tr>';
								echo'<td><input type="submit" value="Add To Assignment"></td></tr>';
								echo'</form>';
							}
					echo'
					</table>
					<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
			</div>';
		} else {
			if ($currentrole == 'c' or $currentrole == 'a') $coursePoolSQL = 'SELECT * FROM Problem WHERE poolid="'.$_GET['courseNumber'].'"';
			else $coursePoolSQL = 'SELECT * FROM Problem WHERE poolid="'.$_GET['courseNumber'].'" AND active=1';
			$coursePoolSQLResult = mysql_query($coursePoolSQL, $conn);
			echo'<div class="CSSTableGenerator" >
			<h3>Course Pool</h3>
						<table >
							<tr>
								<td>Name</td>
								<td>Method Name</td>
								<td>Type</td>
								<td></td>';
								if ($currentrole == 'c' or $currentrole == 'a') echo'<td></td>';
							echo'</tr>';
								while($row=mysql_fetch_array($coursePoolSQLResult)) {
									echo'<tr><td>'.$row['title'].'</td>';
									echo'<td>'.$row['methodname'].'</td>';
									echo'<td>'.$row['resulttype'].'</td>';
									if ($currentrole == 'c' or $currentrole == 'a') echo'<td><a href="edit_problem.php?id='.$row['problemId'].'">Edit</a></td>';
									else {
										$existsInPrivate = mysql_query('SELECT * FROM Problem WHERE poolId="private_'.$email.'" AND parentProblem="'.$row['problemId'].'"',$conn);
										if (mysql_num_rows($existsInPrivate) > 0) echo'<td>Added to Private Pool</td>';
										else echo'<td><a href="check_create_problem.php?action=add&id='.$row['problemId'].'">Add to Private Pool</a></td>';
									}
									if ($currentrole == 'c' or $currentrole == 'a') {
										if ($row['active'] == 1) echo'<td><a href="check_create_problem.php?action=disable&id='.$row['problemId'].'&role='.$currentrole.'&poolid='.$row['poolId'].'">Remove</a></td></tr>';
										else echo'<td><a href="check_create_problem.php?action=activate&id='.$row['problemId'].'&role='.$currentrole.'&poolid='.$row['poolId'].'">Activate</a></td></tr>';
									}
								}
						echo'</table>
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>';
		}
		} else echo'<div>
					<h3>Course Pool</h3>
					<p style="text-align: center;">There are no questions to display in this course pool</p>
					<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>'; 
					
		#<!-- Gradebook tab -->
		
			include 'display_grades.php';
			displayGrades($currentrole);
		
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($currentrole);
	footerLayout();
	?>
</html>