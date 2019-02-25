      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" id="PagePosition">
                  <div class="x_title">
                    <h2>Edit New <small>Vehicle Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?=base_url() ?>vehicle'">&laquo; Back</button></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <form id="form2" data-parsley-validate class="form-horizontal form-label-left input_mask" method="post" action="<?=base_url() ?>setup/edit_company_act">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name"  name="name" class="form-control col-md-7 col-xs-12" value="<?=$list->name ?>">
                          <input type="hidden" name="id" value="<?=$list->id ?>">
                        </div>
                       </div>
                      
                   <!--   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Service Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control col-md-7 col-xs-12 select2_group" name="type" onchange="$(this).change_serviceType()">
                           <option value="">Select</option>
                           <option value="Engine Oil" <?=$list->type=='Engine Oil'?'Selected':'' ?>>Engine Oil</option>
                           <option value="Change Oil Filter" <?=$list->type=='Change Oil Filter'?'Selected':'' ?>>Change Oil Filter</option>
                           <option value="Air Filter Cleaned" <?=$list->type=='Air Filter Cleaned'?'Selected':'' ?>>Air Filter Cleaned</option>
                           <option value="AC Filter" <?=$list->type=='AC Filter'?'Selected':'' ?>>AC Filter</option>
                         </select>
                        </div>
                      </div> -->

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control col-md-7 col-xs-12" name="status">
                           <option value="InActive" <?=$list->status=='InActive'?'Selected':'' ?>>InActive </option>
                           <option value="Active" <?=$list->status=='Active'?'Selected':'' ?> > Active </option>
                         </select>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='<?=base_url() ?>customer'">Cancel </button>
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
