<?php
	
	$dbhost = 'localhost';
  	$dbuser = 'root';
  	$dbpass = '';
  	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db("jprep");
	
	function displayManageAccounts () {
		echo'
		<div>
			<ul>
				<a href="?action=manageStudent&#tab2"><li><u>Manage Students</u></li></a>
				<a href="?action=manageFaculty&#tab2"><li><u>Manage Faculty</u></li></a>
				<a href="?action=manageCC&#tab2"><li><u>Manage Course Coordinators</u></li></a>
			</ul>
		</div>
		';
	}
	
	function manageCC() {
				echo'<div class="CSSTableGenerator">
					<h3>Manage Course Coordinator Accounts</h3>
					</br>
					</br>
					<a href="?action=createCC&#tab2">Create New Course Coordinator Account</a>
					</br></br>';
					
					$query = "SELECT * FROM users WHERE role1='c' OR role2='c'";
					$result = mysql_query($query);
		
					if (mysql_num_rows($result) > 0) {
					echo'<table>
							<tr>
								<td>Prefix</td>
								<td>First Name</td>
								<td>Last Name</td>
								<td></td>
								<td></td>
							</tr>';
							while($row=mysql_fetch_array($result)) {
								echo'<tr>';
								echo'<td>' . $row['prefix'] . '</td>';
								echo'<td>' . $row['first'] . '</td>';
								echo'<td>' . $row['last'] . '</td>';
								echo'<td><a href="?action=editCCAccount&id='.$row['email'].'&#tab2">Edit</a></td>';
								if ($row['active'] == 1) echo'<td><a href="?action=disable&id='.$row['email'].'&role=c&#tab2">Disable</a></td>';
								else echo'<td><a href="?action=activate&id='.$row['email'].'&role=c&#tab2">Activate</a></td>';
							}				
						echo'</table>';
					} else {
						echo'<p style="text-align: center;font-size:16px;">No Course Coordinators currently exist</p>';
					}		
					mysql_free_result($result);				
					echo'<form>							
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
						</form>
				</div>
			';
}

function manageFaculty() {
	echo'
			
				<div class="CSSTableGenerator" >
					<h3>Manage Faculty Accounts</h3>
					</br>
					</br>
					<a href="?action=createFaculty&#tab2">Create New Faculty Account</a>
					</br>
					</br>';
					
						$query = "SELECT * FROM users WHERE role1='f' OR role2='f'";
						$result = mysql_query($query);
					
					if (mysql_num_rows($result) > 0) {
					echo'<table>
							<tr>
								<td>Prefix</td>
								<td>First Name</td>
								<td>Last Name</td>
								<td></td>
								<td></td>
							</tr>';
							while($row=mysql_fetch_array($result)) {
								echo'<tr>';
								echo'<td>' . $row['prefix'] . '</td>';
								echo'<td>' . $row['first'] . '</td>';
								echo'<td>' . $row['last'] . '</td>';
								echo'<td><a href="?action=editFacultyAccount&id='.$row['email'].'&#tab2">Edit</a></td>';
								if ($row['active'] == 1) echo'<td><a href="?action=disable&id='.$row['email'].'&role=f&#tab2">Disable</a></td>';
								else echo'<td><a href="?action=activate&id='.$row['email'].'&role=f&#tab2">Activate</a></td>';
							}				
						echo'</table>';
					} else {
						echo'<p style="text-align: center;font-size:16px;">No Faculty users currently exist</p>';
					}		
					mysql_free_result($result);
					echo'<form method="">							
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</form>
				</div>';
}

