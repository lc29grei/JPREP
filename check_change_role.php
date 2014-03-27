<?php
  session_start();
  
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  
  	$currentrole=$_SESSION['currentrole'];
  	$role2=$_SESSION['role2'];
	$username=$_SESSION['username'];
	$password=$_SESSION['password'];

	if($_SERVER['REQUEST_METHOD'] == "POST") {
	if ($currentrole=="f") {
					$sql = 'UPDATE users
							SET 
							currentrole="c"
							WHERE email="'.$username.'"';
				mysql_select_db('jprep');
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
	  				die('Could not update data: ' . mysql_error());
				}
				echo "Updated data successfully\n";
	
				$currentrole = mysql_result(mysql_query("SELECT currentrole FROM users WHERE email='$username' AND password='$password'"),0)."";
	
				$_SESSION['currentrole']=$currentrole.'';
				mysql_close($conn);
	
	} else {
					$sql = 'UPDATE users
							SET 
							currentrole="f"
							WHERE email="'.$_SESSION['username'].'"';
				mysql_select_db('jprep');
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
	  				die('Could not update data: ' . mysql_error());
				}
				echo "Updated data successfully\n";
	
				$currentrole = mysql_result(mysql_query("SELECT currentrole FROM users WHERE email='$username' AND password='$password'"),0)."";
	
				$_SESSION['currentrole']=$currentrole.'';
				mysql_close($conn);

				}
  
  	header("location:home.php");
  	}
  ?>