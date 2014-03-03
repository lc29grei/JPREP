<?php
	function displayManageAccounts () {
		echo'
		<div>
			<ul>
				<a href="?action=manageStudent"><li><u>Manage Students</u></li></a>
				<a href="?action=manageFaculty"><li><u>Manage Faculty</u></li></a>
				<a href="?action=manageCC"><li><u>Manage Course Coordinators</u></li></a>
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
					<a href="?action=createCC">Create new course coordinator account</a>
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
								<td><a href="">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
							<tr>
								<td>Dr</td>
								<td>Cliff</td>
								<td>Diver</td>
								<td><a href="">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
							<tr>
								<td>Mrs</td>
								<td>Patty</td>
								<td>Whack</td>
								<td><a href="">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
						</table>
					<form method="" action="home.php">							
						<p class="submit" style="text-align: center"><input type="submit" value="Back"></p>
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
					<a href="?action=createFaculty">Create new faculty account</a>
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
								<td><a href="">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
							<tr>
								<td>Dr</td>
								<td>Luke</td>
								<td>Warm</td>
								<td><a href="">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
							<tr>
								<td>Dr</td>
								<td>Will</td>
								<td>Power</td>
								<td><a href="">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
							<tr>
								<td>Mrs</td>
								<td>Tara</td>
								<td>Zona</td>
								<td><a href="">Edit</a></td>
								<td><a href="">Delete</a></td>
							</tr>
						</table>
					<form method="" action="home.php">							
						<p class="submit" style="text-align: center"><input type="submit" value="Back"></p>
					</form>
				</div>
					
					
				
			
			';
}

function manageStudent() {
	echo'
			
		<div class="CSSTableGenerator" >
			<h3>Manage Student Accounts</h3>
			</br>
			</br>
			<a href="?action=createStudent">Create new student account</a>
			</br>
			</br>
			
			
	
				
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
						<td><a href="">Edit</a></td>
						<td><a href="">Delete</a></td>
					</tr>
					<tr>
						<td>Robin</td>
						<td>Banks</td>
						<td><a href="">Edit</a></td>
						<td><a href="">Delete</a></td>
					</tr>
					<tr>
						<td>Will</td>
						<td>Power</td>
						<td><a href="">Edit</a></td>
						<td><a href="">Delete</a></td>
					</tr>
					<tr>
						<td>Mary</td>
						<td>Christmas</td>
						<td><a href="">Edit</a></td>
						<td><a href="">Delete</a></td>
					</tr>
				</table>
			<form method="" action="home.php">							
				<p class="submit" style="text-align: center"><input type="submit" value="Back"></p>
			</form>
		</div>																	
	';
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
					<p>Course 1:<input type="text" name="course1" ></p>
					<p>Course 2(leave blank if necessary):<input type="text" name="course2" ></p>
					<p>Course 3(leave blank if necessary):<input type="text" name="course2" ></p>
					<p>Faculty Privileges: <input type="checkbox" name="isFaculty" value="Faculty"></p>
					<p class="submit"><input type="submit" name="commit" value="Submit"></p>
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
					<p>Course 1:<input type="text" name="course1" ></p>
					<p>Course 2(leave blank if necessary):<input type="text" name="course2" ></p>
					<p>Course 3(leave blank if necessary):<input type="text" name="course2" ></p>
					<p class="submit"><input type="submit" name="commit" value="Submit"></p>
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
					<p>Course 1:<input type="text" name="course1" ></p>
					<p>Course 2(leave blank if necessary):<input type="text" name="course2" ></p>
					<p>Course 3(leave blank if necessary):<input type="text" name="course2" ></p>
					<p class="submit"><input type="submit" name="commit" value="Submit"></p>
				</form>
			</div>';
}
	
	
?>

