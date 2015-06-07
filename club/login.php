<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="favicon.png" rel="icon" type="image/png">
	<title>Welcome to Club</title>
<link href="layout.css" rel="stylesheet" type="text/css" />
</head>
 
<body>
	<div id="background"><img src="finalceleb/pic.png" height="85%" /></div>
    <div id=login-box align="center"> 
    	<img src="finalceleb/logo.png" id="logo" height="50%" />
        <div id="login" align="left">
            <form action="checklogin.php" method="post">
            	<br />
                <input name="username" type="text" required="required" id="username" placeholder="Username"><br  /><br  />
                <input name="password" type="password" required="required" id="password" placeholder="Password"><br /><br />
                <button type="submit" value="Login">Sign In</button>
            </form>
            <br />
        </div>
    <a href="signup.html">Create an account</a>
    </div>
</body>
</html>
