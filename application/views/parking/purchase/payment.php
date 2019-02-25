        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" id="PagePosition">
                  <div class="x_title">
                    <h2>Add Payment<small> </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                       <button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?=base_url() ?>purchase'">&laquo; Back</button> </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
             <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <form role="form" id="form" method="post" action="<?php echo base_url('purchase/addPayment');?>">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="date"><?php echo $this->lang->line('purchase_date'); ?><span class="validation-color">*</span></label>
                    <input type="text" class="form-control datepicker" id="date" name="date" value="<?php echo date("Y-m-d");  ?>">
                    <input type="hidden" name="id" value="<?php echo $data[0]->purchase_id; ?>">
                    <span class="validation-color" id="err_date"><?php echo form_error('date'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="paying_by"><?php echo $this->lang->line('payment_paying_by'); ?><span class="validation-color">*</span></label>
                    <select class="form-control select2_group select2" id="ledger" name="ledger" style="width: 100%;" required="required">
                      <option value="">Select</option>
                      <?php
                        foreach ($ledger as $row) {
                          echo "<option value='$row->id'".set_select('category',$row->id).">$row->title</option>";
                        }
                      ?>
                    </select>
                    <span class="validation-color" id="err_paying_by"><?php echo form_error('paying_by'); ?></span>
                  </div>
                  <?php
                    if($p_reference_no==null){
                        $no = sprintf('%06d',intval(1));
                    }
                    else{
                      foreach ($p_reference_no as $value) {
                        $no = sprintf('%06d',intval($value->payment_voucher_no)+1); 
                      }
                    }
                  ?> 
                  <div class="form-group">
                    <label for="reference_no"><?php echo $this->lang->line('purchase_reference_no'); ?><span class="validation-color">*</span></label>
                    <input type="text" class="form-control" id="reference_no" name="reference_no" value="PP-<?php echo $no; ?>" readonly>
                    <span class="validation-color" id="err_reference_no"><?php echo form_error('reference_no'); ?></span>
                  </div>

                   <div class="form-group">
                    <label for="amount"><?php echo $this->lang->line('sales_amount'); ?><span class="validation-color">*</span></label>
                    <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $data[0]->total;?>" readonly>
                    <span class="validation-color" id="err_amount"><?php echo form_error('amount'); ?></span>
                  </div>
                  <input type="hidden" name="TotalAmount" id="TotalAmount" value="<?=$data[0]->PaidAmount ?>">
                  <input type="hidden" name="PaidAmount" id="PaidAmount" value="<?=$data[0]->PaidAmount ?>">

                   <div class="form-group">
                    <label for="amount"> <?php echo "Paid Amount"; ?><span class="validation-color">*</span> </label>
                    <input type="text" class="form-control" id="paid_amount" name="paid_amount" value="<?php echo $data[0]->DueAmount;?>" >
                    <span class="validation-color" id="err_amount"><?php echo form_error('amount'); ?></span>
                   </div>

                  <div class="form-group">
                    <label for="paying_by"><?php echo $this->lang->line('payment_paying_by'); ?><span class="validation-color">*</span></label>
                    <select class="form-control select2_group select2" id="paying_by" name="paying_by" style="width: 100%;">
                      <option value="">Select</option>
                      <!-- <option>Cash</option>
                      <option>Cheque</option> -->
                       <?php 
                              if($paytype){
                                foreach ($paytype as $value) { ?>
                                <option value="<?=$value->id?>" <?=(isset($post['payment_method']) && $post['payment_method'] == $value->id)?'selected':''?>><?=$value->name?> </option>
                        <?php } } ?>
                    </select>
                    <span class="validation-color" id="err_paying_by"><?php echo form_error('paying_by'); ?></span>
                  </div>

                  <div id = "hide">
                  <div class="form-group">
                    <label for="bank_name"><?php echo $this->lang->line('payment_bank_name'); ?><span class="validation-color">*</span></label>
                    <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php echo set_value('bank_name'); ?>">
                    <span class="validation-color" id="err_bank_name"><?php echo form_error('bank_name'); ?></span>
                  </div>

                  <div class="form-group">
                    <label for="cheque_no"><?php echo $this->lang->line('payment_cheque_no'); ?><span class="validation-color">*</span></label>
                    <input type="text" class="form-control" id="cheque_no" name="cheque_no" value="<?php echo set_value('cheque_no'); ?>">
                    <span class="validation-color" id="err_cheque_no"><?php echo form_error('cheque_no'); ?></span>
                  </div>
                 </div>
                  <div class="form-group">
                      <label for="note"><?php echo $this->lang->line('purchase_note'); ?></label>
                      <textarea class="form-control" id="note" name="note"><?php echo set_value('note'); ?></textarea>
                    </div>
                  </div>
                </div>
                 <div class="col-sm-12">
                  <div class="box-footer">
                    <button type="submit" id="submit" class="btn btn-info">&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('sales_pay'); ?>&nbsp;&nbsp;&nbsp;</button>
                    <span class="btn btn-default" id="cancel" style="margin-left: 2%" onclick="cancel('sales/view/<?php echo $data[0]->purchase_id; ?>')"><?php echo $this->lang->line('product_cancel'); ?> </span>
                  </div>
                </div>
              </form>
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
     <script src="<?=base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
     <script type="text/javascript">
      $(document).ready(function(){
       
       $(".select2_single").select2({
              placeholder: "Select a state",
              allowClear: true
            });
       $(".select2_group").select2({});
    });
    </script>

     <script>
  $(document).ready(function(){
    $('#hide').hide();
    var date_empty = "Please Enter Date.";
    var date_invalid = "Please Enter Valid Date";
    var paying_by_empty = "Please Enter Paying Mode.";
    var bank_name_empty = "Please Enter Bank Name.";
    var bank_name_invalid = "Please Enter Valid Bank Name";
    var bank_name_length = "Please Enter Bank Name Minimun 3 Character";
    var cheque_no_empty = "Please Enter Cheque No.";
    var cheque_no_invalid = "Please Enter Valid Cheque No";
    $("#submit").click(function(event){
      var name_regex = /^[-a-zA-Z\s]+$/;
      var num_regex = /^[0-9]+$/;
      var date_regex = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
      var date = $('#date').val().trim();
      var paying_by = $('#paying_by').val();
      var bank_name = $('#bank_name').val().trim();
      var cheque_no = $('#cheque_no').val().trim();
      if(date==null || date==""){
        $("#err_date").text(date_empty);
        return false;
      }
      else{
        $("#err_date").text("");
      }
      if (!date.match(date_regex) ) {
        $('#err_date').text(date_invalid);   
        return false;
      }
      else{
        $("#err_date").text("");
      }
//date validation complite.
      if(paying_by==null || paying_by==""){
        $("#err_paying_by").text(paying_by_empty);
        return false;
      }
      else{
        $("#err_paying_by").text("");
      }

      if(paying_by=="Cheque"){
        if(bank_name == null || bank_name == ""){
          $('#err_bank_name').text(bank_name_empty);
          return false;
        }
        else{
          $('#err_bank_name').text('');
        }
        if (!bank_name.match(name_regex) ) {
          $('#err_bank_name').text(bank_name_invalid);   
          return false;
        }
        else{
          $("#err_bank_name").text("");
        }
        if (bank_name.length < 3) {
          $('#err_bank_name').text(bank_name_length);  
          return false;
        }
        else{
          $("#err_bank_name").text("");
        }

        if(cheque_no == null || cheque_no == ""){
          $('#err_cheque_no').text(cheque_no_empty);
          return false;
        }
        else{
          $('#err_cheque_no').text('');
        }
        if (!cheque_no.match(num_regex) ) {
          $('#err_cheque_no').text(cheque_no_invalid);   
          return false;
        }
        else{
          $("#err_cheque_no").text("");
        }
      }
    });

    $("#date").on("blur keyup",  function (event){
      var date_regex = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
      var date = $('#date').val().trim();
      if(date==null || date==""){
        $("#err_date").text(date_empty);
        return false;
      }
      else{
        $("#err_date").text("");
      }
      if (!date.match(date_regex) ) {
        $('#err_date').text(date_invalid);   
        return false;
      }
      else{
        $("#err_date").text("");
      }
    });
    $("#paying_by").on("change",  function (event){
      $('#hide').hide();
      var paying_by = $('#paying_by').val();
      if(paying_by==null || paying_by==""){
        $("#err_paying_by").text(paying_by_empty);
        return false;
      }
      else{
        if(paying_by == "Cheque"){
          $('#hide').show();
        }
        $("#err_paying_by").text("");
      }
    });
   $("#bank_name").on("blur keyup",  function (event){
      var name_regex = /^[-a-zA-Z\s]+$/;
      var bank_name = $('#bank_name').val().trim();
      if(bank_name == null || bank_name == ""){
        $('#err_bank_name').text(bank_name_empty);
        return false;
      }
      else{
        $('#err_bank_name').text('');
      }
      if (!bank_name.match(name_regex) ) {
        $('#err_bank_name').text(bank_name_invalid);   
        return false;
      }
      else{
        $("#err_bank_name").text("");
      }
      if (bank_name.length < 3) {
        $('#err_bank_name').text(bank_name_length);  
        return false;
      }
      else{
        $("#err_bank_name").text("");
      }
    });
   $("#cheque_no").on("blur keyup",  function (event){
      var num_regex = /^[0-9]+$/;
      var cheque_no = $('#cheque_no').val().trim();
      if(cheque_no == null || cheque_no == ""){
        $('#err_cheque_no').text(cheque_no_empty);
        return false;
      }
      else{
        $('#err_cheque_no').text('');
      }
      if (!cheque_no.match(num_regex) ) {
        $('#err_cheque_no').text(cheque_no_invalid);   
        return false;
      }
      else{
        $("#err_cheque_no").text("");
      }
    });
}); 
</script>
    
  </body>
</html>
