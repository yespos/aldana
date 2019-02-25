     <style type="text/css">
       .dropdown-menu {
            left: -62px;
         }
     </style>
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row" id="PagePosition">
              <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <button type="button" class="btn btn-success" onclick="javascript:window.location.href='<?=base_url('purchase/add')?>'"><i class="fa fa-plus"></i> Add </button>
              </div> 
              </div>
          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--Alerts Start-->
                  <div class="x_content bs-example-popovers">
                      
                  </div>
                  <!--Alerts End-->
                  <div class="x_title">
                    <h2>Purchase <small>Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                  <li> <a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                <div class="table-responsive">
                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                   <thead>
                <tr>
                  <th><?php echo $this->lang->line('product_no'); ?></th>
                  <th><?php echo $this->lang->line('purchase_date'); ?></th>
                  <th><?php echo $this->lang->line('purchase_reference_no'); ?></th>
                  <th><?php echo $this->lang->line('purchase_supplier'); ?></th>
                  <th><?php echo $this->lang->line('purchase_purchase_status'); ?></th>
                  <th><?php echo $this->lang->line('purchase_grand_total'); ?></th>
                  <th><?php echo $this->lang->line('sales_payment_status'); ?></th>
                  <th><?php echo $this->lang->line('product_action'); ?></th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $i=1;
                    foreach ($data as $row) {
                      $id= $row->purchase_id;
                  ?>
                    <tr>
                      <td><?=$i ?></td>
                      <td><?php echo $row->date; ?></td>
                      <td><?php echo $row->reference_no; ?></td>
                      <td><?php echo $row->supplier_name; ?></td>
                      <td align="center"><span class="label label-success"><?php echo $this->lang->line('purchase_received'); ?></span></td>
                      <td align="right"><?php echo $this->session->userdata('symbol').$row->total; ?></td>
                      <td align="center">
                        <?php if($row->paid_amount == 0.00){ ?>
                          <span class="label label-warning"><?php echo $this->lang->line('sales_pending'); ?></span>
                        <?php }else{ ?>
                          <span class="label label-success"><?php echo "Paid"; ?></span>
                        <?php } ?>
                      </td>
                      <td align="center">
                          <div class="dropdown">
                            <button type="button" class="btn btn-default gropdown-toggle" data-toggle="dropdown">
                              <?php echo $this->lang->line('product_action'); ?>
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li>
                                <a href="<?php echo base_url('purchase/view/');?><?php echo $id; ?>"><i class="fa fa-file-text-o"></i><?php echo $this->lang->line('purchase_purchase_details'); ?></a>
                              </li>
                              <li>
                                <a href="<?php echo base_url('purchase/payment/'); ?><?php echo $id; ?>"><i class="fa fa-money"></i><?php echo $this->lang->line('sales_add_payment'); ?></a>
                              </li>
                              <li>
                                <a href="<?php echo base_url('purchase/edit/'); ?><?php echo $id; ?>"><i class="fa fa-edit"></i><?php echo $this->lang->line('purchase_edit_purchase'); ?></a>
                              </li>
                              <!-- <li>
                                <a href="<?php echo base_url('purchase/pdf/');?><?php echo $id; ?>" target="_blank  "><i class="fa fa-file-pdf-o"></i><?php echo $this->lang->line('purchase_download_as_pdf'); ?></a>
                              </li>
                              <li>
                                <a href="<?php echo base_url('purchase/email/');?><?php echo $id; ?>"><i class="fa fa-envelope"></i><?php echo $this->lang->line('purchase_email_purchase'); ?></a>
                              </li> -->
                              <li>
                                <a href="javascript:delete_id(<?php echo $id;?>)"><i class="fa fa-trash-o"></i><?php echo $this->lang->line('purchase_delete_purchase'); ?></a>
                              </li>
                            </ul>
                          </div>
                      </td>
                    </tr>
                  <?php
                  $i++;
                    }
                  ?>
               <!--  <tfoot>
                <tr>
                  <th><?php echo $this->lang->line('product_no'); ?></th>
                  <th><?php echo $this->lang->line('purchase_date'); ?></th>
                  <th><?php echo $this->lang->line('purchase_reference_no'); ?></th>
                  <th><?php echo $this->lang->line('purchase_supplier'); ?></th>
                  <th><?php echo $this->lang->line('purchase_purchase_status'); ?></th>
                  <th><?php echo $this->lang->line('purchase_grand_total'); ?></th>
                  <th><?php echo $this->lang->line('sales_payment_status'); ?></th>
                  <th><?php echo $this->lang->line('product_action'); ?></th>
                </tr>
                </tfoot> -->
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
