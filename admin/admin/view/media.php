<?php
   $page = "media";
   include '../config/config.php';
   include '../config/function.php';
   include '../config/media.php';
   if(empty($_SESSION['bloguser']))
   {
     header('location:'.$baseurl.'/login');
   }

   $obj      = new Media();
   $getdata  = $obj->getmedia();
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
                                        <div class="col-md-4">
                                             <h4 style="margin:0px">Add Blog</h4>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <span id="responsetext"></span>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <button class="btn btn-info addnewmedia" >Add File</button>
                                        </div>
                                     </div>
                                   
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                           <ul class="list-group">
                        <?php
                        $accept = array("jpg", "png", "gif", "jpeg"); 
                        if(!empty($data))
                        {
                           foreach ($data as $key => $value) 
                            { 
                               $fname = $value['name'];
                               if(strlen($fname)>33)
                               {
                                  $fname  = substr($fname, 0,30)."...";
                               }
                               ?>
                              <li class="list-group-item">
                              <div class="row">
                                  <div class="col-md-1">
                                 <?php  if(in_array($value['ext'],$accept))
                                  { ?>
                                     <img src="<?=$weburl;?>/uploads/<?=$value['name'];?>" style="width:100px">
                                  <?php } ?>
                                  </div>
                                  <div class="col-md-4"><?=$fname;?> </div>
                                  <div class="col-md-4">
                                    <input type="text" name="" class="form-control mediaurl" value=" <?=$weburl;?>/uploads/<?=$value['name'];?>">
                                   </div>
                                  <div class="col-md-2 text-right"><?=date('d M Y',strtotime($value['added_date']));?> </div>
                              </div>

                              <span class="badge">12</span></li>
                            <?php
                            }
                        }
                        ?>
                                 
                                   
                            </ul>  
                        </div>
                        
                    </div>
            
                </div>
            </div>

            <form id="mediaupload" enctype="multipart/form-data">
                <input type="file" name="media" id="mediaoption" style="opacity: 0">
            </form>
            <footer class="footer">
                <div class="container"> 
                </div>
            </footer>
        </div>
    </div> 
   
</body>
  <?php include 'include/footer.php'; ?> 
  <script type="text/javascript">

    $(".mediaurl").focus(function() {
       $(this).select();
    });

      $(document).on('click','.addnewmedia',function(){ 
          $('#mediaoption').trigger('click');
      })

      $(document).on('change','#mediaoption',function(){ 

          $('#responsetext').html('Uploading...');
          var form     = document.getElementById('mediaupload');
          var formData = new FormData(form); 
          $.ajax({
           type:'POST',
           url:'<?=$baseurl;?>/action/upload.php/',
           data:formData,
           cache:false,
           contentType: false,
           processData: false,
           success:function(data)
           {
              var obj = JSON.parse(data);
              var success = obj.success; 
              var msg = obj.msg; 
              if(success == 1){  
                  location.reload();
              }
              else
              {
                $('#responsetext').html(msg);
              }
              // console.log(data);
           },
           error: function(data){
               console.log("error");
               console.log(data);
           }
        }); 
      });
  </script>
</html>
