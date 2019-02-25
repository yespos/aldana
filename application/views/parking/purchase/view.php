 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row" id="PagePosition">
              <div class="col-md-12 col-sm-12 col-xs-12">
              <!-- <div class="x_panel">
                  <button type="button" class="btn btn-success" onclick="javascript:window.location.href='<?=base_url('category/add')?>'"><i class="fa fa-plus"></i> Add </button>
              </div>  -->
              </div>
          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--Alerts Start-->
                  <div class="x_content bs-example-popovers">
                      
                  </div>
                  <!--Alerts End-->
                  <div class="x_title">
                    <h2>Sales Details</small></h2>
                     <ul class="nav navbar-right panel_toolbox">
        <button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?=base_url('purchase')?>'"> Back </button>
                    </ul> 
                    <div class="clearfix"></div>
                  </div>

              <div class="x_content">
                  <!-- /.box-header -->
                <div class="box-body">
                  <div class="col-sm-12 well well-sm">
                    <div class="col-sm-5">
                      <div class="col-sm-2">
                        <i class="fa fa-3x fa-truck padding010 text-muted"></i>
                      </div>
                      <div class="col-sm-10">
                        <b><h4><?php echo $company[0]->name; ?></h4></b>
                        <br>
                        <?php echo $data[0]->warehouse_name; ?>
                        <br>
                        <?php echo $data[0]->branch_address; ?>
                        <br>
                        <?php echo $data[0]->branch_city; ?>
                        <br><br>
                        <?php echo $this->lang->line('purchase_mobile')." : ".$company[0]->phone; ?>
                        <br>
                        <?php echo $this->lang->line('company_setting_email')." : ".$company[0]->email; ?>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="col-sm-2">
                        <i class="fa fa-3x fa-building padding010 text-muted"></i>
                      </div>
                      <div class="col-sm-10">
                        <b><h4><?php echo $data[0]->supplier_name ?></h4></b>
                        <br>
                        <?php echo $data[0]->supplier_address; ?>
                        <br>
                        <?php echo $data[0]->supplier_city; ?>
                        <br><br>
                        <?php echo $this->lang->line('purchase_mobile')." : ".$data[0]->supplier_mobile; ?>
                        <br>
                        <?php echo $this->lang->line('company_setting_email')." : ".$data[0]->supplier_email; ?>
                      </div>
                  </div>
                    <div class="col-md-3">
                      <div class="col-sm-3">
                  <i class="fa fa-3x fa-file-text-o padding010 text-muted"></i>
                </div>
                <div class="col-sm-9">
                        <b><h4><?php echo $data[0]->reference_no; ?></h4></b>
                        <br>
                        <b><?php echo $this->lang->line('purchase_date')." : ".$data[0]->date; ?></b>                 
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12" style="overflow-y: auto;">
                    <table class="table table-hover table-bordered">
                      <thead>
                        <th style="text-align: center;"><?php echo $this->lang->line('product_no'); ?></th>
                        <th width="40%"><?php echo $this->lang->line('product_description'); ?> </th>
                        <th width="10%"><?php echo "Code" ?></th> 
                        <th style="text-align: center;"><?php echo $this->lang->line('product_quantity'); ?></th>
                        <th style="text-align: center;"><?php echo $this->lang->line('product_cost'); ?></th>
                        <th style="text-align: center;"><?php echo $this->lang->line('purchase_total_sales'); ?></th>
                        <th style="text-align: center;"><?php echo $this->lang->line('header_discount'); ?></th>
                        <th style="text-align: center;"><?php echo $this->lang->line('purchase_taxable_value'); ?></th>
                        <th style="text-align: center;"><?php echo $this->lang->line('header_tax'); ?></th>
                        <th style="text-align: center;"><?php echo $this->lang->line('purchase_total'); ?></th>
                      </thead>
                      <tbody>
                        <?php $i = 1;foreach ($items as $value) { ?>
                        <tr>
                          <td align="center"><?php echo $i;?></td>
                          <td><?php echo $value->item; ?></td>
                          <td><?php echo $value->code; ?></td> 
                          <td align="center"><?php echo $value->quantity; ?></td>
                          <td align="right"><?php echo $this->session->userdata('symbol').$value->cost; ?></td>
                          <td align="right"><?php echo $this->session->userdata('symbol').$value->gross_total; ?></td>
                          <td align="right"><?php echo $this->session->userdata('symbol').$value->discount; ?></td>
                          <td align="right"><?php echo $this->session->userdata('symbol').($value->gross_total-$value->discount); ?></td>
                          <td align="right"><?php echo $this->session->userdata('symbol').$value->tax; ?></td>
                          <td align="right"><?php echo $this->session->userdata('symbol').($value->gross_total-$value->discount+$value->tax); ?></td>
                        </tr>
                        <?php $i++; } ?>
                        <tr>
                          <td colspan="7" align="right"><b><?php echo $this->lang->line('purchase_total_amount'); ?></b></td>
                          <td align="right" colspan="7"><?php echo $this->session->userdata('symbol').$data[0]->total; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-sm-12">
                    <div class="buttons">
                <div class="btn-group btn-group-justified">
                  <div class="btn-group">
                    <a class="tip btn btn-primary tip" href="<?php echo base_url('purchase/payment/'); ?><?php echo $data[0]->purchase_id; ?>" title="Add Payment">
                      <i class="fa fa-money"></i>
                      <span class="hidden-sm hidden-xs"><?php echo $this->lang->line('sales_add_payment'); ?></span>
                    </a>
                  </div>
                 <!--  <div class="btn-group">
                    <a class="tip btn btn-info tip" href="<?php echo base_url('purchase/email/');?><?php echo $data[0]->purchase_id; ?>" title="Email">
                      <i class="fa fa-envelope-o"></i>
                      <span class="hidden-sm hidden-xs"><?php echo $this->lang->line('company_setting_email'); ?></span>
                    </a>
                  </div> -->
                 <!--  <div class="btn-group">
                    <a class="tip btn btn-success" href="<?php echo base_url('purchase/pdf/');?><?php echo $data[0]->purchase_id; ?>" title="Download as PDF" target="_blank">
                      <i class="fa fa-download"></i>
                      <span class="hidden-sm hidden-xs"><?php echo $this->lang->line('product_alert_pdf'); ?></span>
                    </a>
                  </div> -->
                  <div class="btn-group">
                    <a class="tip btn btn-warning tip" href="<?php echo base_url('purchase/edit/'); ?><?php echo $data[0]->purchase_id; ?>" title="Edit">
                      <i class="fa fa-edit"></i>
                      <span class="hidden-sm hidden-xs"><?php echo $this->lang->line('purchase_edit'); ?></span>
                    </a>
                  </div>
                  <div class="btn-group">
                    <a class="tip btn btn-danger bpo" href="javascript:delete_id(<?php echo $data[0]->purchase_id;?>)" title="Delete Purchase">
                      <i class="fa fa-trash-o"></i>
                      <span class="hidden-sm hidden-xs"><?php echo $this->lang->line('purchase_delete'); ?></span>
                    </a>
                  </div>
                </div>
              </div>
                  </div>
                </div>
                <!-- /.box-body -->
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
   