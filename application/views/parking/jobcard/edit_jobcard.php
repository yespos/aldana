<style type="text/css"></style>
<script>
  $( function() {
    $( ".date-picker" ).datepicker();
  });
  </script>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="x_title">
      <h2>Add New <small>Job Card Information</small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li>
          <button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?=base_url() ?>'">&laquo; Back</button>
        </li>
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
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form action="<?=base_url() ?>jobcard/add_jobcard_act" method="post" >
              <!--  Main Form --> 
              <!-- Smart Wizard -->
              <div id="wizard" class="form_wizard wizard_horizontal">
                <ul class="wizard_steps" style="display: none">
                  <li> <a href="#step-1"> <span class="step_no">1</span> <span class="step_descr"> Step 1<br />
                    <small>Step 1 description</small> </span> </a> </li>
                  <li> <a href="#step-2"> <span class="step_no">2</span> <span class="step_descr"> Step 2<br />
                    <small>Step 2 description</small> </span> </a> </li>
                  <li> <a href="#step-3"> <span class="step_no">3</span> <span class="step_descr"> Step 3<br />
                    <small>Step 3 description</small> </span> </a> </li>
                  <li> <a href="#step-4"> <span class="step_no">4</span> <span class="step_descr"> Step 4<br />
                    <small>Step 4 description</small> </span> </a> </li>
                </ul>
                <div id="step-1">
                  <div style="padding-bottom:20px;">
                    <div class="form-group">
                      <div class="col-md-3 col-sm-3 col-xs-6">
                        <label class="control-label" for="first-name">Refernce Number</label>
                        <input type="text" id="first-name" readonly name="ref_no" class="form-control col-md-7 col-xs-12" value="INVJ-<?=$last_id ?>">
                        <input type="hidden" name="created" value="<?php echo date("d/m/Y H:i:s") ?>">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-6">
                        <label class="control-label" for="DateIn">Date</label>
                        <input type="text" class=" date-picker form-control" id="DateIn"  value="" name="DateIn" readonly>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label" for="TimeIn"> Time </label>
                        <input type="text" class="form-control" readonly id="TimeIn" placeholder="" value="<?php echo date("H:i:s"); ?>" name="TimeIn">
                      </div>
                    </div>
                  </div>
                  <span class="pda-form-sec" id="QRGrid">
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Vehicle Number <span class="required">*</span></label>
                      <input type="text" id="VehicleNumber" required name="car_plate" class="form-control col-md-7 col-xs-12" value="" onchange="$(this).change_driver(this.value);">
                    </div>
                    <input type="hidden" id="customer_id" required name="customer_id" class="form-control col-md-7 col-xs-12" value="">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Customer Name <span class="required">*</span></label>
                      <input type="text" id="customer_name" required name="customer_name" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  </span> 
                  <span class="pda-form-sec" id="QRGrid">
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Model<span class="required">*</span></label>
                      <input type="text" id="model"  name="model" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">TRN No.<span class="required">*</span> </label>
                      <input type="text" id="reg_no"  name="reg_no" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  </span> 
                  <span class="pda-form-sec" id="QRGrid">
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Tel/Mob<span class="required">*</span></label>
                      <input type="text" id="mobile" required name="mobile" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Mileage <span class="required">*</span> </label>
                      <input type="text" id="mileage"  name="mileage" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  </span> 
                  
                </div>
                <div id="step-2">
                  <h4>Flushing Oil</h4>
                  <span class="pda-form-sec" id="QRGrid1">
                  <div class="form-group">
                    <div class="col-md-4 col-sm-3 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Service type <span class="required">*</span></label>
                      <select required id="flush_oil" name="flush_oil" class="select2_group form-control col-md-7 col-xs-12" onchange="$(this).change_flushing(this.value)" >
                        <option>Select</option>
                        <?php
                              foreach ($flushing as $flush) {
                                echo "<option value='".$flush->id."'> ".$flush->name." </option>";
                                }  ?>
                      </select>
                    </div>
                    <!--  <div class="col-md-1 col-sm-1 col-xs-12">
                         </div> -->
                    <div class="col-md-4 col-sm-3 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Quatity <span class="required">*</span></label>
                      <input type="text" id="f_quantity" required name="f_quantity" class="form-control col-md-7 col-xs-12" value="" onchange="$(this).change_amount(this.value,'f_price');">
                    </div>
                    <!-- <div class="col-md-1 col-sm-1 col-xs-11">
                         </div> -->
                    <input type="hidden" id="uf_price" required name="uf_price" class="form-control col-md-7 col-xs-12" value="">
                    <div class="col-md-4 col-sm-3 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Price <span class="required">*</span></label>
                      <input type="text" id="f_price" required name="f_price" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  </span>
                  <?php
            $i=0;     
             foreach ($servicetype as $serv) {   ?>
                  <h4>
                    <?=$serv->name ?>
                  </h4>
                  <input type="hidden" name="type[]" value="<?=$serv->id ?>">
                  <span class="pda-form-sec" id="QRGrid2">
                  <div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Select Company<span class="required">*</span></label>
                      <select required id="company<?=$i ?>" name="company[]" class="select2_group form-control col-md-7 col-xs-12" onchange="$(this).change_company(this.value,<?=$serv->id ?>,<?=$i ?>)" >
                        <option> Select </option>
                        <?php
                             //  $enginecomp = comapny_list('Engine Oil');
                                foreach ($company as $comp) {
                        echo "<option value='".$comp->id."'> ".$comp->name." </option>";
                                  } 
                              ?>
                        <!--  <option value="Supervisor"> Supervisor </option>
                              <option value="Worker"> Worker</option> -->
                      </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Item Name <span class="required">*</span> </label>
                      <select required id="item<?=$i ?>" name="item[]" class="select2_group form-control col-md-7 col-xs-12"  onchange="$(this).change_item(this.value,<?=$i ?>)" >
                        <option> Select </option>
                      </select>
                    </div>
                    <!-- hidden amount -->
                    <input type="hidden" id="u_price<?=$i ?>" required name="u_price[]" class="form-control col-md-7 col-xs-12" value="">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Quantity<span class="required">*</span></label>
                      <input type="text" id="quantity<?=$i ?>" required name="quantity[]" class="form-control col-md-7 col-xs-12" value="" onchange="$(this).change_amount(this.value,'price<?=$i ?>');">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Price <span class="required">*</span></label>
                      <input type="text" id="price<?=$i ?>" required name="price[]" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  </span>
                  <?php $i++; } ?>
                  <h4>CarWash</h4>
                  <span class="pda-form-sec" id="QRGrid6">
                  <div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Vehicle Tpye<span class="required">*</span></label>
                      <select required id="vehicletype" name="vehicletype" class="select2_group form-control col-md-7 col-xs-12"  >
                        <option> Select </option>
                        <?php
                                foreach ($vehicletype as $vehicle) {
                                echo "<option value='".$vehicle->id."'> ".$vehicle->name."</option>";
                                } 
                              ?>
                      </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name"> Washing Type <span class="required">*</span></label>
                      <select required id="wash_type" name="wash_type" class="select2_group form-control col-md-7 col-xs-12" onchange="$(this).change_washing(this.value)" >
                        <option> Select </option>
                        <?php
                                foreach ($washing as $wash) {
                                echo "<option value='".$wash->id."'> ".$wash->name."</option>";
                                } 
                              ?>
                      </select>
                    </div>
                    <!--  hidden Price  -->
                    <input type="hidden" id="uw_price" required name="uw_price" class="form-control col-md-7 col-xs-12" value="">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Quantity<span class="required">*</span></label>
                      <input type="text" id="w_quantity" required name="w_quantity" class="form-control col-md-7 col-xs-12" value="" onchange="$(this).change_amount(this.value,'w_price');">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" style="color:#000;" for="first-name">Price <span class="required">*</span> </label>
                      <input type="text" id="w_price" required name="w_price" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  </span> 
                  </div>
                <div id="step-3">
                  <h2 class="StepTitle">Step 3 Content</h2>
                  <div class="row">
                    <div class="form-group">
                      <div class="searchable-container">
                        <div class="form-group">
                          <?php
                    $i=0;
                foreach($servicejob as $job) { ?>
                          <div class="items col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <div class="info-block block-info clearfix">
                              <div class="square-box pull-left"> <span class="glyphicon glyphicon-tags glyphicon-lg" style="transform: rotate(180deg);"></span> </div>
                              <div data-toggle="buttons"  class="btn-group  bizmoduleselect" onclick="mat_modal(<?=$i ?>)">
                                <label class="btn btn-default">
                                <div class="bizcontent">
                                  <input type="checkbox" id="service<?=$i ?>" name="service[<?=$i ?>]" autocomplete="off" value="<?=$job->id ?>" data-toggle="modal"  >
                                  <span class="glyphicon glyphicon-ok glyphicon-lg"></span>
                                  <h5>
                                    <?=$job->name ?>
                                  </h5>
                                </div>
                                </label>
                              </div>
                            </div>
                          </div>
                          
                          <!-- MOdal form -->
                          
                          <div class="modal fade" id="myModal<?=$i ?>" role="dialog">
                            <div class="modal-dialog"> 
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Service Price:-</h4>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" id="us_price<?=$i ?>" required name="us_price[<?=$i ?>]" class="form-control col-md-7 col-xs-12" value="<?=$job->price ?>">
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label" style="color:#000;" for="first-name">Quantity<span class="required">*</span></label>
                                    <input type="text" id="s_quantity<?=$i ?>" required name="s_quantity[<?=$i ?>]" class="form-control col-md-7 col-xs-12" value="1" onchange="$(this).change_amount(this.value,'s_price<?=$i ?>');">
                                  </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label" style="color:#000;" for="first-name">Price <span class="required">*</span> </label>
                                    <input type="text" id="s_price<?=$i ?>" required name="s_price[<?=$i ?>]" class="form-control col-md-7 col-xs-12" value="<?=$job->price ?>" >
                                  </div>
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <!-- end Modal Form --> 
                          
                          <!--  <div class="col-md-2 col-sm-2 col-xs-12">
                         <label class="btn btn-success"> <img src="<?=base_url() ?>assets/images/icon/1.png" alt="..." class="img-thumbnail img-check" style="width: 100px;"> <input type="radio" name="vehicleType" id="vehicleType" value="<?=$car->id ?>" class="hidden" autocomplete="off" onclick="$(this).change_vehicle()"> </label>
                         <span> <strong> <?=ucfirst($car->carType) ?> </strong> </span>
                         </div> -->
                          <?php $i++;  } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="step-4">
                  <h2 class="StepTitle">Step 4 Content</h2>
                  <div class="row">
                    
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label class="control-label" for="first-name">Payment Type</label>
                        <select class="select2_group form-control" name="pay_type" id="pay_type"  required >
                          <option value="">Select</option>
                          <?php 
                                 if($paytype){
                                  foreach ($paytype as $value) { ?>
                          <option value="<?=$value->id?>" <?=(isset($post['payment_method']) && $post['payment_method'] == $value->id)?'selected':''?>>
                          <?=$value->name?>
                          </option>
                          <?php } } ?>
                        </select>
                      </div>
                    </div>
                    
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label class="control-label" for="first-name">Offer</label>
                        <select class="select2_group form-control" name="offer" id="offer"  required >
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select>
                      </div>
                    </div>
                    
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       <div class="form-group">
                        <label class="control-label" for="first-name">Discount</label>
                        <input type="text" class="form-control"  id="discount" placeholder="" value="" name="discount">
                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label class="control-label" for="first-name">Discount Type</label>
                        <select class="form-control" name="disc_type" id="disc_type">
                          <option value="normal"> Normal </option>
                          <option value="percentage">Percentage</option>
                        </select>
                      </div>
                    </div>
                    
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group" >
                        <label class="control-label" for="first-name">Discount Name</label>
                        <input type="text" class="form-control"  id="discount_name" placeholder="" value="" name="discount_name">
                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group" >
                        <label class="control-label" for="first-name">Discount Number</label>
                        <input type="text" class="form-control"  id="discount_no" placeholder="" value="" name="discount_no">
                      </div>
                    </div>
                    
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group" >
                        <label class="control-label" for="first-name">FOC Name</label>
                        <input type="text" class="form-control"  id="foc_name" placeholder="" value="" name="foc_name">
                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group" >
                        <label class="control-label" for="first-name">FOC Amount</label>
                        <input type="text" class="form-control"  id="foc_amount" placeholder="" value="" name="foc_amount">
                      </div>
                    </div>
                    
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label class="control-label" >Assigned To </label>
                        <select class="form-control" name="assigned_to" id="assigned_to">
                          <option value="">Select</option>
                          <?php   foreach ($worker as $key => $value) { ?>
                          <option value="<?=$value->id  ?>">
                          <?=$value->name ?>
                          </option>
                          <?php } ?>
                        </select>
                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label class="control-label" for="first-name">Recieved By</label>
                        <input type="text" class="form-control"  id="received_by" placeholder="" value="<?=$this->session->name  ?>" name="received_by">
                        <input type="hidden" id="user_id" required name="user_id" class="form-control col-md-7 col-xs-12" value="<?=$this->session->id   ?>">
                        <input type="hidden" id="shift_id" required name="shift_id" class="form-control col-md-7 col-xs-12" value="<?=$this->session->shift_id   ?>">
                      </div>
                    </div>
                    
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label class="control-label" for="DateIn"> Invoice Ref No. </label>
                        <input type="text" class="form-control"  id="invoice_ref" placeholder="Invoice Ref No." value="" name="invoice_ref">
                      </div>
                    </div>
                  </div>
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
<script src="<?=base_url() ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script> 
<!-- Switchery --> 

