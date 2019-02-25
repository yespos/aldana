      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" id="PagePosition">
                  <div class="x_title">
                    <h2>Add New <small>FilterService Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?=base_url() ?>setup/filterservice'">&laquo; Back</button></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <form id="form2" data-parsley-validate class="form-horizontal form-label-left input_mask" method="post" action="<?=base_url() ?>setup/add_filterService_act">
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Code<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control" id="code" name="code" value="<?php echo $code; ?>" readonly >
                            </div>
                        </div>
                        
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Service Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control col-md-7 col-xs-12 select2_group" name="type" id="type" > 
                           <?php  
                          echo "<option value=''>Select</option>";
                           foreach ($servicetype as $serv) {
                          echo "<option value='".$serv->id."'>".$serv->name."</option>";
                             }
                           ?>
                         </select>
                        </div>
                     </div>
                      
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company Name 
                        </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" >
                        <select class="form-control col-md-7 col-xs-12 select2_group" name="company_id" id="company">
                             <?php  
                            echo "<option value=''>Select</option>";
                           foreach ($company as $comp) {
                          echo "<option value='".$comp->id."'>".$comp->name."</option>";
                             }
                           ?>
                        </select>
                      </div> 
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Item Name<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="item" required name="item" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                    </div>
                    <div class="form-group litre" id="litre" style="display: none">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Litre <span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="litres" name="litre" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Purchase Price <span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="price" required name="price" class="form-control col-md-7 col-xs-12" value="" pattern="^\d*(\.\d{2}$)?" onchange="$(this).change_price();">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sales Price <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="salesprice" required name="salesprice" class="form-control col-md-7 col-xs-12" value="<?=$list->salesprice  ?>" pattern="^\d*(\.\d{2}$)?" title="Only Numeric">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Opening Qty<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="quantity" name="quantity" class="form-control col-md-7 col-xs-12" value="<?=$list->quantity  ?>" pattern="^\d*(\.\d{2}$)?" onchange="$(this).change_price();">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vat<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="tax" required name="tax" class="form-control col-md-7 col-xs-12" value="<?=$list->salesprice  ?>" pattern="^\d*(\.\d{2}$)?" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Grand Total<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="grand_total"  name="grand_total" class="form-control col-md-7 col-xs-12" value="<?=$list->salesprice  ?>" pattern="^\d*(\.\d{2}$)?" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="supplier" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo "Supplier"; ?> <span class="validation-color">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12" >
                    <select class="form-control select2_group select2" id="supplier" name="supplier" style="width: 100%;">
                      <option value=""><?php echo "Select"; ?></option>
                      <?php
                        foreach ($supplier as $row) {
                          echo "<option value='$row->supplier_id'".set_select('supplier_id',$row->supplier_id).">$row->supplier_name</option>";
                         }
                      ?>
                    </select>
                    <span class="validation-color" id="err_supplier"><?php echo form_error('supplier'); ?></span>
                    </div>
                     </div>
                  </div>

                   <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='<?=base_url() ?>setup/company'">Cancel</button>
                           <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </div>

                    </form>
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


  <script type="text/javascript">
    
  $(document).ready(function(){

   $.fn.change_serviceType = function()
   {
    var type = $('#type').val();
  // alert(type);
          $.post( 
                 "<?php echo base_url(); ?>setup/change_serviceType",
                  { type:type },
                  function(data) {
                   // alert(data);
                      $('#company').html(data);
                   }
                );
       if(type == "Engine Oil")
       {
           $("#litre").css("display", "block");
       }
       else
       {
          $("#litre").css("display", "none");
       }

    }; 

     $.fn.change_price = function()
      {
       var price = parseFloat($("#price").val());
       var qty= parseInt($("#quantity").val());
       var amount = price * qty;
       var vat = (amount * 5)/100;
       $('#tax').val(vat);
       var total = amount + vat;  
       $('#grand_total').val(total);
      }

    }); 
 </script>
    
  </body>
</html>
