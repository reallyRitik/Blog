<?php
$page = "add-blog";
include '../config/config.php';
include '../config/function.php';
include '../config/blog.php';
include '../config/author.php';
include '../config/category.php';
include '../config/server.php';
if(empty($_SESSION['bloguser']))
{
    redirect("login");
}
   $obj      = new Author();
   $getdata  = $obj->getAuthor();
   $data     = json_decode($getdata, true);

   $obj1      = new Category();
   $getdata1  = $obj1->getCategory();
   $data1     = json_decode($getdata1, true);

   ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="utf-8" />
<title>Admin</title>
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
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row" style="margin:0px">

                                  <div class="form-group col-md-3">
                                      <label>Author Name</label>
                                      <select name="author" class="form-control" required>
                                        <option value="" required>Select Author</option>
                                        <?php
                                        if(!empty($data))
                                        {
                                          foreach ($data as $key => $value) 
                                          { 
                                            $id  = $value['id'];
                                            $author = $value['author'];
                                            ?>
                                        <option value="<?=$id;?>"><?=$author;?></option>
                                        <?php } } ?>
                                      </select>
                                  </div>    

                                  <div class="form-group col-md-3">
                                      <label>Blog Title</label>
                                      <input type="text" name="title" class="form-control" required placeholder="Title">
                                  </div>
                                  <div class="form-group col-md-3"></div>
                                  <div class="form-group col-md-3"></div>
                                  <!-- =================================== -->
                                  <div class="form-group col-md-12">
                                      <label>Blog Description</label>
                                      <textarea name="description" id="description"  required="" class="form-control" style="min-height: 300px"></textarea> 
                                       <script>  
                                         CKEDITOR.replace('description');
                                       </script>
                                  </div>
                                  <!-- =================================== -->
                                  <div class="form-group col-md-3">
                                      <label>Blog Tag</label>
                                      <input type="text" name="tag" class="form-control" required placeholder="Add tag comma separated (,)">
                                  </div>

                                  <div class="form-group col-md-3">
                                      <label>Add Thumbnail</label>
                                      <input type="file" name="thumbnail" class="form-control" required>
                                  </div>

                                  <div class="form-group col-md-3">
                                      <label>Image ALT</label>
                                      <input type="text" name="image_alt" class="form-control" required placeholder="Tag">
                                  </div>

                                  <div class="form-group col-md-3">
                                      <label>Page Title</label>
                                      <input type="text" name="page_title" class="form-control" required placeholder="Page Title">
                                  </div>

                                  <div class="form-group col-md-8">
                                    <div class="form-group col-md-12">
                                        <label>Page Description</label>
                                        <textarea name="page_description" class="form-control"  placeholder="Page Description" style="height: auto;" rows="5"></textarea>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Page Keyword</label>
                                        <textarea name="page_keyword" class="form-control"  placeholder="Page Keyword" style="height: auto;" rows="5"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                      <label>Other Meta Tags</label>
                                      <textarea name="other_meta_tags" class="form-control"  placeholder="Other Meta Tags" rows="5" style="height: auto;"></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group col-md-4">
                                      <label>Blog Category</label>
                                      <select name="category[]" class="form-control" required multiple style="height: auto;" size="5">
                                        <?php
                                        if(!empty($data1))
                                        {
                                          foreach ($data1 as $key => $value)
                                          { 
                                            $id  = $value['id'];
                                            $category = $value['category'];
                                            ?>
                                        <option value="<?=$id;?>"><?=$category;?></option>
                                        <?php } } ?>
                                      </select>
                                  </div>

                                  <div class="form-group col-md-6">
                                       <br>
                                       <button class="btn btn-success" type="submit" name="publishblog">Save Blog</button>
                                  </div>
                                  </div>
                                </form>
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
   
</body>
  <?php include 'include/footer.php'; ?> 
</html>
 
