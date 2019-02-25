      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row" id="PagePosition">
              <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <button type="button" class="btn btn-success" onclick="javascript:window.location.href='<?=base_url('supplier/add')?>'"><i class="fa fa-plus"></i> Add </button>
              </div> 
              </div>
          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--Alerts Start-->
                  <div class="x_content bs-example-popovers">
                      
                  </div>
                  <!--Alerts End-->
                  <div class="x_title">
                    <h2>Supplier<small>Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                <div class="table-responsive">
                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                <tr>
                  <th><!-- No -->
                      <?php echo $this->lang->line('biller_lable_no'); ?>
                  </th>
                  <th><!-- Name -->
                      <?php echo $this->lang->line('biller_lable_name'); ?>
                  </th>
                  <th><!-- Company -->
                      <?php echo $this->lang->line('biller_lable_company'); ?>
                  </th>
                  <th><!-- Phone -->
                      <?php echo $this->lang->line('biller_lable_phone'); ?>
                  </th>
                  <th><!-- Email Address -->
                      <?php echo $this->lang->line('biller_lable_email'); ?>
                  </th>
                  <th><!-- city -->
                      <?php echo $this->lang->line('biller_lable_city'); ?>
                  </th>
                  <th><!-- Country -->
                      <?php echo $this->lang->line('biller_lable_country'); ?>
                  </th>
                  <th><!-- Actions -->
                      <?php echo $this->lang->line('biller_lable_action'); ?>
                  </th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $i=1;
                      foreach ($data as $row) {
                         $id= $row->supplier_id;
                    ?>
                    <tr>
                      <td><?=$i ?></td>
                      <td><?php echo $row->supplier_name; ?></td>
                      <td><?php echo $row->company_name; ?></td>
                      <td><?php echo $row->mobile ?></td>
                      <td><?php echo $row->email ?></td>
                      <td><?php echo $row->ctname ?></td>
                      <td><?php echo $row->cname ?></td>
                      <td>
                          <!-- <a href="" title="View Details" class="btn btn-xs btn-warning"><span class="fa fa-eye"></span></a>&nbsp;&nbsp; -->
                          <a href="<?php echo base_url('supplier/edit/'); ?><?php echo $id; ?>" title="Edit" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;
                          <a href="javascript:delete_id(<?php echo $id;?>)" title="Delete" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                      </td>
                    <?php
                    $i++;
                      }
                    ?>
               
                      </table>
                    </div>
                  </div>

<!--  Model form -->
                   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:13px 23px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:13px 23px;">
           <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                       <thead>
                <tr>
                  <th><!-- No -->
                      <?php echo $this->lang->line('biller_lable_no'); ?>
                  </th>
                  <th><!-- Name -->
                      <?php echo $this->lang->line('biller_lable_name'); ?>
                  </th>
                  <th><!-- Company -->
                      <?php echo $this->lang->line('biller_lable_company'); ?>                    
                  </th>
                  <th><!-- Phone -->
                      <?php echo $this->lang->line('biller_lable_phone'); ?>
                  </th>
                  <th><!-- Email Address -->
                      <?php echo $this->lang->line('biller_lable_email'); ?>
                  </th>
                  <th><!-- city -->
                      <?php echo $this->lang->line('biller_lable_city'); ?>
                  </th>
                  <th><!-- Country -->
                      <?php echo $this->lang->line('biller_lable_country'); ?>
                  </th>
                  <th><!-- Actions -->
                      <?php echo $this->lang->line('biller_lable_action'); ?>
                  </th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $i=1;
                      foreach ($data as $row) {
                         $id= $row->supplier_id;
                    ?>
                    <tr>
                      <td><?=$i  ?></td>
                      <td><?php echo $row->supplier_name; ?></td>
                      <td><?php echo $row->company_name; ?></td>
                      <td><?php echo $row->mobile ?></td>
                      <td><?php echo $row->email ?></td>
                      <td><?php echo $row->ctname ?></td>
                      <td><?php echo $row->cname ?></td>
                      <td>
                          <!-- <a href="" title="View Details" class="btn btn-xs btn-warning"><span class="fa fa-eye"></span></a>&nbsp;&nbsp; -->
                          <a href="<?php echo base_url('supplier/edit/'); ?><?php echo $id; ?>" title="Edit" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;
                          <a href="javascript:delete_id(<?php echo $id;?>)" title="Delete" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                      </td>
                    <?php
                      }
                    ?>
               
                      </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>
      
    </div>
  </div>

<!-- End -->

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


       <?php $this->load->view('parking/layout/footer'); ?>
    <!-- Custom Theme Scripts -->
    <script src="<?=base_url() ?>assets/build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        $('#datatable-responsive').DataTable();
      });
    </script> 
    <!-- /Datatables -->
    <script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
 
</script>
<script type="text/javascript">
  function delete_id(id)
  {
     if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href='<?php  echo base_url('supplier/delete/'); ?>'+id;
     }
  }
</script>
   
    
  </body>
</html>