function manageStudent() {
	echo'
			
		<div class="CSSTableGenerator" >
			<h3>Manage Student Accounts</h3>
			</br></br>
			<a href="?action=createStudent&#tab2">Create New Student Account</a>
			</br></br>';
					
						$query = "SELECT * FROM users WHERE role1='s' OR role2='s'";
						$result = mysql_query($query);
					
					if (mysql_num_rows($result) > 0) {
					echo'<table>
							<tr>
								<td>First Name</td>
								<td>Last Name</td>
								<td></td>
								<td></td>
							</tr>';
							while($row=mysql_fetch_array($result)) {
								echo'<tr>';
								echo'<td>' . $row['first'] . '</td>';
								echo'<td>' . $row['last'] . '</td>';
								echo'<td><a href="?action=editStudentAccount&id='.$row['email'].'&#tab2">Edit</a></td>';
								if ($row['active'] == 1) echo'<td><a href="?action=disable&id='.$row['email'].'&role=s&#tab2">Disable</a></td>';
								else echo'<td><a href="?action=activate&id='.$row['email'].'&role=s&#tab2">Activate</a></td>';
							}				
						echo'</table>';
					} else {
						echo'<p style="text-align: center;font-size:16px;">No Students currently exist</p>';
					}		
					mysql_free_result($result);
					echo'<form method="">							
				<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
			</form>
		</div>																	
	';
}

function editStudentAccount(){
	$email=$_GET['id'];
	$first_name=mysql_result(mysql_query("SELECT first FROM users WHERE email='$email'"),0);
	$last_name=mysql_result(mysql_query("SELECT last FROM users WHERE email='$email'"),0);
	$secQ=mysql_result(mysql_query("SELECT secQ FROM users WHERE email='$email'"),0);
	$secA=mysql_result(mysql_query("SELECT secA FROM users WHERE email='$email'"),0);
	
	echo'
			<div class="profile">
				<form method="POST" action="check_edit_account.php?action=edit&role=s&id='.$email.'">
					<p>First Name:<input type="text" name="fname" placeholder="'.$first_name.'"></p>
					<p>Last Name:<input type="text" name="lname" placeholder="'.$last_name.'"></p>
					<p>Email:<input type="text" name="email" placeholder="'.$email.'"></p>
					<p>Confirm Email:<input type="text" name="confirm_email" placeholder="'.$email.'"></p>
					<p>Security Question:<input type="text" name="secQ" placeholder="'.$secQ.'"></p>
					<p>Security Answer:<input type="text" name="secA" placeholder="'.$secA.'"></p>';
					
				$query = "SELECT * FROM Section";
				$result = mysql_query($query);
				
				if (mysql_num_rows($result) > 0) {
							echo'<table style="text-align:center;border:1px solid;">
							<tr><th style="border:1px solid;">Course Number</th>
								<th style="border:1px solid;">Course Name</th>
								<th style="border:1px solid;">Enroll</th>
							</tr>';
							while($row=mysql_fetch_array($result)) {
								echo'<tr>
								<td style="border:1px solid;">CSIS-'.$row['courseId'].'-'.$row['sectionId'].'</td>
								<td style="border:1px solid;">'.$row['coursename'].'</td>';
								$query1Result = mysql_fetch_array(mysql_query('SELECT sectionId FROM Roster WHERE studentId="'.$email.'" AND sectionId="'.$row['sectionId'].'" AND active=1'));
								if ($query1Result == null) echo'<td style="border:1px solid;"><input type="checkbox" name="'.$row['sectionId'].'"></td>';
								else echo'<td style="border:1px solid;"><input type="checkbox" name="'.$row['sectionId'].'" checked></td>';
								echo'</tr>';
							}
							echo'</table>';
						} echo'<br>
						<input type="button" value="Cancel" onClick="goBack()">
						<input type="submit" value="Submit">
						</form>
						</div>';
}

