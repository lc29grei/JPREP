<?php
	
		if ($accounttype=="student") {
			echo'
			<div class="profile">
			<ul>
				<li>First Name: <input type="text" name="fname"></li>
				<li>Last Name: <input type="text" name="lname"></li>
				<li>Email Address: <input type="text" name="email"></li>
				<li>Password: '.$_SESSION['password'].'</li>
				<li>Security Question: <input type="text" name="secQ"></li>
				<li>Security Answer: <input type="text" name="secA"></li>
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
				<li>Security Answer: <input type="text" name="secA"></li>
			</ul>
			</div>';
		}
	

?>