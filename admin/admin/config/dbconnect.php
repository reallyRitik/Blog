<?php 
class Dbconnect 
{ 
	function connect()
	{
		 $link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		 return $link;
	}
}
?>