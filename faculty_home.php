<!DOCTYPE HTML>

<head>

	<title>Welcome to JPREP</title>
	<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
	<script language="javascript" src="list.js"></script>
	<link href="./css/style_home.css" rel="stylesheet" type="text/css">
	
</head>

<body>
	
	<h1 class="header">
		<img src="./jprep_logo.jpg" width="200" height="75"/>
		You are currently logged in as a FACULTY		
		<select>
			<option>Faculty</option>
			<option>Course Coordinator</option>
		</select>
		<p class="header-name">
				Welcome, John
				
				<a href="./login.php">Logout</a>
		</p>
	</h1>
	
	</div>
	<ul class="tabs">
		<li><a href="#">Courses</a></li>
		<li><a href="#">Gradebook</a></li>
		<li><a href="#">Profile</a></li>
	</ul>

	<div class="panes">
		<div>
			<p><b><u>Current Courses</u></b></p>
			<b><a ID="xproducts" href="javascript:Toggle('products');">[+]</a>Products</b><br>
   			<div ID="products" style="display:none; margin-left:2em;">
   				<a href="">Product List</a><br>
  				<a href="">Order Form</a><br>
   				<a ID="xspecs" href="">Specifications<br></a>
   			<div ID="specs" style="display:none; margin-left:2em">
      			<a href="">Old Products</a><br>
      			<a href="">New Products</a><br>
   			</div>
   				<a href="">Price List</a><br>
   			</div>
<b><a ID="xsupport" href="javascript:Toggle('support');">[+]</a>
   Support</b><br>
   <div ID="support" style="display:none; margin-left:2em;">
   <a href="tech.html">Technical Support</a><br>
   <a href="sforum.html">Support Forum</a><br>
   <a href="sforum.html">Contact Support</a><br>
</div>
<b><a ID="xcontact" href="javascript:Toggle('contact');">[+]</a>
   Contact Us</b>
<div ID="contact" style="display:none; margin-left:2em;">
   <a href="contact1.html">Sales Department</a><br>
   <a href="contact2.html">Service Department</a><br>
   <a href="contact3.html">Marketing Department</a><br>
</div>
		</div>
		<div>
			<p>Select a course to view your grade</p>
			<ul>
				<li><u>Course 1</u></li>
				<li><u>Course 2</u></li>
				<li><u>Course 3</u></li>
				<li><u>Course 4</u></li>
			</ul>
		</div>
		<div>
			<ul>
				<li>First Name: <span id="firstname">fname</span></li>
				<li>Last Name: <span id="lastname">lname</span></li>
				<li>Email Address: <span id="email">email</span></li>
				<li>Password: <span id="password">password</span></li>
				<li>Security Question: <span id="securityq">security q</span></li>
				<li>Security Answer: <span id="securitya">security a</span></li>
			</ul>
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
		<p>Copyright &copy; 2013 Delta Tech. All Rights Reserved</p>
	</div>
	
</body>

</html>