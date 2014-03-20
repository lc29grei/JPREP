<?php
	function displayManageAccounts () {
		echo'
		<div>
			<ul>
				<a href="?action=manageStudent&#tab2"><li><u>Manage Students</u></li></a>
				<a href="?action=manageFaculty&#tab2"><li><u>Manage Faculty</u></li></a>
				<a href="?action=manageCC&#tab2"><li><u>Manage Course Coordinators</u></li></a>
			</ul>
		</div>
		';
	}
	if(isset($_GET['action']) && $_GET['action'] == 'manageCC'){
		manageCC();
	} else if(isset($_GET['action']) && $_GET['action'] == 'manageStudent'){
		manageStudent();
	} else if(isset($_GET['action']) && $_GET['action'] == 'manageFaculty'){
		manageFaculty();
	} 
	function manageCC() {
	echo'
			
				<div class="CSSTableGenerator" >
					<h3>Manage Course Coordinator Accounts</h3>
					</br>
					</br>
					<a href="?action=createCC&#tab2">Create New Course Coordinator Account</a>
					</br>
					</br>														
						<table>
							<tr>
								<td>Prefix</td>
								<td>First Name</td>
								<td>Last Name</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Mr</td>
								<td>Nick</td>
								<td>Nack</td>
								<td><a href="?action=editCCAccount&#tab2">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
							<tr>
								<td>Dr</td>
								<td>Cliff</td>
								<td>Diver</td>
								<td><a href="?action=editCCAccount&#tab2">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
							<tr>
								<td>Mrs</td>
								<td>Patty</td>
								<td>Whack</td>
								<td><a href="?action=editCCAccount&#tab2">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
						</table>
					<form method="">							
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</form>
				</div>			
			';
}

function manageFaculty() {
	echo'
			
				<div class="CSSTableGenerator" >
					<h3>Manage Faculty Accounts</h3>
					</br>
					</br>
					<a href="?action=createFaculty&#tab2">Create New Faculty Account</a>
					</br>
					</br>														
						<table>
							<tr>
								<td>Prefix</td>
								<td>First Name</td>
								<td>Last Name</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Mr</td>
								<td>Vic</td>
								<td>Tory</td>
								<td><a href="?action=editFacultyAccount&#tab2">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
							<tr>
								<td>Dr</td>
								<td>Luke</td>
								<td>Warm</td>
								<td><a href="?action=editFacultyAccount&#tab2">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
							<tr>
								<td>Dr</td>
								<td>Will</td>
								<td>Power</td>
								<td><a href="?action=editFacultyAccount&#tab2">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
							<tr>
								<td>Mrs</td>
								<td>Tara</td>
								<td>Zona</td>
								<td><a href="?action=editFacultyAccount&#tab2">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
						</table>
					<form method="">							
						<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
					</form>
				</div>
					
					
				
			
			';
}

