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
	
	var_dump($_POST);
	
	$document = array(
	'name' => $_POST['name'],
	'username'=> $_POST['username'],
	'password'=>$_POST['password'],
	'email'=>$_POST['email'],
	'gender'=>$_POST['gender'],
	'contact'=>$_POST['mobno']
	
);

header("location:signup2.html");
// Insert
$cpsSimple->insertSingle(uniqid(), $document);