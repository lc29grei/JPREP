<?php
function headerLayout($currentrole, $firstname) {
$role2=$_SESSION['role2'];
echo'
	<head>
		<title>Welcome to JPREP</title>
		<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
		<script language="javascript" src="list.js"></script>
		<script language="javascript" src="script.js"></script>
		<link href="./css/style_home.css" rel="stylesheet" type="text/css">	
		


		<script>
			function goBack() {
				window.history.back();
			};
			
			function goBackTwice() {
				window.history.go(-2);
				
			};
			
			function changeRole(val) {
				window.location.href="./home.php";
			};
			function chooseCC(selected_name) {
				if (document.getElementById(selected_name).checked) {
					document.getElementById("chooseCCdiv").style.display="none";
				} else {
					document.getElementById("chooseCCtext").innerHTML="Choose a new Course Coordinator for " + selected_name + ": ";
					document.getElementById("chooseCCdiv").style.display="block";
				}
			};
			function chooseFaculty(selected_name) {
				if (document.getElementById(selected_name).checked) {
					document.getElementById("chooseFacultydiv").style.display="none";
				} else {
					document.getElementById("chooseFacultytext").innerHTML="Choose a new Faculty user for " + selected_name + ": ";
					document.getElementById("chooseFacultydiv").style.display="block";
				}
			};
		</script>	
	</head>
	<body>		
		<h1 class="header">
			<a href="./home.php"><img src="./jprep_logo.png" width="200" height="75"/></a>
			<p class="header-name">
					Welcome, '.$firstname.'
					
					<a href="./logout.php">Logout</a>
			</p>
			</br>';
			if($currentrole=="f") {
				echo '<span>You are currently logged in as a FACULTY
					';
					if ($role2!=NULL) {
					  echo'<form method="POST" style="display:inline;padding-left:15px;" action="check_change_role.php">
					  			<input type="submit" value="Switch to Course Coordinator">
					  		</form>';
					  }
			}
			else if($currentrole=="c") {
				echo '<span>You are currently logged in as a COURSE COORDINATOR
					';
					if ($role2!=NULL) {
					  echo'<form method="POST" style="display:inline;padding-left:15px;" action="check_change_role.php">
					  			<input type="submit" value="Switch to Faculty">
					  		</form>';
					  }
			}
			else if($currentrole=="s"){
				echo'<span>You are currently logged in as a STUDENT';}
			else 
				echo'<span>You are currently logged in as a ADMIN';
				
			echo'			
			</span>			
		</h1>		
		</div>
		<ul class="tabs">
			<li><a id="courses" href="#tab1">Courses</a></li> ';	
			
			if($currentrole=="a"){ echo '<li><a id="manageAccounts" href="#tab2">Manage Accounts</a></li>';}
			else echo '<li style="visibility: hidden; display:none;"><a href="#">Manage Accounts</a></li> ';
						
			if($currentrole=="s"){ echo '<li style="visibility: hidden; display:none;"><a href="#">Question Pool</a></li> ';}
			else echo '<li><a id="questionPool" href="#tab3">Question Pool</a></li>';

			if($currentrole=="a" or $currentrole=="c"){ echo '<li style="visibility: hidden; display:none;"><a href="#">Gradebook</a></li> ';}
			else echo '<li><a id="gradebook" href="#tab4">Gradebook</a></li>';
			

		echo'<li><a id="profile" href="#tab5">Profile</a></li>
			</ul>
	
			<div class="panes">';
	}
	
	function footerLayout() {
		echo'
			</div>
	
	
	<script>
		$(function() {
			$("ul.tabs").tabs("div.panes > div", { history: true });
		});
	</script>
	
	<div class="footer">
		<p>Created by Delta Tech</p>
		<a href="http://oraserv.cs.siena.edu/~perm_deltatech/#/home"><img src="./DeltaTech-Logo.png" width="50" height="30"/></a>
		<br/>
		<p>Copyright &copy; 2013-2014 Delta Tech. All Rights Reserved</p>
	</div>
	</body>';
	}
?>