<!--  <script src="<?=base_url() ?>assets/vendors/switchery/dist/switchery.min.js"></script> --> 

<!-- Custom Theme Scripts --> 
<!-- Custom Theme Scripts --> 
<script src="<?=base_url() ?>assets/build/js/custom.min.js"></script> 
<!-- jQuery Smart Wizard --> 
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
      $(document).ready(function() {
        $('#DateIn').daterangepicker({
          singleDatePicker: true,
          dateFormat: 'dd-mm-YYYY',
          calender_style: "picker_4"
        }, function(start, end, label) {
        //  console.log(start.toISOString(), end.toISOString(), label);
        });
      });
</script> 
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
<?php $this->load->view('parking/jobcard/ajax');  ?>
<script type="text/javascript">
   $('#qty, #price').on('input',function() {
    var qty = parseInt($('#qty').val());
    var price = parseFloat($('#price').val());
    $('#total').val((qty * price ? qty * price : 0).toFixed(2));
});
 </script> 

<!--  <script>
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
</script> --> 
<script type="text/javascript">
  function add_cal(sid) {
     var amount = parseFloat($('#amount'+sid).val());
     var vat = parseFloat($('#vat'+sid).val());
     var quantity = parseFloat($('#quantity'+sid).val());

     // alert(amount);
     var price = amount * quantity;
     var vat = (price * 5)/100;
     var total = price + vat;
     $('#total'+sid).val(total.toFixed(2));
     $('#vat'+sid).val(vat.toFixed(2));
   
     this.final_report();
     
  }


  function final_report()
  {
    var count = parseFloat($('#count').val());
    var ftotal = 0 ;
    var fvat = 0 ;
    var foc =  parseFloat($('#l_foc').val());

    for(var i=0; i< count; i++)
    {
     var total = parseFloat($('#total'+i).val());
     var lvat =  parseFloat($('#vat'+i).val());
     if(!lvat) { total = 0; lvat = 0; }
      if(total)
      ftotal = ftotal + total;
      fvat = fvat + lvat;
       // alert(ftotal);
    }
    var famount = ftotal - fvat;
    //  alert(fvat);
     ftotal = ftotal - foc; 
     $('#l_total').val(ftotal.toFixed(2));
     $('#l_vat').val(fvat.toFixed(2));
     $('#l_amount').val(famount.toFixed(2));
  }

  function foc_s(sid)
  {
    if(document.getElementById("foc"+sid).checked)
    {
       var f_amount = parseInt($('#amount'+sid).val());
       var f_serviceid = parseInt($('#serviceid'+sid).val());
       /* var l_total = parseInt($('#l_total').val());
         var t_total = l_total - f_amount; */
       $('#l_foc').val(f_amount.toFixed(2));
       $('#foc_service').val(f_serviceid);
       this.final_report();
    }
   } 



   /* function add_cal1(sid) {
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
  }*/
</script> 
<script type="text/javascript">
  function mat_modal(i)
   {
   
    var instruct = $("#service"+i+":checked").val();
    if(!instruct)
    {
    $('#myModal'+i).modal('show');
    }


   }
</script> 

<!-- <script>
      $(document).ready(function() {
        $('#datatable-responsive').DataTable();
      });
    </script> -->

</body></html>