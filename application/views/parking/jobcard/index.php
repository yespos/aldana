 <style>

</style>
       <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
                 <div class="x_title">
                    <h2>Add New <small>Job Card Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?=base_url() ?>'">&laquo; Back</button></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Job <small>Card</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                        <!--    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <i class="fa fa-wrench"></i> </a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li> -->
                     <!--  <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

            <form action="<?=base_url() ?>jobcard/add_jobcard_act" method="post" >   <!--  Main Form -->
                    <!-- Smart Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps" style="display: none">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br />
                                              <small>Step 1 description</small>
                                          </span>
                           </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Step 2 description</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br />
                                              <small>Step 3 description</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Step 4<br />
                                              <small>Step 4 description</small>
                                          </span>
                          </a>
                        </li>
                      </ul>
                     
                      <div id="step-1">
                        <h2 class="StepTitle"></h2>
                      <form class="form-horizontal form-label-left" method="post" action="<?= base_url() ?>/add_jobcard_act" id="form1">  <!--  -->
                          <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                          <label class="control-label" for="first-name">Refernce Number</label>
                          <input type="text" id="first-name" readonly name="ref_no" class="form-control col-md-7 col-xs-12" value="INVJ-<?=$last_id ?>">
                          <input type="hidden" name="created" value="<?php echo date("d/m/Y H:i:s") ?>">
                        </div>

                       <div class="col-md-4 col-sm-4 col-xs-6">
                         <label class="control-label" for="DateIn"> Date </label>
                         <input type="text" class="form-control" readonly id="DateIn" placeholder="" value="<?php echo date("d/m/Y"); ?>" name="DateIn">
                       </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                         <label class="control-label" for="TimeIn"> Time </label>
                         <input type="text" class="form-control" readonly id="TimeIn" placeholder="" value="<?php echo date("H:i:s"); ?>" name="TimeIn">
                        </div>
                        </div>

                    <span style="background:#CCC; border:1px solid #999; width:100%; display:inline-block; margin-top:50px;" id="QRGrid">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Vehicle Number <span class="required">*</span></label>
                          <input type="text" id="VehicleNumber" required name="car_plate" class="form-control col-md-7 col-xs-12" value="" onchange="$(this).change_driver(this.value);">
                         </div>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Customer Name <span class="required">*</span> </label>
                          <input type="text" id="customer_name" required name="customer_name" class="form-control col-md-7 col-xs-12" value="">
                          </div>                        
                        </div>
                    </span>

                        <!-- </form> -->

                      </div>

                      <div id="step-2">
                        <h2 class="StepTitle"></h2>
                    <!--     <form class="form-horizontal form-label-left"> -->

                    <div class="x_panel">
                        <div class="x_title">
                          <h2><small>Main Service</small></h2>
                          <ul class="nav navbar-right panel_toolbox">
                           <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                          </ul>
                           <div class="clearfix"></div>
                    </div>
                   <div class="x_content">
                    <br />
                      <div class="form-group">
                        <?php  foreach ($mainservice as $service) {
                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class="radio" ">
                            <label class="container">
                              <input type="radio" onclick="$(this).change_services()" class="" name="service" id="service" value="<?=$service->service_code ?>"  /> <?=ucfirst($service->name) ?>
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                      <?php  } ?>
                      </div>
                    </div>
                  </div>

                        <div class="x_panel">
                        <div class="x_title">
                          <h2><small>Vehicle Type</small></h2>
                          <ul class="nav navbar-right panel_toolbox">
                           <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                          </ul>
                           <div class="clearfix"></div>
                        </div>
                   <div class="x_content">
                    <br />
                       <div class="form-group">
                        <?php  foreach ($cartype as $car) {
                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class="radio" ">
                            <label class="container">
                              <input type="radio" onclick="$(this).change_services()" class="" name="vehicleType" id="vehicleType" value="<?=$car->id ?>"  /> <?=ucfirst($car->carType) ?>
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                      <?php  } ?>
                      </div>
                    </div>
                  </div>

                       <div id="mainservices">
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
                  <?php  foreach ($servicecate as $cat) {   ?>
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
                 </div> <!-- end Main services -->
                       
                      <!--   </form> -->
                      </div>

                      <div id="step-3">
                        <h2 class="StepTitle">Step 3 Content</h2>
                    <!--   <form class="form-horizontal form-label-left"> -->
                        <div class="form-group gap">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                         <label class="control-label" for="first-name">Authorized By</label>
                          <!-- <select class="form-control" name="auth_by" id="auth_by">
                            <option> Select </option>
                            <option> Admin </option>
                          </select> -->
                          <input type="text" class="form-control" readonly id="auth_by" placeholder="" value="admin" name="auth_by">
                        </div>
                      
                       <div class="col-md-6 col-sm-6 col-xs-6">
                         <label class="control-label" >Assigned To </label>
                          <select class="form-control" name="assigned_to" id="assigned_to">
                            <option value=""> Select </option>
                            <option value="Worker"> Worker </option>
                          </select>
                       </div>
                        
                        </div>
                        <br> <br />

                     <div class="form-group gap">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                         <label class="control-label" for="first-name">Service Bay</label>

                        <input type="text" class="form-control" id="service_bay" placeholder="" value="admin" name="service_bay">
                        </div>

                         <div class="col-md-6 col-sm-6 col-xs-6">
                         <label class="control-label" for="first-name">Status</label>
                          <input type="text" class="form-control" id="status" placeholder="" value="admin" name="status">
                         </div>
                     </div>
                        <br> <br />

                      <div class="form-group gap">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                         <label class="control-label" for="first-name">SVC Pakage</label>
                        <input type="text" class="form-control" id="svc_pakage" placeholder="" value="" name="svc_pakage">
                        </div>

                         <div class="col-md-6 col-sm-6 col-xs-6">
                         <label class="control-label" for="first-name">Approx. SVC Time</label>
                          <input type="text" class="form-control" id="svc_time" placeholder="" value="" name="svc_time">
                         </div>
                      </div>
                         <br> <br />
                      <div class="form-group gap">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                         <label class="control-label" for="first-name">Special Instruction</label>
                        <input type="text" class="form-control" id="spl_inst" placeholder="" value="" name="spl_inst">
                        </div>

                         <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 28px;">
                          <div class="have">
                            <label>
                              <input type="checkbox" class="js-switch" name="cabin_frag" id="cabin_frag" value="1" />Cabin Fragrance
                            </label>
                            <label>
                              <input type="checkbox" class="js-switch" name="tire_polish" id="tire_polish" value="1" />Tire Polish
                            </label>
                          </div>
                           <div class="have">
                            
                          </div>
                       </div>
                      </div>

                       <div class="form-group gap">
                         
                        </div>
                       <!--  </form> -->
                      </div>

                      <div id="step-4">
                        <h2 class="StepTitle">Step 4 Content</h2>
                     <!--    <form class="form-horizontal form-label-left"> -->

                     <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                         <label class="control-label" for="first-name">Amount</label>
                          <input type="text" class="form-control"  id="amount" placeholder="" value="" name="amount">
                        </div>
                       <div class="col-md-6 col-sm-6 col-xs-6">
                           <label class="control-label" for="DateIn"> Vat </label>
                           <input type="text" class="form-control"  id="vat" placeholder="" value="" name="vat">
                       </div>
                     </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                         <label class="control-label" for="first-name">Total</label>
                          <input type="text" class="form-control"  id="total" placeholder="" value="" name="total">
                      </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                         <label class="control-label" for="first-name">Recieved By</label>
                          <input type="text" class="form-control"  id="received_by" placeholder="" value="" name="received_by">
                        </div>
                       </div>
                     <!--  <button type="button" onclick="document.getElementById('form1').submit();" class="btn btn-primary" >Submit</button> -->
                         </form>
                      </div>

                        <!-- End Main Form -->

                    </div>
                    <!-- End SmartWizard Content -->

                   <!--   <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                          <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='customer.asp'">Cancel</button>
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </div>  -->
                
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

       <?php $this->load->view('parking/layout/footer'); ?>

      <script src="<?=base_url() ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
          <!-- Switchery -->
    <script src="<?=base_url() ?>assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Custom Theme Scripts -->
    <!-- Custom Theme Scripts -->
    <script src="<?=base_url() ?>assets/build/js/custom.min.js"></script>
     <!-- jQuery Smart Wizard -->
  
    <script>
      $(document).ready(function() {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
          transitionEffect: 'slide'
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
       
      });
    </script>
 <script type="text/javascript">
   $(document).ready(function(){
    $(".buttonNext").click(function(){
       /*document.body.scrollTop = 0;
       document.documentElement.scrollTop = 0;*/
       $("html, body").animate({ scrollTop: 0 }, 600);
    });
});
    </script>
    

      <!-- End Review Section -->
 <script type="text/javascript">
    
 $(document).ready(function(){
 $.fn.change_driver = function(vehicle_no)
  {   
    var  vehicle_no;
    $.post(
           "<?php echo base_url(); ?>vehicle/change_driver",
                  { vehicle_no: vehicle_no },
                  function(data) {
                    // alert(data);
                     $('#customer_name').val(data);
                  }
           );
   };

    $.fn.change_services = function(id)
   {
    var vehicleType = $("input[name='vehicleType']:checked").val();
    var service = $("input[name='service']:checked").val();
          $.post( 
                 "<?php echo base_url(); ?>jobcard/change_services",
                  {vehicleType:vehicleType,service:service },
                  function(data) {
                   // alert(data);
                      $('#mainservices').html(data);
                   }
                 );

    };  

 });
 </script>

 <script type="text/javascript">
   $('#qty, #price').on('input',function() {
    var qty = parseInt($('#qty').val());
    var price = parseFloat($('#price').val());
    $('#total').val((qty * price ? qty * price : 0).toFixed(2));
});

 </script>

 <script>
 function cal() {
    
    if ($(".js-switch")[0]) {
        var e = Array.prototype.slice.call(document.querySelectorAll(".js-switch"));
        e.forEach(function(e) {
            new Switchery(e, {
                color: "#26B99A"
            })
        })
    }

    var price = parseInt($('#price').val());
    $('#amount').val(price);
    var vat = (price * 5)/100;
    $('#vat').val(vat);
    var total = price + vat;
    $('#total').val(total);
}
</script>
<script type="text/javascript">
  function add_cal(sid) {
     var price = parseInt($('#amount').val());
     var fixprice = parseInt($('#price').val());

    if(document.getElementById("serviceCat_"+sid).checked)
    {
      // alert(sid);
     
     var cat_price = parseInt($('#cat_price_'+ sid).val());
     var prices = price + cat_price;
     $('#amount').val(prices);
     var vat = (prices * 5)/100;
     $('#vat').val(vat);
     var total = prices + vat;
     $('#total').val(total);
    }
    else
    {
       
     var cat_price = parseInt($('#cat_price_'+ sid).val());
     var prices = price - cat_price;
     if(fixprice <= prices )
     {
      alert(prices);
     $('#amount').val(prices);
     var vat = (prices * 5)/100;
     $('#vat').val(vat);
     var total = prices + vat;
     $('#total').val(total);
     }
    }

  }

   function add_cal1(sid) {
     var price = parseInt($('#amount').val());
     var fixprice = parseInt($('#price').val());

    if(document.getElementById("serviceType_"+sid).checked)
    {
       alert(sid);
      var type_price = parseInt($('#type_price_'+ sid).val());
      var prices = price + type_price;
      $('#amount').val(prices);
      var vat = (prices * 5)/100;
      $('#vat').val(vat);
      var total = prices + vat;
      $('#total').val(total);
    }
    else
    {
     
     var type_price = parseInt($('#type_price_'+ sid).val());
     var prices = price - type_price;
      // alert(price);
    if(fixprice <= prices )
     {
      alert(prices);
     $('#amount').val(prices); 
     var vat = (prices * 5)/100;
     $('#vat').val(vat);
     var total = prices + vat;
     $('#total').val(total);
     }
    }
  }
</script>



  </body>
</html>
