  <?php  
           $curr = date("d-m-Y H:i:s");
           $date = str_replace('/', '-', $list->created);
           $to_time = strtotime($curr);
           $from_time = strtotime($date);
           $time = round(abs($to_time - $from_time) / (60*60),2); 
           $intTime = (int)$time;
           if($intTime < $time)
           {
            $amount = ($intTime+1) * 10;
           }
           else
           {
              $amount = ($intTime) * 10;
           } 
           $vat = ($amount*5)/100; 
           
             ?>
     <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" id="PagePosition">
                  <div class="x_title">
                    <h2>Vehicle Out <small> Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <!--li><button type="button" class="btn btn-danger" onclick="javascript:window.location.href='driver.asp'">&laquo; Back</button></li-->
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <form id="form2" data-parsley-validate class="form-horizontal form-label-left input_mask" method="post" action="<?=base_url() ?>vehicle/out_act">
                      <span id="QRGrid">
                 <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Invoice Number <span class="required">*</span></label>
                          <input type="text" id="invoiceCode" name="invoiceCode" class="form-control col-md-7 col-xs-12" required value="<?=$list->InvNumber ?>" onchange="javascript:getInvoice(this.value);">
                          <input type="hidden" name="id" value="<?=$list->id ?>">
                        </div>
                      
                        <div class="col-md-4 col-sm-4 col-xs-6">
                         <label class="control-label" for="DateIn">Date IN</label>
                         <input type="text" class="form-control" readonly id="DateIn" placeholder="" value="<?=$list->dateIn ?>" name="DateIn">
                        </div>
                        
                        <div class="col-md-4 col-sm-4 col-xs-6">
                         <label class="control-label" for="TimeIn">Time IN</label>
                         <input type="text" class="form-control" readonly id="TimeIn" placeholder="" value="<?=$list->timeIn ?>" name="TimeIn">
                        </div>
                       </div>
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Vehicle Number</label>
                          <input type="text" id="VehicleNumber" readonly name="VehicleNumber" class="form-control col-md-7 col-xs-12" value="<?=$list->vehicleNumber ?>">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Customer Name</label>
                          <input type="text" id="first-name" readonly name="customerName" class="form-control col-md-7 col-xs-12" value="<?=$list->customerName ?>">
                        </div>                        
                      </div>

                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Invoice Amount</label>
                          <input type="text" id="invoiceAmount" readonly name="invoiceAmount" class="form-control col-md-7 col-xs-12" value="<?=$amount ?>">
                          <input type="hidden" name="invoiceVat" value="<?=$vat ?>">
                        </div>
                      
                        <div class="col-md-4 col-sm-4 col-xs-6">
                         <label class="control-label" for="DateIn">Date Out</label>
                         <input type="text" class="form-control" readonly id="DateOut" placeholder="" value="<?php echo date("d/m/Y"); ?>" name="DateOut">
                        </div>
                        
                        <div class="col-md-4 col-sm-4 col-xs-6">
                         <label class="control-label" for="TimeOut">Time Out</label>
                         <input type="text" class="form-control" readonly id="TimeOut" placeholder="" value="<?php echo date("H:i:s"); ?>" name="TimeOut">
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
    <script src="<?=base_url() ?>vendors/select2/dist/js/select2.full.min.js"></script>
    
  </body>
</html>