function editFacultyAccount(){
	$email=$_GET['id'];
	$prefix=mysql_result(mysql_query("SELECT prefix FROM users WHERE email='$email'"),0);
	$first_name=mysql_result(mysql_query("SELECT first FROM users WHERE email='$email'"),0);
	$last_name=mysql_result(mysql_query("SELECT last FROM users WHERE email='$email'"),0);
	$secQ=mysql_result(mysql_query("SELECT secQ FROM users WHERE email='$email'"),0);
	$secA=mysql_result(mysql_query("SELECT secA FROM users WHERE email='$email'"),0);
	
	echo'
			<div class="profile">
				<form method="POST" action="check_edit_account.php?action=edit&role=f&id='.$email.'">
					<p>Prefix:<input type="text" name="prefix" placeholder="'.$prefix.'"></p>
					<p>First Name:<input type="text" name="fname" placeholder="'.$first_name.'"></p>
					<p>Last Name:<input type="text" name="lname" placeholder="'.$last_name.'"></p>
					<p>Email:<input type="text" name="email" placeholder="'.$email.'"></p>
					<p>Confirm Email:<input type="text" name="confirm_email" placeholder="'.$email.'"></p>
					<p>Security Question:<input type="text" name="secQ" placeholder="'.$secQ.'"></p>
					<p>Security Answer:<input type="text" name="secA" placeholder="'.$secA.'"></p>';
					
				$query = "SELECT * FROM Section";
				$result = mysql_query($query);
				
				if (mysql_num_rows($result) > 0) {
							echo'<table style="text-align:center;border:1px solid;">
							<tr><th style="border:1px solid;">Course Number</th>
								<th style="border:1px solid;">Course Name</th>
								<th style="border:1px solid;">Assign</th>
							</tr>';
							while($row=mysql_fetch_array($result)) {
								echo'<tr>
								<td style="border:1px solid;">CSIS-'.$row['courseId'].'-'.$row['sectionId'].'</td>
								<td style="border:1px solid;">'.$row['coursename'].'</td>
								<td style="border:1px solid;">';
								if ($row['faculty'] == $email) echo'<input type="checkbox" id="'.$row['coursename'].'-'.$row['sectionId'].'" name="'.$row['sectionId'].'" checked onClick="chooseFaculty(this.id)">';
								else echo'<input type="checkbox" name="'.$row['sectionId'].'">';
								echo'</td></tr>';
							}
							echo'</table>';
				} echo'<div id="chooseFacultydiv" style="display:none;"><p id="chooseFacultytext" style="display:inline;"></p>';
						$facultyListResult = mysql_query ('SELECT * FROM users WHERE role1="f" OR role2="f"');
						echo'<select id="listOfFaculty" name="listOfFaculty" style="display:inline;">';
						if (mysql_num_rows($facultyListResult) > 0) {
							while($rows=mysql_fetch_array($facultyListResult)) {
								if ($rows['email'] == $email) echo'<option value="'.$rows['email'].'" selected="selected">'.$rows['prefix'].'. '.$rows['first'].' '.$rows['last'].'</option>';
								else echo'<option value="'.$rows['email'].'">'.$rows['prefix'].'. '.$rows['first'].' '.$rows['last'].'</option>';
							}
							echo'</select></div><br>';
						}	
						echo'<input type="button" value="Cancel" onClick="goBack()">
						<input type="submit" value="Submit">
						</form>
						</div>';
}

