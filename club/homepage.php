<?php	
	session_start();
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
	
	$documents = $cpsSimple->search('<username>'.$_SESSION['username'].'</username>',null,null,null,null,DOC_TYPE_ARRAY);
	
	?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Club </title>
<link href="Images/logo2.png" rel="icon" />
<link rel="stylesheet" href="Styles/Style.css" />
<script src="js/jquery.min.js"></script>
<script src="js/homepage.js"></script>
</head>

<body>
	<div class="container">
		<div id="top-border" > 
			<img src="images/star.png" class="float-left"  />
			<b class="text">lub</b>
			 <input type="submit" id="button" value="Search" /> 
 			 <input type="search" class="search" placeholder="Search"/> 
 		</div>
    	
    </div>
    <div id="top2-border" align="center" >
    	<div class="filler">
        </div>
    	<div class="menu-border" align="center" >
        <b>Home</b> 
        </div>
        <div class="menu-border2" align="center" >
        <b>Newsfeed</b> 
        </div>
        <div class="menu-border2" align="center" >
        <b>Friends</b> 
        </div>
        <div class="menu-border2" align="center" >
        <b>Chats</b> 
        </div>
    </div>
    	<div id="news-top">
        </div>
    <div class="newsfeed-container" align="center">
    	
        <div class="newsfeed-clubtile">
        	<img src="clubs/Images/platinum.jpg" width="400p" />
        </div>
        <div class="newsfeed-clubtile">
        	<img src="clubs/Images/gold.jpg" width="400" />
        </div>
        <div class="newsfeed-clubtile">
        	<img src="clubs/Images/Silver.jpg" width="400" />
        </div>
        <div class="newsfeed-clubtile">
        	<img src="clubs/Images/myclub.jpg" width="400" />
        </div>
        <div class="newsfeed-clubtile">
        </div>
        <div class="newsfeed-clubtile">
        </div>
        <div class="newsfeed-clubtile">
        </div>
        <div class="newsfeed-clubtile">
        </div>
    </div>
    <div class="profile-container" >
        <div class="profile-hide">
        </div>
    	<div class="cover">
        	<div class="cover-picture">
        		<img src="Images/Cover-default.jpg" width="450px" height="250" />
        	</div>
            <div class="profile-pic" align="center">
            	<img src="Images/Profile-default.jpg" height="150"/>
        	</div>
            <div class="name-box">
            	<?php 
					$document = $cpsSimple->lookupSingle('id1', array('username' => $_SESSION['username']));
					foreach ($documents as $id => $document)
						echo @$document['name'];?>
            </div>
        </div>
        <div class="profile-detail">
        </div>
    </div>
    


    
</body>
</html>
