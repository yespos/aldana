  <style type="text/css">
    .link-color{
      color:#d81111;
    }
  </style>
  <?php
   $getstatus = array('0'=>'Pending',
    '1'=>'LPO Confirmed',
    '2'=>'GRN Confirmed',
    '3'=>'Delivered',
    '4'=>'Purchased GRN',
    '5'=>'OPEN',
    '6'=>'COMPLETED',
    '7'=>'Partial LPO',
    '8'=>'Sent For LPO',
    '9'=>'Approved',
    '10'=>'Rejected',
    '11'=>'Accepted',
    '12'=>'Open',
    '13'=>'Closed',
    '14'=>'Placed',
    '15'=>'Not Placed',
    '16'=>'PROCESSING',
    '17'=>'NOT PAID',
    '18'=>'PARTIAL',
    '19'=>'PAID',
    '20'=>'QUOTATION',
    '21'=>'Partial',
    '22'=>'Full',
    '23'=>'Cancel',
    '24'=>'Advance',
    '25'=>'QC Done',
    '26'=>'Invoiced',
    '27'=>'Transfer',
    '28'=>'Purchase Return',
    '29'=>'Void');
?>
  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row" id="PagePosition">
              <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <button type="button" class="btn btn-success" onclick="javascript:window.location.href='<?=base_url('jobcard/add_jobcard') ?>'"><i class="fa fa-plus"></i>New Job Card</button>
              </div> 
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--Alerts Start-->
                  <div class="x_content bs-example-popovers">
                    <!-- Search Dept -->
                    
                    <!-- End -->
                  </div>
                  <!--Alerts End-->
                  <div class="x_title">
                    <h2>Job Card <small>Information</small></h2>
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
                         <!--  <th>Service</th> -->
												  <th>Shift</th> 
													<th>Assigned To</th> 
                          <th>Payment Type</th>
													<th>Payment Status</th>
                          <th>Amount</th>
                          <th>Tax</th>
                          <th>F.O.C</th>
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

                        foreach($lists as $list) {
                        if($list->payment_status==0 || $list->payment_status==17){
                             $paymemtSatus = '<span class="btn btn-danger btn-xs" style="width: 80px;">'.$getstatus[$list->payment_status].'</span>';
                            }elseif($list->payment_status==21){
                              $paymemtSatus = '<span class="btn btn-warning btn-xs" style="width: 80px;">'.$getstatus[$list->payment_status].'</span>';
                            }else{
                                 $paymemtSatus = '<span class="btn btn-success btn-xs" style="width: 80px;">'.$getstatus[$list->payment_status].'</span>';
                            } 
                           $services = service_name($list->id);
                           foreach ($services as $serv) {
                               $service_name[$i][] = $serv->service; 
                               }
                           $service = implode("/",$service_name[$i]); 
                           $total = $total + $list->total;
                           $vat = $vat + $list->vat;
                           $amount = $amount + $list->amount;
                           $date = date_create($list->created_at); 
                        ?>
                       
                        <tr>
                          <td><?=$i ?></td>
                          <td><?=$list->ref_no ?></td>
                          <td><?=$list->car_plate ?></td>
                          <td><?=$list->customer_name ?></td>
													<td><?=shift_name($list->shift_id) ?></td>
													<td><?=username($list->assigned_to) ?></td>
                          <td><?=paymentModeName($list->pay_type) ?></td>
													<td><?=$paymemtSatus?></td>
                          <td><?=$list->amount ?></td>
                          <td><?=$list->vat ?></td>
                          <td><?=$list->foc ?></td>
                          <td><?=$list->total ?></td>
                          <td><?=date('m/d/Y H:i:s', $list->created_at); ?></td>
                          <td>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('Are you sure you want to Delete this Record?')) window.location.href='<?=base_url("jobcard/delete_jobcard/$list->id")?>';"><i class="fa fa-remove"></i> Delete </button>
                              
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

    <div class="modal fade" id="PaymentReceiptDiv" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: #5A738E; color: #f3ecec;">
                <h4 class="modal-title"> Payment History</h4>
                <button type="button" class="close" data-dismiss="modal" style="color:#f3ecec;">&times;</button>
            </div>
            <div class="modal-body find-div" >
                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" id="primary">
                        <table id="PaymentHistoryData" class="table items table-bordered table-condensed product_table" style="margin-bottom:0px;">
                            <thead>
                              <tr>
                                <th>Sl.No.</th>
                                <th>Reference No.</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Payment Date</th>
                               <!--  <th>Created Date</th> -->
                              </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end page content -->   
       
  <?php $this->load->view('parking/layout/footer'); ?>
<!-- Custom Theme Scripts -->
<script src="<?=base_url() ?>assets/build/js/custom.js"></script>


   <script>
      $(document).ready(function(){
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
  /* Payment Voucher */
 //  $(document).on('click','.PaymentReceipt',function(){
     function PaymentReceipt(jobcard_id){
        // var jobcard_id = $(this).attr('data');
        // alert(jobcard_id);
        $.ajax({
            url: '<?php echo base_url('jobcard/GetPaymentReceipt'); ?>',
            type: 'POST',
            data: {jobcard_id:jobcard_id},
            dataType: 'json',
            success: function (result) {
                if (result.success) {
                    var sl = 1;
                    var trHTML = '';
                    $.each(result.responseData, function (i, item) {
                        trHTML += '<tr>\n\
                                    <td>'+sl+'</td>\n\
                                    <td><a class="link-color" href="<?php echo base_url('jobcard/paymentReceipt/'); ?>'+item.id+'" target="_blank">'+item.ReferenceNo+'</a></td>\n\
                                    <td>'+item.payment_amount+'</td>\n\
                                    <td>'+item.PaymentMode+'</td>\n\
                                    <td>'+item.payment_date+'</td>\n\
                                   </tr>';
                        sl++;
                    });
                    $('#PaymentHistoryData tbody').html(trHTML);
                    $('#PaymentReceiptDiv').modal('show');

                } else {
                    Notification(result.message,'error');
                    // alert(result.message);
                }
            },
            error: function () {
                Notification('response error','error');
            }
        });
        
    }; 


  
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
