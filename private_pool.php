<!DOCTYPE HTML>
<?php
	session_start();
	
	$dbhost = 'localhost';
  	$dbuser = 'root';
  	$dbpass = '';
  	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
  	mysql_select_db('jprep');
  	
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
		
		$privatePoolSQL = 'SELECT * FROM Problem WHERE poolid="private_'.$email.'"';
		$privatePoolSQLResult = mysql_query($privatePoolSQL, $conn);
		
		if(isset($_GET['action']) && $_GET['action'] == 'addAssignment'){
			echo'<div class="CSSTableGenerator">
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
									echo'<tr><td>'.$row['title'].'</td>';
									echo'<td>'.$row['methodname'].'</td>';
									echo'<td>'.$row['resulttype'].'</td>';
									echo'<td><a href="">Add to Assignment</a></td></tr>';
								}
							} else echo'You have no problems in your Private Pool';
						echo'</table>
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>';
		} else {
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
									echo'<td><a href="">Edit</a></td>';
									if ($row['active'] == 1) echo'<td><a href="?action=disable&id='.$row['problemId'].'">Remove</a></td></tr>';
									else echo'<td><a href="?action=activate&id='.$row['problemId'].'">Activate</a></td></tr>';
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





		
 