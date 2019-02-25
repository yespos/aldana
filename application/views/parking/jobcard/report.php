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
                          <th>Shift</th>
                          <th>Tax Inc Desc.</th>
                          <th>Assigned To</th>
                          <th><span > </span>
                          <button type="button" id="refresh" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> All Reports</button> 
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <form action="<?=base_url()?>jobcard/report" method="post">
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
                           <td><select class="select2_group form-control" name="pay_type" id="pay_type">
                           <option value="">Select</option>
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
                                <option value="<?=$value->id?>" <?=$selected ?>><?=$value->name ?> </option>
                           <?php } } ?>
                           </select>
                           </td>
                           <td><select class="select2_group form-control" name="shift" id="shift">
                           <option value="">Select</option>
                           <?php foreach ($shifts as $key => $value) {
                             if(isset($post['shift']))
                                {       
                                  $selected = $post['shift']== $value->id?"selected":"";
                                }
                                else
                                { $selected =""; }
                            ?>
                            <option value="<?=$value->id ?>" <?=$selected ?> > <?=$value->name ?> </option>      
                           <?php  } ?>
                           </select></td>
                           
                           <td><select class="select2_group form-control" name="tx_desc" id="tx_desc">
                           <option value="">Select</option>
                           <?php foreach ($user as $key => $value) {
                            if(!empty($value->tx_desc)){
                           if(isset($post['tx_desc']))
                                {       
                                  $selected = $post['tx_desc']== $value->tx_desc?"selected":"";
                                }
                                else
                                { $selected =""; } 
                            ?>
                           <option value="<?=$value->tx_desc ?>" <?=$selected ?>> <?=$value->tx_desc ?> </option>
                           <?php  } } ?>
                           </select></td>

                           <!-- <td><select class="select2_group form-control" name="user_id" id="user_id">
                           <option value="">Select</option>
                           <?php /*foreach ($user as $key => $value) {
                           if(isset($post['user_id']))
                                {       
                                  $selected = $post['user_id']== $value->id?"selected":"";
                                }
                                else
                                { $selected =""; } */
                            ?>
                           <option value="<?=$value->id ?>" <?=$selected ?>> <?=$value->name ?> </option>
                           <?php // } ?>
                           </select></td> -->
                           <td><select class="select2_group form-control" name="assigned_to" id="assigned_to">
                           <option value="">Select</option>
                           <?php foreach ($worker as $key => $value) { 
                            if(isset($where['assigned_to']))
                                {       
                                  $selected = $where['assigned_to']== $value->id?"selected":"";
                                }
                                else
                                { $selected =""; } 
                            ?>
                           <option value="<?=$value->id ?>" <?=$selected ?>> <?=$value->name ?> </option>      
                           <?php  } ?>
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
                    <h2>Job Card <small>Report</small></h2>
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
                          <th>Tax Inv Desc.</th>
                          <th>Customer Name</th>
                          <th>Shift</th>
                          <!-- <th>Service</th> -->
                          <th>Payment Type</th>
                          <th>Amount</th>
                          <th>Tax</th>
                          <th>F.O.C</th>
                          <th>Disc.</th>
                          <th>Total</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  
                           $i= 1;
                           $total = 0;
                           $amount =0;
                           $vat = 0;
                           $foc = 0;
                           $disc =0;

                        foreach ($lists as $list) {
                          /* $category = category_name($list->vehicleType);*/
                          $services = service_name($list->id);
                            foreach ($services as $serv) {
                               $service_name[$i][] = $serv->service; 
                               }
                           $service = implode("/",$service_name[$i]); 
                           $total = $total + $list->total;
                           $vat = $vat + $list->vat;
                           $foc = $foc + $list->foc;
                           $disc = $disc + $list->discount;
                           $amount = $amount + $list->amount; 
                        ?>
                        <tr>
                          <td><?=$i ?></td>
                          <td><?=$list->ref_no ?></td>
                          <td><?=$list->invoice_ref ?></td>
                          <td><?=$list->car_plate ?></td>
                        <!--   <td><?=username($list->user_id) ?></td> -->
                          <td><?=$list->tx_desc ?></td>
                          <td><?=$list->customer_name ?></td>
                          <td><?=shift_name($list->shift_id) ?></td>
                         <!--  <td><?=$service ?></td> -->
                          <td><?=paymentModeName($list->pay_type) ?></td>
                          <td><?=$list->amount ?></td>
                          <td><?=$list->vat ?></td>
                          <td><?=$list->foc ?></td>
                          <td><?=$list->discount ?></td>
                          <td><?=$list->total ?></td>
                          <td><?=$list->date  ?><?php // date('m/d/Y H:i:s',$list->created_at); ?></td>
                        </tr>
                       <?php  $i++; } ?>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                         <!--  <td> <b> Total Report</td> -->
                          <td><b>(Amount + Vat) = Total </b></td>
                          <td><b><?=$amount ?></b></td>
                          <td><b> <?=$vat ?></b></td>
                          <td><b> <?=$foc ?></b></td>
                          <td><b> <?=$disc ?></b></td>
                          <td> <b><?=$total ?> </b> </td>
                          <td></td>
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
    window.location.href = "<?=base_url() ?>jobcard/report";
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
