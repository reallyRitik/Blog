<?php

$page = "dashboard";

include '../config/config.php';
include '../config/function.php';
include '../config/blog.php';

if(empty($_SESSION['bloguser']))
{
  redirect("login");
}

$obj      = new Blog();
$getdata  = $obj->getblogs();
$data     = json_decode($getdata, true);

?>

<!DOCTYPE html>
<html lang="en"> 
  <head>
    <meta charset="utf-8" />
    <title>Admin</title>
    <?php include 'include/header.php'; ?>
  </head> 
  
  <body> 
    <div class="wrapper"> 
      <?php include 'include/sidebar.php'; ?> 
      <div class="main-panel">
        <?php include 'include/nav.php'; ?> 
        <!-- End Navbar -->
        <div class="content" style="padding: 10px;">
          <div class="row"> 
            <div class="col-md-12">
              <h4 style="margin:0px; padding: 10px;">Blog List</h4>
            </div>

            <div class="col-md-12">
              <ul class="list-group">
                <?php
                $accept = array("jpg", "png", "gif", "jpeg"); 
                if(!empty($data))
                {
                  foreach ($data as $key => $value) 
                  { 
                    ?>
                    <li class="list-group-item" style="margin-bottom:10px">
                      <div class="row">
                        <div class="col-md-2">
                          <?php  
                          if(!empty($value['thumbnail']))
                          { 
                            ?>
                            <img src="<?=$weburl;?>/uploads/thumbnail/<?=$value['thumbnail'];?>" style="width:100%">
                            <?php 
                          }
                          else
                          { 
                            ?>
                            <img src="<?=$weburl;?>/uploads/thumbnail/default.png" style="width:100%">
                            <?php
                          } 
                          ?>
                        </div>
                        <div class="col-md-10">
                          <?=$value['title'];?><br>
                          <?=date('d M Y',strtotime($value['added_date']));?><br>
                          <a href="<?=$baseurl;?>/edit-blog/<?=$value['id'];?>">Edit</a> | <span blog="<?=$value['id'];?>" class="deleteBlog">Delete</span>

                        </div> 
                      </div> 
                    </li>
                    <?php
                  }
                }
                ?>
              </ul>  
            </div>
            
          </div>
        </div>
      </div>
    </div> 

    <div id="response"></div>

    <?php include 'include/footer.php'; ?> 
    
    <script type="text/javascript">
    
      $(document).on('click','.deleteBlog', function(){
        var id = $(this).attr('blog');
        if(confirm("Are you sure to delete?"))
        {
          $.post(baseurl+'/action/update.php',{deleteblog:id},function(data){
            $('#response').html(data);
          });
        }
      });

    </script>
  </body>
</html>
