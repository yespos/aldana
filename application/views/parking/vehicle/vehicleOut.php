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
                    
                    <form id="form2" data-parsley-validate class="form-horizontal form-label-left input_mask" method="post" action="<?=base_url() ?>vehicle/getInvoice">

                      <span id="QRGrid">
                  <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Invoice Number <span class="required">*</span></label>
                          <input type="text" id="invoiceCode" name="invoiceCode" class="form-control col-md-7 col-xs-12" required value="">
                          <input type="hidden" name="ID" value=""><br>
                          <span style="color:red; font-size:10px;">
                            <?php
                                  if($this->session->flashdata('error'))
                                  {
                                    echo $this->session->flashdata('error');
                                  }
                              ?>
                          </span>
                        </div>
                      </div>
                      </span>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                          <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='<?=base_url() ?>invoices'">Cancel</button>
                          <button type="submit" class="btn btn-success">Search</button>
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
