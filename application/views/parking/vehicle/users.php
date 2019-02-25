  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row" id="PagePosition">
              <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
                  <button type="button" class="btn btn-success" onclick="javascript:window.location.href='<?=base_url('user/add_user') ?>'"><i class="fa fa-plus"></i> Add User</button>
              </div> 
              </div>
          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--Alerts Start-->
                  <div class="x_content bs-example-popovers">
                      
                  </div>
                  <!--Alerts End-->
                  <div class="x_title">
                    <h2>User <small>Information</small></h2>
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
                          <th>Name</th>
                          <th>User</th>
                          <th>Location</th>
                          <th>Hourly Rate</th>
                          <th>Daily Rate</th>
                          <th>Monthly Rate</th>
                          <th><span class="nobr">Action</span></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  
                           $i= 0;
                        foreach ($lists as $list) {
                        ?>
                       
                        <tr>
                          <td><?=$i ?></td>
                          <td><?=$list->name ?></td>
                          <td><?=$list->admin_id ?></td>
                          <td><?=$list->location ?></td>
                          <td><?=$list->invAmount ?></td>
                          <td><?=$list->dailyAmount ?></td>
                          <td><?=$list->monthlyAmount ?></td>
                          <td>
                            <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='edit_user.asp?ID=2'"><i class="fa fa-pencil"></i> Edit</button>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='users.asp?id=2&yn=1';"><i class="fa fa-remove"></i> Delete</button>
                          </td>                          
                        </tr>
                        
                       <?php  $i++; } ?> 
                        
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