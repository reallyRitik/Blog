<?php
include_once 'dbconnect.php';  
class Author
{
	  private $db;
  	private $memberID;
    function __construct()
    {
       $dbo = new Dbconnect();
       $this->db = $dbo->connect();
       if(!empty($_SESSION['bloguser']))
       {
            $this->memberID = $_SESSION['bloguser'];
       }
       else
       {
            $this->memberID = 0;
       }
    }

  	function getAuthor()
  	{
      if($this->memberID)
      {
         $i = 0; $data = array();
         $sel = mysqli_query($this->db, "select * from author_details where is_deleted = '0' order by id desc");
         while($arr = mysqli_fetch_array($sel))
         {
            $data[$i]['id'] = $arr['id'];
            $data[$i]['author'] = $arr['author'];
            $data[$i]['about_author'] = $arr['about_author'];
            $data[$i]['linkedin'] = $arr['linkedin'];
            $data[$i]['twitter'] = $arr['twitter'];
            $data[$i]['added_date'] = $arr['added_date'];
            $i++;
         }
         return json_encode($data, true);
      }
  	}

    function addAuthor($author,$about_author,$linkedin,$twitter)
    {
      $current_date = date('Y-m-d');
      $insert = mysqli_query($this->db, "insert into author_details(author,about_author,linkedin,twitter,added_date)values('$author','$about_author','$linkedin','$twitter','$current_date')");
      if ($insert) {
        return true; 
      }
    }

    function deleteAuthor($authorId)
    {
      $delete = mysqli_query($this->db, "UPDATE author_details SET is_deleted = '1' WHERE id = '$authorId'");
      if ($delete) {
        return true; 
      }
    }

    function editAuthor($author,$about_author,$authorId,$linkedin,$twitter)
    {
      $edit = mysqli_query($this->db, "UPDATE author_details SET author = '$author' , about_author = '$about_author' , linkedin = '$linkedin' , twitter = '$twitter' WHERE id = '$authorId'");
      if ($edit) {
        return true; 
      }
    }
}