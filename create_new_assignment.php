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
									<td><select><option value="">Course 1</option>
							 					<option value="">Course 2</option>
							 					<option value="">Course 3</option>
							 					<option value="">Course 4</option>
										 		<option value="">Course 5</option></select>
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
									<td><select id="day"><option value="01">01</option>
															<option value="02">02</option>
															<option value="03">03</option>
															<option value="04">04</option>
															<option value="05">05</option>
															<option value="06">06</option>
															<option value="07">07</option>
															<option value="08">08</option>
															<option value="09">09</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
															<option value="24">24</option>
															<option value="25">25</option>
															<option value="26">26</option>
															<option value="27">27</option>
															<option value="28">28</option>
															<option value="29">29</option>
															<option value="30">30</option>
															<option value="31">31</option>
															</select></td>
									<td>/</td>
									<td><select id="year"><option value="2013">2013</option>
															<option value="2014">2014</option>
															<option value="2015">2015</option>
															</select></td>
									<td>&nbsp;</td>
									<td><select id="hour"><option value="01">01</option>
															<option value="02">02</option>
															<option value="03">03</option>
															<option value="04">04</option>
															<option value="05">05</option>
															<option value="06">06</option>
															<option value="07">07</option>
															<option value="08">08</option>
															<option value="09">09</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															</select></td>
									<td>:</td>
									<td><select id="minute"><option value="00">00</option>
															<option value="01">01</option>
															<option value="02">02</option>
															<option value="03">03</option>
															<option value="04">04</option>
															<option value="05">05</option>
															<option value="06">06</option>
															<option value="07">07</option>
															<option value="08">08</option>
															<option value="09">09</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
															<option value="24">24</option>
															<option value="25">25</option>
															<option value="26">26</option>
															<option value="27">27</option>
															<option value="28">28</option>
															<option value="29">29</option>
															<option value="30">30</option>
															<option value="31">31</option>
															<option value="02">32</option>
															<option value="03">33</option>
															<option value="04">34</option>
															<option value="05">35</option>
															<option value="06">36</option>
															<option value="07">37</option>
															<option value="08">38</option>
															<option value="09">39</option>
															<option value="10">40</option>
															<option value="11">41</option>
															<option value="12">42</option>
															<option value="13">43</option>
															<option value="14">44</option>
															<option value="15">45</option>
															<option value="16">46</option>
															<option value="17">47</option>
															<option value="18">48</option>
															<option value="19">49</option>
															<option value="20">50</option>
															<option value="21">51</option>
															<option value="22">52</option>
															<option value="23">53</option>
															<option value="24">54</option>
															<option value="25">55</option>
															<option value="26">56</option>
															<option value="27">57</option>
															<option value="28">58</option>
															<option value="29">59</option>
															</select></td>
									<td><select id=""><option value="am">AM</option>
														<option value="pm">PM</option>
														</select></td>
								</tr>
								</table>
			
			<form method="post">
			Description<br><textarea name="description" rows="5" cols="150" style="resize:none;"></textarea>
			</form><br>
			<a href="./create_new_problem.php?action=addAssignment" style="font-size:13px;padding-right:20px;">Create and Add New Problem</a>
			<a href="./private_pool.php?action=addAssignment" style="font-size:13px;padding-right:20px;">Add Problem from Private Question Pool</a>
			<a href="./course_pool.php?action=addAssignment" style="font-size:13px;">Add Problem from Global Question Pool</a><br><br>
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
					</tr>
					<tr>
						<td><b>Problem 1:</b></td>
						<td>&nbsp;</td>
						<td>String Problem</td>
						<td>&nbsp;</td>
						<td>String</td>
						<td>&nbsp;</td>
						<td><input type="text" name="pointValue"></td>
						<td>&nbsp;</td>
						<td><a href="">Edit</a></td>
						<td>&nbsp;</td>
						<td><a href="">Remove</a></td>
					</tr>
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
		footerLayout();
		?>
</html>