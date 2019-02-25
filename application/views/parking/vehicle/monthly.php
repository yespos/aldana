      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" id="PagePosition">
                  <div class="x_title">
                    <h2>Monthly Vehicle Booking<small> Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <!--li><button type="button" class="btn btn-danger" onclick="javascript:window.location.href='driver.asp'">&laquo; Back</button></li-->
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <form id="form2" data-parsley-validate class="form-horizontal form-label-left input_mask" method="post" action="monthly_act.asp">
            <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Invoice Number</label>
                          <input type="text" id="first-name" readonly name="invoiceCode" class="form-control col-md-7 col-xs-12" value="INV-00349">
                          <input type="hidden" name="LastID" value="349">
                        </div>
            
                        <div class="col-md-4 col-sm-4 col-xs-6">
                         <label class="control-label" for="DateIn">Date In</label>
                         <input type="text" class="form-control" id="single_cal11" onChange="chkDate();" placeholder="" value="6/18/2018" name="DateIn">
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-6">
                         <label class="control-label" for="TimeIn">Time In</label>
                         <input type="text" class="form-control" readonly id="TimeIn" placeholder="" value="2:55:19 AM" name="TimeIn">
                        </div>
                        
                        <div class="col-md-4 col-sm-4 col-xs-6">
                         <label class="control-label" for="DateIn">Valid Till Date</label>
                         <input type="text" class="form-control" id="single_cal1" onChange="chkDate();" placeholder="" value="7/18/2018" name="DateOut">
                        </div>
            
                        <div class="col-md-4 col-sm-4 col-xs-6">
                         <label class="control-label" for="TimeIn">Valid Till Time</label>
                         <input type="text" class="form-control" readonly id="TimeOut" placeholder="" value="2:54:19 AM" name="TimeOut">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                         <label class="control-label" for="TimeIn">Number of Days:</label>
                         <input type="text" class="form-control" readonly id="nmbrDays" placeholder="" value="" name="nmbrDays">
                        </div>
                        
                      </div>
                      <span style="background:#CCC; border:1px solid #999; width:100%; display:inline-block; margin-top:50px;" id="QRGrid">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Vehicle Number <span class="required">*</span></label>
                          <input type="text" id="VehicleNumber" required name="VehicleNumber" class="form-control col-md-7 col-xs-12" value="" onchange="javascript:additem(this.value);">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Customer Name</label>
                          <input type="text" id="first-name" name="customerName" class="form-control col-md-7 col-xs-12" value="">
                        </div>                        
                      </div>
                      </span>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                          <button type="reset" class="btn btn-primary" onclick="javascript:window.location.href='dashboard.asp'">Cancel</button>
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
    
  </body>
</html>
