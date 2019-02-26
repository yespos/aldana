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
              
              </div>
          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--Alerts Start-->
                  <div class="x_content bs-example-popovers">
                      
                  </div>
                  <!--Alerts End-->
                  <div class="x_title">
                    <h2>Purchase Return Report <small>Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                 <!--  <li> <a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                <div class="table-responsive">
                   <table id="datatable-buttons" class="table table-striped table-bordered " cellspacing="0" width="100%">
                   <thead>
                <tr>
                  <th><?php echo $this->lang->line('product_no'); ?></th>
                  <th><?php echo $this->lang->line('purchase_date'); ?></th>
                  <th><?php echo $this->lang->line('purchase_reference_no'); ?></th>
                  <th><?php echo "Product"; ?></th>
                  <th><?php echo $this->lang->line('purchase_supplier'); ?></th>
                  <th><?php echo $this->lang->line('purchase_grand_total'); ?></th>
                  
                  <!-- <th><?php // echo $this->lang->line('product_action'); ?></th> -->
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $i=1;
                    foreach ($data as $row) {
                      $id= $row->id;
                      $products = $this->db->select('pi.quantity,f.item')->from('purchase_return_items pi')->join('filterservice f','f.id = pi.product_id')->where('pi.purchase_return_id',$id)->get()->result();
                      // print_r($products);
                  ?>
                    <tr>
                      <td><?=$i ?></td>
                      <td><?php echo $row->date; ?></td>
                      <td><?php echo $row->reference_no; ?></td>
                      <td><?php foreach ($products as $key => $value) {
                        echo $value->item."(".$value->quantity."), ";
                      }   ?></td>
                      <td><?php echo $row->supplier_name; ?></td>
                     
                      <td align="right"><?php echo $this->session->userdata('symbol').$row->total; ?></td>
                    </tr>
                  <?php
                  $i++;
                    }
                  ?>
             
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

 <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
   
    
  </body>
</html>
