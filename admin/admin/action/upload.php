<?php
include '../config/function.php';
include '../config/media.php';

if(!empty($_FILES['media']['name']))
{
     $obj     = new Media();
     $file    = $_FILES['media']['name'];
     $tmpfile = $_FILES['media']['tmp_name'];
	 $upload    = $obj->uploadmedia($file, $tmpfile);
	 echo $upload; 
}

?>