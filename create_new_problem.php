<!DOCTYPE HTML>
<?php
	session_start();  
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	}
	$accounttype=$_SESSION['account_type'];
	$firstname=$_SESSION['first_name'];
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
					Welcome, '.$firstname.'
					
					<a href="./logout.php">Logout</a>
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
	
		
		<!-- Courses tab -->
		
			<div>
			<p style="font-size:18px;"><u>Create New Problem</u></p>
			
			Title   <input type="text" name="title">
			Method Name   <input type="text" name="methodname">
			Category   <select><option value="">Select Category</option></select>
			Course   <select><option value="">Course 1</option>
							 <option value="">Course 2</option>
							 <option value="">Course 3</option>
							 <option value="">Course 4</option>
							 <option value="">Course 5</option></select><br><br>
			Question/Description<br><input type="text" name="description" style="height: 75px; width: 100%;"><br><br>
			
			<table border="0" id="paramTable">
				<tbody>
					<tr>
						<th>&nbsp;</th>
						<th>Param 1</th>
						<th>Param 2</th>
						<th>Param 3</th>
						<th>Param 4</th>
						<th>Param 5</th>
						<th>Result Type</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>
					<tr>
						<td class="col1">Parameter Name</td>
						<td class="col2"><input type="text" id="param1name" name="param1name"></td>
						<td class="col3"><input type="text" id="param2name" name="param2name" disabled="disabled"></td>
						<td class="col4"><input type="text" id="param3name" name="param3name" disabled="disabled"></td>
						<td class="col5"><input type="text" id="param4name" name="param4name" disabled="disabled"></td>
						<td class="col6"><input type="text" id="param5name" name="param5name" disabled="disabled"></td>
						<td class="col7">&nbsp;</td>
						<td class="col8">&nbsp;</td>
						<td class="col9">&nbsp;</td>
					</tr>
					<tr>
						<td class="col1">Parameter Type</td>
						<td class="col2"><select id="param1type"><option value="int">int</option>
												 <option value="char">char</option>
												 <option value="boolean">boolean</option>
												 <option value="string">String</option>
												 <option value="float">float</option>
												 <option value="intArray">int[]</option>
												 <option value="charArray">char[]</option>
												 <option value="booleanArray">boolean[]</option>
												 <option value="stringArray">String[]</option>
												 <option value="floatArray">float[]</option></select></td>
						<td class="col3"><select id="param2type" disabled="disabled"><option value="int">int</option>
												 <option value="char">char</option>
												 <option value="boolean">boolean</option>
												 <option value="string">String</option>
												 <option value="float">float</option>
												 <option value="intArray">int[]</option>
												 <option value="charArray">char[]</option>
												 <option value="booleanArray">boolean[]</option>
												 <option value="stringArray">String[]</option>
												 <option value="floatArray">float[]</option></select></td>
						<td class="col4"><select id="param3type" disabled="disabled"><option value="int">int</option>
												 <option value="char">char</option>
												 <option value="boolean">boolean</option>
												 <option value="string">String</option>
												 <option value="float">float</option>
												 <option value="intArray">int[]</option>
												 <option value="charArray">char[]</option>
												 <option value="booleanArray">boolean[]</option>
												 <option value="stringArray">String[]</option>
												 <option value="floatArray">float[]</option></select></td>
						<td class="col5"><select id="param4type" disabled="disabled"><option value="int">int</option>
												 <option value="char">char</option>
												 <option value="boolean">boolean</option>
												 <option value="string">String</option>
												 <option value="float">float</option>
												 <option value="intArray">int[]</option>
												 <option value="charArray">char[]</option>
												 <option value="booleanArray">boolean[]</option>
												 <option value="stringArray">String[]</option>
												 <option value="floatArray">float[]</option></select></td>
						<td class="col6"><select id="param5type" disabled="disabled"><option value="int">int</option>
												 <option value="char">char</option>
												 <option value="boolean">boolean</option>
												 <option value="string">String</option>
												 <option value="float">float</option>
												 <option value="intArray">int[]</option>
												 <option value="charArray">char[]</option>
												 <option value="booleanArray">boolean[]</option>
												 <option value="stringArray">String[]</option>
												 <option value="floatArray">float[]</option></select></td>
						<td class="col7"><select><option value="int">int</option>
												 <option value="char">char</option>
												 <option value="boolean">boolean</option>
												 <option value="string">String</option>
												 <option value="float">float</option>
												 <option value="intArray">int[]</option>
												 <option value="charArray">char[]</option>
												 <option value="booleanArray">boolean[]</option>
												 <option value="stringArray">String[]</option>
												 <option value="floatArray">float[]</option></select></td>
						<td class="col8">&nbsp;</td>
						<td class="col9">&nbsp;</td>
					</tr>
					<tr></tr>
					<tr>
						<td class="col1"><input type="button" value="Add Parameter" onClick="addParam()"></td>
						<td class="col2"><input type="button" value="Remove Parameter" onClick="removeParam('paramTable')"></td>
						<td class="col3">&nbsp;</td>
						<td class="col4">&nbsp;</td>
						<td class="col5">&nbsp;</td>
						<td class="col6">&nbsp;</td>
						<td class="col7">&nbsp;</td>
						<td class="col8">&nbsp;</td>
						<td class="col9">&nbsp;</td>
					</tr>
					<tr>
						<td class="col1">&nbsp;</td>
						<td class="col2">&nbsp;</td>
						<td class="col3">&nbsp;</td>
						<td class="col4">&nbsp;</td>
						<td class="col5">&nbsp;</td>
						<td class="col6">&nbsp;</td>
						<td class="col7">&nbsp;</td>
						<td class="col8" style="font-size:11px;">Hidden</td>
						<td class="col9" style="font-size:11px;">Remove</td>
					</tr>
					<tr>
						<td class="col1">Test Case 1</td>
						<td class="col2"><input type="text" id="case1param1" name="case1param1"></td>
						<td class="col3"><input type="text" id="case1param2" name="case1param2" disabled="disabled"></td>
						<td class="col4"><input type="text" id="case1param3" name="case1param3" disabled="disabled"></td>
						<td class="col5"><input type="text" id="case1param4" name="case1param4" disabled="disabled"></td>
						<td class="col6"><input type="text" id="case1param5" name="case1param5" disabled="disabled"></td>
						<td class="col7"><input type="text" id="case1result" name="case1result"></td>
						<td class="col8"><input type="checkbox" id="case1hidden"></td>
						<td class="col9"><input type="checkbox" id="case1remove"></td>
					</tr>
					<tr>
						<td class="col1"><input type="button" value="Add Test Case" onClick="addRow('paramTable')"></td>
						<td class="col2"><input type="button" value="Remove Test Case(s)" onClick="deleteRow('paramTable')"></td>
						<td class="col3">&nbsp;</td>
						<td class="col4">&nbsp;</td>
						<td class="col5">&nbsp;</td>
						<td class="col6">&nbsp;</td>
						<td class="col7">&nbsp;</td>
						<td class="col8">&nbsp;</td>
					</tr>
				</tbody>
			</table>
			
			<br><br>
			
			Solution Code<br><input type="text" name="description" style="height: 200px; width: 100%;">
			<br><br>
<?php
			if(isset($_GET['action']) && $_GET['action'] == 'addAssignment'){
				echo'<input type="button" value="Add to Assignment" style="float:right;">
					 <input type="button" value="Cancel"  onClick="cancelConfirm()" style="float:right;">';
			} else {
				echo'<input type="button" value="Create" style="float:right;">
				<input type="button" value="Save" style="float:right;">
				<input type="button" value="Cancel" onClick="cancelConfirm()" style="float:right;">';
			}
?>
			
			</div>
<?php	
			
		#<!-- Manage Accounts tab -->
			include 'display_manage_accounts.php';
			displayManageAccounts();
											
		#<!-- Question Pool tab -->
		
			include 'display_question_pool.php';
			displayQuestionPool($accounttype);
			
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