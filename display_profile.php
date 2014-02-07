<?php
function displayProfile($accounttype)
{
	if ($accounttype=="student") {
		echo'
			<div class="profile">
		<a href="?action=editProfile"><u>Edit Profile</u></a>
		<a href="" style="padding-left:15px;"><u>Change Password</u></a><br>
			<ul>
				<li>First Name: '.$_SESSION['first_name'].'</li>
				<li>Last Name: '.$_SESSION['last_name'].'</li>
				<li>Email Address: '.$_SESSION['username'].'</li>
				<li>Password: '.$_SESSION['password'].'</li>
				<li>Security Question: '.$_SESSION['secQ'].'</li>
				<li>Security Answer: '.$_SESSION['secA'].'</li>
			</ul>
	</div>';
	
	} else {
	echo'	
	<div class="profile">
		<a href="?action=editProfile"><u>Edit Profile</u></a>
		<a href="" style="padding-left:15px;"><u>Change Password</u></a><br>
			<ul>
				<li>Prefix: '.$_SESSION['prefix'].'</li>
				<li>First Name: '.$_SESSION['first_name'].'</li>
				<li>Last Name: '.$_SESSION['last_name'].'</li>
				<li>Email Address: '.$_SESSION['username'].'</li>
				<li>Password: '.$_SESSION['password'].'</li>
				<li>Security Question: '.$_SESSION['secQ'].'</li>
				<li>Security Answer: '.$_SESSION['secA'].'</li>
			</ul>
	</div>';
	}
	
}

if(isset($_GET['action']) && $_GET['action'] == 'editProfile'){
		editProfile($accounttype);
}
	
function editProfile($accounttype) {
	if ($accounttype=="student") {
			echo'
			<div class="profile">
			<ul>
				<li>First Name: <input type="text" name="fname"></li>
				<li>Last Name: <input type="text" name="lname"></li>
				<li>Email Address: <input type="text" name="email"></li>
				<li>Password: '.$_SESSION['password'].'</li>
				<li>Security Question: <input type="text" name="secQ"></li>
				<li>Security Answer: <input type="text" name="secA"></li><br>
				<input type="submit" value="Submit">
			</ul>
			</div>';
		} else {
			echo'
			<div class="profile">
			<ul>
				<li>Prefix: <input type="text" name="prefix"></li>
				<li>First Name: <input type="text" name="fname"></li>
				<li>Last Name: <input type="text" name="lname"></li>
				<li>Email Address: <input type="text" name="email"></li>
				<li>Password: '.$_SESSION['password'].'</li>
				<li>Security Question: <input type="text" name="secQ"></li>
				<li>Security Answer: <input type="text" name="secA"></li><br>
				<input type="submit" value="Submit">
			</ul>
			</div>';
		}
}

?>