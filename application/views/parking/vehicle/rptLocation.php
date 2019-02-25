     <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row" id="PagePosition">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--Alerts Start-->
                  <div class="x_content bs-example-popovers">
                      
                  </div>
                  <!--Alerts End-->
                  <div class="x_title">
                    <h2>Customer Wise <small>Report</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
          
                      <form class="form-horizontal" method="post" action="rptLocationResult.asp">
                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date Range</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-prepend input-group">
                                  <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                  <input type="text" name="searchdate" id="reservation" class="form-control" value="5/19/2018 - 6/18/2018" />
                                </div>
                              </div>                          
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              
                              <select name="searchlocation" id="searchlocation" class="select2_group form-control">
                                <option selected>Select Location</option>
                                
                                <option value="Head Office">Head Office</option>
                                
                                <option value="Parking 1">Parking 1</option>
                                
                                <option value="Bur Dubai">Bur Dubai</option>
                                
                                <option value="Business Bay">Business Bay</option>
                                
                                <option value="Business Bay">Business Bay</option>
                                
                                <option value="Union Baladia">Union Baladia</option>
                                </select>
                            </div>
                          </div>
                          
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
    
                              <button type="reset" class="btn btn-primary">Cancel</button>
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
 
    <script src="<?=base_url() ?>assets/build/js/custom.js"></script>
    <script src="<?=base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#reservation').daterangepicker(null, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });

        $('#reservation-time').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          locale: {
            format: 'MM/DD/YYYY h:mm A'
          }
        });
    
    $(".select2_single").select2({
      placeholder: "Select a state",
      allowClear: true
      });
     $(".select2_group").select2({});
    
      });
    </script>

    
  </body>
</html>
