  <?php $dbs = $this->load->database('default', TRUE); ?>
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="row" id="PagePosition">
              <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <h2>
          <ol class="breadcrumb">
             <li class="active"><?php echo $this->lang->line('purchase_return_edit_purchase_return'); ?></li>
          </ol>
         </h2>
         <!-- box body -->
              <div class="box-body">
              <div class="row">
                <form role="form" id="form" method="post" action="<?php echo base_url('purchase_return/editPurchaseReturn');?>">
                <?php foreach($data as $row){?>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="date"><?php echo $this->lang->line('purchase_date'); ?><span class="validation-color">*</span></label>
                    <input type="text" class="form-control datepicker" id="date" name="date" value="<?php echo $row->date;?>">
                    <input type="hidden" name="purchase_return_id" value="<?php echo $row->id;?>">
                    <span class="validation-color" id="err_date"><?php echo form_error('date'); ?></span>
                  </div>

                  <div class="form-group">
                    <label for="reference_no"><?php echo $this->lang->line('purchase_reference_no'); ?><span class="validation-color">*</span></label>
                    <input type="text" class="form-control" id="reference_no" name="reference_no" value="<?php echo $row->reference_no;?>" readonly>
                    <span class="validation-color" id="err_reference_no"><?php echo form_error('reference_no'); ?></span>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="warehouse"><?php echo $this->lang->line('purchase_select_warehouse'); ?><span class="validation-color">*</span></label>
                    <select class="form-control select2_group select2" id="warehouse" name="warehouse" style="width: 100%;">
                      <option value=""><?php echo $this->lang->line('product_select'); ?></option>
                      <?php
                            foreach ($warehouse as  $key) {
                            ?>
                                    <option value='<?php echo $key->warehouse_id ?>' <?php if($key->warehouse_id == $row->warehouse_id){echo "selected";} ?>><?php echo $key->warehouse_name ?></option>
                            <?php
                                }
                            ?> 
                    </select>
                    <span class="validation-color" id="err_warehouse"><?php echo form_error('warehouse'); ?></span>
                  </div>

                  <div class="form-group">
                    <label for="supplier"><?php echo $this->lang->line('purchase_select_supplier'); ?> <span class="validation-color">*</span></label>
                    <select class="form-control select2_group select2" id="supplier" name="supplier" style="width: 100%;">
                      <option value=""><?php echo $this->lang->line('product_select'); ?></option>
                      <?php
                            foreach ($supplier as  $key) {
                            ?>
                                    <option value='<?php echo $key->supplier_id ?>' <?php if($key->supplier_id == $row->supplier_id){echo "selected";} ?>><?php echo $key->supplier_name ?></option>
                            <?php
                                }
                            ?>
                    </select>
                    <span class="validation-color" id="err_supplier"><?php echo form_error('supplier'); ?></span>
                  </div>
                </div>
                <div class="col-sm-12">
                  <br><br><br><br>
                  <div class="col-sm-2"></div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <select class="form-control select2_group select2" id="product" name="product" style="width: 100%;">
                      <option value=""><?php echo $this->lang->line('purchase_select_product'); ?></option>
                      <?php

                        foreach ($product as $value) {
                          echo "<option value='$value->id'".set_select('product_id',$value->id).">$value->item ($value->servicetype)</option>";
                        }
                      ?>
                    </select>
                    </div> <!--/form group  -->
                  </div> <!--/col-md-6 -->
                  <div class="col-sm-4">
                    <span class="validation-color" id="err_product"></span>
                  </div>
                </div> <!--/col-md-12 -->
                <div class="col-sm-12">
                  <div class="form-group">
                    <label><?php echo $this->lang->line('purchase_inventory_items'); ?></label>
                    
                    <table class="table items table-striped table-bordered table-condensed table-hover product_table" name="product_data" id="product_data">
                      <thead>
                        <tr>
                          <th style="width: 20px;"><img src="<?php  echo base_url(); ?>assets/images/bin1.png" /></th>
                          <th class="span2"><?php echo "Item"; ?></th>
                         <!--  <th class="span2"><?php echo "Description"; ?></th>
                          <th class="span2"><?php echo "HSN Code"; ?></th> -->
                          <th class="span2" width="10%"><?php echo "Quantity"; ?></th>
                          <th class="span2"><?php echo "Available Quantity"; ?></th>
                         <!--  <th class="span2"><?php echo "Unit"; ?></th> -->
                          <th class="span2"><?php echo "Price"; ?></th>
                          <th class="span2" width="10%"><?php echo "Subtotal"; ?></th>
                          <th class="span2" width="15%"><?php echo "Discount"; ?></th>
                          <th class="span2"><?php echo "Tax Value"; ?></th>
                          <th class="span2" width="15%"><?php echo "Tax %" ; ?></th>
                          <th class="span2" width="10%"><?php echo "Total"; ?></th>
                      </thead>
                      <tbody>
                        <?php
                          $i=0;
                          $tot=0;
                          foreach ($items as  $key) {
                          ?>
                          <tr>
                            <td>
                              <a class='deleteRow1'> <img src='<?php  echo base_url(); ?>assets/images/bin3.png' /> </a><input type='hidden' name='id[]' id='id' value="<?php echo $i ?>"><input type='hidden' name='product_id[]' id='product_id' value="<?php echo $key->id ?>"></td>
                              <td><?php echo $key->item; ?></td>
                              <td><input type="number" class="form-control text-center" value="<?php echo $key->quantity ?>" data-rule="quantity" name='qty[]' id='qty' min="1" max="<?php echo $key->quantity+$key->warehouses_quantity ?>">
                              <input type='hidden' name='old_Qty[]' id='old_Qty' value='<?php echo $key->quantity ?>'></td>
                              <td align="right"><?php echo $key->warehouses_quantity ?></td>
                              <td align="right"><input type='hidden' name='price[]' id='price' value='<?php echo $key->cost ?>'><?php echo $key->cost ?></td>
                            <td align="right">
                                <input type='text' class='form-control text-right' style='' value='<?php echo $key->gross_total ?>' name='linetotal[]' id='linetotal' readonly>
                              <input type="hidden" id="discount_value" name="discount_value[]" value="<?php echo $key->discount_value;?>">
                              <input type="hidden" id="hidden_discount" name="hidden_discount[]" value="<?php echo $key->discount;?>"></td>
                              <td><input type='text' class='form-control' style='' value='<?php echo $key->discount_id ?>' name='item_discount[]' id='item_discount'></td>
                            <td align="right">
                              <span id="taxable_value"><?php echo $key->gross_total - $key->discount ?></span>
                            </td>
                            <td align="right">
                              <input type="hidden" id="tax_value" name="tax_value[]" value="<?php echo $key->tax_value; ?>">
                              <input type="hidden" id="hidden_tax" name="hidden_tax[]" value="<?php echo $key->tax; ?>">
                              <div class="form-group">
                                <select class="form-control" id="item_tax" name="item_tax[]" style="width: 100%;">
                                  <option value=""><?php echo $this->lang->line('product_select'); ?></option>
                                 
                                    <option value='5' <?php if($key->tax_id == 5){echo "selected";} ?>>5%</option>
                                  
                                </select>
                              </div>
                            </td>
                            <td align="right">
                              <input type="text" class="form-control text-right" id="product_total" name="product_total[]" value=" <?php echo $key->gross_total - $key->discount + $key->tax ?>" readonly>
                            </td>
                          </tr>
                          <?php
                              $product_data[$i] = $key->product_id;
                              //array_push($product_data,$product);
                              $i++;
                              $tot += $key->gross_total;
                            }
                            //echo "<pre>";
                            //print_r($product_data);
                            $grandtotal = $row->total;
                            $product = json_encode($product_data);
                          ?>
                      </tbody>
                    </table>
                   <input type="hidden" name="total_value" id="total_value" value='<?php echo $tot; ?>'>
                    <input type="hidden" name="total_discount" id="total_discount" value='<?php echo $row->discount_value; ?>'>
                    <input type="hidden" name="total_tax" id="total_tax" value='<?php echo $row->tax_value; ?>'>
                    <input type="hidden" name="grand_total" id="grand_total" value='<?php echo $row->total; ?>'>
                    <input type="hidden" name="table_data" id="table_data" value='<?php echo $product ?>'>
                    <input type="hidden" name="table_data1" id="table_data1" value='<?php echo $product ?>'>
                    <table class="table table-striped table-bordered table-condensed table-hover">
                      <tr>
                        <td align="right" width="80%"><?php echo $this->lang->line('purchase_total_value'); ?></td>
                        <td align='right'><?php echo $this->session->userdata('symbol'); ?><span id="totalValue"><?php echo $tot; ?></span></td>
                      </tr>
                      <tr>
                        <td align="right"><?php echo $this->lang->line('purchase_total_discount'); ?></td>
                        <td align='right'>
                          <?php echo $this->session->userdata('symbol'); ?><span id="totalDiscount"><?php echo $row->discount_value; ?></span>
                        </td>
                      </tr>
                      <tr>
                        <td align="right"><?php echo $this->lang->line('purchase_total_tax'); ?></td>
                        <td align='right'>
                          <?php echo $this->session->userdata('symbol'); ?><span id="totalTax"><?php echo $row->tax_value; ?></span>
                        </td>
                      </tr>
                      <tr>
                        <td align="right"><?php echo $this->lang->line('purchase_total'); ?></td>
                        <td align='right'><?php echo $this->session->userdata('symbol'); ?><span id="grandTotal"><?php echo $row->total; ?></span></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                      <label for="details"><?php echo $this->lang->line('purchase_note'); ?></label>
                      <textarea class="form-control" id="note" name="note"><?php echo $row->note;?></textarea>
                      <span class="validation-color" id="err_details"><?php echo form_error('details'); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="box-footer">
                    <button type="submit" id="submit" class="btn btn-info"><?php echo $this->lang->line('product_update'); ?></button>
                    <span class="btn btn-default" id="cancel" style="margin-left: 2%" onclick="cancel('purchase_return')"><?php echo $this->lang->line('product_cancel'); ?></span>
                  </div>
                </div>
                <?php } ?>
              </form>
          </div>
          <!-- /.box-body -->
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
     /*if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href='<?php  echo base_url('supplier/delete/'); ?>'+id;
     }*/
  }
