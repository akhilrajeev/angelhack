<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

					
					<?php 
						$allowedExts = array("gif", "jpeg", "jpg", "png");
						$error=0;
						$appid=0;
						
						if (preg_match('/[^a-zA-Z]+/', $_POST['username'])||strlen($_POST['username'])<4){
							echo '<span style="color:RED">Invalid Username</span>';
							$error++;
							exit();
						}
						else{
							$query="SELECT username FROM users WHERE username='".$_POST['username']."'";
							$result=$obj->ExecuteQuerry($query);
							$count=mysql_num_rows($result);
							if($count!=0){
								echo '<span style="color:RED">Username Not Available</span>';
								$error++;
								exit();
							}
						}
						
						
						$name=$_POST['name'];
						$username=$_POST['username'];
						$password=$_POST['password'];
						$email=$_POST['email'];
						$mobno=$_POST['mobno'];
						
						
						$query="SELECT MAX(`profileid`) AS 'profileid' FROM `userprofiles`";
						$result=$obj->ExecuteQuerry($query);
						if (!$result) {
							printf("Error: %s\n", mysqli_error());
							exit();
						}
						
						while($row = mysql_fetch_assoc($result)){
							$id=(int)$row['complainerid'];
							$id++;
						$id=(string)$id;
						//$id='99001';
						}
						
						$foldername='profiles/profile'.$id;
						mkdir($foldername);
						$userphotosrc='profiles/profile'.$id.'/photo.jpeg';
						$useridsrc='profiles/profile'.$id.'/id.jpg';
						
						if($error==0){
							$query="INSERT INTO `userprofile`(`profileid`,`username`, `name`, `email`, `mobno`) VALUES ($id,'$username','$name','$email', '$mobno')";
							$result=$obj->ExecuteQuerry($query);
							$query="INSERT INTO `login`(`username`, `password`) VALUES ('$username','$password')";
							$result=$obj->ExecuteQuerry($query);
							if (!$result)
								die('Some Error Occured5');
							else
								echo 'User account created successfully successfully!! <a href="login.php" style="color:#2195F3">Login to continue </a>';
						}
						else{
							echo "Some Error Occured!!";
						}
                    
					?>
                    
                    
</body>
</html>