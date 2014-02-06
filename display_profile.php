<?php
function displayProfile()
{
	echo'	
	<div class="profile">
		<a href=""><u>Edit Profile</u></a>
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

?>