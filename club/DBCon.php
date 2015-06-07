<?php
class DBCon{
	private static $username = "clubadmin";
	private static $password = "admin123";
	private static $host = "localhost";
	private static $db_name = "club";

	public function getConnection(){
			
		$con = mysql_connect(self::$host,self::$username,self::$password);
		if ($con){
			$db = mysql_select_db(self::$db_name);
			return $con; 
		}
		return  false;
			
	}
	public  function ExecuteQuerry($query){
		$con = self::getConnection();
		if ($con){
			$result =  mysql_query($query);
			mysql_close($con);
			return $result;
			
		}
		else {
			return false;
		}
	}
}
	?>