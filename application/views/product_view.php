<div class="content-page">
   <div class="content">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="page-header-title">
                  <h4 class="pull-left page-title">Dashboard</h4>
                  <ol class="breadcrumb pull-right">
                     <li><a href="#">Market Analyser</a></li>
                     <li class="active">Dashboard</li>
                  </ol>
                  <div class="clearfix"></div>
               </div>
            </div>
         </div>
         <div class="">
           <div class="col-md-12">
             <button class="btn btn-danger" onclick="add_product()"><i class="glyphicon glyphicon-plus"></i> Add product</button>
             <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
              <br><br>

           </div>
        </div>

         <div class="row">
            <div class="col-md-12">
               <div class="panel panel-primary">
                  <div class="panel-heading">
                     <h3 class="panel-title">Product Table</h3>
                  </div>
                  <div class="panel-body" >
                    <br />
                    <br />
                      <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Selling Price</th>
                                <th>Commission</th>
                                <th style="width:125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                        <tfoot>
                        <tr>
                          <th>Product Name</th>
                          <th>Selling Price</th>
                          <th>Commission</th>
                          <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                  </div>
               </div>
            </div>
         </div>
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
               "url": "<?php echo base_url('Product/ajax_list');  ?>",
               "type": "POST"
           },
           dom: 'Bfrtip',
           buttons: [
               'print',
               'copyHtml5',
               'excelHtml5',
               'csvHtml5',
               'pdfHtml5'
           ],
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
           orientation: "top auto",
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



   function add_product()
   {
       save_method = 'add';
       $('#form')[0].reset(); // reset form on modals
       $('.form-group').removeClass('has-error'); // clear error class
       $('.help-block').empty(); // clear error string
       $('#modal_form').modal('show'); // show bootstrap modal
       $('.modal-title').text('Add Product'); // Set Title to Bootstrap modal title

       $('#photo-preview').hide(); // hide photo preview modal

       $('#label-photo').text('Upload Photo'); // label photo upload
   }

   function edit_product(product_id)
   {
       save_method = 'update';
       $('#form')[0].reset(); // reset form on modals
       $('.form-group').removeClass('has-error'); // clear error class
       $('.help-block').empty(); // clear error string


       //Ajax Load data from ajax
       $.ajax({
           url : "<?php echo base_url('Product/ajax_edit');?>/" + product_id,
           type: "GET",
           dataType: "JSON",
           success: function(data)
           {

               $('[name="product_id"]').val(data.product_id);
               $('[name="product_name"]').val(data.product_name);
               $('[name="selling_price"]').val(data.selling_price);
               $('[name="commission"]').val(data.commission);



               $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
               $('.modal-title').text('Edit Product'); // Set title to Bootstrap modal title



           },
           error: function (jqXHR, textStatus, errorThrown)
           {
               alert('Error get data from ajax');
           }
       });
   }

   function reload_table()
   {
       table.ajax.reload(null,false); //reload datatable ajax
   }

   function save()
   {
       $('#btnSave').text('saving...'); //change button text
       $('#btnSave').attr('disabled',true); //set button disable
       var url;

       if(save_method == 'add') {
           url = "<?php echo base_url('Product/ajax_add');  ?>";
       } if(save_method =='update'){
           url = "<?php echo base_url('Product/ajax_update'); ?>";
       }

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
                   $('#modal_form').modal('hide');
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

   function delete_product(product_id)
   {
       if(confirm('Are you sure delete this data?'))
       {
           // ajax delete data to database
           $.ajax({
               url : "<?php echo base_url('Product/ajax_delete');  ?>/"+product_id,
               type: "POST",
               dataType: "JSON",
               success: function(data)
               {
                   //if success reload ajax table
                   $('#modal_form').modal('hide');
                   reload_table();
               },
               error: function (jqXHR, textStatus, errorThrown)
               {
                   alert('Error deleting data');
               }
           });

       }
   }

   </script>

   <!-- Bootstrap modal -->
   <div class="modal fade" id="modal_form" role="dialog">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h3 class="modal-title">Product Form</h3>
               </div>
               <div class="modal-body form">
                   <form action="#" id="form" class="form-horizontal">
                       <input type="hidden" value="" name="product_id"/>
                       <div class="form-body">
                           <div class="form-group">
                               <label class="control-label col-md-3">Product Name</label>
                               <div class="col-md-9">
                                   <input name="product_name" placeholder="Product Name" class="form-control" type="text">
                                   <span class="help-block"></span>
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="control-label col-md-3">Selling Price</label>
                               <div class="col-md-9">
                                   <input name="selling_price" placeholder="Selling Price" class="form-control" type="text">
                                   <span class="help-block"></span>
                               </div>
                           </div>

                           <div class="form-group">
                               <label class="control-label col-md-3">Commission</label>
                               <div class="col-md-9">
                                   <input name="commission" placeholder="commission" class="form-control" type="text">
                                   <span class="help-block"></span>
                               </div>
                           </div>
                           </div>
                   </form>
               </div>
               <div class="modal-footer">
                   <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
               </div>
           </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
