<?php
include_once 'dbconnect.php';
include 'modal.php';
class Blog
  {
     private $db;
     private $memberID;
     private $modal;
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
           $this->modal =  new Modal();
       }


     function getblogs()
       {
          if ($this->memberID)
            {
               $i    = 0;
               $data = array();
               $sel  = mysqli_query($this->db, "select * from blogs where is_deleted = '0' order by id desc ");
               while ($arr = mysqli_fetch_array($sel))
                 {
                    $data[$i]['id']          = $arr['id'];
                    $data[$i]['author_id']          = $arr['author_id'];
                    $data[$i]['title']       = $arr['title'];
                    $data[$i]['description'] = $arr['description'];
                    $data[$i]['tags']        = $arr['tags'];
                    $data[$i]['url']         = $arr['url'];
                    $data[$i]['thumbnail']   = $arr['thumbnail'];
                    $data[$i]['added_date']  = $arr['added_date'];
                    $i++;
                 }
               return json_encode($data, true);
            }
       }

       function getsingleblog($id) 
       {
           if($this->memberID)
            {
               $i    = 0;
               $data = array();
               $sel  = mysqli_query($this->db, "select * from blogs where id = '$id' and is_deleted = '0'");
               if(mysqli_num_rows($sel)>0)
                { 
                     $arr = mysqli_fetch_array($sel);
                      
                      $data['id']               = $arr['id'];
                      $data['author_id']        = $arr['author_id'];
                      $data['title']            = $arr['title'];
                      $data['description']      = $arr['description'];
                      $data['tags']             = $arr['tags'];
                      $data['url']              = $arr['url'];
                      $data['thumbnail']        = $arr['thumbnail'];
                      $data['image_alt']        = $arr['image_alt'];
                      $data['page_title']       = $arr['page_title'];
                      $data['page_description'] = $arr['page_description'];
                      $data['page_keyword']     = $arr['page_keyword'];
                      $data['other_meta_tags']  = $arr['other_meta_tags'];
                      $data['category']         = $arr['category'];
                      $data['added_date']       = $arr['added_date'];
                      $i++;
                      return $data;
                }
            }
       }


     function addblog($title, $description, $tag, $file, $tmpfile, $image_alt, $category,$author,$page_title,$page_description,$page_keyword,$other_meta_tags)
     {
        if ($this->memberID)
          {
             $uid   = $this->memberID;
             $cdate = date('Y-m-d H:i:s');

             $description = str_replace("'", "", $description);
             $description = str_replace("<textarea>","&lt;textarea&gt;", $description);
             $description = str_replace("</textarea>","&lt;/textarea&gt;", $description);

             $title = trim(strip_tags(htmlspecialchars($title)));
             $title = preg_replace('!\s+!', ' ', $title); 
             $title = str_replace("'", "", $title);


             $url1 = strtolower(str_replace(" ", "-", $title)); 
             $url1 = preg_replace('/[^A-Za-z0-9\-]/', '', $url1);
             $url1 = preg_replace('!\-+!', '-', $url1);
             $url1 = str_replace("&", "-", $url1);
             
             $url2 = $url1;
             $i    = 2; 
             $sel  = mysqli_query($this->db, "select  url from blogs where url like '%$url1%'");
             while ($arr = mysqli_fetch_array($sel))
              {
                  if ($arr['url'] == $url1)
                    {
                       $url1 = $url2 . "-" . $i;
                       $i++;
                    }
              }

             if (mysqli_query($this->db, "insert into blogs (author_id, title, description, url, tags, thumbnail, image_alt, category, added_date, added_by, page_title, page_description, page_keyword, other_meta_tags) value ('$author','$title', '$description', '$url1', '$tag', '', '$image_alt', '$category', '$cdate', '$uid', '$page_title', '$page_description', '$page_keyword', '$other_meta_tags')"))
               {
                  $bid = mysqli_insert_id($this->db);
                  if (!empty($file))
                    {
                       $name   = strtolower($file);
                       $fn     = explode(".", $name);
                       $ext    = end($fn);
                       $ext    = strtolower($ext);
                       $accept = array(
                            "jpg",
                            "png",
                            "jpeg"
                       );
                       if (in_array($ext, $accept))
                         {
                            $cdate = date('Y-m-d H:i:s');
                            $fname = "post-img-" . $bid . "." . $ext;
                            if (move_uploaded_file($tmpfile, "../../uploads/thumbnail/" . $fname))
                              {
                                 mysqli_query($this->db, "update blogs set thumbnail = '$fname', real_name = '$fname' where id = '$bid'");
                              }
                         }
                    }
                  return true;
               }
             else
               {
                 return false;
               }
          }
     }
      
       function editblog($id, $title, $description, $tag, $image_alt, $category, $author, $page_title, $page_description, $page_keyword, $other_meta_tags)
       {
          if($this->memberID)
            {
                $description = str_replace("'", "", $description);
                $tag         = str_replace("'", "", $tag);

                $title = trim(strip_tags(htmlspecialchars($title)));
                $title = preg_replace('!\s+!', ' ', $title); 
                $title = str_replace("'", "", $title); 


                 $url1 = strtolower(str_replace(" ", "-", $title)); 
                 $url1 = preg_replace('/[^A-Za-z0-9\-]/', '', $url1);
                 $url1 = preg_replace('!\-+!', '-', $url1);
                 $url1 = str_replace("&", "-", $url1);
                 
                 $url2 = $url1;
                 $i    = 2; 
                 $sel  = mysqli_query($this->db, "select  url from blogs where url like '%$url1%'");
                 while ($arr = mysqli_fetch_array($sel))
                  {
                    if ($arr['url'] == $url1)
                    {
                      $url1 = $url2 . "-" . $i;
                      $i++;
                    }
                  }


                if($this->modal->updatetable("blogs", "author_id = '$author', title = '$title', url = '$url1', description = '$description', tags = '$tag', image_alt = '$image_alt', category = '$category', page_title = '$page_title', page_description = '$page_description', page_keyword = '$page_keyword', other_meta_tags = '$other_meta_tags'", "where id = '$id'"))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
       }


       function removethumbnail($id)
       {
          if($this->memberID)
          {
              $sel  = mysqli_query($this->db, "select real_name from blogs where id = '$id'");
              if(mysqli_num_rows($sel)>0)
              {
                  $arr = mysqli_fetch_array($sel);
                  $thumbnail =  $arr['real_name'];
                  if(unlink("../../uploads/thumbnail/".$thumbnail))
                  {  
                     $this->modal->updatetable("blogs", "thumbnail = ''", "where id = '$id'");
                     return true;
                  }
                  else
                  {
                     return false;
                  }
                  
              }
              else
              {
                 return false;
              }
          }
       }

       function updatethumbnail($id, $file, $tmpfile)
       {
        if($this->memberID)
         {
          if (!empty($file))
            {
                 $name   = strtolower($file);
                 $fn     = explode(".", $name);
                 $ext    = end($fn);
                 $ext    = strtolower($ext);
                 $accept = array(
                      "jpg",
                      "png",
                      "jpeg"
                 );
                 if (in_array($ext, $accept))
                   {
                      $cdate = date('Y-m-d H:i:s');
                      $fname = "post-img-" . $id . "." . $ext;
                      if (move_uploaded_file($tmpfile, "../../uploads/thumbnail/" . $fname))
                        {
                            $fname1 = $fname."?v=".rand(10000,100000000); 
                            $this->modal->updatetable("blogs", "thumbnail = '$fname1', real_name = '$fname'", "where id = '$id'");
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                   }
                   else
                   {
                       return false;
                   }
            } 
         }
       }

       function removeblog($id)
       {
          if($this->memberID)
          {
              if (!empty($id))
              {  
                 if($this->modal->updatetable("blogs", "is_deleted = 1", "where id = '$id'"))
                 {
                    return true;
                 }
                 else
                 {
                    return false;
                 } 
              }
              else
              {
                return false;
              } 
          }

       }

  }