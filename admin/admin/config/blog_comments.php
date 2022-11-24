<?php
include_once 'dbconnect.php';  
class BlogComments
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

  	function getComments()
  	{
      if($this->memberID)
      {
         $i = 0; $data = array();
         $sel = mysqli_query($this->db, "select * from comments where is_deleted = '0' order by id desc");
         while($arr = mysqli_fetch_array($sel))
         {
            $data[$i]['id']         = $arr['id'];
            $data[$i]['blog_id']    = $arr['blog_id'];
            $data[$i]['name']       = $arr['name'];
            $data[$i]['email']      = $arr['email'];
            $data[$i]['comment']    = $arr['comment'];
            $data[$i]['added_date'] = $arr['added_date'];
            $data[$i]['status']     = $arr['status'];
            $i++;
         }
         return json_encode($data, true);
      }
  	}

    function commentStatus($comment_id,$comment_status)
    {
      if($comment_status == 0){
        $new_comment_status = 1;
      }else{
        $new_comment_status = 0;
      }
      $delete = mysqli_query($this->db, "UPDATE comments SET status = '$new_comment_status' WHERE id = '$comment_id'");
      if ($delete) {
        return true; 
      }
    }
    
    function deleteComment($comment_id)
    {
      $delete = mysqli_query($this->db, "UPDATE comments SET is_deleted = '1' WHERE id = '$comment_id'");
      if ($delete) {
        return true; 
      }
    }

    function getBlogTitle($blog_id)
    {
      $sel   = mysqli_query($this->db, "select title from blogs where is_deleted = '0' and id = '$blog_id'");
      $fetch = mysqli_fetch_array($sel);
      // $title = $fetch['title']; 
      // return $title;
    }
    // function editAuthor($author,$about_author,$authorId,$linkedin,$twitter)
    // {
    //   $edit = mysqli_query($this->db, "UPDATE author_details SET author = '$author' , about_author = '$about_author' , linkedin = '$linkedin' , twitter = '$twitter' WHERE id = '$authorId'");
    //   if ($edit) {
    //     return true; 
    //   }
    // }
}