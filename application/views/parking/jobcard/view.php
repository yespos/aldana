<?php // print_r($_SESSION); exit;  ?>
<?php // print_r($details); exit;  ?>  
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
	.nav_menu,
    #non-printable {
        display: none !important;
    }
	.pr,
    #non-printable {
        display: none !important;
    }
    #printable {
        display: block;
    }
</style>
  <!-- page content -->
  <div class="right_col" role="main">
          <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--Alerts Start-->
                  
                  <!--Alerts End-->
                  <div class="x_content">
				  <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                              <?php if($details->status == 23){ ?>
                                <h3 style="margin: 5px 0; color: #dc1e2b !important;"><b>Jobcard - Cancelled</b> <span style="font-size:13px;"> by <?=BranchUserName($details->cancel_by)?></span> <span class="pull-right">#<?=$details->ref_no?></span></h3>
                                <?php }else{ ?>
                                <h3 style="margin: 5px 0;"><b>Jobcard</b> <span class="pull-right">#<?=$details->ref_no?></span></h3>
                                <?php } ?>
                                <hr>
                                <form role="form" class="" id="formUpdatejobcard" method="post" autocomplete="off" action="<?php echo base_url('jobcardzone/update_jobcard_act'); ?>" enctype='multipart/form-data'> 
                                <div class="row">
                                    <div class="col-md-12" style="width:100%;">
                                        <div class="pull-left">
                                            <address>
                                                <?php if(!empty($BranchDetails)) { ?>
                       <img src="<?=base_url() ?>assets/img/branchlogo/<?=$BranchDetails->logo?>" />
                       <p class="text-muted m-l-5">
                                <?=$BranchDetails->BranchName?> <br> 
                                <?=$BranchDetails->Address?>, <?=$BranchDetails->Location?> <br> Dubai - <?=$BranchDetails->PinCode?>
                                                 </p>
                      <?php } else{  ?>
            <img src="<?=base_url() ?>assets/img/branchlogo/text_logo1_1535812676.png" />
                             <p class="text-muted m-l-5">
                                Head Office <br> 
                                Infinity Showroom Building Al Najdha Street, <br> Abu Dhabi 
                              </p>
                 <?php  }  ?>
                                            </address>
                                         </div>
                                        <div class="pull-right text-right">
                                            <address>
                                                <p class="addr-font-h3">To,</p>
                                                <p class="font-bold addr-font-h4" style="margin: 0 0 0px;"><?=$details->cname?></p>
                                                <p class="text-muted m-l-30">
                                                    <p class="m-t-30" style="margin: 0 0 0px;">
                                                        <b>Mobile :</b> <?=$details->cmobile?>
                                                    </p>
                                                    <p style="margin: 0 0 0px;">
                                                        <b>Email :</b> <?=$details->cemail?>
                                                    </p>
                                                </p>
