      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" id="PagePosition">
                  <div class="x_title">
                    <h2>Add New <small>Vehicle Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?=base_url() ?>'">&laquo; Back</button></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <form id="form2" data-parsley-validate class="form-horizontal form-label-left input_mask" method="post" action="<?=base_url() ?>vehicle/add_vehicle_act">
                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vehicle Code
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" readonly name="vehicleCode" class="form-control col-md-7 col-xs-12" value="VH-0000<?=$last_id+1 ?>">
                          <input type="hidden" name="LastID" value="2">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vehicle Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required name="vehicleNumber" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="customerID" id="customerID" class="select2_group form-control">
                            <option selected>Select Customer</option>

                            <?php  foreach ($customers as $customer) {
                           ?>
                            <option value="<?= $customer->id ?>"><?= $customer->customerName ?> | <?= $customer->customerCode ?></option>
                            <?php   
                            }  ?>
                            </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vehicle Color</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <select name="vehicleColor" id="vehicleColor" class="select2_group form-control">
                            <option selected>Select Vehicle Color</option>
                          <?php  foreach ($colors as $color) {
                           ?>
                            <option value="<?= $color->id ?>"><?= $color->colorName ?></option>
                            <?php   
                            }  ?>
                            <option value="Others">Others</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vehicle Brand</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <select name="vehicleBrand" id="vehicleBrand" class="select2_group form-control">
                            <option selected>Select Vehicle Brand</option>
                            
                          <?php  foreach ($cars as $car) {
                           ?>
                            <option value="<?= $car->id ?>"><?= $car->carName ?></option>
                            <?php   
                            }  ?>
                            </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vehicle Type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <select name="vehicleType" id="vehicleType" class="select2_group form-control">
                            <option selected>Select Vehicle Type</option>
                            
                            <?php  foreach ($cartypes as $cartype) {
                           ?>
                            <option value="<?= $cartype->id ?>"><?= $cartype->carType ?></option>
                            <?php   
                            }  ?>
                            </select>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='<?=base_url() ?>customer'">Cancel</button>
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
    
  </body>
</html>
