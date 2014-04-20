<!DOCTYPE HTML>
<?php
	session_start();  
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	}
	$dbhost = 'localhost';
  	$dbuser = 'root';
  	$dbpass = '';
  	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db("jprep");
	
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
	$email=$_SESSION['username'];
	
	$activeCourseQuery = 'SELECT * FROM section WHERE faculty="'.$email.'"';
	$activeCourseResult = mysql_query($activeCourseQuery);
	
   	include 'home_layout.php';
	headerLayout($currentrole, $firstname);
		#<!-- Courses tab -->
			echo'
			<div>
			<p style="font-size:18px;"><u>Create New Assignment</u></p>
			
			<table style="display:inline;text-align:center;">
								<tr>
									<td>Title:</td>
									<td><input type="text" name="title"></td><td>&nbsp;</td>
									<td>Category:</td>
									<td><select><option value="">Select Category</option></select></td><td>&nbsp;</td>
									<td>Course:</td>
									<td>';
									if (mysql_num_rows($activeCourseResult) > 0) {
										while($row=mysql_fetch_array($activeCourseResult)) {
											if ($_GET['id'] == $row['sectionId']) echo'<p value="'.$row['sectionId'].'" selected="selected">'.$row['coursename'].'-'.$row['sectionId'].'</p>';							
											//else echo'<option value="'.$row['sectionId'].'">'.$row['coursename'].'-'.$row['sectionId'].'</option>';
										}
									}
									echo'
									</td><td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>Due Date:</td>
									<td><select id="month"><option value="jan">January</option>
															<option value="feb">February</option>
															<option value="march">March</option>
															<option value="april">April</option>
															<option value="may">May</option>
															<option value="june">June</option>
															<option value="july">July</option>
															<option value="aug">August</option>
															<option value="sep">September</option>
															<option value="oct">October</option>
															<option value="nov">November</option>
															<option value="dec">December</option>
															</select></td>
									<td>/</td>
									<td><select id="day">';
										$i=1;
										while ($i<32) {
											if ($i < 10) echo'<option value="0'.$i.'">0'.$i.'</option>';
											else echo'<option value="'.$i.'">'.$i.'</option>';
											$i = $i+1;
										}
									echo'</select></td>
									<td>/</td>
									<td><select id="year"><option value="2013">2013</option>
															<option value="2014">2014</option>
															<option value="2015">2015</option>
															</select></td>
									<td>&nbsp;</td>
									<td><select id="hour">';
									$h=1;
									while ($h<13) {
										if($h<10) echo'<option value="0'.$h.'">0'.$h.'</option>';
										else echo'<option value="'.$h.'">'.$h.'</option>';
										$h=$h+1;
									}
									echo'</select></td>
									<td>:</td>
									<td><select id="minute">';
									$m=0;
									while ($m<60) {
										if($m<10) echo'<option value="0'.$m.'">0'.$m.'</option>';
										else echo'<option value="'.$m.'">'.$m.'</option>';
										$m=$m+1;
									}
									echo'</select></td>
									<td><select id=""><option value="am">AM</option>
														<option value="pm">PM</option>
														</select></td>
								</tr>
								</table>
			
			<form method="post">
			Description<br><textarea name="description" rows="5" cols="150" style="resize:none;"></textarea>
			</form><br>
			<a href="./create_new_problem.php?action=addAssignment" style="font-size:13px;padding-right:20px;">Create and Add New Problem</a>
			<a href="./private_pool.php?action=addAssignment#tab3" style="font-size:13px;padding-right:20px;">Add Problem from Private Question Pool</a>
			<a href="./course_pool.php?action=addAssignment&courseNumber='.$_GET['courseNumber'].'#tab3" style="font-size:13px;">Add Problem from Global Question Pool</a><br><br>
			<table border="0" id="paramTable" style="text-align:center;">
				<tbody>
					<tr>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>Problem Name</th>
						<th>&nbsp;</th>
						<th>Category</th>
						<th>&nbsp;</th>
						<th>Point Value</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>';
					if(isset($_SESSION['assignmentProblemArray'])){
						print_r(array_values($_SESSION['assignmentProblemArray']));
						
						//pointer for array
						$arrayPointer = current($_SESSION['assignmentProblemArray']);
						
						//problem counter
						$currProblemCount=1;
						//while new problems are still in the array
						while($arrayPointer!= false)
						{
							$problemQuery = "SELECT title, resulttype FROM problem WHERE problemId = ".$arrayPointer."";
							$problemResult = mysql_query($problemQuery);
							
							//makes sure query runs properly, dies otherwise
							if(!$problemResult)
							 {
								$message  = 'Invalid query: ' . mysql_error() . "\n";
								$message .= 'Whole query: ' . $problemQuery;
								die($message);
							 }
							 
							 //fetches values
							 $currProblemTitle="";
							 $currProblemType="";
							 
							 while($row=mysql_fetch_assoc($problemResult))
							 {
								$currProblemTitle = $row['title'];
								$currProblemType = $row['resulttype'];
							 }
							 //create necessary number of html rows
							echo'
							<tr>
							<td><b>Problem '.$currProblemCount.':</b></td>
							<td>&nbsp;</td>
							<td>'.$currProblemTitle.'</td>
							<td>&nbsp;</td>
							<td>'.$currProblemType.'</td>
							<td>&nbsp;</td>
							<td><input type="text" name="pointValue"></td>
							<td>&nbsp;</td>
							<td><a href="">Edit</a></td>
							<td>&nbsp;</td>
							<td><a href="">Remove</a></td>
							</tr>
							';
							 
							//increments problem counter
							$currProblemCount=$currProblemCount+1;
							//moves pointer to next in array					
							$arrayPointer = next($_SESSION['assignmentProblemArray']);
						}
					}
				echo'
				
				
					<tr>
						<td>&nbsp;</td><td>&nbsp;</td>
						<td>&nbsp;</td><td>&nbsp;</td>
						<td><b>Total Points:</b></td>
						<td>&nbsp;</td>
						<td style="text-align:center;">0</td>
						<td>&nbsp;</td><td>&nbsp;</td>
						<td>&nbsp;</td><td>&nbsp;</td>
					</tr>
				</tbody>
			</table>
			
			<br><br>
			<input type="button" value="Create Assignment" style="float:right;">
			<input type="button" value="Cancel" onClick="cancelConfirm()" style="float:right;">
			
			</div>';
			
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
		
			include 'display_question_pool.php';
			displayQuestionPool($currentrole);
			
		#<!-- Gradebook tab -->
		
			include 'display_grades.php';
			displayGrades($currentrole);
		
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($currentrole);
		footerLayout();
		
		
		?>
</html>