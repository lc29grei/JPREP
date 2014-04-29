<?php

include 'dbInfo.php';
	
  
function displayProfile($currentrole)
{
	if ($currentrole=="s") {
		echo'
		<div class="profile">
			<a href="?action=editProfile&#tab5"><u>Edit Profile</u></a>
			<a href="?action=changePassword&#tab5" style="padding-left:15px;"><u>Change Password</u></a><br>
				<ul>
					<li>First Name: '.$_SESSION['first_name'].'</li>
					<li>Last Name: '.$_SESSION['last_name'].'</li>
					<li>Email Address: '.$_SESSION['username'].'</li>
					<li>Password: ********</li>
					<li>Security Question: '.$_SESSION['secQ'].'</li>
					<li>Security Answer: '.$_SESSION['secA'].'</li>
				</ul>
		</div>';
	
	} else {
	echo'	
	<div class="profile">
		<a href="?action=editProfile&#tab5"><u>Edit Profile</u></a>
		<a href="?action=changePassword&#tab5" style="padding-left:15px;"><u>Change Password</u></a><br>
			<ul>
				<li>Prefix: '.$_SESSION['prefix'].'</li>
				<li>First Name: '.$_SESSION['first_name'].'</li>
				<li>Last Name: '.$_SESSION['last_name'].'</li>
				<li>Email Address: '.$_SESSION['username'].'</li>
				<li>Password: ********</li>
				<li>Security Question: '.$_SESSION['secQ'].'</li>
				<li>Security Answer: '.$_SESSION['secA'].'</li>
			</ul>
	</div>';
	}
	
}

if(isset($_GET['action']) && $_GET['action'] == 'editProfile'){
		editProfile($currentrole);
} else if(isset($_GET['action']) && $_GET['action'] == 'changePassword'){
		changePassword($currentrole);
}
	
function editProfile($currentrole) {
		
		if ($currentrole=="s") {
			echo'
			<div class="profile">
				<form method="POST" action="check_edit.php">
					<p>First Name:<input type="text" name="fname" placeholder="'.$_SESSION['first_name'].'"></p>
					<p>Last Name:<input type="text" name="lname" placeholder="'.$_SESSION['last_name'].'"></p>
					<p>Username:<input type="text" name="email" placeholder="'.$_SESSION['username'].'"></p>		
					<p>Security Question:<input type="text" name="secQ" placeholder="'.$_SESSION['secQ'].'"></p>
					<p>Security Answer:<input type="text" name="secA" placeholder="'.$_SESSION['secA'].'"></p>
					<p class="submit"><input type="button" value="Cancel" onClick="goBack()"><input type="submit" name="commit" value="Submit"></p>
				</form>
			</div>';
		} else {
			echo'
			<div class="profile">
				<form method="POST" action="check_edit.php">
					<p>Prefix:<input type="text" name="prefix" placeholder="'.$_SESSION['prefix'].'"></p>
					<p>First Name:<input type="text" name="fname" placeholder="'.$_SESSION['first_name'].'"></p>
					<p>Last Name:<input type="text" name="lname" placeholder="'.$_SESSION['last_name'].'"></p>
					<p>Username:<input type="text" name="email" placeholder="'.$_SESSION['username'].'"></p>
					<p>Security Question:<input type="text" name="secQ" placeholder="'.$_SESSION['secQ'].'"></p>
					<p>Security Answer:<input type="text" name="secA" placeholder="'.$_SESSION['secA'].'"></p>
					<p class="submit"><input type="button" value="Cancel" onClick="goBack()"><input type="submit" name="commit" value="Submit"></p>
				</form>
			</div>';
		}
}

function changePassword($currentrole) {
	$oldPassErr = $newPassErr = $confirmPassErr = "";
	$oldPassVal = $newPassVal = $confirmPassVal = "";
	
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		if(empty($_POST['oldpassword'])) {
			$oldPassErr = "  Enter your old password";
			$newPassVal = $_POST['newpassword'];
			$confirmPassVal = $_POST['confirmpassword'];
		} else if($_POST['oldpassword'] != $_SESSION['password']) {
			$oldPassErr = "  Incorrect password";
			$newPassVal = $_POST['newpassword'];
			$confirmPassVal = $_POST['confirmpassword'];
		}
		if(empty($_POST['newpassword'])) {
			$newPassErr = "  Enter your new password";
			$oldPassVal = $_POST['oldpassword'];
			$confirmPassVal = $_POST['confirmpassword'];
		} else if ($_POST['newpassword'] == $_POST['oldpassword']) {
			$newPassErr = "  New password must be different from old password";
			$oldPassVal = $_POST['oldpassword'];
			$confirmPassVal = $_POST['confirmpassword'];
		}
		if(empty($_POST['confirmpassword'])) {
			$confirmPassErr = "  Confirm your new password";
			$oldPassVal = $_POST['oldpassword'];
			$newPassVal = $_POST['newpassword'];
		} else if ($_POST['newpassword'] != $_POST['confirmpassword']) {
			$confirmPassErr = "  Passwords do not match";
			$oldPassVal = $_POST['oldpassword'];
			$newPassVal = $_POST['newpassword'];
		}
		
  		if (($oldPassErr=="") and ($newPassErr=="") and ($confirmPassErr=="")) {
  			$new_password = $_POST['newpassword'];
  			$sql = 'UPDATE users
					SET 
					password="'.$new_password.'"
					WHERE email="'.$_SESSION['username'].'"';
			$retval = mysql_query($sql);
			if(! $retval ) {
	  			die('Could not update data: ' . mysql_error());
			}
			
			$password = $new_password;
			$_SESSION['password']=$password.'';
			
			displayProfile($currentrole);
  		}
  	}
 ?> 
		<div class="profile">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?action=changePassword&#tab5">
				<p>Old Password:<input type="text" name="oldpassword" value="<?php echo htmlspecialchars($oldPassVal);?>"><span style="font-size:12px;color:#FF0000;"><?php echo $oldPassErr;?></span></p>
				<p>New Password:<input type="text" name="newpassword" value="<?php echo htmlspecialchars($newPassVal);?>"><span style="font-size:12px;color:#FF0000;"><?php echo $newPassErr;?></span></p>
				<p>Confirm Password:<input type="text" name="confirmpassword" value="<?php echo htmlspecialchars($confirmPassVal);?>"><span style="font-size:12px;color:#FF0000;"><?php echo $confirmPassErr;?></span></p>
				<p class="submit"><input type="button" value="Cancel" onClick="goBack()"><input type="submit" name="commit" value="Submit" onClick="changePassword(<?php echo $currentRole;?>)"></p>
			</form>
		</div>	
<?php	
}
?>