  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Item</h4>
        </div>
        <div class="modal-body">
            <form id="form2" data-parsley-validate class="form-horizontal form-label-left input_mask" method="post" >
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Code<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control" id="code" name="code" value="<?php echo $code; ?>" readonly>
                            </div>
                        </div>
                        
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Service Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control col-md-7 col-xs-12 select2_group" name="type" id="type" style="width: 261px;"> 
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
                        <select class="form-control col-md-7 col-xs-12 select2_group" name="company_id" id="company" style="width: 261px;">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Litre <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="litres" name="litre" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Purchase Price<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="price" required name="price" class="form-control col-md-7 col-xs-12" value="" pattern="^\d*(\.\d{2}$)?">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sales Price <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="salesprice" required name="salesprice" class="form-control col-md-7 col-xs-12" value="<?=$list->salesprice  ?>" pattern="^\d*(\.\d{2}$)?">
                        </div>
                   </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='<?=base_url() ?>setup/company'">Cancel</button>
                          <button type="submit" class="btn btn-success" > Save </button>
                        </div>
                      </div>

                    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
   <script src="http://localhost:8080/aldanaservice/assets/vendors/jquery/dist/jquery.min.js"></script>

   <!-- <script src="<?=base_url() ?>assets/build/js/custom.min.js"></script> -->
    <script src="<?=base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>

   <script type="text/javascript">
  $("#form2").submit(function(e) {
    alert("hello");
           $.post( 
                 "<?php echo base_url(); ?>setup/add_filterService_ajax",
                  $("#form2").serialize(),
                  function(data){
                    alert(data);
                     $('#myModal').modal('hide');
                     $('#myModal').html(data);
                   }
                 );
    e.preventDefault();
    });
</script>