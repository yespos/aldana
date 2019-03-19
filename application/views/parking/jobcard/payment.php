       <!-- page content -->
	 <?php $name = $this->session->name;   ?>  
       <div class="right_col" role="main">
          <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!--Alerts Start-->
                  <div class="x_content bs-example-popovers">
                      
                  </div>
                  <!--Alerts End-->
                  <div class="x_title">
                    <h2>Make Payment</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                     <!-- Payment -->
					 <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <h3 style="margin: 5px 0;"><b style="font-size: 25px;"><?=($advance=='advance')?'Advance':''?> Payment for Tax Invoice</b> <span class="pull-right" style="margin: -24px 0px;"> <img id="barcode2" /></span></h3>
                                <hr>
                                <form role="form" class="" id="makepaymentform"  method="post" autocomplete="off" action="<?php echo base_url('jobcard/makepayment');?>" enctype='multipart/form-data'> 
                                <?php if($details->status==5){ ?>
                                <input type="hidden" name="advance" id="advance" value="advance" >
                                <?php }else{ ?>
                                <input type="hidden" name="advance" id="advance" value="full" >
                                <?php } ?>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Payment Date <span class="required" aria-required="true">*</span></label>
                                                <input type="text" name="payment_date" id="datepicker" value="<?=date('Y-m-d')?>" class="form-control" required readonly="" style="background-color:#fff;">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Reference No. <span class="required" aria-required="true">*</span></label>
                                                <input type="text" name="ReferenceNo" id="ReferenceNo" value="<?=$payments_id?>" class="form-control" readonly="" required>
                                            </div>
                                           <input type="hidden" class="form-control" name="total_amount" id="total_amount" value="<?=$details->total ?>" required readonly> 
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Advance Paid</label>
                                                <input type="text" class="form-control" readonly="" name="paid_amount1" id="paid_amount1" value="<?php echo !empty($details->PaidAmount)?$details->PaidAmount:$details->PaidAmount?>">
                                            </div>
                                        </div>
                                        <input type="hidden" name="paid" id="paid" value="<?=$details->PaidAmount  ?>"> 
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Due Amount<span class="required" aria-required="true">*</span></label>
                                                <input type="number" name="amount" id="amount" value="<?php echo !empty($details->DueAmount)?$details->DueAmount:$details->DueAmount?>" class="form-control" step="0.01" readonly required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Paid Amount<span class="required" aria-required="true">*</span></label>
                                                <input type="text" name="paid_amount" id="paid_amount" value="<?php echo !empty($details->DueAmount)?$details->DueAmount:$details->DueAmount?>" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Mode Of Payment<span class="required" aria-required="true">*</span></label>
                                                <select class="form-control " name="paytype" id="paytype" onchange="$(this).change_payment(this.value);" required="">
                                                    <option value="">Select</option>
                                                    <?php 
                                                    if($paytype){
                                                        foreach ($paytype as $value) {
                                                    ?>
                                                    <option value="<?=$value->id?>" <?=(isset($post['payment_method']) && $post['payment_method'] == $value->id)?'selected':''?>><?=$value->name?> </option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Cheque/Trn/Ref No.</label>
                                                <input type="text" name="ChequeTrnRefNo" id="ChequeTrnRefNo" value="" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Cheque/Trn/Ref Date</label>
                                                <input type="text" name="ChequeTrnRefdate" id="datepicker2" value="" class="form-control" placeholder="yyyy-mm-dd" readonly="" style="background-color:#fff;">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Receiver's Name<span class="required" aria-required="true">*</span></label>
                                                <input type="text" name="receivers" id="receivers" value="<?=$name ?>" class="form-control" required="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Remarks/Being</label>
                                                <input type="text" id="note" rows="1" name="note" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                        <div class="text-right">
                                            <button class="btn btn-success btn-outline" type="submit"> Make Payment </button>
                                            
                                        </div>
                                    </div>
                                </div>
                <!-- Multiple Form -->
<div class="modal fade" id="payModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Multiple Payment</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <div class="modal-body find-div" >
                <div class="row" id="Modal">
                  <div id="showtotalAmount">
                  <strong style='font-size:20px;color:red; float:right '>Total Amount: <?php echo !empty($details->DueAmount)?$details->DueAmount:$details->DueAmount?></strong>
                  </div>    
                  <?php 
                     if($paytype){
                       foreach ($paytype as $value) {
                     if($value->id ==1 || $value->id ==2  || $value->id ==4) {
                        ?>
                  <div class="form-group">
                   <label class="control-label" for="phone"><?=ucfirst($value->name) ?></label>
                   <input type="number" class="form-control" name="multipay[<?=$value->id  ?>]" id="multipay<?=$value->id  ?>" value="0" step="0.01" onkeyup="calpayamount(<?=$value->id ?>)">
                  </div> 
                  <?php  } } }  ?>
                  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- form -->
                                    <input type="hidden" name="id" id="id" value="<?=$details->id?>" class="form-control" readonly="readonly">
                                    <input type="hidden" value="<?=$details->id?>" class="form-control" name="jobcard_id" id="jobcard_id" readonly="readonly">
                                    <input type="hidden" value="<?=$details->id?>" class="form-control" name="CspSysId" id="CspSysId" readonly="readonly">
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

       


					 <!-- End Payment Html -->
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

      $.fn.change_payment = function(val)
    {
      if(val==8)
      {
       $('#payModal').modal('show');
      }
    };

    $('#makepaymentform').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        var action = $(this).attr('action');
        // var redirect = '<?=base_url('jobcard/paymentReceipt')?>';
        var redirect = '<?=base_url('jobcard/jobcard_print')?>';
//        alert(action);return false;
        $.ajax({
            url: action,
            type: 'POST',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function () {
                $('.saveaction').html('Please wait..');
                $('.saveaction').attr('disabled', true);
            },
            success: function (result) {
                if (result.success) {
                    $("#message__yes").html(result.message);
                    $('.saveaction').html('Submit');
                    $('.saveaction').removeAttr('disabled', true);
                    // Notification(result.message,'success');
                    alert(result.message);
                   // window.location = redirect;
          window.location = redirect +'/'+result.id;
                } else {
                    $('.saveaction').removeAttr('disabled', true);
                    $('.saveaction').html('Submit');
                     alert(result.message);
                     // alert(result.paymodal);
                     if(result.paymodal=="show"){
                      $('#payModal').modal('show');
                     }
                    //Notification(result.message,'error');
                }
            },
            error: function () {
                $('.saveaction').html('Submit');
                $('.saveaction').removeAttr('disabled', true);
                // Notification('Response error','error');
                alert("Data Not Save Sucessfully");
            }

        });
    });

    function calpayamount(type){
       var amount = parseFloat($('#amount').val()); 
       var cash = parseFloat($('#multipay1').val());
       var card = parseFloat($('#multipay2').val());
       var credit = parseFloat($('#multipay4').val());
       var total =  cash + credit + card;
         //alert(total);
       if(type==1) { 
       if(cash)
       {
           var cc = credit + cash;
           if(amount>cc){
            card = amount-cash;
            $('#multipay2').val(card);
           }
           else{
            $('#multipay2').val(0);
           }
           // alert(amount);
       }
     }
      
      if(type==2) { 
       if(card)
       {
           var cc = card + cash;
           if(amount>cc){
            credit = amount-cc;
            $('#multipay4').val(credit);
           }
           else{
            $('#multipay4').val(0);
           }
           // alert(amount);
          
       }
     }
    }
    </script> 
    <!-- /Datatables -->
    
  </body>
</html>
