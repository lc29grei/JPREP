<?php
  session_start();
  
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    if($_POST['prefix']!=null)
	{
		$new_prefix = mysql_real_escape_string($_POST['prefix']);
	}
	else $new_prefix = $_SESSION['prefix'].'';
    
	if($_POST['fname']!=null)
	{
		$new_firstname = mysql_real_escape_string($_POST['fname']);
	}
	else $new_firstname = $_SESSION['first_name'].'';
	
	if($_POST['lname']!=null)
	{
		$new_lastname = mysql_real_escape_string($_POST['lname']);
	}
	else $new_lastname = $_SESSION['last_name'].'';
	
	if($_POST['email']!=null)
	{
		$new_username = mysql_real_escape_string($_POST['email']);
	}
	else $new_username = $_SESSION['username'].'';
	
 	$new_password = $_SESSION['password'].'';
	
	if($_POST['secQ']!=null)
	{
		$new_secq = mysql_real_escape_string($_POST['secQ']);
	}
	else $new_secq = $_SESSION['secQ'].'';
	
	if($_POST['secA']!=null)
	{
		$new_seca = mysql_real_escape_string($_POST['secA']);
	}
	else $new_seca = $_SESSION['secA'].'';
	
	
	
	$sql = 'UPDATE users
			SET 
			prefix="'.$new_prefix.'",
			first="'.$new_firstname.'",
			last="'.$new_lastname.'", 
			secQ="'.$new_secq.'", 
			secA="'.$new_seca.'",
			username="'.$new_username.'",
			password="'.$new_password.'"
			WHERE username="'.$_SESSION['username'].'"';
	mysql_select_db('jprep');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not update data: ' . mysql_error());
	}
	echo "Updated data successfully\n";
	
	$username = $new_username;
    $password = $new_password;
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
	mysql_close($conn);

	header("location:home.php#tab5");	
  }
?>