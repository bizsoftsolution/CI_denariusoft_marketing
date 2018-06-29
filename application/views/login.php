<!DOCTYPE html>
<html>

   <head>
      <meta charset="utf-8" />
      <title>Login | Admin Panel</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta content="Admin Dashboard" name="description" />
      <meta content="ThemeDesign" name="author" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <link rel="shortcut icon" href="assets/images/Logo.png">
      <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/css/icons.css');?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet" type="text/css">

   </head>
   <body>
      <div class="accountbg"></div>
      <div class="wrapper-page">
         <div class="panel panel-color panel-primary panel-pages">
            <div class="panel-body">
               <div class="text-center">
                 <img src="<?php echo base_url('assets/images/Logo.png');?>" alt="NUBE LOGO"  class="img-responsive">
               </div>
               <h3 class="text-muted text-center m-t-0"><b>Sign In</b></h3>
               <form class="form-horizontal m-t-20" action="<?php echo base_url();?>User/varifyUser" method="post">
                  <div class="form-group">
                     <div class="col-xs-12"> <input class="form-control" type="text" required="" name="email" placeholder="User Name"></div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12"> <input class="form-control" type="password" required="" name="password" placeholder="Password"></div>
                  </div>
                  <!-- <div class="form-group">
                     <div class="col-xs-12">
                        <div class="checkbox checkbox-primary"> <input id="checkbox-signup" type="checkbox"> <label for="checkbox-signup"> Remember me </label></div>
                     </div>
                  </div> -->
                  <div class="form-group text-center m-t-20">
                     <div class="col-xs-12"> <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button></div>
                  </div>
                  <!-- <div class="form-group m-t-30 m-b-0">
                     <div class="col-sm-7"> <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a></div>
                     <div class="col-sm-5 text-right"> <a href="pages-register.html" class="text-muted">Create an account</a></div>
                  </div> -->
               </form>
            </div>
         </div>
      </div>
      <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
      <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
      <script src="<?php echo base_url('assets/js/modernizr.min.js');?>"></script>
      <script src="<?php echo base_url('assets/js/detect.js');?>"></script>
      <script src="<?php echo base_url('assets/js/fastclick.js');?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.slimscroll.js');?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.blockUI.js');?>"></script>
      <script src="<?php echo base_url('assets/js/waves.js');?>"></script>
      <script src="<?php echo base_url('assets/js/wow.min.js');?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.nicescroll.js');?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js');?>"></script>
      <script src="<?php echo base_url('assets/js/app.js');?> "></script>
   </body>

</html>