function manageStudent() {
	echo'
			
		<div class="CSSTableGenerator" >
			<h3>Manage Student Accounts</h3>
			</br></br>
			<a href="?action=createStudent&#tab2">Create New Student Account</a>
			</br></br>
				<table>
					<tr>
						<td>First Name</td>
						<td>Last Name</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Petey</td>
						<td>Cruiser</td>
						<td><a href="?action=editStudentAccount&#tab2">Edit</a></td>
						<td><a href="">Delete</a></td>
					</tr>
					<tr>
						<td>Robin</td>
						<td>Banks</td>
						<td><a href="?action=editStudentAccount&#tab2">Edit</a></td>
						<td><a href="">Delete</a></td>
					</tr>
					<tr>
						<td>Will</td>
						<td>Power</td>
						<td><a href="?action=editStudentAccount&#tab2">Edit</a></td>
						<td><a href="">Delete</a></td>
					</tr>
					<tr>
						<td>Mary</td>
						<td>Christmas</td>
						<td><a href="?action=editStudentAccount&#tab2">Edit</a></td>
						<td><a href="">Delete</a></td>
					</tr>
				</table>
			<form method="">							
				<p class="submit" style="text-align: center"><input type="submit" value="Back" onClick="goBack()"></p>
			</form>
		</div>																	
	';
}
if(isset($_GET['action']) && $_GET['action'] == 'editStudentAccount'){
		editStudentAccount();
} else if(isset($_GET['action']) && $_GET['action'] == 'editFacultyAccount'){
		editFacultyAccount();
}else if(isset($_GET['action']) && $_GET['action'] == 'editCCAccount'){
		editCCAccount();
}
function editStudentAccount(){
	
	echo'
			<div class="profile">
				<form method="POST" action="home.php?action=manageStudent&#tab2">
					<p>First Name:<input type="text" name="fname" placeholder="Petey"></p>
					<p>Last Name:<input type="text" name="lname" placeholder="Cruiser"></p>
					<p>Email:<input type="text" name="email" placeholder="PTCruiser@siena.edu"></p>
					<p>Confirm Email:<input type="text" name="confirm_email" placeholder="PTCruiser@siena.edu"></p>
					<p>Security Question:<input type="text" name="secQ" placeholder="Whats my favorite car"></p>
					<p>Security Answer:<input type="text" name="secA" placeholder="PT Cruiser"></p>
					
				
				<table style="text-align:center;border:1px solid;">
							<tr><th style="border:1px solid;">Course Number</th>
								<th style="border:1px solid;">Course Name</th>
								<th style="border:1px solid;">Enroll</th>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-01</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-02</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox" checked></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-03</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-04</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225-01</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225-02</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225-03</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox"checked></td>
							</tr>
						</table>
						<input type="submit" value="Cancel" onClick="goBack()">
						<input type="submit" value="Submit">
						</form>
						</div>';
			
	
}

function editFacultyAccount(){
	
	echo'
			<div class="profile">
				<form method="POST" action="home.php?action=manageFaculty&#tab2">
					<p>Prefix:<input type="text" name="prefix" placeholder="Dr"></p>
					<p>First Name:<input type="text" name="fname" placeholder="Darren"></p>
					<p>Last Name:<input type="text" name="lname" placeholder="Lim"></p>
					<p>Email:<input type="text" name="email" placeholder="dlim@siena.edu"></p>
					<p>Confirm Email:<input type="text" name="confirm_email" placeholder="dlim@siena.edu"></p>
					<p>Security Question:<input type="text" name="secQ" placeholder="Whos the best student"></p>
					<p>Security Answer:<input type="text" name="secA" placeholder="Luke"></p>
					
				
				<table style="text-align:center;border:1px solid;">
							<tr><th style="border:1px solid;">Course Number</th>
								<th style="border:1px solid;">Course Name</th>
								<th style="border:1px solid;">Enroll</th>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-01</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox" checked></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-02</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-03</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-04</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225-01</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox" checked></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225-02</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox" checked></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225-03</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox"checked></td>
							</tr>
						</table>
						<input type="submit" name="cancel" value="Cancel" onClick="goBack()">
						<input type="submit" name="commit" value="Submit">
						</form>
						</div>';
			
	
}

function editCCAccount(){
	
	echo'
			<div class="profile">
				<form method="POST" action="home.php?action=manageCC&#tab2">
					<p>Prefix:<input type="text" name="prefix" placeholder="Dr"></p>
					<p>First Name:<input type="text" name="fname" placeholder="Darren"></p>
					<p>Last Name:<input type="text" name="lname" placeholder="Lim"></p>
					<p>Email:<input type="text" name="email" placeholder="dlim@siena.edu"></p>
					<p>Confirm Email:<input type="text" name="confirm_email" placeholder="dlim@siena.edu"></p>
					<p>Security Question:<input type="text" name="secQ" placeholder="Whos the best student"></p>
					<p>Security Answer:<input type="text" name="secA" placeholder="Luke"></p>
					
				
				<table style="text-align:center;border:1px solid;">
							<tr><th style="border:1px solid;">Course Number</th>
								<th style="border:1px solid;">Course Name</th>
								<th style="border:1px solid;">Enroll</th>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox" checked></td>
							</tr>
						</table>
						<input type="submit" name="cancel" value="Cancel" onClick="goBack()">
						<input type="submit" name="commit" value="Submit">
						</form>
						</div>';
			
	
}
	
	

