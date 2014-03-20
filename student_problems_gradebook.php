<!DOCTYPE HTML>
<?php
	session_start(); 
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	} 
	$accounttype=$_SESSION['account_type'];
	$firstname=$_SESSION['first_name'];
   	
   	include 'home_layout.php';	
   	headerLayout($accounttype, $firstname);
		
		#<!-- Courses tab -->
		
			include 'display_courses.php';
			displayCourses($accounttype);
							
		#<!-- Manage Accounts tab -->
			include 'display_manage_accounts.php';
			displayManageAccounts();
											
		
		
		#<!-- Question Pool tab -->
			include 'display_question_pool.php';
			displayQuestionPool($accounttype);
				
		#<!-- Gradebook tab -->
		if(isset($_GET['action']) && $_GET['action'] == 'editgradessingle'){
			echo'
			<div class="CSSTableGenerator" >
			<h3>Student Name</h3>
			<h3 style="padding-left:150px;">Assignment Name</h3>
			<h3 style="padding-left:150px;">Overall Grade: 90/100</h3>
			<br><br>
			<table>
				<tr>
					<td>Problem Name</td>
					<td>Points Earned</td>
					<td>Possible Points</td>
					<td>Status</td>
				</tr>
				<tr>
					<td>Hello World</td>
					<td><input type="text" placeholder="45"></td>
					<td>45</td>
					<td>Complete</td>
				</tr>
				<tr>
					<td>Fun with Recursion</td>
					<td><input type="text" placeholder="30"></td>
					<td>40</td>
					<td>Complete</td>
				</tr>	
				<tr>
					<td>Strings</td>
					<td><input type="text" placeholder="15"></td>
					<td>15</td>
					<td>Complete</td>
				</tr>	
			</table>						
				<p class="submit" style="text-align: center"><input type="submit" value="Cancel" onClick="goBack()"><input type="submit" value="Submit" onClick="goBack()"></p>
				
		</div>';
		} else {
			echo'<div class="CSSTableGenerator" >
			<h3>Student Name</h3>
			<h3 style="padding-left:150px;">Assignment Name</h3>
			<h3 style="padding-left:150px;">Overall Grade: 90/100</h3><br><br>
			<a href="?action=editgradessingle&#tab4">Edit Grades</a><br><br>
						<table>
							<tr>
								<td>Problem Name</td>
								<td>Points Earned</td>
								<td>Possible Points</td>
								<td>Status</td>
							</tr>
							<tr>
								<td>Hello World</td>
								<td>45</td>
								<td>45</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td>Fun with Recursion</td>
								<td>45</td>
								<td>45</td>
								<td>Complete</td>
							</tr>
							<tr>
								<td>Pinball Problem</td>
								<td>0</td>
								<td>10</td>
								<td>Complete</td>
							</tr>
						</table>
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>';
			}
			
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($accounttype);
	
	footerLayout();
	?>
</html>