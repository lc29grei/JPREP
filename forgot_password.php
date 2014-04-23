
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
</head>
<body>
  <section class="container">
    <img class="logo-center" src="./jprep_logo.png" width="200" height="75"/>
    <div class="login">
      <h1>Reset your password</h1>
      <form method="POST" action="forgot_password_security.php">
      	<p>Enter your username</p>
      	<p><input type="text" name="username" placeholder="Username"></p>
      	<p class="submit"><input type="submit" name="next" value="Next"></p>
      </form>
    </div>
  </section>
</body>
</html>';