function editCCAccount(){
	
	$email=$_GET['id'];
	$prefix=mysql_result(mysql_query("SELECT prefix FROM users WHERE email='$email'"),0);
	$first_name=mysql_result(mysql_query("SELECT first FROM users WHERE email='$email'"),0);
	$last_name=mysql_result(mysql_query("SELECT last FROM users WHERE email='$email'"),0);
	$secQ=mysql_result(mysql_query("SELECT secQ FROM users WHERE email='$email'"),0);
	$secA=mysql_result(mysql_query("SELECT secA FROM users WHERE email='$email'"),0);
	echo'
			<div class="profile">
				<form method="POST" action="check_edit_account.php?action=edit&role=cc&id='.$email.'">
					<p>Prefix:<input type="text" name="prefix" placeholder="'.$prefix.'"></p>
					<p>First Name:<input type="text" name="fname" placeholder="'.$first_name.'"></p>
					<p>Last Name:<input type="text" name="lname" placeholder="'.$last_name.'"></p>
					<p>Email:<input type="text" name="email" placeholder="'.$email.'"></p>
					<p>Confirm Email:<input type="text" name="confirm_email" placeholder="'.$email.'"></p>
					<p>Security Question:<input type="text" name="secQ" placeholder="'.$secQ.'"></p>
					<p>Security Answer:<input type="text" name="secA" placeholder="'.$secA.'"></p>';
					
				$query = "SELECT DISTINCT (courseId),coursename,coursecoordinator FROM Section GROUP BY courseId";
				$result = mysql_query($query);
				
				if (mysql_num_rows($result) > 0) {
							echo'<table style="text-align:center;border:1px solid;">
							<tr><th style="border:1px solid;">Course Number</th>
								<th style="border:1px solid;">Course Name</th>
								<th style="border:1px solid;">Assign</th>
							</tr>';
							while($row=mysql_fetch_array($result)) {
								echo'<tr>
								<td style="border:1px solid;">CSIS-'.$row['courseId'].'</td>
								<td style="border:1px solid;">'.$row['coursename'].'</td>
								<td style="border:1px solid;">';
								if ($row['coursecoordinator'] == $email) echo'<input type="checkbox" id="'.$row['coursename'].'" name="'.$row['courseId'].'" checked onClick="chooseCC(this.id)">';
								else echo'<input type="checkbox" name="'.$row['courseId'].'">';
								echo'</td></tr>';
							}
							echo'</table>';
						} echo'<div id="chooseCCdiv" style="display:none;"><p id="chooseCCtext" style="display:inline;"></p>';
						$ccListResult = mysql_query ('SELECT * FROM users WHERE role1="c" OR role2="c"');
						echo'<select id="listOfCC" name="listOfCC" style="display:inline;">';
						if (mysql_num_rows($ccListResult) > 0) {
							while($rows=mysql_fetch_array($ccListResult)) {
								if ($rows['email'] == $email) echo'<option value="'.$rows['email'].'" selected="selected">'.$rows['prefix'].'. '.$rows['first'].' '.$rows['last'].'</option>';
								else echo'<option value="'.$rows['email'].'">'.$rows['prefix'].'. '.$rows['first'].' '.$rows['last'].'</option>';
							}
							echo'</select></div><br>';
						}	
						echo'<input type="button" value="Cancel" onClick="goBack()">
						<input type="submit" value="Submit">
						</form>
						</div>';
}
	
	

if(isset($_GET['action']) && $_GET['action'] == 'createCC'){
		createCC();
}else if(isset($_GET['action']) && $_GET['action'] == 'createFaculty'){
		createFaculty();
}else if(isset($_GET['action']) && $_GET['action'] == 'createStudent'){
		createStudent();
	}
	
