<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 

	{
		session_start();
		if($_SESSION['username']!= "username")
			header("location:login.php");
		else
			header("location:homepage.html");

}
?>

<html>
<body>
Login Successful
</body>
</html>