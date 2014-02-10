<!DOCTYPE HTML>
<?php
	session_start();  
	$accounttype=$_SESSION['account_type'];
   	echo'
	<head>
		<title>Welcome to JPREP</title>
		<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
		<script language="javascript" src="list.js"></script>
		<link href="./css/style_home.css" rel="stylesheet" type="text/css">		
	</head>
	<body>		
		<h1 class="header">
			<img src="./jprep_logo.png" width="200" height="75"/>
			<p class="header-name">
					Welcome, John
					
					<a href="./login.php">Logout</a>
			</p>
			</br>';
			if($accounttype=="faculty") {
				echo '<span>You are currently logged in as a FACULTY
					  <select onChange="changeRole()">
						  <option value="faculty">Faculty</option>
						  <option value="coursecoordinator">Course Coordinator</option>
					  </select>';}
			else if($accounttype=="coursecoordinator") {
				echo '<span>You are currently logged in as a COURSE COORDINATOR
					  <select onChange="changeRole()">
						  <option value="coursecoordinator">Course Coordinator</option>
						  <option value="faculty">Faculty</option>
					  </select>';}
			else if($accounttype=="student"){
				echo'<span>You are currently logged in as a STUDENT';}
			else 
				echo'<span>You are currently logged in as a ADMIN';
				
			echo'			
			</span>			
		</h1>		
		</div>
		<ul class="tabs">
			<li><a href="#">Courses</a></li> ';	
			
			if($accounttype=="admin"){ echo '<li><a href="#">Manage Accounts</a></li>';}
			else echo '<li style="visibility: hidden; display:none;"><a href="#">Manage Accounts</a></li> ';
						
			if($accounttype=="student"){ echo '<li style="visibility: hidden; display:none;"><a href="#">Question Pool</a></li> ';}
			else echo '<li><a href="#">Question Pool</a></li>';

			if($accounttype=="admin" or $accounttype=="coursecoordinator"){ echo '<li style="visibility: hidden; display:none;"><a href="#">Gradebook</a></li> ';}
			else echo '<li><a href="#">Gradebook</a></li>';
?>
<li><a href="#">Profile</a></li>
	</ul>
	
	<div class="panes">
	
		<?php
		
		#<!-- Courses tab -->
		echo '
			<div>
			<p style="font-size:18px;"><u>Create New Problem</u></p>
			
			Title   <input type="text" name="title">
			Method Name   <input type="text" name="methodname">
			Category   <select><option value="">Select Category</option></select><br><br>
			Question/Description<br><input type="text" name="description" style="height: 75px; width: 100%;"><br><br>
			
			Parameter Name   <input type="text" name="name1">
			   <input type="text" name="name2">   <input type="text" name="name3">   <input type="text" name="name4"><br>
			   
			Parameter Type   <select><option value="">Type</option></select>   <select><option value="">Type</option></select>
			   <select><option value="">Type</option></select>   <select><option value="">Type</option></select><br>
			   
			Result Type   <select><option value="">Type</option></select><br>
			<a href="" style="font-size:11px;">Add Parameter</a>
			
			<p style="font-size:11px;padding-left:650px;">Hidden</p>
			Test Case 1   <input type="text" name="">   <input type="text" name="">   <input type="text" name="">   <input type="text" name="">   <input type="checkbox" name=""><br>
			<a href="" style="font-size:11px;">Add Test Case</a><br><br>
			
			Solution Code<br><input type="text" name="description" style="height: 100px; width: 100%;">
			<br><br>
			<input type="button" value="Submit" style="float:right;">
			<input type="button" value="Save" style="float:right;">
			<input type="button" value="Cancel" style="float:right;">
		
			</div>
		';
			
		#<!-- Manage Accounts tab -->
			include 'display_manage_accounts.php';
			displayManageAccounts();
											
		#<!-- Question Pool tab -->
		
			include 'display_question_pool.php';
			displayQuestionPool();
			
		#<!-- Gradebook tab -->
		
			include 'display_grades.php';
			displayGrades($accounttype);
		
		#<!-- Profile tab -->
		
			include 'display_profile.php';
			displayProfile($accounttype);
		?>
	</div>
	
	
	<script>
		$(function() {
			$("ul.tabs").tabs("div.panes > div");
		});
	</script>
	
	<div class="footer">
		<p>Created by Delta Tech</p>
		<a href="http://oraserv.cs.siena.edu/~perm_deltatech/#/home"><img src="./DeltaTech-Logo.png" width="50" height="30"/></a>
		<br/>
		<p>Copyright &copy; 2013 Delta Tech. All Rights Reserved</p>
	</div>

</html>