  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row" id="PagePosition">
              <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
                  <button type="button" class="btn btn-success" onclick="javascript:window.location.href='<?=base_url('ecowash') ?>'"><i class="fa fa-plus"></i>New Ecowash</button>
              </div> 
              </div>
          
<!--  in -->
                       
<!--  -->

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--Alerts Start-->
                  <div class="x_content bs-example-popovers">
                    <!-- Search Dept -->
                    
                    <!-- End -->
                  </div>
                  <!--Alerts End-->
                  <div class="x_title">
                    <h2>Eco Wash <small>Information</small></h2>
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
                          <th>Invoice No</th>
                          <th>Car Plate</th>
                          <th>Customer Name</th>
                          <th>Sales Category</th>
													<th>Shift</th>
													<th>Assigned To</th>
                          <th>Payment Type</th>
                          <th>Amount</th>
                          <th>Tax</th>
                          <th>Total</th>
                          <th>DateTime</th>
                          <th><span class="nobr">Action</span></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php  
                           $i= 1;
                           $total = 0;
                           $amount =0;
                           $vat = 0;
                        foreach ($lists as $list) {
                           $category = category_name($list->service);
                           $total = $total + $list->total;
                           $vat = $vat + $list->vat;
                           $amount = $amount + $list->amount; 
                        ?>
                       
                        <tr>
                          <td><?=$i ?></td>
                          <td><?=$list->ref_no ?></td>
                          <td><?=$list->car_plate ?></td>
                          <td><?=$list->customer_name ?></td>
                          <td><?=$category ?></td>
													<td><?=shift_name($list->shift_id) ?></td>
													<td><?=username($list->assigned_to) ?></td>
                          <td><?=paymentModeName($list->pay_type) ?></td>
                          <td><?=$list->amount ?></td>
                          <td><?=$list->vat ?></td>
                          <td><?=$list->total ?></td>
                          <td><?=$list->created_at ?></td>
                          <td>
                             <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='<?=base_url("ecowash/eco_print/$list->id")?>'"><i class="fa fa-view"></i> View</button> 
                             <!-- <button type="button" class="btn btn-danger" onclick="if (confirm('are you sure you want to Delete this Record?')) window.location.href='<?=base_url("ecowash/delete_ecowash/$list->id")?>';"><i class="fa fa-remove"></i> Delete </button> -->
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


<script>
      $(document).ready(function() {
        $('#from').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });

         $('#to').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>

    
<!-- Datatables -->
  <!--   <script>
      $(document).ready(function() {
        $('#datatable-responsive').DataTable();
      });
    </script> -->
    <!-- /Datatables -->

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
          fixedHeader: false
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

     <script type="text/javascript">
      $(document).ready(function(){
       $(".select2_single").select2({
              placeholder: "Select a state",
              allowClear: true
            });
       $(".select2_group").select2({});
    });
    </script>
    
  </body>
</html>
