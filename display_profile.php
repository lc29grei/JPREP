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
				<form method="POST" action="check_edit.php">
					<p>First Name:<input type="text" name="fname" placeholder="'.$_SESSION['first_name'].'"></p>
					<p>Last Name:<input type="text" name="lname" placeholder="'.$_SESSION['last_name'].'"></p>
					<p>Username:<input type="text" name="email" placeholder="'.$_SESSION['username'].'"></p>
					<p>Password:<input type="text" name="password" placeholder="'.$_SESSION['password'].'"></p>
					<p>Security Question:<input type="text" name="secQ" placeholder="'.$_SESSION['secQ'].'"></p>
					<p>Security Answer:<input type="text" name="secA" placeholder="'.$_SESSION['secA'].'"></p>
					<p class="submit"><input type="submit" name="commit" value="Submit"></p>
				</form>
			</div>';
		} else {
			echo'
			<div class="profile">
				<form method="POST" action="check_edit.php">
					<p>First Name:<input type="text" name="prefix" placeholder="'.$_SESSION['[prefix'].'"></p>
					<p>First Name:<input type="text" name="fname" placeholder="'.$_SESSION['first_name'].'"></p>
					<p>Last Name:<input type="text" name="lname" placeholder="'.$_SESSION['last_name'].'"></p>
					<p>Username:<input type="text" name="email" placeholder="'.$_SESSION['username'].'"></p>
					<p>Password:<input type="text" name="password" placeholder="'.$_SESSION['password'].'"></p>
					<p>Security Question:<input type="text" name="secQ" placeholder="'.$_SESSION['secQ'].'"></p>
					<p>Security Answer:<input type="text" name="secA" placeholder="'.$_SESSION['secA'].'"></p>
					<p class="submit"><input type="submit" name="commit" value="Submit"></p>
				</form>
			</div>';
		}
}

?>