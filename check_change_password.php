<?php
  session_start();
  
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  
  if($_SERVER['REQUEST_METHOD'] == "POST") {
  
  	if(($_POST['oldpassword']!=null) and ($_POST['oldpassword'] == $_SESSION['password']))
	{
		if (($_POST['newpassword'] == $_POST['confirmpassword']) and ($_POST['newpassword']!=null) and ($_POST['confirmpassword']!=null)) {
		
			$new_password = mysql_real_escape_string($_POST['newpassword']);
		}
		else $new_password = $_SESSION['password'].'';
	}
	else $new_password = $_SESSION['password'].'';
	
	$sql = 'UPDATE users
			SET 
			password="'.$new_password.'"
			WHERE email="'.$_SESSION['username'].'"';
	mysql_select_db('jprep');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not update data: ' . mysql_error());
	}
	echo "Updated data successfully\n";
	
    $password = $new_password;
	
	$_SESSION['password']=$password.'';
	mysql_close($conn);

	header("location:home.php#tab5");	
  }
	
?>