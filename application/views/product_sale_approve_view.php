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
         <div class="row">
            <div class="col-md-12">
               <div class="panel panel-primary">
                  <div class="panel-heading">
                     <h3 class="panel-title">Sales Details</h3>
                  </div>
                  <div class="panel-body" >
                    <br />
                    <br />
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Product Name</th>
                                <th>Buyer Company</th>
                                <th>Contact Person</th>
                                <th>Phone Number</th>
                                <th>Email </th>
                                <th>Mode Of Payment</th>
                                <th>Sale Date</th>
                                <th style="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Employee Name</th>
                            <th>Product Name</th>
                            <th>Buyer Company</th>
                            <th>Contact Person</th>
                            <th>Phone Number</th>
                            <th>Email </th>
                            <th>Mode Of Payement</th>
                            <th>Sale Date</th>
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
               "url": "<?php echo base_url('Product_sales/approve_product_list');
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



   function new_sale()
   {
       save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('New Sale'); // Set Title to Bootstrap modal title

    //$('#photo-preview').hide(); // hide photo preview modal

    // $('#label-photo').text('Upload Photo'); // label photo upload
   }

   function approve_sale($product_sale_id)
   {
       save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url('Product_sales/Product_edit_approve')?>/" + $product_sale_id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="product_sale_id"]').val(data.product_sale_id);
            $('[name="product_name"]').val(data.product_name);
            $('[name="product_id"]').val(data.product_id);
            $('[name="buyer_company"]').val(data.buyer_company);
            $('[name="contact_person"]').val(data.contact_person);
            $('[name="phone_number"]').val(data.phone_number);
            $('[name="email"]').val(data.email);
            $('[name="mode_of_payment"]').val(data.mode_of_payment);
            $('[name="insert_date"]').datepicker('update',data.insert_date);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Sale'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from Sale');
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


        url = "<?php echo base_url('Product_sales/approve_product_update')?>";


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

   function delete_sale(product_sale_id)
   {
       if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('Product_sales/product_delete')?>/"+product_sale_id,
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
                   <h3 class="modal-title">Sale Form</h3>
               </div>
               <div class="modal-body form">
                   <form action="#" id="form" class="form-horizontal">
                       <input type="hidden" value="" name="product_sale_id"/>
                       <input type="hidden" value="" name="product_id"/>

                       <div class="form-group">
                           <label class="control-label col-md-3">Product</label>
                           <div class="col-md-9">
						   <input name="product_id" placeholder="Buyer Company" class="form-control" type="hidden">
						   <input name="product_name" placeholder="Buyer Company" class="form-control" type="text" readonly="">
                               <span class="help-block"></span>
                           </div>
                       </div>

                       <div class="form-body">
                           <div class="form-group">
                            <label class="control-label col-md-3">Buyer Company</label>
                            <div class="col-md-9">
                                <input name="buyer_company" placeholder="Buyer Company" class="form-control" type="text" readonly="">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Contact Person</label>
                            <div class="col-md-9">
                                <input type="text" name="contact_person" placeholder="Contact Person" class="form-control" readonly="">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Phone Number</label>
                            <div class="col-md-9">
                                <input type="text" name="phone_number" placeholder="Phone Number" class="form-control" readonly="">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">E-Mail</label>
                            <div class="col-md-9">
                                <input type="email" name="email" placeholder="E-Mail" class="form-control" readonly="">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Mode of Payment</label>
                            <div class="col-md-9">
                                <input type="text" name="mode_of_payment" class="form-control" readonly="">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Sale Date</label>
                            <div class="col-md-9">
                                <input name="insert_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" value="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Serial Number</label>
                            <div class="col-md-9">
                                <input name="serial_number" placeholder="Serial Number" class="form-control " type="text" value="">
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
