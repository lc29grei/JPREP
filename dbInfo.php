<?php
	#comment this info out when running JPREP on oraserv server
  	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db("jprep") or die( "Unable to connect to database");
	
	
	#comment this info out when running JPREP on local server
  	#$conn = mysql_connect("oraserv.cs.siena.edu", "perm_deltatech", "firmly+attend*gale");
	#mysql_select_db("perm_deltatech") or die( "Unable to connect to database");
?>