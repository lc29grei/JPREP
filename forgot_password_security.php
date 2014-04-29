
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"> <!--<![endif]-->
<?php 
	include 'dbInfo.php';
	
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>JPREP Login</title>
  <link rel="stylesheet" href="css/style1.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <script>
  	function goLogin() {
		window.location.href="./login.php";
	};
  </script>
</head>
<body>
  <section class="container">
    <img class="logo-center" src="./jprep_logo.png" width="200" height="75"/>
    <div class="login">
      <h1>Reset your password</h1>
<?php
		include 'dbInfo.php';
		$email = "";
		$answerErr = "";
		$usernameErr = "";
		$validUsername = false;
		$correct = false;
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$email = $_POST['username'];
			$forgotPass = mysql_query('SELECT * FROM users WHERE email="'.$email.'"',$conn);
			if(! $forgotPass ) {
	  			die('Could not update data: ' . mysql_error());
			}
			$row = mysql_fetch_array($forgotPass);
			if(isset($_GET['action']) && $_GET['action'] == 'check'){
				$poop = mysql_query('SELECT * FROM users WHERE email="'.$email.'"',$conn);
				$numRows = mysql_num_rows($poop);
				if ($numRows==1) $validUsername = true;
				else {
					$usernameErr = "Username does not exist";
					$validUsername = false;
				}
			}
			
			if(isset($_GET['action']) && $_GET['action'] == 'security'){
				if (empty($_POST['answer'])) {
					$answerErr = "Enter the answer to your security question";
					$validUsername = true;
				} else if ($_POST['answer'] != $row['secA']) {
					$answerErr = "Incorrect answer";
					$validUsername = true;
				} else {
					$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
					$password = substr(str_shuffle($chars),0,10);
					$changePassSQL = mysql_query('UPDATE users SET password="'.$password.'" WHERE email="'.$email.'"',$conn);
					if(! $changePassSQL ) die('Could not update data: ' . mysql_error());
					$correct = true;
					$validUsername = true;
					$adminEmail = mysql_result(mysql_query('SELECT email FROM users WHERE role1="a"',$conn),0)."";
					$subject = "JPREP Password Reset";
					$message = "Dear ".$row['first'].",\n\nYou have successfully reset your password for your account on JPREP.\nYour new password is:".$password."\nWe recommend that you log into JPREP using the password above and change your password to something different.\n\n\nRegards,\n\nDelta Tech";
					$msg = wordwrap($message, 70);
					mail($email, $subject, $msg, "From: ".$adminEmail."\n");
				}
			} else {
				$answerErr = "";
			}
			
		}
		if ($validUsername==true) {
		if ($correct) {
			echo'<form method="" action="login.php">
					<p style="text-align:center;">Your password has been successfully reset and sent to you in an email.</p>
					<p class="submit"><input type="submit" value="OK"></p>
				</form>';
		} else {
			echo'<form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?action=security">
      			<input type="text" style="display:none;" name="username" value="'.$email.'">
      			<p>Security Question: '.$row['secQ'].'</p>
        		<p><input type="text" name="answer" placeholder="Answer"></p>
        		<p><span style="font-size:12px;color:#FF0000;text-align:center;">'.$answerErr.'</span></p>
        		<p class="submit"><input type="button" name="cancel" onClick="goLogin()" value="Cancel"> <input type="submit" name="reset" value="Reset Password"></p>
        		<p style="font-size:12px;text-align:center;">Your new password will be sent to you in an email</p>
      		</form>';
      	}
      	} else {
      		echo'<form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?action=check">
      				<p>Enter your username</p>
      				<p><input type="text" name="username" placeholder="Username"></p>
      				<p><span style="font-size:12px;color:#FF0000;text-align:center;">'.$usernameErr.'</span></p>
      				<p class="submit"><input type="submit" name="next" value="Next"></p>
      			</form>';
      	}
?>
    </div>
  </section>
</body>
</html>';

