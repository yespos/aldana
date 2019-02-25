      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row" id="PagePosition">
              <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                  <button type="button" class="btn btn-success" onclick="javascript:window.location.href='<?=base_url('setup/add_vehicletype')?>'"><i class="fa fa-plus"></i> Add New</button>
              </div> 
              </div>
          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--Alerts Start-->
                  <div class="x_content bs-example-popovers">
                      
                  </div>
                  <!--Alerts End-->
                  <div class="x_title">
                    <h2>Service Category <small>Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                <div class="table-responsive">
                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" width="5%">Sr# </th>
                            <th class="column-title" width="40%">Name</th>
                            <th class="column-title" width="40%">Price</th>
                            <th class="column-title no-link last" width="15%"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php  
                           $i= 1;
                        foreach ($lists as $list) {
                        ?>
                          <tr class="even pointer">
                            <td class=" "><?=$i  ?></td>
                            <td class=" "><?=$list->name  ?></td>
                            <td class=" "><?=$list->price  ?></td>
                            <td class=" last">
                              <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='<?=base_url("setup/edit_vehicletype/$list->id")?>'"><i class="fa fa-pencil"></i> Edit</button>
                              <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='<?=base_url("setup/delete_serviceCat/$list->id")?>';"><i class="fa fa-remove"></i> Delete</button>
                                <!--button type="button" class="btn btn-info" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1"><i class="fa fa-bank"></i> Warehouse</button-->
                            </td>
                          </tr>
                          <?php  $i++; }  ?>
                        </tbody>
                      </table>
                    </div>
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

		<script>
      $(document).ready(function() {
        $('#datatable-responsive').DataTable();
      });
    </script>
    
  </body>
</html>
