 <style type="text/css">
  
 </style>
 <script>
  $( function() {
    $( ".date-picker" ).datepicker();
  });
  </script>
  <?php $shift = getShift(); ?>
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

            <form action="<?=base_url() ?>jobcard/add_jobcard_act" method="post" id="addform">   <!--  Main Form -->
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
                        <!--  <li>
                          <a href="#step-5">
                            <span class="step_no">5</span>
                            <span class="step_descr">
                                              Step 5<br />
                                              <small>Step 5 description</small>
                                          </span>
                          </a>
                        </li> -->
                      </ul>
                     
                      <div id="step-1">
                        <h2 class="StepTitle"></h2>
                      <form class="form-horizontal form-label-left" method="post" action="<?= base_url() ?>/add_jobcard_act" id="form1">  <!--  -->
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
                         <input type="time" class="form-control"  id="TimeIn" placeholder="" value="<?php echo date("H:i:s"); ?>" name="TimeIn">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                         <label class="control-label" for="TimeIn">Shift</label>
                         <select class="select2_group form-control" name="shift" id="shift">
                          <option value="">Select</option>
                          <?php foreach ($shifts as $key => $value) {
                           if(!empty($shift))
                           {
                            $check = $shift->id==$value->id?"selected":"";
                           }
                           ?>
                          <option value="<?=$value->id ?>" <?=$check ?>> <?=$value->name ?> </option>
                           <?php  } ?>
                           </select>
                        </div>
                        </div>

                      <span style="background:#CCC; border:1px solid #999; width:100%; display:inline-block; margin-top:50px;" id="QRGrid">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Vehicle Number <span class="required">*</span></label>
                          <input type="text" id="VehicleNumber" required name="car_plate" class="form-control col-md-7 col-xs-12" value="" onchange="$(this).change_driver(this.value);">
                        </div>
                        <input type="hidden" id="customer_id" required name="customer_id" class="form-control col-md-7 col-xs-12" value="">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Customer Name<span class="required">*</span></label>
                          <input type="text" id="customer_name" required name="customer_name" class="form-control col-md-7 col-xs-12" value="">
                        </div>                        
                      </div>
                      </span>

                      <span style="background:#CCC; border:1px solid #999; width:100%; display:inline-block; margin-top:50px;" id="QRGrid">
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

                     <span style="background:#CCC; border:1px solid #999; width:100%; display:inline-block; margin-top:50px;" id="QRGrid">
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
                   <br/>

                        <!-- </form> -->

                      </div>

                      <div id="step-2">
                        <h2 class="StepTitle"></h2>
                
              <h4>Flushing Oil</h4>
              <span style="background:#CCC; border:1px solid #999; width:100%; display:inline-block; margin-top:20px;" id="QRGrid1">
                      <div class="form-group">
                        <div class="col-md-4 col-sm-3 col-xs-11">
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
                        <div class="col-md-4 col-sm-3 col-xs-11">
                          <label class="control-label" style="color:#000;" for="first-name">Quatity <span class="required">*</span></label>
                          <input type="number" id="f_quantity" required name="f_quantity" class="form-control col-md-7 col-xs-12" value="" onchange="$(this).change_amount(this.value,'uf_price','f_price');">
                        </div>
                         <!-- <div class="col-md-1 col-sm-1 col-xs-11">
                         </div> -->
                        <input type="hidden" id="uf_price" required name="uf_price" class="form-control col-md-7 col-xs-12" value="0"> 

                        <div class="col-md-4 col-sm-3 col-xs-11">
                          <label class="control-label" style="color:#000;" for="first-name">Price <span class="required">*</span></label>
                          <input type="number" id="f_price" required name="f_price" class="form-control col-md-7 col-xs-12" value="0" step="0.01">
                        </div> 
                        <div class="col-md-1 col-sm-1 col-xs-11">
                        </div>                       
                      </div>
                  </span>
            <?php
            $i=0;     
             foreach ($servicetype as $serv) {   ?>
                <h4><?=$serv->name ?></h4>
                <input type="hidden" name="type[]" value="<?=$serv->id ?>">
                  <span style="background:#CCC; border:1px solid #999; width:100%; display:inline-block; margin-top:20px;" id="QRGrid2">
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
                       <input type="hidden" id="u_price<?=$i ?>" required name="u_price[]" class="form-control col-md-7 col-xs-12" value="0">

                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Quantity<span class="required">*</span></label>
                          <input type="number" id="quantity<?=$i ?>" required name="quantity[]" class="form-control col-md-7 col-xs-12" value="" onchange="$(this).change_amount(this.value,'u_price<?=$i ?>','price<?=$i ?>'),change_amountT(<?=$i ?>)">
                          <input type="hidden" name="tquantity[]" id="tquantity<?=$i ?>" value="0" >
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Price <span class="required">*</span></label>
                          <input type="number" id="price<?=$i ?>" required name="price[]" class="form-control col-md-7 col-xs-12" value="" step="0.01">
                        </div>                        
                        </div>
                  </span>
                <?php $i++; } ?>

                   <h4>CarWash</h4>
                  <span style="background:#CCC; border:1px solid #999; width:100%; display:inline-block; margin-top:20px;" id="QRGrid6">
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
                      <input type="hidden" id="uw_price" required name="uw_price" class="form-control col-md-7 col-xs-12" value="0">

                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Quantity<span class="required">*</span></label>
                          <input type="number" id="w_quantity" required name="w_quantity" class="form-control col-md-7 col-xs-12" value="" onchange="$(this).change_amount(this.value,'uw_price','w_price');">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Price <span class="required">*</span> </label>
                          <input type="number" id="w_price" required name="w_price" class="form-control col-md-7 col-xs-12" value="" step="0.01">
                        </div>                        
                      </div>
                  </span>
                    <!-- ending -->
                    
                   <!--  </div>
                  </div>  -->
                      </div>

                       <div id="step-3">
                        <h2 class="StepTitle">Step 3 Content</h2>
                    <!--   <form class="form-horizontal form-label-left"> -->
     <!-- testing -->
              <div class="row">
         <div class="form-group">
            <div class="searchable-container">    
                      <div class="form-group">
                    <?php
                    $i=0;
                foreach($servicejob as $key => $value ) {
                   $job = $value;
                 ?>
                 <div class="items col-xs-12 col-sm-5 col-md-4 col-lg-4">
                     <div class="info-block block-info clearfix">
                        <div class="square-box pull-left">
                           <span class="glyphicon glyphicon-tags glyphicon-lg"></span>
                        </div>
                        <div data-toggle="buttons"  class="btn-group  bizmoduleselect" onclick="mat_modal(<?=$key ?>)">
                            <label class="btn btn-default">
                          <div class="bizcontent">
                      <input type="checkbox" id="service<?=$key ?>" name="service[<?=$key ?>]" autocomplete="off" value="<?=$job->id ?>" data-toggle="modal"  >
                        <span class="glyphicon glyphicon-ok glyphicon-lg"></span>
                          <h5><?=$job->name ?></h5>
                                </div>
                            </label>
                        </div>
                     </div>
                  </div>

                <!-- MOdal form -->

    <div class="modal fade" id="myModal<?=$key ?>" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Service Price:-</h4>
        </div>
              <div class="modal-body" style="height: 71px;">
                 <input type="hidden" id="us_price<?=$key ?>" required name="us_price[<?=$key ?>]" class="form-control col-md-7 col-xs-12" value="<?=$job->price ?>">
                       <div class="col-md-12 col-sm-12 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Name<span class="required">*</span></label>
                          <input type="text" id="s_desc<?=$key ?>" required name="s_desc[<?=$key ?>]" class="form-control col-md-7 col-xs-12" value="<?=$job->name ?>">
                       </div>
                       <div class="col-md-12 col-sm-12 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Quantity<span class="required">*</span></label>
                          <input type="number" id="s_quantity<?=$key ?>" required name="s_quantity[<?=$key ?>]" class="form-control col-md-7 col-xs-12" value="1" min="1" onchange="$(this).change_amount(this.value,'us_price<?=$key ?>','s_price<?=$key ?>');">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label class="control-label" style="color:#000;" for="first-name">Price <span class="required">*</span> </label>
                          <input type="number" id="s_price<?=$key ?>" required name="s_price[<?=$key ?>]" class="form-control col-md-7 col-xs-12" value="<?=$job->price ?>" min="0" step="0.01">
                          <input type="hidden" id="us_price<?=$key ?>" required name="s_price[<?=$key ?>]" class="form-control col-md-7 col-xs-12" value="<?=$job->price ?>" min="0" step="0.01">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                        </div>
                        <br>
               </div>
        <div class="modal-footer" style="margin-top: 88px;">
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
                       <!--  </form> -->
                      </div>

                      <div id="step-4">
                        <h2 class="StepTitle">Step 4 Content</h2>
                    <!--   <form class="form-horizontal form-label-left"> -->
                       <div class="row">
                       <!--  <div class="form-group gap">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <label class="control-label" for="first-name">Authorized By</label>
                         
                          <input type="text" class="form-control" readonly id="auth_by" placeholder="" value="admin" name="auth_by">
                        </div>
                      
                       
                        
                        </div>
                        <br> <br /> -->

                       

                      <div class="form-group gap">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <label class="control-label" for="first-name">Payment Type</label>
                         <select class="select2_group form-control" name="pay_type" id="pay_type" onchange="$(this).change_payment(this.value);" required >
                           <option value="">Select</option>
                              <?php 
                                 if($paytype){
                                  foreach ($paytype as $value) { ?>
                                 <option value="<?=$value->id?>" <?=(isset($post['payment_method']) && $post['payment_method'] == $value->id)?'selected':''?> ><?=$value->name?> </option>
                              <?php } } ?>
                          </select>
                        </div>
                      </div>
                    
                    <!--  <div id="multipaytype" style="display: none">
                      <div class="form-group">
                       <?php 
                    /* if($paytype){
                       foreach ($paytype as $value) {
                     if($value->id ==1 || $value->id ==2  || $value->id ==4) {*/
                        ?>
                  
                    <div class="col-md-6 col-sm-6 col-xs-12">
                   <label class="control-label" for="phone"><?=ucfirst($value->name) ?></label>
                   <input type="number" class="form-control" name="multipay[<?=$value->id  ?>]" id="multipay<?=$value->id  ?>" value="0" min="0"  >
                  </div> 
                  <?php //  } } }  ?>
                   </div>
                    </div>
 -->
                     <!-- Cancel Modal Form -->
<div class="modal fade" id="refModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Credit Customer Name</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <div class="modal-body find-div" >
                <div class="row" id="actModal">
                  <div class="form-group">
                   <label class="control-label" for="phone">Enter Phone No</label>
                   <input type="number" class="form-control" name="phone" id="phone" value="" onchange="$(this).change_CustomerNumber(this.value);">
                  </div> 
                  <div class="form-group">
                   <label class="control-label" for="first-name">Enter Credit Customer Name</label>
                   <input type="text" class="form-control" name="credit_customer" id="credit_customer" value="">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
       
        </div>
    </div>
</div>
<!--  End Term -->

<!-- Multiple Form -->
<div class="modal fade" id="payModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Multiple Payment</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
              
            <div class="modal-body find-div" >
              <div id="showtotalAmount">
               
              </div> 
                <div class="row" id="Modal">
                  <?php 
                     if($paytype){
                       foreach ($paytype as $value) {
                     if($value->id ==1 || $value->id ==2  || $value->id ==4) {
                        ?>
                  <div class="form-group">
                   <label class="control-label" for="phone"><?=ucfirst($value->name) ?></label>
                   <input type="number" class="form-control" name="multipay[<?=$value->id  ?>]" id="multipay<?=$value->id  ?>" value="0" min="0" step="0.01">
                  </div> 
                  <?php  } } }  ?>
                  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- form -->

                     <div class="form-group gap">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <label class="control-label" for="first-name">Offer</label>
                         <select class="select2_group form-control" name="offer" id="offer"  required >
                           <option value="No">No</option>
                           <option value="Yes">Yes</option>
                         </select>
                        </div>
                     </div>

                    <div class="form-group gap" >
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Discount</label>
                        <input type="text" class="form-control"  id="discount" placeholder="" value="" name="discount">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Discount Type</label>
                        <select class="form-control" name="disc_type" id="disc_type">
                            <option value="normal"> Normal </option>
                            <option value="percentage">Percentage</option>
                         </select>
                      </div>
                      </div>

											<div class="form-group gap" >
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Discount Name</label>
                      <input type="text" class="form-control"  id="discount_name" placeholder="" value="" name="discount_name">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Discount Number</label>
											<input type="text" class="form-control"  id="discount_no" placeholder="" value="" name="discount_no">
                      </div>
                      </div>


                      <div class="form-group gap" >
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">FOC Name</label>
                          <input type="text" class="form-control"  id="foc_name" placeholder="" value="" name="foc_name">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">FOC Amount</label>
                          <input type="text" class="form-control"  id="foc_amount" placeholder="" value="" name="foc_amount">
                      </div>
                      </div>

                      <div class="form-group gap">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <label class="control-label" >Assigned To </label>
                          <select class="form-control" name="assigned_to" id="assigned_to">
                            <option value="">Select</option>
														<?php   foreach ($worker as $key => $value) { ?>
													  <option value="<?=$value->id  ?>"> <?=$value->name ?> </option>
													<?php } ?>
                          </select>
                       </div>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Recieved By</label>
                          <input type="text" class="form-control"  id="received_by" placeholder="" value="<?=$this->session->name  ?>" name="received_by">
                          <input type="text" class="form-control"  id="tx_desc" placeholder="" value="<?=$this->session->tx_desc  ?>" name="tx_desc">
													<input type="hidden" id="user_id" required name="user_id" class="form-control col-md-7 col-xs-12" value="<?=$this->session->id   ?>">
													<input type="hidden" id="shift_id" required name="shift_id" class="form-control col-md-7 col-xs-12" value="<?=$this->session->shift_id   ?>">
                        </div>
                      </div>
                      <div class="form-group">
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <label class="control-label" for="DateIn"> Invoice Ref No. </label>
                         <input type="text" class="form-control"  id="invoice_ref" placeholder="Invoice Ref No." value="" name="invoice_ref">
                       </div>
                      </div>

                     </div>
                   <br> <br />
                     

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
  
  $('#addform').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        var action = $(this).attr('action');
        var redirect = '<?=base_url('jobcard/jobcard_print')?>';
//        alert(action);return false;
        $.ajax({
            url: action,
            type: 'POST',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function () {
                $('.saveaction').html('Please wait..');
                $('.saveaction').attr('disabled', true);
            },
            success: function (result) {
                if (result.success) {
                    $("#message__yes").html(result.message);
                    $('.saveaction').html('Submit');
                    $('.saveaction').removeAttr('disabled', true);
                    // Notification(result.message,'success');
                    alert(result.message)
                   // window.location = redirect;
          window.location = redirect +'/'+result.id;
                } else {
                    $('.saveaction').removeAttr('disabled', true);
                    $('.saveaction').html('Submit');
                     alert(result.message);
                     // alert(result.paymodal);
                     if(result.paymodal=="show"){
                      $('#payModal').modal('show');
                      $( "#showtotalAmount" ).append( "<strong style='font-size:20px;color:red; float:right '>Total Amount : "+result.totalamount + "</strong>" );
                     }
                    //Notification(result.message,'error');
                }
            },
            error: function () {
                $('.saveaction').html('Submit');
                $('.saveaction').removeAttr('disabled', true);
                // Notification('Response error','error');
                alert("Data Not Save Sucessfully");
            }

        });
    });

  function change_amountT(i){
  var tqty = parseInt($('#tquantity'+i).val());
  var qty = parseInt($('#quantity'+i).val());
    if(qty > tqty)
    {
      alert("Entered Quantity is Exceeds then Available Quantity");
      $('#quantity'+i).val(1);
      var price = parseFloat($('#u_price'+i).val());
      $('#price'+i).val(price);
    }
  }

</script>


 <!-- <script>
      $(document).ready(function() {
        $('#datatable-responsive').DataTable();
      });
    </script> -->



    

  </body>
</html>
