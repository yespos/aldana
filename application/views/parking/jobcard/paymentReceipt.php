  <style>
.detailBoder1{border:1px solid #999;}
.detailBorder2{
  border-top:1px solid #999;
  border-right:1px solid #999;
  border-bottom:1px solid #999;
}
.Table1{
  border-top:1px solid #999;
  border-right:1px solid #999;
  border-left:1px solid #999;
}
.Table2{
  border-top:1px solid #999;
  border-right:1px solid #999;
}
.TableLast{
  border-bottom:1px solid #999;
}
@media print {
    .bgcolor {
        background-color: #93a776 !important;
        -webkit-print-color-adjust: exact; 
    }
}
</style>
  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row" id="PagePosition">
              <div class="col-md-12 col-sm-12 col-xs-12">
             <!--  <div class="x_panel">
                  <button type="button" class="btn btn-success" onclick="javascript:window.location.href='<?=base_url('jobcard/add_jobcard') ?>'"><i class="fa fa-plus"></i>New Job Card</button>
              </div>  -->
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--Alerts Start-->
                  <div class="x_content bs-example-popovers">
                    <!-- Search Dept -->
                    
                    <!-- End -->
                  </div>
                  <!--Alerts End-->
                 <!--  <div class="x_title">
                    <h2>Job Card <small>Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div> -->

                 <!--  <div class="x_content"> -->
                    
                    <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-body " id="bar-parent2">
                        <div class="white-box">
                        <!--  Header -->
                        <div class="row">
                            <?php 
                            //echo '<pre>';print_r($this->session);
                            ?>
                          <div class="col-lg-12 m-b-10 ">
                              <img height="110" style="display: block;margin-left: auto;margin-right: auto;" src="<?=base_url() ?>assets/img/branchlogo/<?=$BranchDetails->logo?>" />
                          </div>
                            <div class="col-lg-1 col-md-1 col-sm-3" style="position:relative; top:15px;">
                                <p class="font-bold">Dhs.</p>
                            </div>                
                            <div class="col-lg-1 col-md-1 col-sm-3" style="position:relative; top:15px;">
                                <p class="font-bold">Fils.</p>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-3" >
                                    <p class="font-bold" style="text-align:center;">&nbsp;</p>
                            </div>
                            <?php $payment_amount = explode('.',$data->payment_amount)?>
                            <div class="col-lg-1 col-md-1 col-sm-3 m-b-10 Table1 Table2 TableLast" style="padding: 3px;">
                                <p class="font-bold" style="text-align:center;"><?=$payment_amount[0]?></p>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-3 m-b-10 Table2 TableLast" style="width:50%;padding: 3px;">
                                    <p class="font-bold" style="text-align:center;"><?=$payment_amount[1]?></p>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10 m-b-10" style="text-align:right;">
                                <p style="margin: 0 0 0px;">Date: <?php echo date('d/m/Y h:i:s',strtotime($data->created_at)) ?></p>
                                <p style="margin: 0 0 0px;">Ref. No.: <?php echo $data->ReferenceNo; ?></p>
                                <p style="margin: 0 0 0px;">Jobcard Ref. No.: <?php echo $data->ref_no; ?></p>
                                <p style="margin: 0 0 0px;">Invoice Ref. No.: <?php echo $Invoice->ReferenceNo; ?>
                                <p style="margin: 0 0 0px;">TRN: <?php echo $BranchDetails->tan_no; ?>    
                            </div>
                            
                          <div class="col-lg-12 col-md-12 col-sm-3 m-b-10">
                                  <p class="font-bold" style="text-align:center;margin: 0 0 0px;"><!-- PAYMENT VOUCHER --><?=$pay_status  ?></p>
                          </div>
                        </div>
                        
                        <!--  Details -->
                        <div class="row">
                            <div class="col-lg-12" style="padding:10px;">
                                <div style="display:inline-block; width: 13%;">Pay to Mr. / M /S.</div>
                                <div style="display:inline-block; width: 86%; margin-left: 5px; border-bottom: 1px solid #000;"><?php echo $data->customerName ?></div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12" style="padding:10px;">
                                <div style="display:inline-block; width: 17%;">The Sum of Dirhams</div>
                                <div style="display:inline-block; width: 82%; margin-left: 5px; border-bottom: 1px solid #000;"><?=numberTowords($data->payment_amount)?></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12 col-md-12" style="padding:10px;">
                                <div style="display:inline-block; width: 18%;">TRN/ Cheque No.</div>
                                <div style="display:inline-block; width: 15%; margin-left: 5px; border-bottom: 1px solid #000;"><?php echo $data->ChequeTrnRefNo ?></div>
                                <div style="display:inline-block; width: 5%;">Bank.</div>
                                <div style="display:inline-block; width: 25%; margin-left: 5px; border-bottom: 1px solid #000;"><?php echo $data->bank_name ?></div>
                                <div style="display:inline-block; width: 7%;">Dated.</div>
                                <div style="display:inline-block; width: 26%; margin-left: 5px; border-bottom: 1px solid #000;"><?php echo date('d/m/Y',strtotime($data->payment_date)) ?></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12" style="padding:10px;">
                              <div style="display:inline-block; width: 6%;">Being.</div>
                                <div style="display:inline-block; width: 93%; margin-left: 5px; border-bottom: 1px solid #000;"><?php echo $data->description ?>
                                </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-lg-4 col-md-4" style="padding:10px;"></div>
                            <div class="col-lg-8 col-md-8" style="padding:10px; text-align:center;">
                                <div style="display:inline-block; width: 38%;">Receiver's Name &amp; Sign:</div>
                                <div style="display:inline-block; width: 60%; margin-left: 5px; border-bottom: 1px solid #000;"><?php echo $data->receivers ?></div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="col-md-12">
                            <button onclick="javascript:window.print();" class="btn btn-primary btn-outline noprint" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                        </div>
                        </div>
                      </div>
                    
                    
                    
                </div>
            </div>
        </div>



         
                 <!--  </div> -->

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

    <div class="modal fade" id="PaymentReceiptDiv" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Payment History</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                                <th>Created Date</th>
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
  </body>
</html>
