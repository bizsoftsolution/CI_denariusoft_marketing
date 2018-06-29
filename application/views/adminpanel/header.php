<!DOCTYPE html>
<html>
   <!-- Mirrored from themesdesign.in/xadmino/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Dec 2016 05:36:11 GMT -->
   <head>
      <meta charset="utf-8" />
      <title>Admin Panel</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta content="Admin Dashboard" name="description" />
      <meta content="ThemeDesign" name="author" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <link href="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.css');?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url('assets/plugins/datatables/responsive.bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url('assets/plugins/datatables/fixedHeader.bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
      <link href="<?php echo base_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css');?>" rel="stylesheet">
      <link href="<?php echo base_url('assets/plugins/datatables/scroller.bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/css/icons.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url('assets/plugins/bootstrap-sweetalert/sweet-alert.css');?>" rel="stylesheet" type="text/css">
      <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
      <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
      <script src="<?php echo base_url('assets/js/modernizr.min.js');?>">
      </script> <script src="<?php echo base_url('assets/js/detect.js');?>"></script>
      <script src="<?php echo base_url('assets/js/fastclick.js');?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.slimscroll.js');?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.blockUI.js');?>"></script>
      <script src="<?php echo base_url('assets/js/waves.js');?>"></script>
      <script src="<?php echo base_url('assets/js/wow.min.js');?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.nicescroll.js');?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/jquery-sparkline/jquery.sparkline.min.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/dataTables.responsive.min.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/responsive.bootstrap.min.js');?>"></script>
      <script src="<?php echo base_url('assets/pages/dashborad.js');?>"></script>
      <script src="<?php echo base_url('assets/js/app.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/bootstrap-sweetalert/sweet-alert.min.js');?>"></script>
      <script src="<?php echo base_url('assets/pages/sweet-alert.init.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/dataTables.buttons.min.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap.min.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/jszip.min.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/pdfmake.min.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/vfs_fonts.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/buttons.html5.min.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/buttons.print.min.js');?>"></script>
      <script src="<?php echo base_url('assets/pages/datatables.init.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/dataTables.fixedHeader.min.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/dataTables.keyTable.min.js');?>"></script>
      <script src="<?php echo base_url('assets/plugins/datatables/dataTables.scroller.min.js');?>"></script>

   </head>
   <body class="fixed-left">
      <div id="wrapper">
         <div class="topbar">
            <div class="topbar-left">
               <div class="text-center"> <a href="" class="logo">
                 <img src="<?php echo base_url('assets/images/logo.png');?>" height="28"></a>
                  </div>
            </div>
            <div class="navbar navbar-default" role="navigation">
               <div class="container">
                  <div class="">
                     <div class="pull-left"> <button type="button" class="button-menu-mobile open-left waves-effect waves-light"> <i class="ion-navicon"></i> </button> <span class="clearfix"></span></div>
                     <!-- <form class="navbar-form pull-left" role="search">
                        <div class="form-group"> <input type="text" class="form-control search-bar" placeholder="Search..."></div>
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                     </form> -->
                     <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="dropdown hidden-xs">
                           <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"> <i class="fa fa-bell"></i> <span class="badge badge-xs badge-danger">3</span> </a>
                           <ul class="dropdown-menu dropdown-menu-lg">
                              <li class="text-center notifi-title">Notification <span class="badge badge-xs badge-success">3</span></li>
                              <li class="list-group">
                                 <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                       <div class="media-heading">You Have Pending Work to finish</div>
                                       <p class="m-0"> <small>FrontDesk Send you a mail</small></p>
                                    </div>
                                 </a>
                                 <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                       <div class="media-body clearfix">
                                          <div class="media-heading">New Message received</div>
                                          <p class="m-0"> <small>GS Accept Your Required Time</small></p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                       <div class="media-body clearfix">
                                          <div class="media-heading">Your Time Going End</div>
                                          <p class="m-0"> <small>Accepted Work count Down Going End.</small></p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="javascript:void(0);" class="list-group-item"> <small class="text-primary">See all notifications</small> </a>
                              </li>
                           </ul>
                        </li>
                        <li class="hidden-xs"> <!-- <a href="#" id="btn-fullscreen" class="waves-effect waves-light"> <i class="fa fa-crosshairs"></i></a> --> </li>
                        <li class="dropdown">
                          <?php if($this->session->userdata('photo')!=null)
                          {?>
                            <a href="#" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                              <img src="<?php echo base_url('upload/'.$this->session->userdata('photo'));?>" alt="user-img" class="img-circle"> </a>


                          <?php }
                            else {?>
                              <a href="#" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                <img src="<?php echo base_url('upload/user1.png');?>" alt="user-img" class="img-circle"> </a>

                          <?php  }
                          ?>
                           <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url('Profile');?>"> Profile</a></li>
                              <li><a href="<?php echo base_url('changePassword');?>"> Change Password </a></li>
                              <li class="divider"></li>
                              <li><a href="<?php echo base_url(); ?>/User/logout"> Logout</a></li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