if(isset($_GET['action']) && $_GET['action'] == 'createCC'){
		createCC();
}else if(isset($_GET['action']) && $_GET['action'] == 'createFaculty'){
		createFaculty();
}else if(isset($_GET['action']) && $_GET['action'] == 'createStudent'){
		createStudent();
	}
	
function createCC(){
	echo'
			<div class="profile">
				<h3>Create New Course Coordinator</h3>
				<form method="POST" action="home.php">
					<p>Prefix:<input type="text" name="prefix" ></p>
					<p>First Name:<input type="text" name="fname" ></p>
					<p>Last Name:<input type="text" name="lname"></p>
					<p>Username:<input type="text" name="email" ></p>		
					<p>Security Question:<input type="text" name="secQ"></p>
					<p>Security Answer:<input type="text" name="secA" ></p>
					<p>Faculty Privileges: <input type="checkbox" name="isFaculty" value="Faculty"></p>
					<table style="text-align:center;border:1px solid;">
							<tr><th style="border:1px solid;">Course Number</th>
								<th style="border:1px solid;">Course Name</th>
								<th style="border:1px solid;">Assign</th>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-210</td>
								<td style="border:1px solid;">Data Structures</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-220</td>
								<td style="border:1px solid;">Assembly Language</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
						</table>
					<br>
					<input type="button" value="Cancel" onClick="goBack()">
					<input type="submit" name="commit" value="Create Account">
				</form>
			</div>';
}
function createFaculty(){
	echo'
			<div class="profile">
				<h3>Create New Faculty</h3>
				<form method="POST" action="home.php">
					<p>Prefix:<input type="text" name="prefix" ></p>
					<p>First Name:<input type="text" name="fname" ></p>
					<p>Last Name:<input type="text" name="lname"></p>
					<p>Username:<input type="text" name="email" ></p>		
					<p>Security Question:<input type="text" name="secQ"></p>
					<p>Security Answer:<input type="text" name="secA" ></p>
					<table style="text-align:center;border:1px solid;">
							<tr><th style="border:1px solid;">Course Number</th>
								<th style="border:1px solid;">Course Name</th>
								<th style="border:1px solid;">Assign</th>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-01</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-02</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-03</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-04</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225-01</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225-02</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225-03</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
						</table>
					<br>
					<input type="button" value="Cancel" onClick="goBack()">
					<input type="submit" name="commit" value="Create Account">
				</form>
			</div>';
}

function createStudent(){
	echo'
			<div class="profile">
				<h3>Create New Student</h3>
				<form method="POST" action="home.php">
					<p>First Name:<input type="text" name="fname" ></p>
					<p>Last Name:<input type="text" name="lname"></p>
					<p>Username:<input type="text" name="email" ></p>		
					<p>Security Question:<input type="text" name="secQ"></p>
					<p>Security Answer:<input type="text" name="secA" ></p>
					
						<table style="text-align:center;border:1px solid;">
							<tr><th style="border:1px solid;">Course Number</th>
								<th style="border:1px solid;">Course Name</th>
								<th style="border:1px solid;">Enroll</th>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-01</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-02</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-03</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-120-04</td>
								<td style="border:1px solid;">Intro to Programming</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225-01</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225-02</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
							<tr>
								<td style="border:1px solid;">CSIS-225-03</td>
								<td style="border:1px solid;">Object Oriented</td>
								<td style="border:1px solid;"><input type="checkbox"></td>
							</tr>
						</table>
					
					<br>
					<input type="button" value="Cancel" onClick="goBack()">
					<input type="submit" name="commit" value="Create Account">
				</form>
			</div>';
}
	
	
?>

