<?php
include_once 'dbconnect.php';  
class Category
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

  	function getCategory()
  	{
      if($this->memberID)
      {
         $i = 0; $data = array();
         $sel = mysqli_query($this->db, "select * from category where is_deleted = '0' order by id desc");
         while($arr = mysqli_fetch_array($sel))
         {
            $data[$i]['id']               = $arr['id'];
            $data[$i]['category']         = $arr['category'];
            $data[$i]['page_title']       = $arr['page_title'];
            $data[$i]['page_description'] = $arr['page_description'];
            $data[$i]['page_keyword']     = $arr['page_keyword'];
            $data[$i]['other_meta_tags']  = $arr['other_meta_tags'];
            $data[$i]['added_date']       = $arr['added_date'];
            $i++; 
         }
         return json_encode($data, true);
      }
  	}

    function addCategory($category,$page_title,$page_description,$page_keyword,$other_meta_tags)
    {
      $category_new = strtolower(str_replace(" ", "-", $category));
      $current_date = date('Y-m-d');
      $insert = mysqli_query($this->db, "insert into category(category,category_url,added_date,page_title,page_description,page_keyword,other_meta_tags)values('$category','$category_new','$current_date','$page_title','$page_description','$page_keyword','$other_meta_tags')");
      if ($insert) {
        return true; 
      }
    }

    function deleteCategory($categoryId)
    {
      $delete = mysqli_query($this->db, "UPDATE category SET is_deleted = '1' WHERE id = '$categoryId'");
      if ($delete) {
        return true; 
      }
    }

    function editCategory($category,$categoryId,$page_title,$page_description,$page_keyword,$other_meta_tags)
    {
      $category_new = strtolower(str_replace(" ", "-", $category));
      $edit = mysqli_query($this->db, "UPDATE category SET category = '$category', category_url = '$category_new', page_title = '$page_title', page_description = '$page_description', page_keyword = '$page_keyword', other_meta_tags = '$other_meta_tags' WHERE id = '$categoryId'");
      if ($edit) {
        return true; 
      }
    }
}