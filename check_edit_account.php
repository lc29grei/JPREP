<?php
  session_start();
  
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  mysql_select_db('jprep');
  
  if (isset($_GET['action']) && $_GET['action'] != 'create'){
  $selectedUser = $_GET['id'];
  $new_prefix = mysql_result(mysql_query('SELECT prefix FROM users WHERE email="'.$selectedUser.'"'),0);
  $new_firstname = mysql_result(mysql_query('SELECT first FROM users WHERE email="'.$selectedUser.'"'),0);
  $new_lastname = mysql_result(mysql_query('SELECT last FROM users WHERE email="'.$selectedUser.'"'),0);
  $new_username = mysql_result(mysql_query('SELECT email FROM users WHERE email="'.$selectedUser.'"'),0);
  $new_secq = mysql_result(mysql_query('SELECT secQ FROM users WHERE email="'.$selectedUser.'"'),0);
  $new_seca = mysql_result(mysql_query('SELECT secA FROM users WHERE email="'.$selectedUser.'"'),0);
  }
  if($_SERVER['REQUEST_METHOD'] == "POST") {
  	if ((isset($_GET['role']) && $_GET['role'] == 'cc') || (isset($_GET['role']) && $_GET['role'] == 'f')){
    if($_POST['prefix']!=null)
	{
		$new_prefix = mysql_real_escape_string($_POST['prefix']);
	}
    }
	if($_POST['fname']!=null)
	{
		$new_firstname = mysql_real_escape_string($_POST['fname']);
	}
	
	if($_POST['lname']!=null)
	{
		$new_lastname = mysql_real_escape_string($_POST['lname']);
	}
	
	if(($_POST['email']!=null) && ($_POST['confirm_email']==$_POST['email']))
	{
		$new_username = mysql_real_escape_string($_POST['email']);
	}
	
	if($_POST['secQ']!=null)
	{
		$new_secq = mysql_real_escape_string($_POST['secQ']);
	}
	
	if($_POST['secA']!=null)
	{
		$new_seca = mysql_real_escape_string($_POST['secA']);
	}
	
	if(isset($_POST['isFaculty'])) {
		$isFaculty = "f";
	} else $isFaculty = null;
	
	if(isset($_POST['isCC'])) {
		$isCC = "c";
	} else $isCC = null;


	if (isset($_GET['action']) && $_GET['action'] == 'create'){
		if (isset($_GET['role']) && $_GET['role'] == 'cc'){
			$sql = 'INSERT INTO users VALUES ("'.$new_username.'","test",1,"c","'.$new_prefix.'","'.$new_firstname.'","'.$new_lastname.'","'.$new_secq.'","'.$new_seca.'","c","'.$isFaculty.'")';
		} else if (isset($_GET['role']) && $_GET['role'] == 'f'){
			$sql = 'INSERT INTO users VALUES ("'.$new_username.'","test",1,"f","'.$new_prefix.'","'.$new_firstname.'","'.$new_lastname.'","'.$new_secq.'","'.$new_seca.'","f","'.$isCC.'")';
		} else {
			$sql = 'INSERT INTO users VALUES ("'.$new_username.'","test",1,"s",NULL,"'.$new_firstname.'","'.$new_lastname.'","'.$new_secq.'","'.$new_seca.'","s",NULL)';
		}
	} else {
		$sql = 'UPDATE users
			SET 
			prefix="'.$new_prefix.'",
			first="'.$new_firstname.'",
			last="'.$new_lastname.'", 
			secQ="'.$new_secq.'", 
			secA="'.$new_seca.'",
			email="'.$new_username.'"
			WHERE email="'.$selectedUser.'"';
	}
	
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not update data: ' . mysql_error());
	}
	echo "Updated data successfully\n";
	
	mysql_close($conn);

	if (isset($_GET['role']) && $_GET['role'] == 'cc'){
		header("location:home.php?action=manageCC&#tab2");
	} else if (isset($_GET['role']) && $_GET['role'] == 'f'){
		header("location:home.php?action=manageFaculty&#tab2");
	} else {
		header("location:home.php?action=manageStudent&#tab2");
	}
}		
?>