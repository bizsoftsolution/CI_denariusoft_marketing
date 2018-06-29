<div class="content-page">
   <div class="content">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="page-header-title">
                  <h4 class="pull-left page-title">Dashboard</h4>
                  <ol class="breadcrumb pull-right">
                     <li><a href="#">Nube</a></li>
                     <li class="active">Dashboard</li>
                  </ol>
                  <div class="clearfix"></div>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
               <div class="panel panel-primary">
                  <div class="panel-heading">
                     <h3 class="panel-title">Change Password</h3>
                  </div>
                  <div class="panel-body">
                    <br />
                    <br />
                    <div class="modal-body form">
                        <form action="#" id="form" class="form-horizontal">
                            <input type="hidden" value="" name="mail_no"/>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Old Password</label>
                                    <div class="col-md-5">
                                        <input name="old_password" placeholder="Old Password" class="form-control" type="password">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">New Password</label>
                                    <div class="col-md-5">
                                        <input name="new_password" placeholder="New Password" class="form-control" type="password">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">

                                    <div class="col-md-5">
                                        <input type="hidden" name="emp_no" value="<?php echo $this->session->userdata('emp_no'); ?>"/>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnSave" onclick="save('hidden_id')" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script type="text/javascript">

   var save_method; //for save method string
   var table;
   var base_url = '<?php echo base_url();?>';

   $(document).ready(function() {

       //set input/textarea/select event when change value, remove class error and remove text help block
       $("input").change(function(){
           $(this).parent().parent().removeClass('has-error');
           $(this).next().empty();
       });
       $("textarea").change(function(){
           $(this).parent().parent().removeClass('has-error');
           $(this).next().empty();
       });
       $("select").change(function(){
           $(this).parent().parent().removeClass('has-error');
           $(this).next().empty();
       });

   });

   function save(){
       $('#btnSave').text('saving...'); //change button text
       $('#btnSave').attr('disabled',true); //set button disable
       var url;
       //alert(id);
      //$('[name="mail_no"]').val(id);


        url = "<?php echo base_url('ChangePassword/pwd_save');?>";


       // ajax adding data to database

       var formData = new FormData($('#form')[0]);
       $.ajax({
           url : url,
           type: "POST",
           data: formData,
           contentType: false,
           processData: false,
           dataType: "JSON",
           success: function(data)
           {

               if(data.status) //if success close modal and reload ajax table
               {
                   //$('#modal_form').modal('hide');
                   //reload_table();
                  //  document.getElementById("h9dden_id").style.display="none";
                  //  document.getElementById(elementId).style.display="block";
                   alert("password changed ");
                    $('#form')[0].reset();
               }
               else
               {
                   for (var i = 0; i < data.inputerror.length; i++)
                   {
                       $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                       $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                   }
               }
               $('#btnSave').text('save');
                //change button text
              //  $('#btnSave').attr('disabled',false); //set button enable
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
               alert('Error adding / update password');
               $('#btnSave').text('save'); //change button text
               $('#btnSave').attr('disabled',false); //set button enable
           }
       });
   }


   </script>
