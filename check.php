<?php
  session_start();
  $_SESSION = array();
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    mysql_connect("localhost","root","");
    @mysql_select_db("jprep") or die( "Unable to connect to database");
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $result = mysql_query("SELECT * FROM users WHERE username='$username' AND
      password='$password'");
	$accounttype = mysql_result(mysql_query("SELECT type FROM users WHERE username='$username' AND password='$password'"),0)."";
	
	
	mysql_result($result, 2);
	

    if(mysql_num_rows($result) > 0) {
      $_SESSION['is_logged_in'] = 1;
    }
  }

  if($_SESSION['is_logged_in']==1) {
	$_SESSION['testvar']=$accounttype;
	if($accounttype=="student") header("location:student_home.php");
	else if ($accounttype=="faculty") header("location:faculty_home.php");
	else if ($accounttype=="coursecoordinator") header("location:coursecoordinator_home.php");
	else header("location:admin_home.php");
  } else {
    header("location:login.php");
	session_destroy();
	$_SESSION = array();
  }
?>