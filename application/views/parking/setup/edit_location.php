      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" id="PagePosition">
                  <div class="x_title">
                    <h2>Edit <small>Location Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?=base_url() ?>setup/location'">&laquo; Back</button></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <form id="form2" data-parsley-validate class="form-horizontal form-label-left input_mask" method="post" action="<?=base_url() ?>setup/edit_location_act">
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Location
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name"  name="name" class="form-control col-md-7 col-xs-12" value="<?=$list->name ?>" required="">
                          <input type="hidden" name="id" value="<?=$list->id ?>">
                        </div>
                      </div>
                 <?php   $region =array();
                       $region = explode(",",$list->region);
                       $count = count($region);
                       for ($i=0; $i < $count ; $i++) { 

                  ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Region <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="region" required name="region[]" class="form-control col-md-7 col-xs-12" value="<?=$region["$i"] ?>">
                        </div>
                       </div>

                     <?php  }  ?> 

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
  </body>
</html>
