<?php
$page = "edit-blog";
include '../config/config.php';
include '../config/function.php';
include '../config/blog.php';
include '../config/author.php';
include '../config/category.php';

if(empty($_SESSION['bloguser']))
{
  redirect("login");
}
else if(empty($_GET['blog']))
{
  redirect("dashboard");
} 

include '../config/server.php';

$blogid   = $_GET['blog'];
$obj      = new Blog();
$data     = $obj->getsingleblog($blogid);
if(empty($data))
{
   redirect("dashboard");
} 

$obj1      = new Author();
$getdata1  = $obj1->getAuthor();
$data1     = json_decode($getdata1, true);

$obj2      = new Category();
$getdata2  = $obj2->getCategory();
$data2     = json_decode($getdata2, true);

   ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="utf-8" />
<title>Edit Blog</title>
<?php include 'include/header.php'; ?>
<script type="text/javascript" src="<?=$baseurl;?>/assets/ckeditor/ckeditor.js"></script>
<style type="text/css">
  form label{font-size: 17px !important}
</style>
</head> 
    <body> 
    <div class="wrapper"> 
        <?php include 'include/sidebar.php'; ?> 
        <div class="main-panel">
           <?php include 'include/nav.php'; ?> 
           
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                         <div class="col-md-12">
                            <div class="card ">
                                <div class="card-body ">
                                     <h4 style="margin:0px">Edit Blog</h4>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-9">
                            <div class="card ">
                                <div class="card-body ">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row" style="margin:0px">

                                  <div class="form-group col-md-3">
                                    <label>Author Name</label>
                                    <select name="author" class="form-control" required>
                                      <option value="" required>Select Author</option>
                                      <?php
                                      if(!empty($data1))
                                      {
                                        foreach ($data1 as $key => $value) 
                                        { 
                                          $id  = $value['id'];
                                          $author = $value['author'];
                                          ?>
                                      <option value="<?=$id;?>" <?php if($data['author_id'] == $id){ echo "selected"; } ?> ><?=$author;?></option>
                                      <?php } } ?>
                                    </select>
                                  </div>

                                  <div class="form-group col-md-3">
                                      <label>Blog Title</label>
                                      <input type="text" name="title" class="form-control" value="<?=$data['title'];?>"> 
                                  </div>
                                  <div class="form-group col-md-3"></div>
                                  <div class="form-group col-md-3"></div>

                                  <!-- =================================== -->

                                  <div class="form-group col-md-12">
                                    <label>Blog Description</label>
                                    <textarea name="description" id="description" class="form-control" style="min-height: 300px"><?=$data['description'];?></textarea> 
                                     <script>  
                                       CKEDITOR.replace('description');
                                     </script>
                                  </div>

                                  <!-- =================================== -->

                                  <div class="form-group col-md-4">
                                    <label>Blog Tag</label>
                                    <input type="text" name="tag" class="form-control" required value="<?=$data['tags'];?>">
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label>Image ALT</label>
                                    <input type="text" name="image_alt" class="form-control" required placeholder="Tag" value="<?=$data['image_alt'];?>">
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label>Page Title</label>
                                    <input type="text" name="page_title" class="form-control" required placeholder="Page Title" value="<?=$data['page_title'];?>">
                                  </div>

                                  <!-- =================================== -->

                                  <div class="form-group col-md-8">
                                    <div class="form-group col-md-12">
                                      <label>Page Description</label>
                                      <textarea name="page_description" class="form-control"  placeholder="Page Description" rows="5" style="height: auto;"><?=$data['page_description'];?></textarea>
                                    </div>

                                    <div class="form-group col-md-12">
                                      <label>Page Keyword</label>
                                      <textarea name="page_keyword" class="form-control"  placeholder="Page Keyword" rows="5" style="height: auto;"><?=$data['page_keyword'];?></textarea>
                                    </div>

                                    
                                    <div class="form-group col-md-12">
                                      <label>Other Meta Tags</label>
                                      <textarea name="other_meta_tags" class="form-control"  placeholder="Other Meta Tags" rows="5" style="height: auto;">
                                        <?=$data['other_meta_tags'];?>
                                      </textarea>
                                    </div>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>Blog Category</label>
                                    <select name="category[]" class="form-control" size="5" required multiple style="height: auto;">
                                      <?php
                                      if(!empty($data2))
                                      {
                                        foreach ($data2 as $key => $value) 
                                        { 
                                          $id  = $value['id'];
                                          $category = $value['category'];
                                          $cat_array = explode(",", $data['category']);

                                          ?>
                                      <option value="<?=$id;?>" <?php if(in_array($id, $cat_array)){ echo "selected"; } ?> ><?=$category;?></option>
                                      <?php } } ?>
                                    </select>
                                  </div>

                                  

                                  <div class="form-group col-md-12">
                                       <br>
                                       <input type="hidden" name="id" value="<?=$blogid;?>">
                                       <button class="btn btn-success" type="submit" name="editblog">Update Blog</button>
                                  </div>
                                  </div>
                                </form>
                                </div>
                            </div>
                        </div>

                         <div class="col-md-3">
                            <div class="card ">
                                <div class="card-body ">

                                   <?php  if(!empty($data['thumbnail']))
                                  { ?>

                                     <img src="<?=$weburl;?>/uploads/thumbnail/<?=$data['thumbnail'];?>" style="width:200px">
                                     <br><br>
                                     <span bid="<?=$blogid;?>" style="cursor: pointer;" class="removethumbnail text-danger">Remove Thumnnail</span>
                                  <?php } ?>
                                  <hr>
                                   <div class="form-group col-md-12">
                                   <form method="post" enctype="multipart/form-data" id="updatethumbnailform">
                                      <label>Update Thumbnail</label>
                                      <input type="file" name="updatethumbnail" class="form-control " id="updatethumbnail">
                                      <input type="hidden" name="id" value="<?=$blogid;?>">
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        
                    </div>
            
                </div>
            </div>
            <footer class="footer">
                <div class="container"> 
                </div>
            </footer>
        </div>
    </div> 
<div id="response"></div> 

  <?php include 'include/footer.php'; ?> 
  <script type="text/javascript">
    $(document).on('click','.removethumbnail',function(){
      var id = $(this).attr("bid");
      $.post('<?=$baseurl;?>/action/update.php',{removethumbnail:id},function(data){
          $('#response').html(data);
      });
    });

     $(document).on('change','#updatethumbnail',function(){ 
      document.getElementById("updatethumbnailform").submit();
     });
  </script>
  </body>
</html>
 
