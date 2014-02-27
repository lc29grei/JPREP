<?php
  session_start();
  $_SESSION = array();
  if($_SERVER['REQUEST_METHOD'] == "POST") {
  	#mysqli_connect("oraserv.cs.siena.edu","perm_deltatech","firmly+attend*gale","perm_deltatech");
   	mysql_connect("localhost","root","");
    @mysql_select_db("jprep") or die( "Unable to connect to database");
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $result = mysql_query("SELECT * FROM users WHERE username='$username' AND
      password='$password' AND active=1");
	$accounttype = mysql_result(mysql_query("SELECT type FROM users WHERE username='$username' AND password='$password'"),0)."";
	$firstName = mysql_result(mysql_query("SELECT first FROM users WHERE username='$username' AND password='$password'"),0)."";
	$lastName = mysql_result(mysql_query("SELECT last FROM users WHERE username='$username' AND password='$password'"),0)."";
	$prefix = mysql_result(mysql_query("SELECT prefix FROM users WHERE username='$username' AND password='$password'"),0)."";
	$secQ = mysql_result(mysql_query("SELECT secQ FROM users WHERE username='$username' AND password='$password'"),0)."";
	$secA = mysql_result(mysql_query("SELECT secA FROM users WHERE username='$username' AND password='$password'"),0)."";
	
	$_SESSION['username']=$username.'';
	$_SESSION['account_type']=$accounttype.'';
	$_SESSION['first_name']=$firstName.'';
	$_SESSION['last_name']=$lastName.'';
	$_SESSION['prefix']=$prefix.'';
	$_SESSION['secQ']=$secQ.'';
	$_SESSION['secA']=$secA.'';
	$_SESSION['password']=$password.'';
	
	mysql_result($result, 2);
	

    if(mysql_num_rows($result) > 0) {
      $_SESSION['is_logged_in'] = 1;
    }
  }

  if($_SESSION['is_logged_in']==1) {
	$_SESSION['testvar']=$accounttype;
	if($accounttype=="student") header("location:home.php");
	else header("location:home.php");
  } else {
    header("location:invalid_credentials.php");
	session_destroy();
	$_SESSION = array();
  }
?>