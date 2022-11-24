<?php
$page = "blog_comments";
include '../config/config.php';
include '../config/function.php';
include'../config/blog_comments.php';
include '../config/server.php';
if(empty($_SESSION['bloguser']))
{
  header('location:'.$baseurl.'/login'); 
}
  $obj      = new BlogComments();
  $getdata  = $obj->getComments();
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
                    <h4 style="margin:0px">Blog Comments</h4>
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
                       <th>Blog Title</th>
                       <th>User Name</th>
                       <th>Email</th>
                       <th>Comments</th>
                       <th>Added Date</th>
                       <th style="width: 100px;">Action</th>
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
                        $blog_id    = $value['blog_id'];
                        $name       = $value['name'];
                        $email      = $value['email'];
                        $comment    = $value['comment'];
                        $added_date = $value['added_date'];
                        $status     = $value['status']; 
                    ?>
                     <tr>
                       <td><?=$i;?></td>
                       <td><?php echo $obj->getBlogTitle($blog_id); ?></td>
                       <td><?=$name;?></td>
                       <td><?=$email;?></td>
                       <td><?=$comment;?></td>
                       <td><?=$added_date;?></td>
                       <td>
                        <form method="post">
                          <input type="hidden" name="comment_id" value="<?=$id;?>">
                          <input type="hidden" name="comment_status" value="<?=$status;?>">
                          <button type="submit" name="delete_comment" style="border:none; background-color: transparent;"><i class="fa fa-trash-o" aria-hidden="true"></i></button>&nbsp;&nbsp;&nbsp;
                         <!--  <i class="fa fa-edit" aria-hidden="true" data-toggle="modal" data-target="#editAuthor<?=$id;?>" style="display: none;"></i>&nbsp;&nbsp;&nbsp; -->
                          <?php if($status == 0){ ?>
                          <button type="submit" name="comment_status_btn" title="Aprove the comment" style="color: #498608;border:none; background-color: transparent;">Aprove Comment</button>
                          <?php }else{ ?>
                          <button type="submit" name="comment_status_btn" title="Aprove the comment" style="color: #C70039;border:none; background-color: transparent;">Disaprove Comment</button>
                          <?php } ?>
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

<?php
if(!empty($data))
{
  foreach ($data as $key => $value) 
  { 
?>  
  <!-- Modal -->
<div id="editAuthor<?=$id;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <h4 style="margin-top: 0px; margin-bottom: 20px;">Edit Blog Tag</h4>
        <label>Enter Author</label>
        <form method="post">
          <input type="text" name="author" value="<?=$author;?>" id="author" class="form-control" value="" placeholder="Enter author" required style="margin-bottom: 10px;">
          <label>About Author</label>
          <textarea name="about_author" class="form-control" style="margin-bottom: 10px; height: auto;" rows="4" maxlength="300" placeholder="About Author" value="<?=$about_author;?>"><?=$about_author;?></textarea>
          <label>Author Linkedin Link</label>
          <input type="text" name="linkedin" placeholder="Linkedin Link" class="form-control" style="margin-bottom: 10px;" value="<?=$linkedin;?>">
          <label>Author Twitter Link</label>
          <input type="text" name="twitter" placeholder="Twitter Link" class="form-control" style="margin-bottom: 10px;" value="<?=$twitter;?>">
          <input type="hidden" name="authorId" value="<?=$id;?>">
          <button type="submit" class="btn btn-success" name="edit_author">Update</button>
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
