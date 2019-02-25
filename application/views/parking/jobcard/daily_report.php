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
                     <table  class="table  dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>From</th>
                          <th>To</th>
                        <!--   <th>Sales Category</th> -->
                          <th>Payment Type</th>
                          <th><span > </span>
                          <button type="button" id="refresh" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> All Reports</button> 
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <form action="<?=base_url()?>jobcard/daily_report" method="post">
                          <td><input id="from" name="from" class="date-picker form-control col-md-7 col-xs-12" value="<?php if(isset($post['from'])){ echo $post['from']; }  ?>"  type="text" readonly="readonly"></td>
                          <td><input id="to" name="to" class="date-picker form-control col-md-7 col-xs-12" value="<?php if(isset($post['to'])){ echo $post['to']; }  ?>"  type="text" readonly="readonly"></td>
                         <!--  <td> <select class="select2_group form-control col-md-5 col-xs-12" name="vehicleType" id="vehicleType"   >
                           <option value=""> Select </option>
                           <?php foreach($cartype as $car) {
                              ?> 
                           <option value="<?=$car->id ?>"> <?=$car->carType  ?> </option>
                         <?php } ?>
                           ?>
                           </select></td>  --> 

                           <td><select class="select2_group form-control" name="pay_type" id="pay_type"   >
                           <option value=""> Select</option>
                           <?php 
                              if($paytype){
                                foreach ($paytype as $value) {
                                if(isset($post['pay_type']))
                                {       
                                  $selected = $post['pay_type']== $value->id?"selected":"";
                                }
                                else
                                { $selected =""; }
                                 ?>
                                <option value="<?=$value->id?>" <?=$selected ?>><?=$value->name?> </option>
                              <?php } } ?>
                           </select></td>
                          <td><button type="submit" class="btn btn-primary mb-2">Search</button></td>
                          </form>                   
                        </tr>
                      </tbody>
                    </table> 
                    <!-- End -->
                  </div>
                  <!--Alerts End-->
                  <div class="x_title">
                    <h2>Job Car <small>Report</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
          <table id="datatable-buttons" class="table table-striped table-bordered " cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sr#</th>
                          <th>Invoice No</th>
                          <th>Invoice Ref.No</th>
                          <th>Car Plate</th>
                          <th>Customer Name</th>
                          <th>Tax Inv Desc.</th>
                          <th>Payment Type</th>
                          <th>Amount</th>
                          <th>Tax</th>
                         <!--  <th>F.O.C</th> -->
                          <th>Total</th>
                          <th>DateTime</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  
                           $i= 1;
                           $j_total = 0;
                           $j_amount =0;
                           $j_vat = 0;
                           $j_foc = 0;
                           $e_total = 0;
                           $e_amount =0;
                           $e_vat = 0;
                           $e_foc = 0;

                        foreach ($job_lists as $list) {
                          /* $category = category_name($list->vehicleType);*/
                          $services = service_name($list->id);
                            foreach ($services as $serv) {
                               $service_name[$i][] = $serv->service; 
                               }
                           $service = implode("/",$service_name[$i]); 
                           $j_total = $j_total + $list->total;
                           $j_vat = $j_vat + $list->vat;
                           $j_foc = $j_foc + $list->foc;
                           $j_amount = $j_amount + $list->amount; 
                        ?>
                        <tr>
                          <td><?=$i ?></td>
                          <td><?=$list->ref_no ?></td>
                          <td><?=$list->invoice_ref ?></td>
                          <td><?=$list->car_plate ?></td>
                          <td><?=$list->customer_name ?></td>
                          <td><?=$list->tx_desc ?></td>
                          <td><?=paymentModeName($list->pay_type) ?></td>
                          <td><?=$list->amount ?></td>
                          <td><?=$list->vat ?></td>
                         <!--  <td><?=$list->foc ?></td> -->
                          <td><?=$list->total ?></td>
                          <td><?=date('m/d/Y H:i:s',$list->date); ?> </td>
                        </tr>
                       <?php  $i++; } ?>
             <?php
                       foreach ($eco_lists as $list) {
                           $category = category_name($list->vehicleType);
                           $e_total = $e_total + $list->total;
                           $e_vat = $e_vat + $list->vat;
                           $e_amount = $e_amount + $list->amount; 
                        ?>
                        <tr>
                          <td><?=$i ?></td>
                          <td><?=$list->ref_no ?></td>
                          <td><?=$list->car_plate ?></td>
                          <td><?=$list->customer_name ?></td>
                          <td><?=$category ?></td>
                          <td><?=$list->pay_type ?></td>
                          <td><?=$list->amount ?></td>
                          <td><?=$list->vat ?></td>
                          <td><?=$list->total ?></td>
                          <td><?=date('m/d/Y H:i:s',$list->created_at); ?></td>
                        </tr>
                       <?php  $i++; } ?>
                        <tr style="background-color:#748392; color:#ffffff">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td> <b> </td>
                          <td></td>
                          <td><b>Total Report</b></td>
                          <td><b><?=$j_amount + $e_amount ?> (Amount)</b></td>
                          <td><b><?=$j_vat + $e_vat ?> (Vat)</b></td>
                          <td><b> <?=$j_foc ?> (F.O.C)</b></td> 
                          <td><b><?=$j_total + $e_total ?> (Total)</b> </td>
                          <td></td>                          
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


<script>
      $(document).ready(function() {
        $('#from').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
        //  console.log(start.toISOString(), end.toISOString(), label);
        });

         $('#to').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
         // console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
<script type="text/javascript">
  $('#refresh').click(function() {
    window.location.href = "<?=base_url() ?>jobcard/daily_report/all";
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