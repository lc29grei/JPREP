<?php
session_start();
if (!(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']!='')) {
		header ("Location: login.php");
	}
if (!isset($_SESSION['answer'])) $_SESSION['answer'] = "N,N,N";
$cmdOutput = split(",", $_SESSION['answer']);

// Create the page template
function displayPage()
{
	global $cmdOutput;
	echo'<!DOCTYPE html>
		<head>
			<title> Answer Question </title>
			<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
			<script language="javascript" src="list.js"></script>
			<link href="./css/style_home.css" rel="stylesheet" type="text/css">
		</head>
		<body>
			<h1 class="header">
				<img src="./jprep_logo.png" width="200" height="75"/>
				You are currently logged in as a STUDENT		
				<p class="header-name">
					Welcome, John
					<a href="./logout.php">Logout</a>
				</p>
			</h1>
			
			<ul class="tabs">
				<li><a href="#">Courses</a></li>
				<li><a href="#">Gradebook</a></li>
				<li><a href="#">Profile</a></li>
			</ul>
			
			<div class="panes">
				<div>
					<h1>Source Code Input</h1>
					<form method="post" action="codeinput.php">
					<textarea name="source" rows="10" cols="70" style="resize:none;">public int sum(int a, int b) {
    
}</textarea>
				</br>
				<input type="submit" />
				</form>
				
				<table border="1" style="width:300px">
					<tr>
						<td> Input </td>
						<td> Output </td>
						<td> Expect </td>
					</tr>
					<tr>
						<td> 5 + 4 </td>
						<td> ' . $cmdOutput[0] . '</td>
						<td> 9 </td>
					</tr>
					<tr>
						<td> 1 + 1 </td>
						<td> ' . $cmdOutput[1] . '</td>
						<td> 2 </td>
					</tr>
					<tr>
						<td> 2 + 8 </td>
						<td> ' . $cmdOutput[2] . '</td>
						<td> 10 </td>
					</tr>
				</table>
				</div>
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
			</div>
				<p>Copyright &copy; 2013 Delta Tech. All Rights Reserved</p>
		</body>
	</html>';
}
/*
 * To automate this with a database have a function that makes calls to a database
 * and populates an array with the necessary information needed to construct the
 * answer question page. Then pass those variables into display page for it to be
 * constructed dynamically.	
 */
displayPage();
?>