<!--                                             <p class="m-t-30">
                                                    <b>Invoice Date :</b> <i class="fa fa-calendar"></i> 14th
                                                    July 2017
                                                </p>
                                                <p>
                                                    <b>Course :</b> Engineering
                                                </p>-->
                                            </address>
                                        </div>
                                    </div><?php //echo '<pre>';var_dump($details);?>
                                    <div class="col-md-12 col-sm-12" style="width:100%;">
                                        <div class="table-responsive m-t-40">
                                            <table class="table table-hover" style="width:100%;">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Employee:</strong></td>
                                                        <td><?=$this->session->agency_branch->FirstName?> <?=$this->session->agency_branch->LastName?></td>
                                                        <td><strong>Time:</strong></td>
                                                        <td><?=date('h:i:s')?></td>
                                                        <td><strong>Date:</strong></td>
                                                        <td><?=date('d-M-Y',strtotime($details->JobcardDate))?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Chassis No:</strong></td>
                                                        <td><?=$details->chassis_id?></td>
                                                        <td><strong>Plate No:</strong></td>
                                                        <td><?=$details->plateno?></td>
                                                        <td><strong>Manufacturer Year:</strong></td>
                                                        <td><?=$details->manfdate?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Color:</strong></td>
                                                        <td><?=$details->carcolor?></td>
                                                        <td><strong>Model:</strong></td>
                                                        <td><?=$details->modelname?></td>
                                                        <td><strong>Vehicle Type:</strong></td>
                                                        <td><?=$details->brandname?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date in:</strong></td>
                                                        <td><?=$details->Datein?></td>
                                                        <td><strong>Date out:</strong></td>
                                                        <td><?=$details->Dateout?></td>
                                                        <td><strong>Mileage:</strong></td>
                                                        <td><?=$details->runkm?></td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="6" class="text-center">&nbsp;</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                      <table class="table" style="width:100%">
                        <thead>
                            <tr>
                              <th class="text-left" colspan="2">Services</th>
                              <th colspan="5" >Value</th>
                            </tr>
                          </thead>
                        <tbody>

                     <!-- End  -->   
                     <?php if($service){ ?>
                         <tr>
                            <th class="text-left" colspan="3">Services</th>
                            <th <?=$display?>>Price</th>
                            <th <?=$display?>>Disc.</th>
                            <th <?=$display?>>Vat(5%)</th>
                            <th <?=$display?>>Total</th>
                           <!--  <th class="text-center">#</th> -->
                         </tr> 
                        <?php
                            $TotalAmount = 0;
                            $TotalTaxSum = 0;
                            if($service){
                                 foreach ($service as $key => $value) {
                                            ?>
                         <tr>
                             <td class="text-left" colspan="3" nowrap><?=$value->name ?></td>
                             <td class="text-left" <?=$display?> nowrap><?=$value->price ?> </td>
                             <td class="text-left" <?=$display?> nowrap><?=$value->discount_value ?> </td>
                             <td class="text-left" <?=$display?> nowrap><?=$value->tax_amount ?> </td>
                             <td nowrap <?=$display?>>
                                     <?=$value->total ?>                       
                            </td>
                           <!--  <td> </td> -->
                        </tr>
                                <?php
                                            }
                                         }
                                                    ?>
                         <tr>
                            <td colspan="7">&nbsp; </td>
                        </tr> 
                        <?php } ?> 
                        
                         <tr <?=$display?>>
                             <td nowrap colspan="5" style="text-align:right"> <strong>Total Amount </strong> </td>
                             <td></td>
                             <td > <?=$details->total_amount  ?></td>
                         </tr> 
                         <tr <?=$display?>>
                             <td nowrap colspan="5" style="text-align:right"><strong> Discount </strong> </td>
                             <td></td>
                             <td  >  <?=!empty($details->discount_value)?$details->discount_value:"0.00";  ?></td>
                         </tr>
                         <tr <?=$display?>>
                             <td nowrap colspan="5" style="text-align:right"> <strong>Total Vat </strong> </td>
                             <td></td>
                             <td  > <?=!empty($details->total_vat)?$details->total_vat:"0.00";  ?></td>
                         </tr>
                         <tr <?=$display?> >
                             <td nowrap colspan="5" style="text-align:right;"><strong> Grand Total </strong> </td>
                             <td></td>
                             <td > <?=$details->gross_total  ?></td>
                         </tr> 
                        <tr>
                            <td colspan="7">&nbsp; </td>
                        </tr>                                                          
                                    </tbody>
                                </table> 
                                
                            </div>
                        </div>
                            </div>
                                </form>
                            </div>
                        </div>
                         <div class="col-md-12 text-center pr" >
                     <button onclick="javascript:window.print();" class="btn btn-primary btn-outline noprint" type="button"> <span><i class="fa fa-print"></i>Print</span> </button>
                    </div>   
                    </div>
                    
                </div>
            </div>
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
