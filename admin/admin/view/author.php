<?php
$page = "author";
include '../config/config.php';
include '../config/function.php';
include'../config/author.php';
include '../config/server.php';
if(empty($_SESSION['bloguser']))
{
  header('location:'.$baseurl.'/login'); 
}
  $obj      = new Author();
  $getdata  = $obj->getAuthor();
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
                    <h4 style="margin:0px">Add Blog Author</h4>
                  </div>
                  <div class="col-md-2 text-right">
                    <button class="btn btn-info" data-toggle="modal" data-target="#addAuthor">Add Author</button>
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
                       <th>Author Name</th>
                       <th>About Author</th>
                       <th>Author Linkedin Link</th>
                       <th>Author Twitter Link</th>
                       <th>Added Date</th>
                       <th style="width: 90px!important;">Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php
                    $i = 1;
                    if(!empty($data))
                    {
                      foreach ($data as $key => $value) 
                      { 
                        $id           = $value['id'];
                        $author       = $value['author'];
                        $about_author = $value['about_author'];
                        $added_date   = $value['added_date'];
                        $linkedin     = $value['linkedin'];
                        $twitter      = $value['twitter'];
                    ?>
                     <tr>
                       <td><?=$i;?></td>
                       <td><?=$author;?></td>
                       <td><?=$about_author;?></td>
                       <td><?=$linkedin;?></td>
                       <td><?=$twitter;?></td>
                       <td><?=$added_date;?></td>
                       <td>
                        <form method="post">
                          <input type="hidden" name="authorId" value="<?=$id;?>">
                          <button type="submit" name="deleteAuthor" style="border:none; background-color: transparent;"><i class="fa fa-trash-o" aria-hidden="true"></i></button>&nbsp;&nbsp;&nbsp;
                          <i class="fa fa-edit" aria-hidden="true" data-toggle="modal" data-target="#editAuthor<?=$id;?>"></i>
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
<div id="addAuthor" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <h4 style="margin-top: 0px; margin-bottom: 20px;">Add Blog Author</h4>
        <form method="post">
          <label>Enter Author</label>
          <input type="text" name="author" id="author" class="form-control" value="" placeholder="Enter author" required style="margin-bottom: 10px;">
          <label>About Author</label>
          <textarea name="about_author" class="form-control" style="margin-bottom: 10px; height: auto;" rows="4" maxlength="300" placeholder="About Author"></textarea>
          <label>Author Linkedin Link</label>
          <input type="text" name="linkedin" placeholder="Linkedin Link" class="form-control" style="margin-bottom: 10px;">
          <label>Author Twitter Link</label>
          <input type="text" name="twitter" placeholder="Twitter Link" class="form-control" style="margin-bottom: 10px;">
          <button type="submit" class="btn btn-success" name="add_author" id="add">Add</button>
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
    $id           = $value['id'];
    $author       = $value['author'];
    $about_author = $value['about_author'];
    $linkedin     = $value['linkedin'];
    $twitter      = $value['twitter'];
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
