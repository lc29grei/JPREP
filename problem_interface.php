<?php
// Create the page template
function displayPage()
{
	echo'<!DOCTYPE html>
		<head>
			<title> Answer Question </title>
			<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
			<script language="javascript" src="list.js"></script>
			<link href="./css/style_home.css" rel="stylesheet" type="text/css">
		</head>
		<body>
			<h1 class="header">
				<img src="./jprep_logo.jpg" width="200" height="75"/>
				You are currently logged in as a STUDENT		
				<p class="header-name">
					Welcome, John
					<a href="#">Logout</a>
				</p>
			</h1>
			
			<ul class="tabs">
				<li><a href="#">Courses</a></li>
				<li><a href="#">Gradebook</a></li>
				<li><a href="#">Profile</a></li>
			</ul>
			
			<div class="panes">
				<p> Hello, World! </p>
			</div>
			
			<div class="footer">
				<p>Created by Delta Tech</p>
				<a href="http://oraserv.cs.siena.edu/~perm_deltatech/#/home"><img src="./DeltaTech-Logo.png" width="50" height="30"/></a>
				<br/>
			</div>
				<p>Copyright &copy; 2013 Delta Tech. All Rights Reserved</p>
		</body>
	</html>';
}

displayPage();
?>