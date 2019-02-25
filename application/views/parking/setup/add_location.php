      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" id="PagePosition">
                  <div class="x_title">
                    <h2>Add New <small>Location Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?=base_url() ?>setup/location'">&laquo; Back</button></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <form id="form2" data-parsley-validate class="form-horizontal form-label-left input_mask" method="post" action="<?=base_url() ?>setup/add_location_act">
                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Location
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name"  name="name" class="form-control col-md-7 col-xs-12" value="" required="">
                          <input type="hidden" name="LastID" value="2">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Region <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="region" required name="region[]" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                      </div>

                       <!-- Add Custom field -->
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
        <?php 
            for($i=2;$i<=10;$i++) { ?>
                <div class="form-group" id="g_prevdesgrows<?php echo $i ?>" style="display:none">

            <div class="clearfix" style="height: 10px;clear: both;"></div>
           
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Region <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="region<?php echo $i ?>" required name="region[]" class="form-control col-md-7 col-xs-12" value="" disabled="disabled">
                        </div>
                         <span class="btn btn-danger" onClick="$(this).parent().parent().remove();" title="Remove"> X </span>
                      </div>
                    
                  
                
            <div class="clearfix" style="height: 10px;clear: both;"></div>

                  <!-- <div class="col-sm-2">
                     <span class="btn btn-danger" onClick="$(this).parent().parent().remove();" title="Remove"> X </span>
                  </div> -->
                </div>
        <?php } ?>
        
            <!--  end  -->

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='<?=base_url() ?>setup/location'">Cancel</button>
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
                            $("#region" + i).removeAttr( 'disabled' );
                            $("#g_prevdesgrows" + i).css( 'display' , '');           
                        }
                  }
            }
        $("#g_prevdesgcounter").val(parseInt(quantity)+1);
        
    };

  });
    </script>
    
  </body>
</html>
