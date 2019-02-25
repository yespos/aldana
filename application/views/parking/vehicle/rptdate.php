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
                    <h2>Date Wise <small>Report</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
          
                      <form class="form-horizontal" method="post" action="rptdateresult.asp">
                          <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <div class="input-prepend input-group">
                                  <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                  <input type="text" name="searchdate" id="reservation" class="form-control" value="5/19/2018 - 6/18/2018" />
                                </div>
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
      });
    </script>
    
  </body>
</html>
