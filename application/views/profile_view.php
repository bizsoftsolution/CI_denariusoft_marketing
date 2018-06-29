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
         <div class="">
           <div class="col-md-12">
             <span class="error_messagess"></span>
              <br><br>

           </div>
        </div>
        <div class="col-md-2s">
        </div>
        <div class="col-md-8">
          <h1>Edit Profile</h1>
          <?php foreach ($EmployeeList as $row1){ ?>
            <form action="#" id="form" class="form-horizontal">
              <input type="hidden"  name="id" value="<?php echo $row1->id;?> "/>
              <input type="hidden"  name="branch_no" value="<?php echo $row1->branch_no;?> "/>
                <input type="hidden"  name="designation" value="<?php echo $row1->designation;?> "/>
                <div class="form-body">
                    <div class="form-group">
                     <label class="control-label col-md-3">Name</label>
                     <div class="col-md-9">
                         <input name="name" placeholder="Employee Name" class="form-control" type="text" value="<?php echo $row1->ename;?> ">
                         <span class="help-block"></span>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-md-3">Date of Birth</label>
                     <div class="col-md-9">
                         <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" value="<?php echo $row1->dob;?> ">
                         <span class="help-block"></span>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-md-3">Street1</label>
                     <div class="col-md-9">
                         <input type="text" name="street1" placeholder="Street1" class="form-control" value="<?php echo $row1->street1 ;?>">
                         <span class="help-block"></span>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-md-3">Street2</label>
                     <div class="col-md-9">
                         <input type="text" name="street2" placeholder="Street2" class="form-control" value="<?php echo $row1->street2 ;?>">
                         <span class="help-block"></span>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-md-3">City</label>
                     <div class="col-md-9">
                         <input type="text" name="city" placeholder="City" class="form-control" value="<?php echo $row1->city ;?>">
                         <span class="help-block"></span>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-md-3">State</label>
                     <div class="col-md-9">
                         <input type="text" name="state" placeholder="State" class="form-control" value="<?php echo $row1->state ;?>">
                         <span class="help-block"></span>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-md-3">Country</label>
                     <div class="col-md-9">
                         <input type="text" name="country" placeholder="Country" class="form-control" value="<?php echo $row1->country ;?>">
                         <span class="help-block"></span>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-md-3">Phone Number</label>
                     <div class="col-md-9">
                         <input type="text" name="phone_number" placeholder="Phone Number" class="form-control" value="<?php echo $row1->phone_number;?>">
                         <span class="help-block"></span>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-md-3">E-Mail</label>
                     <div class="col-md-9">
                         <input type="email" name="email" placeholder="E-Mail" class="form-control" value="<?php echo $row1->email ;?>">
                         <span class="help-block"></span>
                     </div>
                 </div>

                 <div class="form-group" id="photo-preview">
                     <label class="control-label col-md-3">Photo</label>
                     <div class="col-md-9">
                         <a href="<?php echo base_url('upload/'.$row1->photo);?>" target="_blank"><img src="<?php echo base_url('upload/'.$row1->photo);?>" class="img-responsive" /></a>
                         <span class="help-block"></span>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-md-3" id="label-photo">Upload Photo </label>
                     <div class="col-md-9">
                         <input name="photo" type="file">
                         <span class="help-block"></span>
                     </div>
                 </div>

                 <div class="modal-footer">
                     <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                 </div>

            </form>
          </div>
          <?php }?>
      </div>
   </div>
   <script type="text/javascript">

   var save_method; //for save method string
   var table;
   var base_url = '<?php echo base_url();
  ?>';

   $(document).ready(function() {

       //datatables
       table = $('.table').DataTable({

           "processing": true, //Feature control the processing indicator.
           "serverSide": true, //Feature control DataTables' server-side processing mode.
           "order": [], //Initial no order.

           // Load data for the table's content from an Ajax source
           "ajax": {
               "url": "<?php echo base_url('employee/employee_list');
  ?>",
               "type": "POST"
           },

           //Set column definition initialisation properties.
           "columnDefs": [
               {
                   "targets": [ -1 ], //last column
                   "orderable": false, //set not orderable
               },
               {
                   "targets": [ -2 ], //2 last column (photo)
                   "orderable": false, //set not orderable
               },
           ],

       });

       //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "down auto",
            todayBtn: true,
            todayHighlight: true,
        });

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

   function save()
   {
      $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;


        url = "<?php echo base_url('employee/employee_update')?>";


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
                $('#form')[0].reset();
                alert("profile Updated");
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
   }
   function edit_employee(id)
   {
       save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url('Profile/profile_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="name"]').val(data.ename);
            $('[name="dob"]').datepicker('update',data.dob);
            $('[name="designation"]').val(data.designation);
            $('[name="street1"]').val(data.street1);
            $('[name="street2"]').val(data.street2);
            $('[name="city"]').val(data.city);
            $('[name="state"]').val(data.state);
            $('[name="country"]').val(data.country);
            $('[name="phone_number"]').val(data.phone_number);
            $('[name="email"]').val(data.email);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Employee'); // Set title to Bootstrap modal title

            $('#photo-preview').show(); // show photo preview modal

            if(data.photo)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.photo+'" class="img-responsive">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo

            }
            else
            {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from employee');
        }
    });
   }

   function reload_table()
   {
     alert('gopi the king');  //Reaload Current page
   }
   </script>
