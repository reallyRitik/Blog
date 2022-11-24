<?php
//include 'dbconnect.php';
class Modal
  {
     private $db;
     private $memberID;
    
     function __construct()
       {
          $dbo      = new Dbconnect();
          $this->db = $dbo->connect();
          if (!empty($_SESSION['bloguser']))
            {
               $this->memberID = $_SESSION['bloguser'];
            }
          else
            {
               $this->memberID = 0;
            } 
       }

       function updatetable($table, $column, $condition)
       {
       	     mysqli_query($this->db,"update $table set $column $condition");
       	     if(mysqli_affected_rows($this->db)>0)
             {
                return true;
             }
             else
             {
             	return false;
             }
       }
  }