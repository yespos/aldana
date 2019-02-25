      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" id="PagePosition">
                  <div class="x_title">
                    <h2>Add New <small>Vehicle Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?=base_url() ?>vehicle'">&laquo; Back</button></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <form id="editvehicle" data-parsley-validate class="form-horizontal form-label-left input_mask" method="post" action="<?=base_url() ?>vehicle/edit_vehicle_act">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Code</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" readonly name="vehicleCode" class="form-control col-md-7 col-xs-12" value="<?=$list->vehicleCode ?>">
                          <input type="hidden" name="id" value="<?=$list->id ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Type <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                              <select name="vehicleType" id="vehicleType" class="select2_group form-control">
                                  <option value="">Select Vehicle Type</option>

                                <?php  foreach ($vehicletype as $val) {
                               ?>
                                <option value="<?= $val->id ?>" <?php echo $val->id==$list->vehicleType?"Selected":"";  ?>><?= $val->name ?></option>
                                <?php   
                                }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="enginetype">Engine Type</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                              <select name="enginetype" id="enginetype" class="select2_group form-control">
                                <option value="">Select Engine Type</option>

                                <?php  foreach ($enginetype as $val) {
                               ?>
                                <option value="<?= $val->id ?>" <?php echo $val->id==$list->enginetype?"Selected":"";  ?>><?= $val->Name ?></option>
                                <?php   
                                }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="vehiclesize">Vehicle Size</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                              <select name="vehiclesize" id="vehiclesize" class="select2_group form-control">
                                <option value="">Select Size</option>

                                <?php  foreach ($vehiclesize as $cartype) {
                               ?>
                                <option value="<?= $cartype->id ?>" <?php echo $cartype->id==$list->vehiclesize?"Selected":"";  ?>><?= $cartype->Name ?></option>
                                <?php   
                                }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="vehicleusage">Vehicle Usage</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                              <select name="vehicleusage" id="vehicleusage" class="select2_group form-control">
                                <option value="">Select Vehicle Usage</option>

                                <?php  foreach ($vehicleusage as $cartype) {
                               ?>
                                <option value="<?= $cartype->id ?>" <?php echo $cartype->id==$list->vehicleusage?"Selected":"";  ?>><?= $cartype->Name ?></option>
                                <?php   
                                }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="vehiclelegal">Legal</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                              <select name="vehiclelegal" id="vehiclelegal" class="select2_group form-control">
                                <option value="">Select Vehicle Legal</option>

                                <?php  foreach ($vehiclelegal as $cartype) {
                               ?>
                                <option value="<?= $cartype->id ?>" <?php echo $cartype->id==$list->vehiclelegal?"Selected":"";  ?>><?= $cartype->Name ?></option>
                                <?php   
                                }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="vehicleutil">Util</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                              <select name="vehicleutil" id="vehicleutil" class="select2_group form-control">
                                <option value="">Select Util</option>

                                <?php  foreach ($vehicleutil as $cartype) {
                               ?>
                                <option value="<?= $cartype->id ?>" <?php echo $cartype->id==$list->vehicleutil?"Selected":"";  ?>><?= $cartype->Name ?></option>
                                <?php   
                                }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="vehicleclass">Vehicle Class</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                              <select name="vehicleclass" id="vehicleclass" class="select2_group form-control">
                                <option value="">Select Vehicle Class</option>

                                <?php  foreach ($vehicleclass as $cartype) {
                               ?>
                                <option value="<?= $cartype->id ?>" <?php echo $cartype->id==$list->vehicleclass?"Selected":"";  ?>><?= $cartype->Name ?></option>
                                <?php   
                                }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="vehiclefeatures">Features</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                              <select name="vehiclefeatures" id="vehiclefeatures" class="select2_group form-control">
                                <option value="">Select Vehicle Features</option>

                                <?php  foreach ($vehiclefeatures as $cartype) {
                               ?>
                                <option value="<?= $cartype->id ?>" <?php echo $cartype->id==$list->vehiclefeatures?"Selected":"";  ?>><?= $cartype->Name ?></option>
                                <?php   
                                }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group show_cat" style="<?php if(trim($list->vehiclefeatures)=='1' || trim($list->vehiclefeatures)=='2' || trim($list->vehiclefeatures)=='5'){echo '';}else{echo 'display:none;';} ?>">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="vehiclefeatures_cat"></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                              <select name="vehiclefeatures_cat" id="vehiclefeatures_cat" class="form-control">
                                <option value="">Select</option>

                                <?php  foreach ($vehiclefeatures_subcat as $cartype) {
                               ?>
                                <option value="<?= $cartype->id ?>" <?php echo $cartype->id==$list->vehiclefeatures_cat?"Selected":"";  ?>><?= $cartype->Name ?></option>
                                <?php   
                                }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="vehiclecondition">Condition</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                              <select name="vehiclecondition" id="vehiclecondition" class="select2_group form-control">
                                <option value="">Select Vehicle Condition</option>

                                <?php  foreach ($vehiclecondition as $cartype) {
                               ?>
                                <option value="<?= $cartype->id ?>" <?php echo $cartype->id==$list->vehiclecondition?"Selected":"";  ?>><?= $cartype->Name ?></option>
                                <?php   
                                }  ?>
                                </select>
                            </div>
                        </div>  
                        </div>
                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label col-md-4 col-sm-4 col-xs-12" for="Year">Year <span class="required"></span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" id="Year" name="Year" class="form-control col-md-7 col-xs-12 datepicker" value="<?=date('Y-m-d',strtotime($list->Year)) ?>">
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="control-label col-md-4 col-sm-4 col-xs-12" for="VehicleChassisNumber">VCN (Vehicle Chassis Number) <span class="required VCN" style="<?php if(trim($list->vehiclelegal)=='2'){echo '';}else{echo 'display:none;';} ?>">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" id="VehicleChassisNumber" name="VehicleChassisNumber" class="form-control col-md-7 col-xs-12" value="<?=$list->VehicleChassisNumber ?>">
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="control-label col-md-4 col-sm-4 col-xs-12" for="VehicleRegistrationNumber">VRN (Vehicle Registration Number)  <span class="required"></span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" id="VehicleRegistrationNumber" name="VehicleRegistrationNumber" class="form-control col-md-7 col-xs-12" value="<?=$list->VehicleRegistrationNumber ?>">
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="control-label col-md-4 col-sm-4 col-xs-12" for="Millage">Millage  <span class="required"></span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" id="Millage"  name="Millage" class="form-control col-md-7 col-xs-12" value="<?=$list->Millage ?>">
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="control-label col-md-4 col-sm-4 col-xs-12" for="Trim">Trim  <span class="required"></span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" id="Trim"  name="Trim" class="form-control col-md-7 col-xs-12" value="<?=$list->Trim ?>">
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="control-label col-md-4 col-sm-4 col-xs-12" for="vehicleNumber">Vehicle Number <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" id="vehicleNumber" name="vehicleNumber" class="form-control col-md-7 col-xs-12" value="<?=$list->vehicleNumber ?>">
                           </div>
                       </div>

                         <div class="form-group">
                           <label class="control-label col-md-4 col-sm-4 col-xs-12" for="customerID">Customer Name <span class="required">*</span></label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <select name="customerID" id="customerID" class="select2_group form-control">
                               <option value="">Select Customer</option>

                               <?php  foreach ($customers as $customer) {
                              ?>
                               <option value="<?= $customer->id ?>" <?php echo $customer->id==$list->customerId?"Selected":"";  ?>><?= $customer->customerName ?> | <?= $customer->customerCode ?></option>
                               <?php   
                               }  ?>
                               </select>
                           </div>
                         </div>

                         <div class="form-group">
                           <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Color</label>
                           <div class="col-md-6 col-sm-6 col-xs-12">

                             <select name="vehicleColor" id="vehicleColor" class="select2_group form-control">
                               <option value="">Select Vehicle Color</option>
                             <?php  foreach ($colors as $color) {
                              ?>
                               <option value="<?= $color->id ?>" <?php echo $color->id==$list->vehicleColor?"Selected":"";  ?>><?= $color->colorName ?></option>
                               <?php   
                               }  ?>
                               <option value="Others">Others</option>
                             </select>
                           </div>
                         </div>

                         <div class="form-group">
                           <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Vehicle Make/Brand</label>
                           <div class="col-md-6 col-sm-6 col-xs-12">

                             <select name="vehicleBrand" id="vehicleBrand" class="select2_group form-control">
                               <option value="">Select Vehicle Brand</option>

                             <?php  foreach ($cars as $car) {
                              ?>
                               <option value="<?= $car->id ?>" <?php echo $car->id==$list->vehicleBrand?"Selected":"";  ?>><?= $car->carName ?></option>
                               <?php   
                               }  ?>
                               </select>
                           </div>
                         </div>
                            <div class="form-group">
                           <label class="control-label col-md-4 col-sm-4 col-xs-12" for="vehiclemodel">Model</label>
                           <div class="col-md-6 col-sm-6 col-xs-12">

                             <select name="vehiclemodel" id="vehiclemodel" class="select2_group form-control">
                               <option value="">Select Vehicle Model</option>

                               <?php  foreach ($vehiclemodel as $cartype) {
                              ?>
                               <option value="<?= $cartype->id ?>" <?php echo $cartype->id==$list->vehiclemodel?"Selected":"";  ?>><?= $cartype->carName ?></option>
                               <?php   
                               }  ?>
                               </select>
                           </div>
                       </div>
                   </div>
                    
                </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='<?=base_url() ?>vehicle'">Cancel</button>
                          <button type="submit" class="btn btn-success saveaction">Save</button>
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
    
    $("#vehiclelegal").on("change",  function (event){
        var valuetext = $(this).find("option:selected").text();
        if(valuetext=='Not Register'){
            $('.VCN').show();
        }else{
            $('.VCN').hide();
        }
    });
    
    
    
    $('#vehiclefeatures').change(function(){
      var id = $(this).val();
      var valuetext = $(this).find("option:selected").text();
        if(valuetext=='Convertible' || valuetext=='Sunroof' || valuetext=='Transmission'){
            $('.show_cat').show();
        }else{
            $('.show_cat').hide();
        }
      $('#vehiclefeatures_cat').html('<option value="">Select</option>');
      $.ajax({
          url: "<?php echo base_url('vehicle/getvehiclefeatures_subcat') ?>/"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data){
            for(i=0;i<data.length;i++){
              $('#vehiclefeatures_cat').append('<option value="' + data[i].id + '">' + data[i].Name + '</option>');
            }
          }
        });
    });
    </script>
    
    <script type="text/javascript">
        
    $('#editvehicle').on('submit',function (e){
        e.preventDefault();
        var postdata = $(this).serialize();
        var name_regex = /^[a-zA-Z\s]+$/;
        var sname_regex = /^[-a-zA-Z\s]+$/;
        var mobile_regex = /^[0-9][0-9]{9}$/; 
        var postal_regex = /^[1-9][0-9]{5}$/
        var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var vehicleNumber = $('#vehicleNumber').val();
        var vehicleType = $('#vehicleType').select2().val();
        var customerID = $('#customerID').select2().val();
        var vehiclelegal = $('#vehiclelegal').select2().val();
        var valuetext = $('#vehiclelegal').find("option:selected").text();
        var VehicleChassisNumber = $('#VehicleChassisNumber').val();
        
        
        if(vehicleType==null || vehicleType==""){
            alert("Please select vehicle type.");
            $("#vehicleType").select2().focus();
            return false;
        }
        if(vehiclelegal != '' && valuetext == 'Not Register'){
            if(VehicleChassisNumber==null || VehicleChassisNumber==""){
                alert("Please enter Vehicle Chassis Number.");
                $("#VehicleChassisNumber").focus();
                return false;
            }
        }
        if(vehicleNumber==null || vehicleNumber==""){
            alert("Please enter vehicle number.");
            $("#vehicleNumber").focus();
            return false;
        }
        if(customerID==null || customerID==""){
            alert("Please select customer name.");
            $("#customerID").select2().focus();
            return false;
        }
        
        
       
//        new PNotify({
//          title: "Over Here",
//          text: "Check me out. I'm in a different stack.",
//          type: 'error',
//          addclass: "stack-modal",
//          delay: 2500
//        });
//        return false;
        $.ajax({
            url: "<?php echo base_url('vehicle/edit_vehicle_act') ?>",
            type: 'POST',
            data: postdata,
            dataType: 'json',
            beforeSend: function(){ $('.saveaction').html('Please wait..'); $('.saveaction').attr('disabled',true);},
            success:function(result){
                if(result.success){
                    alert('Save Successfully');
                    $('.saveaction').removeAttr('disabled',true);
                    window.location.href = '<?php echo base_url('vehicle') ?>'; 
                }else{
                    $('.saveaction').removeAttr('disabled',true);
                    $('.saveaction').html('Save');
                    alert(result.message);
                }
            },
            error:function(){
                $('.saveaction').removeAttr('disabled',true);
                $('.saveaction').html('Save');
                alert('oops response error');
            }

        });
        
    });
    $(document).ready(function() {
      $('.datepicker').datepicker({
          autoclose: true,
          format: "yyyy-mm-dd",
          todayHighlight: true,
          orientation: "auto",
          todayBtn: true,
          todayHighlight: true,  
      });
    });
    </script>
    
  </body>
</html>