</script>

<script type="text/javascript">
$(document).ready(function() {
  $('.datepicker').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
      todayHighlight: true,
      orientation: "auto",
      todayBtn: true,
      todayHighlight: true,  
  });
});
</script>

<script>
 $(document).ready(function(){
    var i = 0;
    var product_data = new Array();
    var counter = 1;
    $('#warehouse').change(function(){
      $('#product').html('');
      $('#product').html('<option value="">Select Product</option>');
      var warehouse_id = $('#warehouse').val();
      if(warehouse_id != ""){
        $.ajax({
          url: "<?php echo base_url('purchase_return/getProducts') ?>/"+warehouse_id,
          type: "GET",
          dataType: "JSON",
          data:{
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
          },
          success: function(data){
            for(a=0;a<data.length;a++){
              $('#product').append('<option value="' + data[a].id + '">' + data[a].item+'  ( '+data[a].servicetype+' )</option>');
            }
          }
        });
      }
    });
    
    $(document).ready(function(){
        var i = 0;
        var product_data = new Array();
        var counter = 1;
        var totalproduct_id = [];
        $('#product').change(function(){
          var id = $('#product').val();
          $("table.product_table").find('input[name^="product_id"]').each(function (i) {
              totalproduct_id[i] = $(this).val();
            });
            if(jQuery.inArray(id, totalproduct_id)!= -1){
               alert('This filter service already taken..');return false;
            }
            //console.log(totalproduct_id);
          $('#err_product').text('');
          var flag = 0;
          if(id != ""){
            $.ajax({
              url: "<?php echo base_url('purchase/getProductAjax') ?>/"+id,
              type: "GET",
              data:{
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
              },
              datatype: "JSON",
              success: function(d){
                    data = JSON.parse(d);
                    //alert(data);
                   // alert(data[0]['product_id']);
                    $("table.product_table").find('input[name^="product_id"]').each(function () {
                        if(data[0].product_id  == +$(this).val()){
                          flag = 1;
                        }
                    });
                    if(flag == 0){
                      var id = data[0].id;
                      var name = data[0].item;
                      var price = data[0].price
                      var product = { "product_id" : id,
                                      "cost" :price
                                    };


                      product_data[i] = product;

                      length = product_data.length - 1 ;

                      var select_discount = "";
                      select_discount += '<div class="form-group">';
                     /* select_discount += '<select class="form-control select2" id="item_discount" name="item_discount" style="width: 100%;">';
                      select_discount += '<option value="">Select</option>';
                        for(a=0;a<data['discount'].length;a++){
                          select_discount += '<option value="' + data['discount'][a].discount_id + '">' + data['discount'][a].discount_name+'('+data['discount'][a].discount_value +'%)'+ '</option>';
                        }*/
                      select_discount += "<input type='number' class='form-control'  name='item_discount[]' id='item_discount' value='0'>";
                      select_discount += '</div>';
                      var tax_values= 5;
                      var select_tax = "";
                      select_tax += '<div class="form-group">';
                      select_tax += '<select class="form-control select2" id="item_tax" name="item_tax[]" style="width: 100%;">';
                      select_tax += '<option value="">Select</option>';
                      select_tax += '<option value="' + tax_values + '">' + tax_values+'%</option>';
                      select_tax += '</select></div>';

                      var newRow = $("<tr>");
                      var cols = "";
                      cols += "<td><a class='deleteRow'> <img src='<?php  echo base_url(); ?>assets/images/bin3.png' /> </a><input type='hidden' name='id' id='id' value="+i+"><input type='hidden' name='product_id[]' id='product_id' value="+id+"></td>";
                      cols += "<td>"+name+"</td>";

                      cols += "<td>"
                              +"<input type='number' class='form-control text-center' value='0' data-rule='quantity' min='1' name='qty[]' id='qty"+ counter +"' >"
                            +"</td>";
                      cols += "<td align='right'>"+data[0].quantity+"</td>";
                    //  cols += "<td>"+data[0].unit+"</td>";
                      cols += "<td align='right'>" 
                                +"<span id='price'>"
                                  +"<input type='hidden' name='price[]' id='price"+ counter +"' value='"+price
                                +"'>"+price
                                +"</span>"
                              +"</td>";
                      cols += "<td>"
                                +"<span id='sub_total'>"
                                  +"<input type='text' class='form-control text-right' style='' value='0.00' name='linetotal[]' id='linetotal"+ counter +"' readonly>"
                                +"</span>"
                              +"</td>";
                      cols += '<td><input type="hidden" id="discount_value" name="discount_value[]"><input type="hidden" id="hidden_discount" name="hidden_discount[]">'+select_discount+'</td>';
                      cols += '<td align="right"><span id="taxable_value"></span></td>';
                      cols += '<td><input type="hidden" id="tax_value" name="tax_value"><input type="hidden" id="hidden_tax" name="hidden_tax[]">'+select_tax+'</td>';
                      cols += '<td><input type="text" class="form-control text-right" id="product_total" name="product_total[]" readonly></td>';
                      cols += "</tr>";
                      counter++;

                      newRow.append(cols);
                      $("table.product_table").append(newRow);
                      var table_data = JSON.stringify(product_data);
                      $('#table_data').val(table_data);
                      i++;
                    }
                    else{
                      $('#err_product').text('Product Already Added').animate({opacity: '0.0'}, 2000).animate({opacity: '0.0'}, 1000).animate({opacity: '1.0'}, 2000);
                    }
                    /*var quantity = $('input[name^="quantity"]').val();
                    var price = $('input[name^="price"]').val();*/
                  },
                  error: function(xhr, status, error) {
                      $('#err_product').text('Enter Product Code / Name').animate({opacity: '0.0'}, 2000).animate({opacity: '0.0'}, 1000).animate({opacity: '1.0'}, 2000);
                  }
            });
          }
        });

        $("table.product_table").on("click", "a.deleteRow", function (event) {
            deleteRow($(this).closest("tr"));
            $(this).closest("tr").remove();
            calculateGrandTotal();
        });

        function deleteRow(row){
          var id = +row.find('input[name^="id"]').val();
          var array_id = product_data[id].product_id;
          // product_data.splice(id, 1);
          product_data[id] = null;
          // alert(product_data);
          var table_data = JSON.stringify(product_data);
          $('#table_data').val(table_data);
        }

        $("table.product_table").on("change", 'input[name^="price"], input[name^="qty"]', function (event) {
            calculateRow($(this).closest("tr"));
            calculateDiscountTax($(this).closest("tr"));
            calculateGrandTotal();
        });

        $("table.product_table").on("change",'#item_discount',function (event) {

          var row = $(this).closest("tr");
          var discount = +row.find('#item_discount').val();
         // alert("helo");
          if(discount != ""){
            // alert(discount);
           /* $.ajax({
              url: '<?php echo base_url('purchase/getDiscountValue/') ?>'+discount,
              type: "GET",
              data:{
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
              },
              datatype: JSON,
              success: function(value){
                data = JSON.parse(value);
                row.find('#discount_value').val(discount);
                calculateDiscountTax(row,discount);
                calculateGrandTotal();
              }
            });*/
            row.find('#discount_value').val(discount);
                calculateDiscountTax(row,discount);
                calculateGrandTotal();
          }
          else{
            row.find('#discount_value').val('0');
            calculateDiscountTax(row,0);
            calculateGrandTotal();
          }
        });
        $("table.product_table").on("change",'#item_tax',function (event) {
          var row = $(this).closest("tr");
          var tax = +row.find('#item_tax').val();
          if(tax != ""){
           /* $.ajax({
              url: '<?php echo base_url('purchase/getTaxValue/') ?>'+tax,
              type: "GET",
              data:{
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
              },
              datatype: JSON,
              success: function(value){
                data = JSON.parse(value);
                row.find('#tax_value').val(data[0].purchase_tax_value);
                calculateDiscountTax(row,0,data[0].purchase_tax_value);
                calculateGrandTotal();
              }
            });*/
            row.find('#tax_value').val(tax);
                calculateDiscountTax(row,0,tax);
                calculateGrandTotal();
          }
          else{
            row.find('#tax_value').val('0');
            calculateDiscountTax(row,0,0);
            calculateGrandTotal();
          }
        });
        function calculateDiscountTax(row,data = 0,data1 = 0){
          var discount;
          var tax;
          if(data == 0 ){
            discount = +row.find('#discount_value').val();
          }
          else{
            discount = data;
          }
          if(data1 == 0 ){
            tax = +row.find('#tax_value').val();
          }
          else{
            tax = data1;
          }
          var sales_total = +row.find('input[name^="linetotal"]').val();
          var total_discount = sales_total*discount/100;
          var taxable_value = sales_total - total_discount;
          row.find('#taxable_value').text(taxable_value);
          var total_tax = taxable_value*tax/100;
          row.find('#product_total').val(taxable_value + total_tax);

          row.find('#hidden_discount').val(total_discount);
          row.find('#hidden_tax').val(total_tax);

          var key = +row.find('input[name^="id"]').val();
          product_data[key].discount = total_discount;
          product_data[key].discount_value = +row.find('#discount_value').val();
          product_data[key].discount_id = +row.find('#item_discount').val();
          product_data[key].tax = total_tax;
          product_data[key].tax_value = +row.find('#tax_value').val();
          product_data[key].tax_id = +row.find('#item_tax').val();
          var table_data = JSON.stringify(product_data);
          $('#table_data').val(table_data);
        }
        function calculateRow(row) {
          var key = +row.find('input[name^="id"]').val();
          var price = +row.find('input[name^="price"]').val();
          var qty = +row.find('input[name^="qty"]').val();
          row.find('input[name^="linetotal"]').val((price * qty).toFixed(2));

          //product_data[key].quantity = qty;
          product_data[key] = qty;
          product_data[key].total = (price * qty).toFixed(2);
          var table_data = JSON.stringify(product_data);
          //console.log(table_data);
          $('#table_data').val(table_data);
        }

         function calculateGrandTotal() {
          var totalValue = 0;
          var totalDiscount = 0;
          var grandTax = 0;
          var grandTotal = 0;
          $("table.product_table").find('input[name^="linetotal"]').each(function () {
            totalValue += +$(this).val();
          });
          $("table.product_table").find('input[name^="hidden_discount"]').each(function () {
            totalDiscount += +$(this).val();
          });
          $("table.product_table").find('input[name^="hidden_tax"]').each(function () {
            grandTax += +$(this).val();
          });
          $("table.product_table").find('input[name^="product_total"]').each(function () {
            grandTotal += +$(this).val();
          });
          $('#totalValue').text(totalValue);
          $('#total_value').val(totalValue);
          $('#totalDiscount').text(totalDiscount.toFixed(2));
          $('#total_discount').val(totalDiscount.toFixed(2));
          $('#totalTax').text(grandTax.toFixed(2));
          $('#total_tax').val(grandTax.toFixed(2));
          $('#grandTotal').text(grandTotal.toFixed(2));
          $('#grand_total').val(grandTotal.toFixed(2));
        }
    });
});

