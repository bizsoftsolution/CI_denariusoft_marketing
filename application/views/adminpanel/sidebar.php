<div class="left side-menu">
   <div class="sidebar-inner slimscrollleft">
      <div class="user-details">
         <?php if($this->session->userdata('photo')!=null)
         {?>

           <div class="text-center"> <img src="<?php echo base_url('upload/'.$this->session->userdata('photo'));?>" alt="" class="img-circle"></div>

<?php    }
          else {?>
         <div class="text-center"> <img src="<?php echo base_url('upload/user1.png');?>" alt="" class="img-circle"></div>           
<?php        }
?>

         <div class="user-info">
            <div class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $this->session->userdata('first_name');?></a>
               <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url('Profile');?>"> Profile</a></li>
                  <li><a href="<?php echo base_url('changePassword');?>"> Change Password</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url(); ?>/User/logout"> Logout</a></li>
               </ul>
            </div>
            <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
         </div>
      </div>
      <div id="sidebar-menu">
         <ul>
		 
          <?php if($this->session->userdata('user_type')=='SUPERADMIN')
          {
          ?>
		       <li> <a href="<?php echo base_url('Employee');?>" class="waves-effect"><i class="ti-user"></i><span>Employee Details </span></a></li>
		       <li> <a href="<?php echo base_url('Product');?>" class="waves-effect"><i class="ti-layout-grid2-alt"></i><span>Product Details </span></a></li>
		       <li> <a href="<?php echo base_url('Closed_Sale_Group');?>" class="waves-effect"><i class="ti-shopping-cart-full"></i><span>Sale Report</span></a></li>
		      <!-- <li> <a href="<?php echo base_url('Employee1');?>" class="waves-effect"><i class="ti-menu-alt"></i><span>Report</span></a></li>-->

          <?php
          }
        ?>
        <?php if($this->session->userdata('user_type')=='ADMIN')
        {
        ?>
			<li> <a href="<?php echo base_url('Product_sales/approve_product');?>" class="waves-effect"><i class="ti-shopping-cart-full"></i><span> Sale Report</span></a></li>
			<li> <a href="<?php echo base_url('Closed_Sale_Group');?>" class="waves-effect"><i class="ti-package"></i><span> Closed Sale</span></a></li>
			<!--li> <a href="<?php echo base_url('Employee');?>" class="waves-effect"><i class="ti-menu-alt"></i><span> Report</span></a></li>-->

        <?php
        }
      ?>

      <?php if($this->session->userdata('user_type')=='MARKETINGPERSON')
      {
      ?>

			<li> <a href="<?php echo base_url('Product_sales');?>" class="waves-effect"><i class="ti-shopping-cart-full"></i><span> Sales</span></a></li>
			<li> <a href="<?php echo base_url('Closed_Sale_Individual');?>" class="waves-effect"><i class="ti-package"></i><span> Closed Sale</span></a></li>
			<!--li> <a href="<?php echo base_url('Employee');?>" class="waves-effect"><i class="ti-menu-alt"></i><span> Report</span></a></li>-->


      <?php
      }
    ?>

           <?php if($this->session->userdata('user_type')=='FrontDesk')
            {
           ?>
              <li> <a href="<?php echo base_url('mail');?>" class="waves-effect"><i class="ti-shift-right"></i><span>Incoming Mails </span></a></li>
              <li> <a href="<?php echo base_url('AssignedList');?>" class="waves-effect"><i class="ti-shift-right"></i><span>Print Mail </span></a></li>
      <?php
          }?>

         </ul>
      </div>
      <div class="clearfix"></div>
   </div>
</div>
