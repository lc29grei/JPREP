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
   	include 'home_layout.php';
   	headerLayout($currentrole,$firstname);
		#<!-- Courses tab -->
		?>
			<div>
			<p style="font-size:18px;"><u>Create New Problem</u></p>
<?php		
			echo'<form method="POST" action="check_create_problem.php?role='.$currentrole.'&id='.$_GET['id'].'">';
?>
			Title   <input type="text" name="title">
			Method Name   <input type="text" name="methodName">
			<?php
			if (($currentrole == "c") or ($currentrole == "a")){
			echo'Course   <select name="selectedCourse">';
			if (mysql_num_rows($activeCourseResult) > 0) {
				while($row=mysql_fetch_array($activeCourseResult)) {
					if ($_GET['id'] == $row['courseId']) echo'<option value="'.$row['courseId'].'" selected="selected">'.$row['courseId'].' '.$row['coursename'].'</option>';							
					else echo'<option value="'.$row['courseId'].'">'.$row['courseId'].' '.$row['coursename'].'</option>';
				}
			}
			echo'</select>';
			}
			?>
			<br><br>
			Question/Description<br><textarea name="description" rows="5" cols="150" style="resize:none;"></textarea>
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
						<td class="col2"><input type="text" id="param1name" name="param1name"></td>
						<td class="col3"><input type="text" id="param2name" name="param2name" value=" " disabled="disabled"></td>
						<td class="col4"><input type="text" id="param3name" name="param3name" value=" " disabled="disabled"></td>
						<td class="col5"><input type="text" id="param4name" name="param4name" value=" " disabled="disabled"></td>
						<td class="col6"><input type="text" id="param5name" name="param5name" value=" " disabled="disabled"></td>
						<td class="col7">&nbsp;</td>
						<td class="col8">&nbsp;</td>
						<td class="col9">&nbsp;</td>
					</tr>
					<tr>
						<td class="col1">Parameter Type</td>
						<td class="col2"><select name="param1type" id="param1type"><option value="int">int</option>
												 <option value="char">char</option>
												 <option value="boolean">boolean</option>
												 <option value="String">String</option>
												 <option value="double">double</option>
												 <option value="intArray">int[]</option>
												 <option value="charArray">char[]</option>
												 <option value="booleanArray">boolean[]</option>
												 <option value="stringArray">String[]</option>
												 <option value="doubleArray">double[]</option></select></td>
						<td class="col3"><select name="param2type" id="param2type" disabled="disabled"><option value="int">int</option>
												 <option value="char">char</option>
												 <option value="boolean">boolean</option>
												 <option value="String">String</option>
												 <option value="double">double</option>
												 <option value="intArray">int[]</option>
												 <option value="charArray">char[]</option>
												 <option value="booleanArray">boolean[]</option>
												 <option value="stringArray">String[]</option>
												 <option value="doubleArray">double[]</option></select></td>
						<td class="col4"><select name="param3type" id="param3type" disabled="disabled"><option value="int">int</option>
												 <option value="char">char</option>
												 <option value="boolean">boolean</option>
												 <option value="String">String</option>
												 <option value="double">double</option>
												 <option value="intArray">int[]</option>
												 <option value="charArray">char[]</option>
												 <option value="booleanArray">boolean[]</option>
												 <option value="stringArray">String[]</option>
												 <option value="doubleArray">double[]</option></select></td>
						<td class="col5"><select name="param4type" id="param4type" disabled="disabled"><option value="int">int</option>
												 <option value="char">char</option>
												 <option value="boolean">boolean</option>
												 <option value="String">String</option>
												 <option value="double">double</option>
												 <option value="intArray">int[]</option>
												 <option value="charArray">char[]</option>
												 <option value="booleanArray">boolean[]</option>
												 <option value="stringArray">String[]</option>
												 <option value="doubleArray">double[]</option></select></td>
						<td class="col6"><select name="param5type" id="param5type" disabled="disabled"><option value="int">int</option>
												 <option value="char">char</option>
												 <option value="boolean">boolean</option>
												 <option value="String">String</option>
												 <option value="double">double</option>
												 <option value="intArray">int[]</option>
												 <option value="charArray">char[]</option>
												 <option value="booleanArray">boolean[]</option>
												 <option value="stringArray">String[]</option>
												 <option value="doubleArray">double[]</option></select></td>
						<td class="col7"><select id="resultType" name="resultType"><option value="int">int</option>
												 <option value="char">char</option>
												 <option value="boolean">boolean</option>
												 <option value="String">String</option>
												 <option value="double">double</option>
												 <option value="intArray">int[]</option>
												 <option value="charArray">char[]</option>
												 <option value="booleanArray">boolean[]</option>
												 <option value="stringArray">String[]</option>
												 <option value="doubleArray">double[]</option></select></td>
						<td class="col8">&nbsp;</td>
						<td class="col9">&nbsp;</td>
					</tr>
					<tr></tr>
					<tr>
						<td class="col1"><input type="button" value="Add Parameter" onClick="addParam('paramTable')"></td>
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
						<td class="col8"><input type="checkbox" name="case1hidden" id="case1hidden"></td>
						<td class="col9"><input type="checkbox" name="case1remove" id="case1remove"></td>
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
			<br>
			Starter Code<br><textarea id ="starter" name="starter" rows="15" cols="150" style="resize:none;"></textarea>
			<br>
			
			<br>
			
			Solution Code<br><textarea id ="solution" name="solution" rows="15" cols="150" style="resize:none;"></textarea>
			<br>
<?php
			if(isset($_GET['action']) && $_GET['action'] == 'addAssignment'){
				$_SESSION['isAddToAssignment']= true;
				echo'<input type="submit" value="Add to Assignment" style="float:right;">
					 <input type="button" value="Cancel"  onClick="cancelConfirm()" style="float:right;">';
			} else {
				$_SESSION['isAddToAssignment']=false;
				echo'
				<input type="button" value="Cancel" onClick="cancelConfirm()">
				<input type="submit" value="Create">';
			}

			echo'</form></div>';
		
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