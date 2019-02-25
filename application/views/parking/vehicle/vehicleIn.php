      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" id="PagePosition">
                  <div class="x_title">
                    <h2>Vehicle IN <small> Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <!--li><button type="button" class="btn btn-danger" onclick="javascript:window.location.href='driver.asp'">&laquo; Back</button></li-->
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <form id="form2" data-parsley-validate class="form-horizontal form-label-left input_mask" method="post" action="<?=base_url() ?>vehicle/in_act">
                    <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                          <label class="control-label" for="first-name">Invoice Number</label>
                          <input type="text" id="first-name" readonly name="invoiceCode" class="form-control col-md-7 col-xs-12" value="INV-<?=$last_id ?>">
                          <input type="hidden" name="created" value="<?php echo date("d/m/Y H:i:s") ?>">
                        </div>

                       <div class="col-md-4 col-sm-4 col-xs-6">
                         <label class="control-label" for="DateIn"> Date </label>
                         <input type="text" class="form-control" readonly id="DateIn" placeholder="" value="<?php echo date("d/m/Y"); ?>" name="DateIn">
                       </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                         <label class="control-label" for="TimeIn"> Time </label>
                         <input type="text" class="form-control" readonly id="TimeIn" placeholder="" value="<?php echo date("H:i:s"); ?>" name="TimeIn">
                        </div>
                    </div>
                      <span style="background:#CCC; border:1px solid #999; width:100%; display:inline-block; margin-top:50px;" id="QRGrid">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Vehicle Number <span class="required">*</span></label>
                          <input type="text" id="VehicleNumber" required name="VehicleNumber" class="form-control col-md-7 col-xs-12" value="" onchange="$(this).change_driver(this.value);">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Customer Name <span class="required">*</span></label>
                          <input type="text" id="customerName" required name="customerName" class="form-control col-md-7 col-xs-12" value="">
                        </div>                        
                      </div>
                      </span>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                          <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='invoices.asp'">Cancel</button>
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

    <!-- End Review Section -->
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
                     $('#customerName').val(data);
                  }
           );
   }; 

 });
 </script>
    
  </body>
</html>
