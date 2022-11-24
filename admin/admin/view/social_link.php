<?php
$page = "social_link";
include '../config/config.php';
include '../config/function.php';
include'../config/social_link.php';
include '../config/server.php';
if(empty($_SESSION['bloguser']))
{
  header('location:'.$baseurl.'/login'); 
}
  $obj      = new Social_link();
  $getdata  = $obj->get_social_link();
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
                    <h4 style="margin:0px">Social Link</h4>
                  </div>
                  <div class="col-md-2 text-right">
                    <button class="btn btn-info" data-toggle="modal" data-target="#socialLink" style="display: none;">Add Social Link</button>
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
                       <th>Facebook Link</th>
                       <th>Linkedin Link</th>
                       <th>Twitter Link</th>
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
                        $id         = $value['id'];
                        $facebook   = $value['facebook'];
                        $linkedin   = $value['linkedin'];
                        $twitter    = $value['twitter'];
                        $added_date = $value['added_date'];
                    ?>
                     <tr>
                       <td><?=$i;?></td>
                       <td><?=$facebook;?></td>
                       <td><?=$linkedin;?></td>
                       <td><?=$twitter;?></td>
                       <td><?=$added_date;?></td>
                       <td>
                        <form method="post">
                          <input type="hidden" name="social_link_id" value="<?=$id;?>">
                          <button type="submit" name="delete_social_link" style="border:none; background-color: transparent;display: none;"><i class="fa fa-trash-o" aria-hidden="true"></i></button>&nbsp;&nbsp;&nbsp;
                          <i class="fa fa-edit" aria-hidden="true" data-toggle="modal" data-target="#edit_social_link<?=$id;?>"></i>
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
<div id="socialLink" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <h4 style="margin-top: 0px; margin-bottom: 20px;">Add Social Links</h4>
        <form method="post">
          <label>Facebook</label>
          <input type="text" name="facebook" id="facebook" class="form-control" value="" placeholder="Facebook Link" required style="margin-bottom: 10px;">
          <label>Linkedin</label>
          <input type="text" name="linkedin" placeholder="Linkedin Link" class="form-control" style="margin-bottom: 10px;">
          <label>Twitter</label>
          <input type="text" name="twitter" placeholder="Twitter Link" class="form-control" style="margin-bottom: 10px;">
          <button type="submit" class="btn btn-success" name="add_social_link">Add</button>
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
    $id       = $value['id'];
    $facebook = $value['facebook'];
    $linkedin = $value['linkedin'];
    $twitter  = $value['twitter'];
?>  
  <!-- Modal -->
<div id="edit_social_link<?=$id;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <h4 style="margin-top: 0px; margin-bottom: 20px;">Edit Social Links</h4>
        <label>Facebook Link</label>
        <form method="post">
          <input type="text" name="facebook" value="<?=$facebook;?>" class="form-control" value="<?=$facebook;?>" placeholder="Facebook Link" required style="margin-bottom: 10px;">
          <label>Linkedin Link</label>
          <input type="text" name="linkedin" placeholder="Linkedin Link" class="form-control" style="margin-bottom: 10px;" value="<?=$linkedin;?>">
          <label>Twitter Link</label>
          <input type="text" name="twitter" placeholder="Twitter Link" class="form-control" style="margin-bottom: 10px;" value="<?=$twitter;?>">
          <input type="hidden" name="social_link_id" value="<?=$id;?>">
          <button type="submit" class="btn btn-success" name="edit_social_link">Update</button>
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
