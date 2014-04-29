<?php
  session_start();
  
  include 'dbInfo.php';
	
  
  if (isset($_GET['action']) && $_GET['action'] == 'edit'){
  $selectedUser = $_GET['id'];
  $new_prefix = mysql_result(mysql_query('SELECT prefix FROM users WHERE email="'.$selectedUser.'"'),0);
  $new_firstname = mysql_result(mysql_query('SELECT first FROM users WHERE email="'.$selectedUser.'"'),0);
  $new_lastname = mysql_result(mysql_query('SELECT last FROM users WHERE email="'.$selectedUser.'"'),0);
  $new_username = mysql_result(mysql_query('SELECT email FROM users WHERE email="'.$selectedUser.'"'),0);
  $new_secq = mysql_result(mysql_query('SELECT secQ FROM users WHERE email="'.$selectedUser.'"'),0);
  $new_seca = mysql_result(mysql_query('SELECT secA FROM users WHERE email="'.$selectedUser.'"'),0);
  }
  if($_SERVER['REQUEST_METHOD'] == "POST") {
  	if ((isset($_GET['role']) && $_GET['role'] == 'cc') || (isset($_GET['role']) && $_GET['role'] == 'f')){
    if($_POST['prefix']!=null)
	{
		$new_prefix = mysql_real_escape_string($_POST['prefix']);
	}
    }
	if($_POST['fname']!=null)
	{
		$new_firstname = mysql_real_escape_string($_POST['fname']);
	}
	
	if($_POST['lname']!=null)
	{
		$new_lastname = mysql_real_escape_string($_POST['lname']);
	}
	
	if(($_POST['email']!=null) && ($_POST['confirm_email']==$_POST['email']))
	{
		$new_username = mysql_real_escape_string($_POST['email']);
	}
	
	if($_POST['secQ']!=null)
	{
		$new_secq = mysql_real_escape_string($_POST['secQ']);
	}
	
	if($_POST['secA']!=null)
	{
		$new_seca = mysql_real_escape_string($_POST['secA']);
	}
	
	if(isset($_POST['isFaculty'])) {
		$isFaculty = "f";
	} else $isFaculty = null;
	
	if(isset($_POST['isCC'])) {
		$isCC = "c";
	} else $isCC = null;

	if (isset($_GET['action']) && $_GET['action'] == 'create'){
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$password = substr(str_shuffle($chars),0,10);
		if (isset($_GET['role']) && $_GET['role'] == 'cc'){
			$sql = 'INSERT INTO users VALUES ("'.$new_username.'","'.$password.'",1,"c","'.$isFaculty.'","c","'.$new_prefix.'","'.$new_firstname.'","'.$new_lastname.'","'.$new_secq.'","'.$new_seca.'")';
		} else if (isset($_GET['role']) && $_GET['role'] == 'f'){
			$sql = 'INSERT INTO users VALUES ("'.$new_username.'","'.$password.'",1,"f","'.$isCC.'","f","'.$new_prefix.'","'.$new_firstname.'","'.$new_lastname.'","'.$new_secq.'","'.$new_seca.'")';
		} else {
			$sql = 'INSERT INTO users VALUES ("'.$new_username.'","'.$password.'",1,"s","","s","","'.$new_firstname.'","'.$new_lastname.'","'.$new_secq.'","'.$new_seca.'")';
		}
		$retval = mysql_query( $sql, $conn );
		
		$adminEmail = mysql_result(mysql_query('SELECT email FROM users WHERE role1="a"',$conn),0)."";
		$subject = "Account created on JPREP";
		if (isset($_GET['role']) && $_GET['role'] == 'f'){
			$CCprivs = mysql_query('SELECT * FROM users WHERE email="'.$new_username.'" AND (role1="c" OR role2="c")',$conn);
			$CCprivsRows = mysql_num_rows($CCprivs);
			if($CCprivsRows==1) $message = "Dear ".$new_firstname.",\n\nWelcome to JPREP! An administrator has successfully created an account for you with both faculty and course coordinator privileges.\n\nYou can login to JPREP and access your account by clicking the following link and entering your login information found below: http://oraserv.cs.siena.edu/~perm_deltatech/jprep/login.php\n\nYour username is ".$new_username." and your temporary password is ".$password.". You can change your password from the Change Password page under the Profile tab once you've logged in.\nWe hope you enjoy using JPREP!\n\n\nRegards,\n\nDelta Tech";
			else $message = "Dear ".$new_firstname.",\n\nWelcome to JPREP! An administrator has successfully created an account for you with faculty privileges.\n\nYou can login to JPREP and access your account by clicking the following link and entering your login information found below: http://oraserv.cs.siena.edu/~perm_deltatech/jprep/login.php\n\nYour username is ".$new_username." and your temporary password is ".$password.". You can change your password from the Change Password page under the Profile tab once you've logged in.\nWe hope you enjoy using JPREP!\n\n\nRegards,\n\nDelta Tech";
		} else if (isset($_GET['role']) && $_GET['role'] == 'cc'){
			$facultyprivs = mysql_query('SELECT * FROM users WHERE email="'.$new_username.'" AND (role1="f" OR role2="f")',$conn);
			$facultyprivsRows = mysql_num_rows($facultyprivs);
			if($facultyprivsRows==1) $message = "Dear ".$new_firstname.",\n\nWelcome to JPREP! An administrator has successfully created an account for you with both faculty and course coordinator privileges.\n\nYou can login to JPREP and access your account by clicking the following link and entering your login information found below: http://oraserv.cs.siena.edu/~perm_deltatech/jprep/login.php\n\nYour username is ".$new_username." and your temporary password is ".$password.". You can change your password from the Change Password page under the Profile tab once you've logged in.\nWe hope you enjoy using JPREP!\n\n\nRegards,\n\nDelta Tech";
			else $message = "Dear ".$new_firstname.",\n\nWelcome to JPREP! An administrator has successfully created an account for you with course coordinator privileges.\n\nYou can login to JPREP and access your account by clicking the following link and entering your login information found below: http://oraserv.cs.siena.edu/~perm_deltatech/jprep/login.php\n\nYour username is ".$new_username." and your temporary password is ".$password.". You can change your password from the Change Password page under the Profile tab once you've logged in.\nWe hope you enjoy using JPREP!\n\n\nRegards,\n\nDelta Tech";
		} else {
			$message = "Dear ".$new_firstname.",\n\nWelcome to JPREP! An administrator has successfully created a student account for you.\n\nYou can login to JPREP and access your account by clicking the following link and entering your login information found below: http://oraserv.cs.siena.edu/~perm_deltatech/jprep/login.php\n\nYour username is ".$new_username." and your temporary password is ".$password.". You can change your password from the Change Password page under the Profile tab once you've logged in.\nWe hope you enjoy using JPREP!\n\n\nRegards,\n\nDelta Tech";
		}
		$msg = wordwrap($message, 70);
		mail($new_username, $subject, $msg, "From: ".$adminEmail."\n");
	} else {
		$sql = 'UPDATE users
			SET 
			prefix="'.$new_prefix.'",
			first="'.$new_firstname.'",
			last="'.$new_lastname.'", 
			secQ="'.$new_secq.'", 
			secA="'.$new_seca.'",
			email="'.$new_username.'"
			WHERE email="'.$selectedUser.'"';
		$retval = mysql_query( $sql, $conn );
	}
	
	if (isset($_GET['role']) && $_GET['role'] == 'cc'){
		$adminEmail = mysql_result(mysql_query('SELECT email FROM users WHERE role1="a"',$conn),0)."";
		$courseIds = mysql_query('SELECT DISTINCT (courseId), coursecoordinator, coursename FROM Section GROUP BY courseId');
		if (mysql_num_rows($courseIds) > 0) {
			while($rows=mysql_fetch_array($courseIds)) {
				if(isset($_POST[$rows['courseId']])){
					$retval1 = mysql_query('UPDATE Section SET coursecoordinator="'.$new_username.'" WHERE courseId="'.$rows['courseId'].'"', $conn );
					//need to send email to CC here saying they've been assigned course
				} else {
					if($rows['coursecoordinator'] == $selectedUser) {
						$retval1 = mysql_query('UPDATE Section SET coursecoordinator="'.$_POST['listOfCC'].'" WHERE courseId="'.$rows['courseId'].'"', $conn);
						$message = "Dear ".$new_firstname.",\n\nWe are writing to inform you that you have been unassigned as the course coordinator for ".$rows['coursename'].".\n\nIf you believe there has been a mistake please contact the JPREP administrator immediately.\n\nRegards,\n\nDelta Tech";
						$msg = wordwrap($message, 70);
						mail($new_username, "Unassigned from course in JPREP", $msg, "From: ".$adminEmail."\n");
						$message1 = "Dear ".$new_firstname.",\n\nWe are writing to inform you that you have been assigned as the course coordinator for ".$rows['coursename'].".\n\nIf you believe there has been a mistake please contact the JPREP administrator immediately.\n\nRegards,\n\nDelta Tech";
						$msg1 = wordwrap($message, 70);
						mail($new_username, "Assigned to course in JPREP", $msg1, "From: ".$adminEmail."\n");
					}
				}
			} 
		}
	} else if (isset($_GET['role']) && $_GET['role'] == 'f'){
		$adminEmail = mysql_result(mysql_query('SELECT email FROM users WHERE role1="a"',$conn),0)."";
		$sectionIds = mysql_query('SELECT sectionId,coursename,faculty FROM Section');
		if (mysql_num_rows($sectionIds) > 0) {
			while($rows=mysql_fetch_array($sectionIds)) {
				if(isset($_POST[$rows['sectionId']])){
					$retval2 = mysql_query('UPDATE Section SET faculty="'.$new_username.'" WHERE sectionId="'.$rows['sectionId'].'"', $conn );
					//need to send email to faculty here saying they've been assigned to section
				} else {
					if($rows['faculty'] == $selectedUser) {
						$retval2 = mysql_query('UPDATE Section SET faculty="'.$_POST['listOfFaculty'].'" WHERE sectionId="'.$rows['sectionId'].'"', $conn);
						$message = "Dear ".$new_firstname.",\n\nWe are writing to inform you that you have been unassigned as the professor for ".$rows['coursename']." section ".$rows['sectionId'].".\n\nIf you believe there has been a mistake please contact the JPREP administrator immediately.\n\nRegards,\n\nDelta Tech";
						$msg = wordwrap($message, 70);
						mail($new_username, "Unassigned from course in JPREP", $msg, "From: ".$adminEmail."\n");
						$message1 = "Dear ".$new_firstname.",\n\nWe are writing to inform you that you have been assigned as the professor for ".$rows['coursename']." section ".$rows['sectionId'].".\n\nIf you believe there has been a mistake please contact the JPREP administrator immediately.\n\nRegards,\n\nDelta Tech";
						$msg1 = wordwrap($message, 70);
						mail($new_username, "Assigned to course in JPREP", $msg1, "From: ".$adminEmail."\n");
					}
				}
			}
		}
	} else if (isset($_GET['role']) && $_GET['role'] == 's'){
		$adminEmail = mysql_result(mysql_query('SELECT email FROM users WHERE role1="a"',$conn),0)."";
		$sectionIds = mysql_query('SELECT sectionId,coursename FROM Section');
		if (mysql_num_rows($sectionIds) > 0) {
			while($rows=mysql_fetch_array($sectionIds)) {
				if(isset($_POST[$rows['sectionId']])){
					$query1 = mysql_query('SELECT * FROM Roster WHERE sectionId="'.$rows['sectionId'].'" AND studentId="'.$selectedUser.'"');
					if(mysql_num_rows($query1)==0) {
						$retval2 = mysql_query('INSERT INTO Roster VALUES("'.$rows['sectionId'].'","'.$new_username.'",1)', $conn );
						$message = "Dear ".$new_firstname.",\n\nWe are writing to inform you that you have been enrolled in the course ".$rows['coursename']."-".$rows['sectionId'].".\n\nIf you believe there has been a mistake please contact the JPREP administrator immediately.\n\nRegards,\n\nDelta Tech";
						$msg = wordwrap($message, 70);
						mail($new_username, "Enrolled in course on JPREP", $msg, "From: ".$adminEmail."\n");
					} else {
						$retval2 = mysql_query('UPDATE Roster SET active=1 WHERE sectionId="'.$rows['sectionId'].'" AND studentId="'.$selectedUser.'"', $conn);
						$message = "Dear ".$new_firstname.",\n\nWe are writing to inform you that you have been enrolled in the course ".$rows['coursename']."-".$rows['sectionId'].".\n\nIf you believe there has been a mistake please contact the JPREP administrator immediately.\n\nRegards,\n\nDelta Tech";
						$msg = wordwrap($message, 70);
						mail($new_username, "Enrolled in course on JPREP", $msg, "From: ".$adminEmail."\n");
					}
				} else {
					$query1 = mysql_query('SELECT * FROM Roster WHERE sectionId="'.$rows['sectionId'].'" AND studentId="'.$selectedUser.'"', $conn);
					if(mysql_num_rows($query1)==1) {
						$retval2 = mysql_query('UPDATE Roster SET active=0 WHERE sectionId="'.$rows['sectionId'].'" AND studentId="'.$selectedUser.'"', $conn);
						$message = "Dear ".$new_firstname.",\n\nWe are writing to inform you that you have been unenrolled from the course ".$rows['coursename']."-".$rows['sectionId'].".\n\nIf you believe there has been a mistake please contact the JPREP administrator immediately.\n\nRegards,\n\nDelta Tech";
						$msg = wordwrap($message, 70);
						mail($new_username, "Unenrolled in course on JPREP", $msg, "From: ".$adminEmail."\n");
					}
				}
			}
		}
	}
	
	mysql_close($conn);

	if (isset($_GET['role']) && $_GET['role'] == 'cc'){
		header("location:home.php?action=manageCC&#tab2");
	} else if (isset($_GET['role']) && $_GET['role'] == 'f'){
		header("location:home.php?action=manageFaculty&#tab2");
	} else {
		header("location:home.php?action=manageStudent&#tab2");
	}
}		
?>