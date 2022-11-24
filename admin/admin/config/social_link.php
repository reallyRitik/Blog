<?php
include_once 'dbconnect.php';  
class Social_link
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

  	function get_social_link()
  	{
      if($this->memberID)
      {
         $i = 0; $data = array();
         $sel = mysqli_query($this->db, "select * from social_link where is_deleted = '0' order by id desc");
         while($arr = mysqli_fetch_array($sel))
         {
            $data[$i]['id']         = $arr['id'];
            $data[$i]['facebook']   = $arr['facebook'];
            $data[$i]['linkedin']   = $arr['linkedin'];
            $data[$i]['twitter']    = $arr['twitter'];
            $data[$i]['added_date'] = $arr['added_date'];
            $i++;
         }
         return json_encode($data, true);
      }
  	}

    function addLink($facebook,$linkedin,$twitter)
    {
      $current_date = date('Y-m-d');
      $insert = mysqli_query($this->db, "insert into social_link(facebook,linkedin,twitter,added_date)values('$facebook','$linkedin','$twitter','$current_date')");
      if ($insert) {
        return true; 
      }
    }

    function deleteSocialLink($social_link_id)
    {
      $delete = mysqli_query($this->db, "UPDATE social_link SET is_deleted = '1' WHERE id = '$social_link_id'");
      if ($delete) {
        return true; 
      }
    }

    function editLink($facebook,$linkedin,$twitter,$social_link_id)
    {
      $edit = mysqli_query($this->db, "UPDATE social_link SET facebook = '$facebook' , linkedin = '$linkedin' , twitter = '$twitter' WHERE id = '$social_link_id'");
      if ($edit) {
        return true; 
      }
    }
}