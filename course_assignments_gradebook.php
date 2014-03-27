<!DOCTYPE HTML>
<?php
	session_start(); 
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	} 
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
   include 'home_layout.php';
   headerLayout($currentrole, $firstname);	
		
		#<!-- Courses tab -->
		
			include 'display_courses.php';
			displayCourses($currentrole);
							
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
			
	?>	
		<!-- Gradebook tab -->
			
			<div class="CSSTableGenerator" >
			<h3>Course</h3>
			<h3 style="padding-left:150px;">Semester: Spring 2014</h3>
			<p style="font-size:12px;">Click on an assignment's name to view individual student grades for that assignment</p>
						<table>
							<tr>
								<td>Assignment Name</td>
								<td>Due Date</td>
								<td>Class Average</td>
								<td>Highest Grade</td>
								<td>Lowest Grade</td>
							</tr>
							<tr>
								<td><a href="./assignment_students_gradebook.php#tab4">Assignment 1</a></td>
								<td>3/10/2014 11:59 PM</td>
								<td>90%</td>
								<td>100</td>
								<td>82</td>
							</tr>
							<tr>
								<td><a href="./assignment_students_gradebook.php#tab4">Assignment 2</a></td>
								<td>3/11/2014 11:59 PM</td>
								<td>98%</td>
								<td>100</td>
								<td>92</td>
							</tr>
							<tr>
								<td><a href="./assignment_students_gradebook.php#tab4">Assignment 3</a></td>
								<td>3/12/2014 11:59 PM</td>
								<td>75%</td>
								<td>93</td>
								<td>55</td>
							</tr>
							<tr>
								<td><a href="./assignment_students_gradebook.php#tab4">Assignment 4</a></td>
								<td>3/13/2014 11:59 PM</td>
								<td>84%</td>
								<td>87</td>
								<td>81</td>
							</tr>
							<tr>
								<td><a href="./assignment_students_gradebook.php#tab4">Assignment 5</a></td>
								<td>3/14/2014 11:59 PM</td>
								<td>80%</td>
								<td>95</td>
								<td>60</td>
							</tr>
						</table>
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</div>
				
			
	<?php	
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($currentrole);
	
	footerLayout();
?>
</html>