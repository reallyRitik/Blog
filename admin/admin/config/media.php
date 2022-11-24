<?php
include 'dbconnect.php';  
class Media
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

  	function getmedia()
  	{
      if($this->memberID)
      {
         $i = 0; $data = array();
         $sel = mysqli_query($this->db, "select * from media order by id desc");
         while($arr = mysqli_fetch_array($sel))
         {
            $data[$i]['id'] = $arr['id'];
            $data[$i]['name'] = $arr['name'];
            $data[$i]['ext'] = $arr['ext'];
            $data[$i]['added_date'] = $arr['added_date'];
            $i++;
         }
         return json_encode($data, true);
      }
  	}
     
    function uploadmedia($file, $tmpfile)
    {
      if($this->memberID)
      {
          $name =  strtolower($file);
          $fn   =  explode(".", $name);
          $ext  =  end($fn); 
          $ext  =  strtolower($ext); 

          $accept = array("jpg", "png", "gif", "jpeg", "mp4"); 
          if(in_array($ext, $accept))
          {
            $cdate = date('Y-m-d H:i:s');
            if(move_uploaded_file($tmpfile, "../../uploads/".$file))
            {
               $sel = mysqli_query($this->db, "select id from media where name = '$name'");
               if(mysqli_num_rows($sel)==0)
               {
                  if(mysqli_query($this->db, "insert into media (name, ext, added_date) value ('$name', '$ext', '$cdate')"))
                  {
                     $data = '{"success":"1","msg":"upload"}';
                  }
                  else
                  {
                     $data = '{"success":"0", "msg":"file uplaod. DB error"}';
                  }
               }
               else
               {
                   $data = '{"success":"1", "msg":"duplicate upload"}';
               }
            }
            else 
            {
                $data = '{"success":"0", "msg":"file not upload"}';
            }
          }
          else
          {
             $data = '{"success":"0", "msg":"Invalid file Format"}';
          } 
          return  $data;
      }
    }

}