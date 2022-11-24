<?php
   include '../config/function.php';
   if(empty($_SESSION['bloguser']))
   {
     header('location:'.$baseurl.'/login');
   }
   ?>
<!doctype html>
<html lang="en">
   <head>
      <title>Dashboard</title>
      <?php include 'include/header.php'; ?>
   </head>
   <body>
      <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
         <?php include 'include/nav.php'; ?>
          
         <div class="app-main">
         <?php  include 'include/sidebar.php'; ?>

            <div class="app-main__outer">
               <div class="app-main__inner">
                  <div class="app-page-title">
                     <div class="page-title-wrapper">
                        <div class="page-title-heading">
                           <div class="page-title-icon">
                              <i class="pe-7s-car icon-gradient bg-mean-fruit">
                              </i>
                           </div>
                           <div>
                              Analytics Dashboard
                              <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                              </div>
                           </div>
                        </div>
                        <div class="page-title-actions">
                           <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                           <i class="fa fa-star"></i>
                           </button>
                           <div class="d-inline-block dropdown">
                              <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                              <span class="btn-icon-wrapper pr-2 opacity-7">
                              <i class="fa fa-business-time fa-w-20"></i>
                              </span>
                              Buttons
                              </button>
                              <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a href="javascript:void(0);" class="nav-link">
                                          <i class="nav-link-icon lnr-inbox"></i>
                                          <span>
                                          Inbox
                                          </span>
                                          <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                       </a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="javascript:void(0);" class="nav-link">
                                          <i class="nav-link-icon lnr-book"></i>
                                          <span>
                                          Book
                                          </span>
                                          <div class="ml-auto badge badge-pill badge-danger">5</div>
                                       </a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="javascript:void(0);" class="nav-link">
                                       <i class="nav-link-icon lnr-picture"></i>
                                       <span>
                                       Picture
                                       </span>
                                       </a>
                                    </li>
                                    <li class="nav-item">
                                       <a disabled href="javascript:void(0);" class="nav-link disabled">
                                       <i class="nav-link-icon lnr-file-empty"></i>
                                       <span>
                                       File Disabled
                                       </span>
                                       </a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-midnight-bloom">
                           <div class="widget-content-wrapper text-white">
                              <div class="widget-content-left">
                                 <div class="widget-heading">Total Orders</div>
                                 <div class="widget-subheading">Last year expenses</div>
                              </div>
                              <div class="widget-content-right">
                                 <div class="widget-numbers text-white"><span>1896</span></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-arielle-smile">
                           <div class="widget-content-wrapper text-white">
                              <div class="widget-content-left">
                                 <div class="widget-heading">Clients</div>
                                 <div class="widget-subheading">Total Clients Profit</div>
                              </div>
                              <div class="widget-content-right">
                                 <div class="widget-numbers text-white"><span>$ 568</span></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-grow-early">
                           <div class="widget-content-wrapper text-white">
                              <div class="widget-content-left">
                                 <div class="widget-heading">Followers</div>
                                 <div class="widget-subheading">People Interested</div>
                              </div>
                              <div class="widget-content-right">
                                 <div class="widget-numbers text-white"><span>46%</span></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-premium-dark">
                           <div class="widget-content-wrapper text-white">
                              <div class="widget-content-left">
                                 <div class="widget-heading">Products Sold</div>
                                 <div class="widget-subheading">Revenue streams</div>
                              </div>
                              <div class="widget-content-right">
                                 <div class="widget-numbers text-warning"><span>$14M</span></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 col-lg-12">
                        <div class="mb-3 card">
                           <div class="card-header-tab card-header-tab-animation card-header">
                              <div class="card-header-title">
                                 <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                 Blog List
                              </div> 
                           </div>
                           <div class="card-body">
                              <div class="tab-content">
                                 <div class="tab-pane fade show active" id="tabs-eg-77">
                                    <div class="card mb-3 widget-chart widget-chart2 text-left w-100"> 
                                    </div> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
         
                  </div>
                  
         
                 
               </div>
               <div class="app-wrapper-footer">
             
               </div>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
         </div>
      </div>
      <?php include 'include/footer.php'; ?>
   </body>
</html>