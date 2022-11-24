<?php
include '../config/config.php';


if(!empty($_POST['removethumbnail']))
{
	 include '../config/blog.php';
	 $id  = $_POST['removethumbnail'];

	 $obj = new Blog();
	 if($obj->removethumbnail($id))
	 {
        echo "<script>location.reload();</script>";
	 }

}


if(isset($_POST['deleteblog']))
{
	 $id  =  $_POST['deleteblog']; 
	 include '../config/blog.php';
	 
	 $obj = new Blog();
	 if($obj->removeblog($id))
	 {
         echo "<script>location.reload();</script>";
	 }
}