 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row" id="PagePosition">
              <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
                  <button type="button" class="btn btn-success" onclick="javascript:window.location.href='vehicleIn.asp'"><i class="fa fa-plus"></i> Vechicle In</button>
              </div> 
              </div>
          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--Alerts Start-->
                  <div class="x_content bs-example-popovers">
                      
                  </div>
                  <!--Alerts End-->
                  <div class="x_title">
                    <h2>Invoice <small>Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sr#</th>
                          <th>Invoice Number</th>
                          <th>Invoice Amount</th>
                          <th>Invoice Status</th>
                          <th>Location</th>
                          <th><span class="nobr">Action</span></th>
                          <th><span class="nobr">Vehicle Out</span></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr>
                          <td>1</td>
                          <td>HO-INV-00348</td>
                          <td>705.00</td>
                          <td>Closed</td>
                          <td>Head Office</td>
                          <td>
                            <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='Closedprint.asp?ID=367&Page=Invoices'"><i class="fa fa-print"></i> Print</button>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='invoices.asp?id=367&yn=1';"><i class="fa fa-remove"></i> Delete</button>
                          </td>
                          <td>
                            
                          </td>
                        </tr>
                        
                        <tr>
                          <td>2</td>
                          <td>HO-INV-00347</td>
                          <td>450.00</td>
                          <td>Closed</td>
                          <td>Head Office</td>
                          <td>
                            <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='Closedprint.asp?ID=366&Page=Invoices'"><i class="fa fa-print"></i> Print</button>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='invoices.asp?id=366&yn=1';"><i class="fa fa-remove"></i> Delete</button>
                          </td>
                          <td>
                            
                          </td>
                        </tr>
                        
                        <tr>
                          <td>3</td>
                          <td>CH1-INV-00346</td>
                          <td>10.00</td>
                          <td>Open</td>
                          <td>Business Bay</td>
                          <td>
                            <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='Openprint.asp?ID=365&Page=Invoices'"><i class="fa fa-print"></i> Print</button>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='invoices.asp?id=365&yn=1';"><i class="fa fa-remove"></i> Delete</button>
                          </td>
                          <td>
                            
                                <button type="button" class="btn btn-info" onclick="javascript:window.location.href='vehicleOut2.asp?ID=365'"><i class="fa fa-close"></i> Closed it!</button>
                            
                          </td>
                        </tr>
                        
                        <tr>
                          <td>4</td>
                          <td>BD-INV-00345</td>
                          <td>10.00</td>
                          <td>Open</td>
                          <td>Union Baladia</td>
                          <td>
                            <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='Openprint.asp?ID=364&Page=Invoices'"><i class="fa fa-print"></i> Print</button>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='invoices.asp?id=364&yn=1';"><i class="fa fa-remove"></i> Delete</button>
                          </td>
                          <td>
                            
                                <button type="button" class="btn btn-info" onclick="javascript:window.location.href='vehicleOut2.asp?ID=364'"><i class="fa fa-close"></i> Closed it!</button>
                            
                          </td>
                        </tr>
                        
                        <tr>
                          <td>5</td>
                          <td>BD-INV-00344</td>
                          <td>10.00</td>
                          <td>Open</td>
                          <td>Union Baladia</td>
                          <td>
                            <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='Openprint.asp?ID=363&Page=Invoices'"><i class="fa fa-print"></i> Print</button>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='invoices.asp?id=363&yn=1';"><i class="fa fa-remove"></i> Delete</button>
                          </td>
                          <td>
                            
                                <button type="button" class="btn btn-info" onclick="javascript:window.location.href='vehicleOut2.asp?ID=363'"><i class="fa fa-close"></i> Closed it!</button>
                            
                          </td>
                        </tr>
                        
                        <tr>
                          <td>6</td>
                          <td>CH1-INV-00343</td>
                          <td>10.00</td>
                          <td>Open</td>
                          <td>Business Bay</td>
                          <td>
                            <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='Openprint.asp?ID=362&Page=Invoices'"><i class="fa fa-print"></i> Print</button>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='invoices.asp?id=362&yn=1';"><i class="fa fa-remove"></i> Delete</button>
                          </td>
                          <td>
                            
                                <button type="button" class="btn btn-info" onclick="javascript:window.location.href='vehicleOut2.asp?ID=362'"><i class="fa fa-close"></i> Closed it!</button>
                            
                          </td>
                        </tr>
                        
                        <tr>
                          <td>7</td>
                          <td>CH1-INV-00342</td>
                          <td>10.00</td>
                          <td>Open</td>
                          <td>Business Bay</td>
                          <td>
                            <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='Openprint.asp?ID=361&Page=Invoices'"><i class="fa fa-print"></i> Print</button>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='invoices.asp?id=361&yn=1';"><i class="fa fa-remove"></i> Delete</button>
                          </td>
                          <td>
                            
                                <button type="button" class="btn btn-info" onclick="javascript:window.location.href='vehicleOut2.asp?ID=361'"><i class="fa fa-close"></i> Closed it!</button>
                            
                          </td>
                        </tr>
                        
                        <tr>
                          <td>8</td>
                          <td>CH1-INV-00341</td>
                          <td>10.00</td>
                          <td>Closed</td>
                          <td>Business Bay</td>
                          <td>
                            <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='Closedprint.asp?ID=360&Page=Invoices'"><i class="fa fa-print"></i> Print</button>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='invoices.asp?id=360&yn=1';"><i class="fa fa-remove"></i> Delete</button>
                          </td>
                          <td>
                            
                          </td>
                        </tr>
                        
                        <tr>
                          <td>9</td>
                          <td>CH1-INV-00340</td>
                          <td>250.00</td>
                          <td>Closed</td>
                          <td>Business Bay</td>
                          <td>
                            <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='Closedprint.asp?ID=359&Page=Invoices'"><i class="fa fa-print"></i> Print</button>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='invoices.asp?id=359&yn=1';"><i class="fa fa-remove"></i> Delete</button>
                          </td>
                          <td>
                            
                          </td>
                        </tr>
                        
                        <tr>
                          <td>10</td>
                          <td>CH1-INV-00339</td>
                          <td>10.00</td>
                          <td>Closed</td>
                          <td>Business Bay</td>
                          <td>
                            <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='Closedprint.asp?ID=358&Page=Invoices'"><i class="fa fa-print"></i> Print</button>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='invoices.asp?id=358&yn=1';"><i class="fa fa-remove"></i> Delete</button>
                          </td>
                          <td>
                            
                          </td>
                        </tr>
                        
                        <tr>
                          <td>11</td>
                          <td>CH1-INV-00338</td>
                          <td>10.00</td>
                          <td>Open</td>
                          <td>Business Bay</td>
                          <td>
                            <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='Openprint.asp?ID=357&Page=Invoices'"><i class="fa fa-print"></i> Print</button>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='invoices.asp?id=357&yn=1';"><i class="fa fa-remove"></i> Delete</button>
                          </td>
                          <td>
                            
                                <button type="button" class="btn btn-info" onclick="javascript:window.location.href='vehicleOut2.asp?ID=357'"><i class="fa fa-close"></i> Closed it!</button>
                            
                          </td>
                        </tr>
                      </tbody>
                    </table>
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
<!-- Datatables -->
    <script>
      $(document).ready(function() {
        $('#datatable-responsive').DataTable();
      });
    </script>
    <!-- /Datatables -->
    
  </body>
</html>