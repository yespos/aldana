        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" id="PagePosition">
                  <div class="x_title">
                    <h2>Add New <small>Echo Wash</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?=base_url() ?>'">&laquo; Back</button></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <form id="form2" data-parsley-validate class="form-horizontal form-label-left input_mask" method="post" action="<?=base_url() ?>ecowash/add_ecowash_act">
                  
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                          <label class="control-label" for="first-name">Refernce Number</label>
                          <input type="text" id="first-name" readonly name="ref_no" class="form-control col-md-7 col-xs-12" value="INVE-<?=$last_id ?>">
                          <input type="hidden" name="created" value="<?php echo date("d/m/Y H:i:s") ?>">
                        </div>

                       <div class="col-md-4 col-sm-4 col-xs-6">
                         <label class="control-label" for="DateIn"> Date </label>
                        <input type="text" class=" date-picker form-control" id="DateIn"  value="" name="DateIn" readonly>
                       </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                         <label class="control-label" for="TimeIn"> Time </label>
                         <input type="text" class="form-control" readonly id="TimeIn" placeholder="" value="<?php echo date("H:i:s"); ?>" name="TimeIn">
                        </div>
                        </div>

                      <span style="background:#CCC; border:1px solid #999; width:100%; display:inline-block; margin-top:50px;" id="QRGrid">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Car Plate <span class="required">*</span></label>
                          <input type="text" id="VehicleNumber" required name="car_plate" class="form-control col-md-7 col-xs-12" value="" onchange="$(this).change_driver(this.value);">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Customer Name <span class="required">*</span></label>
                          <input type="text" id="customer_name" required name="customer_name" class="form-control col-md-7 col-xs-12" value="">
                        </div>                        
                      </div>
                      </span>

											<span style="background:#CCC; border:1px solid #999; width:100%; display:inline-block; margin-top:50px;" id="QRGrid">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Model<span class="required">*</span></label>
                          <input type="text" id="model"  name="model" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">TRN No.<span class="required">*</span> </label>
                          <input type="text" id="reg_no"  name="reg_no" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                      </div>
                    </span>

                    <span style="background:#CCC; border:1px solid #999; width:100%; display:inline-block; margin-top:50px;" id="QRGrid">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Tel/Mob<span class="required">*</span></label>
                          <input type="text" id="mobile" required name="mobile" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Mileage <span class="required">*</span> </label>
                          <input type="text" id="mileage"  name="mileage" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                      </div>
                    </span>
                   <br/>

                    <span style="background:#CCC; border:1px solid #999; width:100%; display:inline-block; margin-top:50px;" id="QRGrid">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Assigned to <span class="required">*</span></label>
													<select class="select2_group form-control" name="assigned_to" id="assigned_to">
                            <option value="">Select</option>
														<?php   foreach ($worker as $key => $value) { ?>
													<option value="<?=$value->id  ?>"> <?=$value->name ?> </option>
													<?php } ?>
                          </select>
                          <input type="hidden" id="employee" required name="employee" class="form-control col-md-7 col-xs-12" value="<?=$this->session->name   ?>">
													<input type="hidden" id="received_by"  name="received_by" class="form-control col-md-7 col-xs-12" value="<?=$this->session->name   ?>">
													<input type="hidden" id="user_id" required name="user_id" class="form-control col-md-7 col-xs-12" value="<?=$this->session->id   ?>">
													<input type="hidden" id="shift_id" required name="shift_id" class="form-control col-md-7 col-xs-12" value="<?=$this->session->shift_id   ?>">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Payment types <span class="required">*</span> </label>
                          <select class="select2_group form-control" name="pay_type" id="pay_type"  required >
                           <option value=""> Select</option>
                           <!-- <option value="Cash">Cash </option>
                           <option value="Debit Customer">Debit Customer </option>
                           <option value="Emirates Card">Emirates Card </option>
                           <option value="Bank">Bank</option> -->
                            <?php 
                                 if($paytype){
                                  foreach ($paytype as $value) { ?>
                                 <option value="<?=$value->id?>" <?=(isset($post['payment_method']) && $post['payment_method'] == $value->id)?'selected':''?>><?=$value->name?> </option>
                            <?php } } ?>
                           </select>
                        </div>
                      </div>
                    </span>
                   <br/>
                    
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Sales Category</label>
                            <select class="select2_group form-control col-md-5 col-xs-12" name="vehicleType" id="vehicleType" onchange="$(this).change_vehicle(this.value)" required >
                           <option value=""> Select</option>
                           <?php foreach($cartype as $car) {
                              ?> 
                           <option value="<?=$car->id ?>,<?=$car->echo_price ?>"> <?=$car->carType  ?> </option>
                         <?php } ?>
                           ?>
                           </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Amout </label>
                          <input type="text" id="amount"  required name="amount" class="form-control col-md-7 col-xs-12" value="" onchange="add_cal()">
                        </div> 

                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Vat </label>
                          <input type="text" id="vat" readonly required name="vat" class="form-control col-md-7 col-xs-12" value="">
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Total Amount</label>
                          <input type="text" id="total" readonly required name="total" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                      </div>
                      <div class="form-group">
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <label class="control-label" for="DateIn"> Invoice Ref No. </label>
                         <input type="text" class="form-control"  id="invoice_ref" placeholder="" value="" name="invoice_ref">
                       </div>
                      </div>
											
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                          <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='<?=base_url()  ?>'">Cancel</button>
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


  <?php $this->load->view('parking/layout/footer'); ?>
       
    <!-- Custom Theme Scripts -->
    <script src="<?=base_url() ?>assets/build/js/custom.min.js"></script>

  <script src="<?=base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
  <script type="text/javascript">
  function add_cal(sid) {
     var amount = parseInt($('#amount').val());
     var vat = (amount*5)/100;
     var total = amount + vat;
     $('#vat').val(vat);
     $('#total').val(total);
     
   }
  </script>

  <script>
      $(document).ready(function() {
        $('#DateIn').daterangepicker({
          singleDatePicker: true,
          dateFormat: 'dd-mm-YYYY',
          calender_style: "picker_4"
        }, function(start, end, label) {
        //  console.log(start.toISOString(), end.toISOString(), label);
        });
      });
</script>

     <script type="text/javascript">
      $(document).ready(function(){
      /*$('html, body').animate({
        scrollTop: $("#PagePosition").offset().top
       }, 500);*/
       
       $(".select2_single").select2({
              placeholder: "Select a state",
              allowClear: true
            });
       $(".select2_group").select2({});
    });
    </script>

    <script type="text/javascript">
    
 $(document).ready(function(){
 $.fn.change_driver = function(vehicle_no)
  {   
    var  vehicle_no;
    $.post(
           "<?php echo base_url(); ?>vehicle/change_driver",
                  { vehicle_no: vehicle_no },
                  function(data) {
                     // alert(data);
                     //$('#customer_name').val(data);
                     var obj = jQuery.parseJSON(data);
                     $('#customer_name').val(obj.customer_name);
                     $('#customer_id').val(obj.customer_id);
                     $('#mobile').val(obj.mobile);
                     $('#reg_no').val(obj.trn_no);
                     $('#model').val(obj.vehicleModel);
                     $('#mileage').val(obj.Millage);
                  }
           );
   };

  $.fn.change_vehicle = function(id)
  {  
     var hasil=id.split(',');
     var amount = parseFloat(hasil[1]);
      $('#amount').val(amount.toFixed(2));
     var vat = (amount * 5)/100;
     $('#vat').val(vat.toFixed(2));
     var total = amount + vat;  
     $('#total').val(total.toFixed(2));
   };
  

 });

</script>
    
  </body>
</html>
