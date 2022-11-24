<?php
include 'dbconnect.php';  
class Users
{
	private $db;
	function __construct()
	{
		 $dbo = new Dbconnect();
		 $this->db = $dbo->connect();
	}

	function login()
	{

	}
     
    function isUserExist($username, $password)
    {
       $password = md5($password);
       $data = array();
       $sel = mysqli_query($this->db, "select id from users where username = '$username' and password = '$password'");
       if(mysqli_num_rows($sel)>0)
       {
       	   $users = mysqli_fetch_array($sel);
       	   $data['success'] = true;
       	   $data['id']      = $users['id']; 
       }
       else
       {
       	   $data['success'] = false;
       }
       return $data;
    }
}
?>