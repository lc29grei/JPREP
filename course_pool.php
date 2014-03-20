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
	if(isset($_GET['action']) && $_GET['action'] == 'addAssignment'){
		if ($accounttype=="faculty") {
		echo'	
			<div class="CSSTableGenerator" >
			
			<h3>Course Pool</h3>
						<table>
							<tr>
								<td>Name</td>
								<td>Category</td>
								<td>Course</td>
								<td></td>
							</tr>
							<tr>
								<td><a href="">Problem 1</a></td>
								<td>String</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Assignment</a></td>
							</tr>
							<tr>
								<td><a href="">Problem 2</a></td>
								<td>Recursion</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Assignment</a></td>
							</tr>
							<tr>
								<td><a href="">Problem 3</a></td>
								<td>Array</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Assignment</a></td>
							</tr>
							<tr>
								<td><a href="">Problem 4</a></td>
								<td>Logic</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Assignment</a></td>
							</tr>
						</table>
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>';
				} else {
					echo'	
			<div class="CSSTableGenerator" >
			
			<h3>Course Pool</h3>
						<table>
							<tr>
								<td>Name</td>
								<td>Category</td>
								<td>Course</td>
								<td></td>
							</tr>
							<tr>
								<td><a href="">Problem 1</a></td>
								<td>String</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Assignment</a></td>
							</tr>
							<tr>
								<td><a href="">Problem 2</a></td>
								<td>Recursion</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Assignment</a></td>
							</tr>
							<tr>
								<td><a href="">Problem 3</a></td>
								<td>Array</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Assignment</a></td>
							</tr>
							<tr>
								<td><a href="">Problem 4</a></td>
								<td>Logic</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Assignment</a></td>
							</tr>
						</table>
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>';
				}
			} else {
				if ($accounttype=="faculty") {
		echo'	
			<div class="CSSTableGenerator" >
			
			<h3>Course Pool</h3>
						<table>
							<tr>
								<td>Name</td>
								<td>Category</td>
								<td>Course</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Problem 1</td>
								<td>String</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Private Pool</a></td>
								<td><a href="">Edit</a></td>
							</tr>
							<tr>
								<td>Problem 2</td>
								<td>Recursion</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Private Pool</a></td>
								<td><a href="">Edit</a></td>
							</tr>
							<tr>
								<td>Problem 3</td>
								<td>Array</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Private Pool</a></td>
								<td><a href="">Edit</a></td>
							</tr>
							<tr>
								<td>Problem 4</td>
								<td>Logic</td>
								<td>CSIS-225</td>
								<td><a href="">Add to Private Pool</a></td>
								<td><a href="">Edit</a></td>
							</tr>
						</table>
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>';
				} else {
					echo'	
			<div class="CSSTableGenerator" >
			
			<h3>Course Pool</h3>
						<table>
							<tr>
								<td>Name</td>
								<td>Category</td>
								<td>Course</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Problem 1</td>
								<td>String</td>
								<td>CSIS-225</td>
								<td><a href="">Edit</a></td>
								<td><a href="">Remove</a></td>
							</tr>
							<tr>
								<td>Problem 2</td>
								<td>Recursion</td>
								<td>CSIS-225</td>
								<td><a href="">Edit</a></td>
								<td><a href="">Remove</a></td>
							</tr>
							<tr>
								<td>Problem 3</td>
								<td>Array</td>
								<td>CSIS-225</td>
								<td><a href="">Edit</a></td>
								<td><a href="">Remove</a></td>
							</tr>
							<tr>
								<td>Problem 4</td>
								<td>Logic</td>
								<td>CSIS-225</td>
								<td><a href="">Edit</a></td>
								<td><a href="">Remove</a></td>
							</tr>
						</table>
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>';
				}
			}
			
		
		#<!-- Gradebook tab -->
		
			include 'display_grades.php';
			displayGrades($accounttype);
		
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($accounttype);
	footerLayout();
	?>
</html>





		
 