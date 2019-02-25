      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <form id="form2" data-parsley-validate class="form-horizontal form-label-left input_mask" method="post" action="<?=base_url() ?>service/add_service_act">
                   <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Service Code
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                           <input type="text" id="service_code"  name="service_code" class="form-control" value="<?php echo "SER-".$last_id; ?>" readonly required>
                           <input type="hidden" name="LastID" value="2">
                        </div>

                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Name
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="name"  name="name" class="form-control" value="" required>
                        </div>
                    </div>

                   <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Vehicle Type<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                         <select class="select2_group form-control" name="vehicleType" id="vehicleType" onchange="$(this).change_vehicle()" required >
                           <option value=""> Select</option>
                           <?php foreach ($cartype as $car) {
                              ?> 
                           <option value="<?=$car->id ?>"> <?=$car->carType  ?> </option>
                         <?php } ?>
                           ?>
                         </select>
                        </div>

                         <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Amount<span class="required">*</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                         <input type="number"   name="price" id="price" class="form-control" value="" required>
                        </div>
                  </div> 

               <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Service Category</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                   
             <div class="form-group">
              <?php  foreach ($servicecate as $cat) {
                     ?>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" name="serviceCat[]" id="serviceCat" value="<?=$cat->id ?>" /> <?=ucfirst($cat->name) ?>
                            </label>
                          </div>
                        </div>
                    <?php } ?>
                </div>
                  </div>
                </div>
              
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Service Type</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                   
                  <div class="form-group">
                    <?php  foreach ($servicetype as $type) {
                     ?>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" name="serviceType[]" id="serviceType" value="<?=$type->id ?>" /><?=ucfirst($type->name) ?>
                            </label>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>

            <!-- Add Custom field -->
        <?php 
            for($i=2;$i<=10;$i++) { ?>
                <div class="form-group" id="g_prevdesgrows<?php echo $i ?>" style="display:none">

            <div class="clearfix" style="height: 10px;clear: both;"></div>
            <!--  -->
            <input type="hidden" id="key<?=$i ?>" name="key[<?=$i ?>]" value ="<?=$i ?>" disabled="disabled">
            <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Vehicle Type <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                         <select class="select2_group form-control" name="vehicleType<?php echo $i ?>" id="vehicleType<?php echo $i ?>" onchange="$(this).change_vehicle1(<?=$i ?>)"  disabled="disabled" required>
                           <option value=""> Select</option>
                           <?php foreach ($cartype as $car) {
                              ?> 
                           <option value="<?=$car->id ?>"> <?=$car->carType  ?> </option>
                         <?php } ?>
                           ?>
                         </select>
                        </div>

                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Amount<span class="required">*</span>
                        </label>

                        <div class="col-md-5 col-sm-5 col-xs-12">
                         <input type="number"  name="price<?=$i ?>" id="price<?php echo $i ?>" class="form-control" value="" disabled="disabled" required>
                        </div>
                  </div> 

               <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Service Category</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                   
             <div class="form-group">
              <?php  foreach ($servicecate as $cat) {
                     ?>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" name="serviceCat<?=$i ?>[]" id="serviceCat<?php echo $i ?>" value="<?=$cat->id ?>"  /> <?=ucfirst($cat->name) ?>
                            </label>
                          </div>
                        </div>
                    <?php } ?>
                      </div>
                  </div>
                </div>
              
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Service Type</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                   
                  <div class="form-group">
                    <?php  foreach ($servicetype as $type) {
                     ?>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" name="serviceType<?=$i ?>[]" id="serviceType<?php echo $i ?>" value="<?=$type->id ?>" /><?=ucfirst($type->name) ?>
                            </label>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>

                  <div class="col-sm-2">
                     <span class="btn btn-danger" onClick="$(this).parent().parent().remove();" title="Remove"> X </span>
                  </div>
                </div>
        <?php } ?>


         <div class="row">
            <div class="col-sm-12">
                <div class="form-group row">
                   <!--  <label for="example-text-input" class="col-sm-2 control-label">Add Fields</label> -->
                    <div class="col-sm-2">
                    <input type="hidden" id="g_prevdesgcounter" value="2" />
                        <button type="button" class=" btn btn-info" onClick="$(this).displayPrevDesgRow()" title="Add More"> <i class="fa fa-plus"></i> Add more </button>
                  </div>
                </div>
                <div class="clearfix" style="height: 10px;clear: both;"></div>
            </div>
        </div>
            <!--  end  -->

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='<?=base_url() ?>customer'">Cancel</button>
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        <!--   </div>
        </div> -->
        <!-- /page content -->


       <?php $this->load->view('parking/layout/footer'); ?>
       <!-- Switchery -->
    <script src="<?=base_url() ?>assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Custom Theme Scripts -->

    <script src="<?=base_url() ?>assets/build/js/custom.min.js"></script>
    <script src="<?=base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
  

     <script type="text/javascript">
      $(document).ready(function(){
      /*$('html, body').animate({
        scrollTop: $("#PagePosition").offset().top
       }, 500);*/
       
       $(".select2_single").select2({
              placeholder: "Select a state",
              allowClear: true
            });
       $(".select2_group").select2({});
    });
    </script>

    <script type="text/javascript">
$(document).ready(function()
{  
$.fn.displayPrevDesgRow = function() { //alert(111);  
            
        var quantity = $("#g_prevdesgcounter").val();  
            
            if (quantity != ""){
                  if(quantity != 0){
                        for (i=2; i<=quantity; i++)
                        {   
                            $("#key" + i).removeAttr( 'disabled' );                        
                            $("#price" + i).removeAttr( 'disabled' );
                            $("#vehicleType" + i).removeAttr( 'disabled' );
                            $("#g_prevdesgrows" + i).css( 'display' , '');           
                        }
                  }
            }
        $("#g_prevdesgcounter").val(parseInt(quantity)+1);
        
    };

  });
</script>

 <script type="text/javascript">
    
 $(document).ready(function(){

 $.fn.change_vehicle = function()
{
  var id = $('#vehicleType').val();
          $.post( 
                 "<?php echo base_url(); ?>service/change_vehicle",
                  {id:id},
                  function(data) {
                   // alert(data);
                     $('#price').val(data);
                   }
                );
};  

$.fn.change_vehicle1 = function(i)
{
  var id = $('#vehicleType'+i).val();
          $.post( 
                 "<?php echo base_url(); ?>service/change_vehicle",
                  {id:id},
                  function(data) {
                    alert(data);
                     $('#price'+i).val(data);
                   }
                );
};  

});
</script>
   
    
  </body>
</html>
