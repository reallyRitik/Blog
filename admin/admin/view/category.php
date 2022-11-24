<?php
$page = "category";
include '../config/config.php';
include '../config/function.php';
include'../config/category.php';
include '../config/server.php';
if(empty($_SESSION['bloguser']))
{
  header('location:'.$baseurl.'/login');
}
  $obj      = new Category();
  $getdata  = $obj->getCategory();
  $data     = json_decode($getdata, true);
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8" />
  <title>Media</title>
  <?php include 'include/header.php'; ?>
</head>
<body> 
<div class="wrapper"> 
  <?php include 'include/sidebar.php'; ?> 
  <div class="main-panel">
    <?php include 'include/nav.php'; ?>  
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
            <div class="card ">
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-10">
                    <h4 style="margin:0px">Add Blog Category</h4>
                  </div>
                  <div class="col-md-2 text-right">
                    <button class="btn btn-info" data-toggle="modal" data-target="#addCategory">Add Category</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
             <div class="card">
               <div class="card-body">
                 <table class="table table-striped">
                   <thead>
                     <tr>
                       <th>#</th>
                       <th>Category Name</th>
                       <th>Added Date</th>
                       <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php
                    $i = 1;
                    if(!empty($data))
                    {
                      
                      foreach ($data as $key => $value) 
                      { 
                        $id         = $value['id'];
                        $category   = $value['category'];
                        $added_date = $value['added_date'];
                    ?>
                     <tr>
                       <td><?=$i;?></td>
                       <td><?=$category;?></td>
                       <td><?=$added_date;?></td>
                       <td>
                        <form method="post">
                          <input type="hidden" name="categoryId" value="<?=$id;?>">
                          <button type="submit" name="deleteCategory" style="border:none; background-color: transparent;"><i class="fa fa-trash-o" aria-hidden="true"></i></button>&nbsp;&nbsp;&nbsp;
                          <i class="fa fa-edit" aria-hidden="true" data-toggle="modal" data-target="#editCategory<?=$id;?>"></i>
                        </form> 
                      </td>
                     </tr>
                    <?php $i++;} } ?>
                   </tbody>
                 </table>
               </div>
             </div>
          </div>
        </div>
      </div>
    </div>
<!--================================================Modal================================================================-->
  
  <!-- Modal -->
<div id="addCategory" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <h4 style="margin-top: 0px; margin-bottom: 20px;">Add Blog Category</h4>
        
        <form method="post">
          <label>Enter Category</label>
          <input type="text" name="category" id="category" class="form-control" value="" placeholder="Enter category" required style="margin-bottom: 10px;">
          
          <label>Page Title</label>
          <input type="text" name="page_title" class="form-control" required placeholder="Page Title">
          
          <label>Page Description</label>
          <textarea name="page_description" class="form-control" required placeholder="Page Description"></textarea>
          
          <label>Page Keyword</label>
          <textarea name="page_keyword" class="form-control" required placeholder="Page Keyword"></textarea>
          
           <label>Other Meta Tags</label>
          <textarea name="other_meta_tags" class="form-control" required placeholder="Other Meta Tags"></textarea><br>
            
          <button type="submit" class="btn btn-success" name="add_category" id="add">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
          
      </div>
    </div>

  </div>
</div>

<!--================================================================================================================-->
<?php
if(!empty($data))
{
  foreach ($data as $key => $value) 
  { 
    $id         = $value['id'];
    $category   = $value['category'];
?>  
  <!-- Modal -->
<div id="editCategory<?=$id;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <h4 style="margin-top: 0px; margin-bottom: 20px;">Edit Blog Category</h4>
        
        <form method="post">
          <label>Enter Category</label>
          <input type="text" name="category" value="<?=$category;?>" id="category" class="form-control" value="" placeholder="Enter category" required style="margin-bottom: 10px;">

          <label>Page Title</label>
          <input type="text" name="page_title" class="form-control" required placeholder="Page Title" value="<?=$value['page_title'];?>">
          
          <label>Page Description</label>
          <textarea name="page_description" class="form-control" required placeholder="Page Description"><?=$value['page_description'];?></textarea>
          
          <label>Page Keyword</label>
          <textarea name="page_keyword" class="form-control" required placeholder="Page Keyword"><?=$value['page_keyword'];?></textarea>
          
           <label>Other Meta Tags</label>
          <textarea name="other_meta_tags" class="form-control" required placeholder="Other Meta Tags"><?=$value['other_meta_tags'];?></textarea><br>

          <input type="hidden" name="categoryId" value="<?=$id;?>">
          <button type="submit" class="btn btn-success" name="edit_category" id="add">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">  
          
      </div>
    </div>

  </div>
</div>
<?php } } ?>
<!--================================================================================================================-->


    <footer class="footer">
      <div class="container"></div>
    </footer>
  </div>
</div> 
<div id="txtHint"></div>  

<?php include 'include/footer.php'; ?>

</body>
</html>