function createCC(){
	echo'
			<div class="profile">
				<h3>Create New Course Coordinator</h3>
				<form method="POST" action="check_edit_account.php?action=create&role=cc">
					<p>Prefix:<input type="text" name="prefix" ></p>
					<p>First Name:<input type="text" name="fname"></p>
					<p>Last Name:<input type="text" name="lname"></p>
					<p>Email:<input type="text" name="email"></p>	
					<p>Confirm Email:<input type="text" name="confirm_email"></p>	
					<p>Security Question:<input type="text" name="secQ"></p>
					<p>Security Answer:<input type="text" name="secA"></p>
					<p>Faculty Privileges: <input type="checkbox" name="isFaculty" value="Faculty"></p>';
					
				$query = "SELECT DISTINCT courseId,coursename FROM Section";
				$result = mysql_query($query);
				
				if (mysql_num_rows($result) > 0) {
							echo'<table style="text-align:center;border:1px solid;">
							<tr><th style="border:1px solid;">Course Number</th>
								<th style="border:1px solid;">Course Name</th>
								<th style="border:1px solid;">Assign</th>
							</tr>';
							while($row=mysql_fetch_array($result)) {
								echo'<tr>
								<td style="border:1px solid;">CSIS-'.$row['courseId'].'</td>
								<td style="border:1px solid;">'.$row['coursename'].'</td>
								<td style="border:1px solid;"><input type="checkbox" name="'.$row['courseId'].'"></td>
								</tr>';
							}
							echo'</table>';
						} echo'<br>
						<input type="button" value="Cancel" onClick="goBack()">
						<input type="submit" value="Submit">
						</form>
						</div>';
}
function createFaculty(){
	echo'
			<div class="profile">
				<h3>Create New Faculty</h3>
				<form method="POST" action="check_edit_account.php?action=create&role=f">
					<p>Prefix:<input type="text" name="prefix" ></p>
					<p>First Name:<input type="text" name="fname"></p>
					<p>Last Name:<input type="text" name="lname"></p>
					<p>Email:<input type="text" name="email"></p>
					<p>Confirm Email:<input type="text" name="confirm_email"></p>		
					<p>Security Question:<input type="text" name="secQ"></p>
					<p>Security Answer:<input type="text" name="secA"></p>
					<p>Course Coordinator Privileges: <input type="checkbox" name="isCC" value="CC"></p>';
					
				$query = "SELECT * FROM Section";
				$result = mysql_query($query);
				
				if (mysql_num_rows($result) > 0) {
							echo'<table style="text-align:center;border:1px solid;">
							<tr><th style="border:1px solid;">Course Number</th>
								<th style="border:1px solid;">Course Name</th>
								<th style="border:1px solid;">Assign</th>
							</tr>';
							while($row=mysql_fetch_array($result)) {
								echo'<tr>
								<td style="border:1px solid;">CSIS-'.$row['courseId'].'-'.$row['sectionId'].'</td>
								<td style="border:1px solid;">'.$row['coursename'].'</td>
								<td style="border:1px solid;"><input type="checkbox" name="'.$row['sectionId'].'"></td>
								</tr>';
							}
							echo'</table>';
						} echo'<br>
						<input type="button" value="Cancel" onClick="goBack()">
						<input type="submit" value="Submit">
						</form>
						</div>';
}

function createStudent(){
	echo'
			<div class="profile">
				<h3>Create New Student</h3>
				<form method="POST" action="check_edit_account.php?action=create&role=s">
					<p>First Name:<input type="text" name="fname" ></p>
					<p>Last Name:<input type="text" name="lname"></p>
					<p>Email:<input type="text" name="email"></p>
					<p>Confirm Email:<input type="text" name="confirm_email"></p>		
					<p>Security Question:<input type="text" name="secQ"></p>
					<p>Security Answer:<input type="text" name="secA"></p>';
					
				$query = "SELECT * FROM Section";
				$result = mysql_query($query);
				
				if (mysql_num_rows($result) > 0) {
							echo'<table style="text-align:center;border:1px solid;">
							<tr><th style="border:1px solid;">Course Number</th>
								<th style="border:1px solid;">Course Name</th>
								<th style="border:1px solid;">Enroll</th>
							</tr>';
							while($row=mysql_fetch_array($result)) {
								echo'<tr>
								<td style="border:1px solid;">CSIS-'.$row['courseId'].'-'.$row['sectionId'].'</td>
								<td style="border:1px solid;">'.$row['coursename'].'</td>
								<td style="border:1px solid;"><input type="checkbox" name="'.$row['sectionId'].'"></td>
								</tr>';
							}
							echo'</table>';
						} echo'<br>
						<input type="button" value="Cancel" onClick="goBack()">
						<input type="submit" value="Submit">
						</form>
						</div>';
}

function disableUser() {
	$id=$_GET['id'];
	$role=$_GET['role'];
	mysql_query("UPDATE users SET active=0 WHERE email='$id'");
	if ($role=="s") manageStudent();
	else if ($role=="f") manageFaculty();
	if ($role=="c") manageCC();
}
	
function activateUser() {
	$id=$_GET['id'];
	$role=$_GET['role'];
	mysql_query("UPDATE users SET active=1 WHERE email='$id'");
	if ($role=="s") manageStudent();
	else if ($role=="f") manageFaculty();
	if ($role=="c") manageCC();
}
	
?>