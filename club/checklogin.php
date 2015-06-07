 <?php
	
	require_once('php_cps_api/cps_simple.php');
 	require_once('php_cps_api/cps_api.php');
	
	$connectionStrings = array(	
	  'tcp://cloud-eu-0.clusterpoint.com:9007',	
	  'tcp://cloud-eu-1.clusterpoint.com:9007',	
	  'tcp://cloud-eu-2.clusterpoint.com:9007',	
	  'tcp://cloud-eu-3.clusterpoint.com:9007',	
	);	
	$cpsConn = new CPS_Connection(new CPS_LoadBalancer($connectionStrings), 'users', 'akhil.rajeev@yahoo.com', 'akhil@123', 'document', '//document/id', array('account' => 907));	

	//$cpsConn->setDebug(true);	
	$cpsSimple = new CPS_Simple($cpsConn);	
		
		// username and password sent from form 
		$myusername=$_POST['username'];  
		$mypassword=$_POST['password']; 
		
		// To protect MySQL injection (more detail about MySQL injection)
		$myusername = stripslashes($myusername);
		$mypassword = stripslashes($mypassword);
		$myusername = mysql_real_escape_string($myusername);
		$mypassword = mysql_real_escape_string($mypassword);
		
		$count=0;
		
		$documents = $cpsSimple->search('<name>'.$myusername.'</name><password>'.$mypassword.'</password>',null,null,null,null,DOC_TYPE_ARRAY);
		//echo '<name>'.$myusername.'</name><password>'.$mypassword.'</password>';
		
		var_dump($documents);
		
		$count=count($documents);
		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count==1){
			session_start();
			// Register $myusername, $mypassword and redirect to file "login_success.php"
			$_SESSION['username']= $myusername;
			header("location:homepage.php");
		}
		else
		 header("location:login.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Celebe Login</title>
<link href="layout.css" rel="stylesheet" type="text/css" />
</head>
 
<body>
	<div id="background"></div>
    <div id=login-box align="center"> 
    	<img src="finalceleb/logo.png" id="logo" width="70%" />
        <div id="login" align="left">
            <form>
            	<label for="username">Mobile Number</label><br />
                <input type="text" required="required" id="username"><br  /><br  />
            	<label for="password">Password</label><br />
                <input type="password" required="required" id="password">
            </form>
        </div>
    </div>
</body>
</html>
