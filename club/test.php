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

//$query = CPS_Term('name','akhilr');
$documents = $cpsSimple->search('*',null,null,null,null,DOC_TYPE_ARRAY);
echo "<pre>";
var_dump($documents);
echo "</pre>";
$document = $cpsSimple->lookupSingle('id1', array('name' => 'akhilr'));
foreach ($documents as $id => $document)
	echo @$document['name'];

?>