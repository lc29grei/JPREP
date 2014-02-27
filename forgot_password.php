
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"> <!--<![endif]-->

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
      <form method="POST" action="check.php">
      	<p>Security Question: What is your middle name?</p>
        <p><input type="text" name="username" placeholder="Username"></p>
        <p class="submit"><input type="submit" name="cancel" onClick="history.go(-1);return true;" value="Cancel"> <input type="submit" name="commit" value="Reset Password"></p>
        <p style="font-size:12px;text-align:center;">Your new password will be sent to you in an email</p>
      </form>
    </div>
  </section>
</body>
</html>';