</script>


<script type="text/javascript">
$(document).ready(function() {

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "auto",
        todayBtn: true,
        todayHighlight: true,  
    });

});
</script>
<!-- close datepicker  -->

<script>
  $(document).ready(function(){

    $("#submit").click(function(event){
      var name_regex = /^[a-zA-Z]+$/;
      var sname_regex = /^[a-zA-Z0-9]+$/;
      var num_regex = /^[0-9]+$/;
      var date_regex = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
      var date = $('#date').val();
      var reference_no = $('#reference_no').val();
      var warehouse = $('#warehouse').val();
      var supplier = $('#supplier').val();
      var product = $('#product').val();
      var editor = $('#editor').val();
      var grand_total = $('#grand_total').val();


        if(date==null || date==""){
          $("#err_date").text("Please Enter Date");
          $('#date').focus();
          return false;
        }
        else{
          $("#err_date").text("");
        }
        if (!date.match(date_regex) ) {
          $('#err_date').text(" Please Enter Valid Date ");   
          $('#date').focus();
          return false;
        }
        else{
          $("#err_date").text("");
        }
//date codevalidation complite.

        if(warehouse==""){
          $("#err_warehouse").text("Please Enter Warehouse");
          $('#warehouse').focus();
          return false;
        }
        else{
          $("#err_warehouse").text("");
        }
//warehouse code validation complite.

        if(supplier==""){
          $("#err_supplier").text("Please Enter Supplier");
          $('#supplier').focus();
          return false;
        }
        else{
          $("#err_supplier").text("");
        }
//supplier code validation complite.

        if(grand_total=="" || grand_total==null || grand_total==0.00){
          $("#err_product").text("Please Select Product");
          $('#product').focus();
          return false;
        }


    }); 

    $("#date").blur(function(event){
      var date = $('#date').val(); 
      var date_regex = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
      if(date==null || date==""){
          $("#err_date").text("Please Enter Date");
          $('#date').focus();
          return false;
        }
        else{
          $("#err_date").text("");
        }
        if (!date.match(date_regex) ) {
          $('#err_date').text(" Please Enter Valid Date ");   
          $('#date').focus();
          return false;
        }
        else{
          $("#err_date").text("");
        }
    });
    
    $("#warehouse").change(function(event){
      var warehouse = $('#warehouse').val();
      $('#product_table_body').empty();
      $('#table_data').val('');
      $('#grand_total').val('');
      if(warehouse==""){
        $("#err_warehouse").text("Please Enter Warehouse");
        $('#warehouse').focus();
        return false;
      }
      else{
        $("#err_warehouse").text("");
        $("#err_product").text("");
      }
    });
    $("#supplier").change(function(event){
      var supplier = $('#supplier').val();
      if(supplier==""){
        $("#err_supplier").text("Please Enter Supplier");
        $('#supplier').focus();
        return false;
      }
      else{
        $("#err_supplier").text("");
      }
    });
    $("#product").blur(function(event){
      var sname_regex = /^[a-zA-Z0-9]+$/;
      var product = $('#product').val();
      if(product==null || product==""){
        $("#err_product").text("Please Enter Product Code/Name");
        $('#product').focus();
        return false;
      }
      else{
        $("#err_product").text("");
      }
      if (!date.match(sname_regex) ) {
        $('#err_product').text(" Please Enter Valid Product Code/Name ");  
        $('#product').focus(); 
        return false;
      }
      else{
        $("#err_product").text("");
      }
    });

  }); 
</script>
    
  </body>
</html>
