<!DOCTYPE HTML>
<?php
	session_start();  
	if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	}
	include 'dbInfo.php';
	
	$activeCourseQuery = "SELECT DISTINCT(courseId), coursename, sectionId FROM Section GROUP BY courseId";
	$activeCourseResult = mysql_query($activeCourseQuery);
			
	$currentrole=$_SESSION['currentrole'];
	$firstname=$_SESSION['first_name'];
	$probId=$_GET['id'];
   	include 'home_layout.php';
   	headerLayout($currentrole,$firstname);
		#<!-- Courses tab -->
		$selectedCourse = mysql_result(mysql_query('SELECT poolId FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$title = mysql_result(mysql_query('SELECT title FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$methodname = mysql_result(mysql_query('SELECT methodname FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$description = mysql_result(mysql_query('SELECT description FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$resulttype = mysql_result(mysql_query('SELECT resulttype FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$solutionCode = mysql_result(mysql_query('SELECT solutionCode FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param1name = mysql_result(mysql_query('SELECT param1 FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param2name = mysql_result(mysql_query('SELECT param2 FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param3name = mysql_result(mysql_query('SELECT param3 FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param4name = mysql_result(mysql_query('SELECT param4 FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param5name = mysql_result(mysql_query('SELECT param5 FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$starterCode = mysql_result(mysql_query('SELECT starterText FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$storageLoc = mysql_result(mysql_query('SELECT storageloc FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param1type = mysql_result(mysql_query('SELECT param1type FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param2type = mysql_result(mysql_query('SELECT param2type FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param3type = mysql_result(mysql_query('SELECT param3type FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param4type = mysql_result(mysql_query('SELECT param4type FROM Problem WHERE problemId="'.$probId.'"'),0);
  	$param5type = mysql_result(mysql_query('SELECT param5type FROM Problem WHERE problemId="'.$probId.'"'),0);
		
		echo'
			<div>
			<p style="font-size:18px;"><u>Edit A Problem</u></p>
			<form method="POST" action="check_create_problem.php?action=edit&id='.$probId.'">
			Title   <input type="text" name="title" placeholder="'.$title.'">
			Method Name   <input type="text" name="methodName" placeholder="'.$methodname.'">';
			if ($currentrole == "c") {
			echo'Course   <select name="selectedCourse">';
			if (mysql_num_rows($activeCourseResult) > 0) {
				while($row=mysql_fetch_array($activeCourseResult)) {
					if ($selectedCourse == $row['courseId']) echo'<option value="'.$row['courseId'].'" selected="selected">'.$row['courseId'].' '.$row['coursename'].'</option>';							
					else echo'<option value="'.$row['courseId'].'">'.$row['courseId'].' '.$row['coursename'].'</option>';
				}
			}
			echo'</select>';
			}
			
			echo'<br><br>
			Question/Description<br><textarea name="description" rows="5" cols="150" style="resize:none;" placeholder="'.$description.'"></textarea>
			<br>
			<table border="0" id="paramTable" name="paramTable">
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
						<td class="col2"><input type="text" id="param1name" name="param1name" placeholder="'.$param1name.'"></td>';
						if ($param2name == "") echo'<td class="col3"><input type="text" id="param2name" name="param2name" value=" " disabled="disabled"></td>';
						else echo'<td class="col3"><input type="text" id="param2name" name="param2name" placeholder="'.$param2name.'"></td>';
						if ($param3name == "") echo'<td class="col4"><input type="text" id="param3name" name="param3name" value=" " disabled="disabled"></td>';
						else echo'<td class="col4"><input type="text" id="param3name" name="param3name" placeholder="'.$param3name.'"></td>';
						if ($param4name == "") echo'<td class="col5"><input type="text" id="param4name" name="param4name" value=" " disabled="disabled"></td>';
						else echo'<td class="col5"><input type="text" id="param4name" name="param4name" placeholder="'.$param4name.'"></td>';
						if ($param5name == "") echo'<td class="col6"><input type="text" id="param5name" name="param5name" value=" " disabled="disabled"></td>';
						else echo'<td class="col6"><input type="text" id="param5name" name="param5name" placeholder="'.$param5name.'"></td>';
						echo'<td class="col7">&nbsp;</td>
						<td class="col8">&nbsp;</td>
						<td class="col9">&nbsp;</td>
					</tr>
					<tr>
						<td class="col1">Parameter Type</td>';
						$i=1;
						while ($i<6) {
							$j=$i+1;
							if ($i==1) {
								$currentParam = $param1type;
								$currentName = $param1name;
							} else if ($i==2) {
								$currentParam = $param2type;
								$currentName = $param2name;
							} else if ($i==3) {
								$currentParam = $param3type;
								$currentName = $param3name;
							} else if ($i==4) {
								$currentParam = $param4type;
								$currentName = $param4name;
							} else if ($i==5) {
								$currentParam = $param5type;
								$currentName = $param5name;
							}
							
						if ($currentName == "") {
							echo'<td class="col'.$j.'"><select name="param'.$i.'type" id="param'.$i.'type" disabled="disabled">';
												 if ($currentParam=="int") echo'<option value="int" selected="selected">int</option>';
												 else echo'<option value="int">int</option>';
												 if ($currentParam=="char") echo'<option value="char" selected="selected">char</option>';
												 else echo'<option value="char">char</option>';
												 if ($currentParam=="boolean") echo'<option value="boolean" selected="selected">boolean</option>';
												 else echo'<option value="boolean">boolean</option>';
												 if ($currentParam=="string") echo'<option value="string" selected="selected">string</option>';
												 else echo'<option value="string">string</option>';
												 if ($currentParam=="double") echo'<option value="double" selected="selected">double</option>';
												 else echo'<option value="double">double</option>';
												 if ($currentParam=="intArray") echo'<option value="intArray" selected="selected">int[]</option>';
												 else echo'<option value="intArray">int[]</option>';
												 if ($currentParam=="charArray") echo'<option value="charArray" selected="selected">char[]</option>';
												 else echo'<option value="charArray">char[]</option>';
												 if ($currentParam=="booleanArray") echo'<option value="booleanArray" selected="selected">boolean[]</option>';
												 else echo'<option value="booleanArray">boolean[]</option>';
												 if ($currentParam=="stringArray") echo'<option value="stringArray" selected="selected">String[]</option>';
												 else echo'<option value="stringArray">String[]</option>';
												 if ($currentParam=="doubleArray") echo'<option value="doubleArray" selected="selected">double[]</option>';
												 else echo'<option value="doubleArray">double[]</option>';
												 echo'</select></td>';
						} else {
							echo'<td class="col'.$j.'"><select name="param'.$i.'type" id="param'.$i.'type">';
												 if ($currentParam=="int") echo'<option value="int" selected="selected">int</option>';
												 else echo'<option value="int">int</option>';
												 if ($currentParam=="char") echo'<option value="char" selected="selected">char</option>';
												 else echo'<option value="char">char</option>';
												 if ($currentParam=="boolean") echo'<option value="boolean" selected="selected">boolean</option>';
												 else echo'<option value="boolean">boolean</option>';
												 if ($currentParam=="string") echo'<option value="string" selected="selected">string</option>';
												 else echo'<option value="string">string</option>';
												 if ($currentParam=="double") echo'<option value="double" selected="selected">double</option>';
												 else echo'<option value="double">double</option>';
												 if ($currentParam=="intArray") echo'<option value="intArray" selected="selected">int[]</option>';
												 else echo'<option value="intArray">int[]</option>';
												 if ($currentParam=="charArray") echo'<option value="charArray" selected="selected">char[]</option>';
												 else echo'<option value="charArray">char[]</option>';
												 if ($currentParam=="booleanArray") echo'<option value="booleanArray" selected="selected">boolean[]</option>';
												 else echo'<option value="booleanArray">boolean[]</option>';
												 if ($currentParam=="stringArray") echo'<option value="stringArray" selected="selected">String[]</option>';
												 else echo'<option value="stringArray">String[]</option>';
												 if ($currentParam=="doubleArray") echo'<option value="doubleArray" selected="selected">double[]</option>';
												 else echo'<option value="doubleArray">double[]</option>';
												 echo'</select></td>';
						}
							$i=$i+1;
						}
						echo'<td class="col7"><select id="resultType" name="resultType">';
											if ($resulttype=="int") echo'<option value="int" selected="selected">int</option>';
												 else echo'<option value="int">int</option>';
												 if ($resulttype=="char") echo'<option value="char" selected="selected">char</option>';
												 else echo'<option value="char">char</option>';
												 if ($resulttype=="boolean") echo'<option value="boolean" selected="selected">boolean</option>';
												 else echo'<option value="boolean">boolean</option>';
												 if ($resulttype=="string") echo'<option value="string" selected="selected">string</option>';
												 else echo'<option value="string">string</option>';
												 if ($resulttype=="double") echo'<option value="double" selected="selected">double</option>';
												 else echo'<option value="double">double</option>';
												 if ($resulttype=="intArray") echo'<option value="intArray" selected="selected">int[]</option>';
												 else echo'<option value="intArray">int[]</option>';
												 if ($resulttype=="charArray") echo'<option value="charArray" selected="selected">char[]</option>';
												 else echo'<option value="charArray">char[]</option>';
												 if ($resulttype=="booleanArray") echo'<option value="booleanArray" selected="selected">boolean[]</option>';
												 else echo'<option value="booleanArray">boolean[]</option>';
												 if ($resulttype=="stringArray") echo'<option value="stringArray" selected="selected">String[]</option>';
												 else echo'<option value="stringArray">String[]</option>';
												 if ($resulttype=="doubleArray") echo'<option value="doubleArray" selected="selected">double[]</option>';
												 else echo'<option value="doubleArray">double[]</option>';
												 echo'</select></td>';
						echo'<td class="col8">&nbsp;</td>
						<td class="col9">&nbsp;</td>
					</tr>
					<tr></tr>
					<tr>
						<td class="col1"><input type="button" value="Add Parameter" onClick="addParam()"></td>';
	?>
						<td class="col2"><input type="button" value="Remove Parameter" onClick="removeParam('paramTable')"></td>
	<?php
						echo'<td class="col3">&nbsp;</td>
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
						<td class="col3">';
						if ($param2name == "") echo'<input type="text" id="case1param2" name="case1param2" disabled="disabled"></td>';
						else echo'<input type="text" id="case1param2" name="case1param2"></td>';
						if ($param3name == "") echo'<td class="col4"><input type="text" id="case1param3" name="case1param3" disabled="disabled"></td>';
						else echo'<td class="col4"><input type="text" id="case1param3" name="case1param3"></td>';
						if ($param4name == "") echo'<td class="col5"><input type="text" id="case1param4" name="case1param4" disabled="disabled"></td>';
						else echo'<td class="col5"><input type="text" id="case1param4" name="case1param4"></td>';
						if ($param5name == "") echo'<td class="col6"><input type="text" id="case1param5" name="case1param5" disabled="disabled"></td>';
						else echo'<td class="col6"><input type="text" id="case1param5" name="case1param5"></td>';
						echo'<td class="col7"><input type="text" id="case1result" name="case1result"></td>
						<td class="col8"><input type="checkbox" name="case1hidden" id="case1hidden"></td>
						<td class="col9"><input type="checkbox" name="case1remove" id="case1remove"></td>
					</tr>
					<tr>';
	?>
						<td class="col1"><input type="button" value="Add Test Case" onClick="addRow('paramTable')"></td>
						<td class="col2"><input type="button" value="Remove Test Case(s)" onClick="deleteRow('paramTable')"></td>
	<?php			
						echo'<td class="col3">&nbsp;</td>
						<td class="col4">&nbsp;</td>
						<td class="col5">&nbsp;</td>
						<td class="col6">&nbsp;</td>
						<td class="col7">&nbsp;</td>
						<td class="col8">&nbsp;</td>
					</tr>
				</tbody>
			</table>
			<br>
			Starter Code<br><textarea id ="starter" name="starter" rows="15" cols="150" style="resize:none;" placeholder="'.$starterCode.'"></textarea>
			<br>
			
			<br>
			
			Solution Code<br><textarea id ="solution" name="solution" rows="15" cols="150" style="resize:none;" placeholder="'.$solutionCode.'"></textarea>
			<br>
			<input type="button" value="Cancel" onClick="cancelConfirm()">
			<input type="submit" value="Save Changes">
			</form></div>';
		
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